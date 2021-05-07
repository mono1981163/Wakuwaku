<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Univapay extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model("Purchase_model");
        $this->load->model("User_model");
    }
    public function index() {
        $payment_id = $_GET['pid'];
        $order_id = $_GET['sod'];
        $total_amount = $_GET['ta'];
        $rst = $_GET['rst'];
        $manage_number = $_GET['ap'];
        $error_code = $_GET['ec'];//ER000000000
        $email = $_GET['email'];
        $user = $this->User_model->get_user($email);
        $gacha_id = $_GET['gacha_id'];
        $purchase_times = $_GET['purchase_times'];
        if($rst == 1) {
            $this->session->set_userdata('pay_result', 'success');
            $data = array (
                'gacha_id' => $gacha_id,
                'customer_id' => $user['user_id'],
                'amount' => $total_amount,
                'purchase_times' => $purchase_times,
                'purchase_date' => date('Y-m-d'),
                'method' => "Alipay",
            );
            $purchase_id = $this->Purchase_model->insert_purchase($data);
            $newdata = array(
                'purchase_count'  => $_POST['purchase_times'],
                'purchase_id'  => $purchase_id
            );
            $this->session->set_userdata($newdata);
        } else {
            $this->session->set_userdata('pay_result', 'error');
        }
    }
}