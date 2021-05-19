<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Univapay extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model("Purchase_model");
        $this->load->model("User_model");
        $this->load->helper('url');
    }
    public function index() {
        $payment_id = $_GET['pid'];
        $order_id = $_GET['sod'];
        $total_amount = $_GET['ta'];
        $rst = $_GET['result'];
        // $manage_number = $_GET['ap'];
        // $error_code = $_GET['ec'];
        $email = $this->session->userdata('email');
        $user = $this->User_model->get_user($email);
        $gacha_id = $this->session->userdata('gacha_id');
        $purchase_times = $this->session->userdata('purchase_times');
        if($rst == 1) {
            $this->session->set_userdata('pay_result', 'success');
            $data = array (
                'gacha_id' => $gacha_id,
                'customer_id' => $user['user_id'],
                'amount' => $total_amount,
                'purchase_times' => $purchase_times,
                'purchase_date' => date('Y-m-d'),
                'method' => "Alipay",
                'remainder' => $purchase_times
            );
            $purchase_id = $this->Purchase_model->insert_purchase($data);
            $newdata = array(
                'purchase_count'  => $purchase_times,
                'purchase_id'  => $purchase_id
            );
            $this->session->set_userdata($newdata);
            redirect('Gacha/Purchase/complete');
        } else {
            $this->session->set_userdata('pay_result', 'error');
        }
    }
}