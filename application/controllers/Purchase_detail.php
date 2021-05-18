<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_detail extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model("Delivery_model");
        $this->load->model("Purchase_model");
        $this->load->model("User_model");
        $this->load->model("Mail_model");
        $this->load->library("pagination"); 
        $this->load->library('encryption');
        $this->load->library('email');
    }
    public function generateRandomString($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function detailView($purchase_id) {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $this->session->set_userdata('purchase_id',$purchase_id);
        $info = $this->Delivery_model->detail_view($purchase_id);
        $data['items'] = $info;
        $data["name"] = $info[0]["name"];
        $data["delivery_state"] = $info[0]["delivery_state"];
        $data["purchase_id"] = $info[0]["purchase_id"];
        $data["end_date"] = $info[0]["end_date"];
        $data["shipment_date"] = $info[0]["shipment_date"];
        $data["customer_id"] = $info[0]["customer_id"];
        $data["track_number"] = $info[0]["track_number"];
        $data["manage_memo"] = $info[0]["manage_memo"];

        $data['country'] = $this->encryption->decrypt($info[0]['country']);
        $data['zip_code'] = $this->encryption->decrypt($info[0]['zip_code']);
        $data['prefecture'] = $this->encryption->decrypt($info[0]['prefecture']);
        $data['city'] = $this->encryption->decrypt($info[0]['city']);
        $data['roomno'] = $this->encryption->decrypt($info[0]['roomno']);
        $data['phone'] = $this->encryption->decrypt($info[0]['phone']);
        $data['email'] = $info[0]['email'];
        $email['emailSetting'] = 1;

        $this->load->view('manage/header.php', $email);
        $this->load->view('manage/purchaseDetail', $data);
        $this->load->view('manage/footer.php');
    }
    public function deliver_prize() {
        $purchase_id = $this->input->post('purchase_id');
        $user_id = $this->Purchase_model->get_user_id_from_purchase($purchase_id);
        $country = $this->encryption->decrypt($this->User_model->get_country_of_user($user_id));
        $track_number = 'wakuwaku'.date("ymdhis");
        $subject = lang('Gacha Deliver');
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

        if($country == "日本") {
            $text = $this->Mail_model->get_sendmessage_japan();
        } else {
            $text = $this->Mail_model->get_sendmessage_china();
        }
        $message=$text;
        $this->email->set_newline("\r\n");
        $this->email->from('info@wakuwakupon.chu.jp');
        $this->email->to($this->input->post('email'));
        $this->email->subject($subject);
        $this->email->message($message);
        $res = $this->email->send();
        if($res) {
            $update_data = array(
                'delivery_state'=>'完了',
                'track_number'=>$track_number,
                'manage_memo'=> date('ymd').':発送完了',
            );
            $this->Delivery_model->update_purchase($purchase_id ,$update_data);
        } else {

        }
    }
    public function cancel_deliver() {
        $purchase_id = $this->input->post('purchase_id');
        $user_id = $this->Purchase_model->get_user_id_from_purchase($purchase_id);
        $country = $this->encryption->decrypt($this->User_model->get_country_of_user($user_id));
        $subject = lang('Cancel Deliver');
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

        if($country == "日本") {
            $text = $this->Mail_model->get_cancelmessage_japan();
        } else {
            $text = $this->Mail_model->get_cancelmessage_china();
        }
        $message=$text;
        $this->email->set_newline("\r\n");
        $this->email->from('info@wakuwakupon.chu.jp');
        $this->email->to($this->input->post('email'));
        $this->email->subject($subject);
        $this->email->message($message);
        $res = $this->email->send();
        if($res) {
            $update_data = array(
                'delivery_state'=>'完了',
                'track_number'=>$track_number,
                'manage_memo'=> date('ymd').':キャンセル決定',
            );
            $this->Delivery_model->update_purchase($purchase_id ,$update_data);
        } else {

        }
    }
}