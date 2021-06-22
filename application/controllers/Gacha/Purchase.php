<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model("Gacha_model");
        $this->load->model("Purchase_model");
        $this->load->model("User_model");
        $this->load->library('encryption');
    }
    public function gacha_detail($gacha_id) {
        $data['remainder_ticket'] = null;
        if ($this->session->has_userdata('email')) {
            $user_id = $this->User_model->get_user_id_from_email($this->session->userdata('email'));
            $data['remainder_ticket'] = $this->Purchase_model->get_remainder_ticket_sum($user_id, $gacha_id);
        }
        $data['result']= $this->Gacha_model->get_single_gacha_with_prizes($gacha_id);
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view("template/header.php");
        $this->load->view("gacha/gachaDetail.php", $data);
		$this->load->view('template/footer.php',$data); // Footer File
    }
    public function gacha_purchase() {
        if (!$this->session->has_userdata('email')) {
            $this->session->set_userdata('pre_url',current_url());
            redirect("User/Login");
        }
        if (!isset($_GET['gacha_id'])) {
            redirect("Gacha/Gachalist");
        }
        $gacha_id = $_GET['gacha_id'];
        $purchase_times = $_GET['purchase_times'];
        $amount = $_GET['amount'];
        $data = $this->Gacha_model->get_single_gacha_with_prizes($gacha_id);
        $data[0]['purchase_times'] = $purchase_times;
        $data[0]['amount'] = $amount;
        $data['latest'] = $this->Gacha_model->get_latest_gacha();
        $this->session->set_userdata('gacha_id', $gacha_id);
        $this->session->set_userdata('purchase_times', $purchase_times);
		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view("template/header.php");
        $this->load->view("gacha/purchase.php", $data[0]);
		$this->load->view('template/footer.php',$data); 
    }
    public function pay_confirm() {
        if (!$this->session->has_userdata('email')) {
            $this->session->set_userdata('pre_url',current_url());
            redirect("User/Login");
        }
        if (!isset($_POST['gacha_id'])) {
            redirect("Gacha/Gachalist");
        }
        $gacha_id = $_POST['gacha_id'];
        $data = $this->Gacha_model->get_single_gacha_with_prizes($gacha_id);
        $email = $this->session->userdata('email');
        $userinfo = $this->User_model->get_user($email);
        $data[0]['surname1'] = $this->encryption->decrypt($userinfo['surname1']);
        $data[0]['name1'] = $this->encryption->decrypt($userinfo['name1']);
        $data[0]['country'] = $this->encryption->decrypt($userinfo['country']);
        $data[0]['zip_code'] = $this->encryption->decrypt($userinfo['zip_code']);
        $data[0]['prefecture'] = $this->encryption->decrypt($userinfo['prefecture']);
        $data[0]['city'] = $this->encryption->decrypt($userinfo['city']);
        $data[0]['roomno'] = $this->encryption->decrypt($userinfo['roomno']);
        $data[0]['phone'] = $this->encryption->decrypt($userinfo['phone']);
        $cardnumber = $_POST['cardnumber'];
        $card_token = $_POST['card_token'];
        $purchase_times = $_POST['purchase_times'];
        $amount = $_POST['amount'];

        $data[0]['card_token'] = $card_token;
        $data[0]['purchase_times'] = $purchase_times;
        $data[0]['amount'] = $amount;
        $data[0]['cardnumber'] = $cardnumber;
        $footer_data['latest'] = $this->Gacha_model->get_latest_gacha();

		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view("template/header.php");
        $this->load->view("gacha/payConfirm.php",$data[0]);
		$this->load->view('template/footer.php',$footer_data);
    }
    public function complete() {
        if (!$this->session->has_userdata('email')) {
            $this->session->set_userdata('pre_url',current_url());
            redirect("User/Login");
        }
        if (!$this->session->has_userdata('purchase_id')) {
            redirect("Gacha/Gachalist");
        }
        $purchase_id = $this->session->userdata('purchase_id');
        $data['gacha_id'] = $this->Purchase_model->get_gacha_id($purchase_id);
        $gacha_detail = $this->Gacha_model->get_single_gacha($data['gacha_id']);
        $data['gacha_name'] = $gacha_detail[0]['name'];
        $data['price'] = $gacha_detail[0]['price'];
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view("template/header.php");
        $this->load->view("gacha/complete.php",$data);
		$this->load->view('template/footer.php',$data);
    }
}