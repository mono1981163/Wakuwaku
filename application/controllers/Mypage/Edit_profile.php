<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_profile extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model("User_model");
        $this->load->model('Gacha_model');
        $this->load->library('encryption');

    }
    public function index() {
        if (!$this->session->has_userdata('email')) {
            $this->session->set_userdata('pre_url',current_url());
            redirect("User/Login");
        }
        $email = $this->session->userdata('email');
        $data = $this->User_model->get_user($email);

        $datainfo = $this->User_model->get_user($email);
        $data['surname1'] = $this->encryption->decrypt($datainfo['surname1']);
        $data['name1'] = $this->encryption->decrypt($datainfo['name1']);
        $data['surname2'] = $this->encryption->decrypt($datainfo['surname2']);
        $data['name2'] = $this->encryption->decrypt($datainfo['name2']);
        $data['country'] = $this->encryption->decrypt($datainfo['country']);
        $data['zip_code'] = $this->encryption->decrypt($datainfo['zip_code']);
        $data['prefecture'] = $this->encryption->decrypt($datainfo['prefecture']);
        $data['city'] = $this->encryption->decrypt($datainfo['city']);
        // $data['address'] = $this->encryption->decrypt($datainfo['address']);
        $data['roomno'] = $this->encryption->decrypt($datainfo['roomno']);
        $data['phone'] = $this->encryption->decrypt($datainfo['phone']);
        $data['email'] = $datainfo['email'];

        $data['latest'] = $this->Gacha_model->get_latest_gacha();

		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('mypage/edit.php',$data);
		$this->load->view('template/footer.php',$data); // Footer File
    }
    public function update_profile() {
        if (!$this->session->has_userdata('email')) {
            $this->session->set_userdata('pre_url',current_url());
            redirect("User/Login");
        }
        $surname1 = strval($this->input->post('surname1', TRUE));
        $name1 = strval($this->input->post('name1', TRUE));
        $surname2 = strval($this->input->post('surname2', TRUE));
        $name2 = strval($this->input->post('name2', TRUE));
        $country = strval($this->input->post('country', TRUE));
        $zip_code = strval($this->input->post('zip_code', TRUE));
        $prefecture = strval($this->input->post('prefecture', TRUE));
        $city = strval($this->input->post('city', TRUE));
        $roomno = strval($this->input->post('roomno', TRUE));
        $phone = strval($this->input->post('phone', TRUE));
        $email = strval($this->input->post('email', TRUE));
        $password = md5($this->input->post('password', TRUE));
        $update_data = array(
            'surname1' => $this->encryption->encrypt($surname1),
            'name1' => $this->encryption->encrypt($name1),
            'surname2' => $this->encryption->encrypt($surname2),
            'name2' => $this->encryption->encrypt($name2),
            'country' => $this->encryption->encrypt($country),
            'zip_code' => $this->encryption->encrypt($zip_code),
            'prefecture' => $this->encryption->encrypt($prefecture),
            'city' => $this->encryption->encrypt($city),
            'roomno' => $this->encryption->encrypt($roomno),
            'phone' => $this->encryption->encrypt($phone),
            'email' => $email,
            'password' => $password,
            'update_at' => date('Y-m-d'),
        );
        $result = $this->User_model->update_user($update_data);
        if ($result == TRUE) {
            echo "success";

        } else {
            echo "error";
        }
    } 
}