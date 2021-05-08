<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('User_model');
        $this->load->model('Gacha_model');
        $this->load->library('encryption');
        $this->load->library('email');
        $this->load->helper('url');
    }

    public function index() {
		$data['latest'] = $this->Gacha_model->get_latest_gacha();

		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('user/registration.php');
		$this->load->view('template/footer.php',$data); // Footer File
    }
        /**
     * Registration Complete
     */
    public function complete() {

		$data['latest'] = $this->Gacha_model->get_latest_gacha();

		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php'); // Header File
        $this->load->view("user/complete.php");
		$this->load->view('template/footer.php',$data); // Footer File
    }
    /**
     * User Registration
     */
    public function info_regist()
    {
        $verification_key = md5(rand());

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
        if ($this->User_model->check_email_exist($email)) { 
              echo "exist";
            } else {
        
                $insert_data = array(
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
                    'created_at' => date('Y-m-d'),
                    'verification_key' => $verification_key,
                );

                /**
                 * Load User Model
                 */
                $result = $this->User_model->insert_user($insert_data);

                if ($result == TRUE) {
                    $subject = lang('login_email_check');
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
                    $data['verification_key'] = $verification_key;
                    $message = $this->load->view("email/register.php",$data,TRUE);
                    $this->email->set_newline("\r\n");
                    $this->email->from('info@wakuwakupon.chu.jp');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject($subject);
                    $this->email->message($message);
                    $res = $this->email->send();
                    if (!$res){
                        $this->User_model->user_delete($this->input->post('email'));
                    }

                } else {
                    $this->index();
                }
                echo "success";
            }
    }

    function verify_email($veri_key) {
        $verification_key = $veri_key;
        if ($this->User_model->verify_email($verification_key)) {
            $data['message'] = '<p align="center">メールアドレスが正常に確認され、ログインできるようになりました</p>';
        } else {
            $data['message'] = '<p align="center">無効なリンク</p>';
        }
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

        $currentURL = current_url();
        $this->session->set_userdata('cur_url',  $currentURL);
        redirect('User/Login');
    }
}