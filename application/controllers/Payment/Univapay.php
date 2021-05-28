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
        $email = $this->session->userdata('email');
        $user = $this->User_model->get_user($email);
        $gacha_id = $this->session->userdata('gacha_id');
        $gachaData = $this->Gacha_model->get_single_gacha_cn($gacha_id);
        $gacha_name = $gachaData[0]['name'];
        $price= $gachaData[0]['price'];
        $order_number = 'WACTER'.date('Y-m-d-h-i');
        if($rst == 1) {
            $this->session->set_userdata('pay_result', 'success');
            $data = array (
                'gacha_id' => $gacha_id,
                'customer_id' => $user['user_id'],
                'amount' => $total_amount,
                'purchase_times' => $purchase_times,
                'purchase_date' => date('Y-m-d'),
                'method' => "Alipay",
                'remainder' => $purchase_times,
                'order_number' => $order_number
            );
            $purchase_id = $this->Purchase_model->insert_purchase($data);
            $newdata = array(
                'purchase_count'  => $purchase_times,
                'purchase_id'  => $purchase_id
            );
            $this->session->set_userdata($newdata);

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.lolipop.jp',
                'smtp_port' => 465,
                'smtp_user' => 'info@wakuwakupon.chu.jp', 
                'smtp_pass' => '3505-_-b-R2J-_Dn', 
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE,
                'MIME-Version' => '1.0',
                'header' => 'MIME-Version: 1.0',
                'header' => 'Content-type:text/html;charset=UTF-8'
            );
            $this->load->library('email', $config);
            $this->email->set_mailtype("html");
            $data['order_number'] = $order_number;
            $data['date'] = date('Y/m/d h:i');
            $data['name'] = $gacha_name;
            $data['purchase_times'] = $purchase_times;
            $data['amount'] = $amount;
            $data['price'] = $price;
            $data['email'] = 'info@wakuwakupon.chu.jp';
            $subject = "标题：[Waku Waku Pon]谢谢您的购买。";
            $message = $this->load->view("email/purchaseEnd_cn.php",$data,TRUE);

            $this->email->set_newline("\r\n");
            $this->email->from('info@wakuwakupon.chu.jp');
            $this->email->to($this->input->post('email'));
            $this->email->subject($subject);
            $this->email->message($message);
            $res = $this->email->send();

            redirect('Gacha/Purchase/complete');
        } else {
            $this->session->set_userdata('pay_result', 'error');
        }
    }
}