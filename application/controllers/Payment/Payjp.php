<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payjp extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model("Purchase_model");
        $this->load->model("User_model");
    }
    public function payjp_credit() {
        require_once 'application/libraries/payjp/vendor/autoload.php';
        \Payjp\Payjp::setApiKey('sk_test_9271060ba9bfe0cd60b1e89c');
        $email = $this->session->userdata('email');
        $user = $this->User_model->get_user($email);
        $card_token = htmlspecialchars($_POST['card_token'], ENT_QUOTES);
        $amount = $_POST['amount'];
        $purchase_times = $_POST['purchase_times'];
        $gacha_id = $_POST['gacha_id'];
        $charge = \Payjp\Charge::create(array(
            'card' => $card_token,
            'amount' => $amount,
            'currency' => 'jpy'
        ));
        if($charge->paid) {
            $data = array (
                'gacha_id' => $gacha_id,
                'customer_id' => $user['user_id'],
                'amount' => $amount,
                'purchase_times' => $purchase_times,
                'purchase_date' => date('Y-m-d'),
                'method' => "credit card",
                'remainder' => $purchase_times
            );
            $purchase_id = $this->Purchase_model->insert_purchase($data);
		    // $this->session->set_userdata('gacha_id', $gacha_id);
            $this->session->set_userdata('purchase_id', $purchase_id);
            echo "success";
        } else {
            echo "error";
        }
    }
}