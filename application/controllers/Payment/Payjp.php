<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payjp extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper('url');
        $this->load->model("Purchase_model");
        $this->load->model("User_model");
        $this->load->model("Gacha_model");
        $this->load->library('email');
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
        $gachaData = $this->Gacha_model->get_single_gacha($gacha_id);
        $gacha_name = $gachaData[0]['name'];
        $price= $gachaData[0]['price'];
        $order_number = 'WACTER'.date('Y-m-d-h-i');
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
                'remainder' => $purchase_times,
                'order_number' => $order_number 
            );
            $purchase_id = $this->Purchase_model->insert_purchase($data);

            // Purchase complete mail send
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
            $subject = "タイトル：【ワクワクポン】ご購入ありがとうございます";
            $message = $this->load->view("email/purchaseEnd_ja.php",$data,TRUE);

            $this->email->set_newline("\r\n");
            $this->email->from('info@wakuwakupon.chu.jp');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
            $res = $this->email->send();


            $this->session->set_userdata('purchase_id', $purchase_id);
            echo "success";
        } else {
            echo "error";
        }
    }
}