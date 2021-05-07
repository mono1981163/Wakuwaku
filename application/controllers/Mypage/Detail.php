<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model("User_model");
        $this->load->model('Gacha_model');
        $this->load->model('Purchase_model');
        $this->load->model('Item_model');
        $this->load->library('encryption');
    }
    public function index() {
        if (!$this->session->userdata('email')) redirect("User/Login");
        $email = $this->session->userdata('email');
        $userinfo = $this->User_model->get_user($email);
        $data['surname1'] = $this->encryption->decrypt($userinfo['surname1']);
        $data['name1'] = $this->encryption->decrypt($userinfo['name1']);
        $data['surname2'] = $this->encryption->decrypt($userinfo['surname2']);
        $data['name2'] = $this->encryption->decrypt($userinfo['name2']);
        $data['country'] = $this->encryption->decrypt($userinfo['country']);
        $data['zip_code'] = $this->encryption->decrypt($userinfo['zip_code']);
        $data['prefecture'] = $this->encryption->decrypt($userinfo['prefecture']);
        $data['city'] = $this->encryption->decrypt($userinfo['city']);
        $data['roomno'] = $this->encryption->decrypt($userinfo['roomno']);
        $data['phone'] = $this->encryption->decrypt($userinfo['phone']);
        $data['email'] = $userinfo['email'];
        $data['password'] = $this->encryption->decrypt($userinfo['password']);


        $data['list'] = $this->Purchase_model->get_purchase_of_user($userinfo['user_id']);
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('mypage/detail.php',$data);
		$this->load->view('template/footer.php',$data); // Footer File
    }
    public function order_history() {
        if (!$this->session->userdata('email')) redirect("User/Login");
        $email = $this->session->userdata('email');
        $userinfo = $this->User_model->get_user($email);
        $data['list'] = $this->Purchase_model->get_purchase_of_user($userinfo['user_id']);
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

        $currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('mypage/order_history.php',$data);
		$this->load->view('template/footer.php',$data); // Footer File
    }


    public function prize_history($gacha_id) {
        if (!$this->session->userdata('email')) redirect("User/Login");
        $email = $this->session->userdata('email');
        $user_id = $this->User_model->get_user_id_from_email($email);
        // $data['list'] = $this->Purchase_model->get_prize_of_user($gacha_id, $user_id);
        $ItemData['items'] = $this->Item_model->get_gained_item($user_id, $gacha_id);
        if($this->session->userdata('site_lang') == 'japanese') {
            $gachaData = $this->Gacha_model->get_single_gacha($gacha_id);
        } else {
            $gachaData = $this->Gacha_model->get_single_gacha_cn($gacha_id);
        }
        $purchaseData = $this->Purchase_model->get_purchase_data_from_gachaID_userID($user_id, $gacha_id);
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

        $ItemData['gachaData'] = $gachaData;
        $ItemData['purchaseData'] = $purchaseData;
		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('mypage/prize_history.php',$ItemData);
		$this->load->view('template/footer.php',$data); // Footer File
    }
}