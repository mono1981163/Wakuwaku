<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('User_model');
        $this->load->model('Gacha_model');
        $this->load->library('encryption');
        $this->load->library('email');
    }

    public function index() {
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('user/login.php');
        $this->load->view('template/footer.php', $data);
    }

    /**
     * User Login
     */
	public function sign_in()
	{
        $login_data = array(
            'email' => $this->input->post('email', TRUE),
            'password' => md5($this->input->post('password', TRUE)),
        );
        $result = $this->User_model->check_login($login_data);

        if ($result == "success") {
            $session_array = $login_data;
            $this->session->set_userdata($session_array);
            echo $result;
        } else {
            echo $result;
        }
    }
    function forget_password() {
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

        $currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('user/forget.php');
        $this->load->view('template/footer.php', $data);
    }
    public function email_check() {
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

        $currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('user/emailCheck.php');
        $this->load->view('template/footer.php', $data);
    }
    public function change_password() {
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

        $currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('user/changePwd.php');
        $this->load->view('template/footer.php', $data);
    }    
    public function reset_password_success() {
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

        $currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('user/resetPwdSuccess.php');
        $this->load->view('template/footer.php', $data);
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
    public function password_request() {
        $email = $this->input->post('email');
        if ($this->User_model->check_email_exist($email)) { 
            $result = $this->User_model->get_user($email);
            $randomString = $this->generateRandomString();
            $password = md5($randomString);
            $this->User_model->update_password($email, $password);
            $subject = "パスワードを確認してください。";
            $message = "
            <p>よく提起される問題です。</p>
            <p>安心してください。</p>
            <p>あなたのパスワードは".$randomString."です。</p>
            <p>パスワードをリセットしてください。</p>
            <p>パスワードを変更するには、以下のリンクをクリックしてください。</p>
            <a href='".base_url('User/Login/change_password')."'>パスワード変更</a>";
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
            $this->email->set_newline("\r\n");
            $this->email->from('info@wakuwakupon.chu.jp');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);
            $this->session->set_userdata('email',$email);
            if($this->email->send()){
                $this->session->set_userdata('email',$email);
                echo "success";
            } else {
                echo "error";
            }
        } else {
            echo "no_exist";
        }
    }
    public function password_reset() {
        $old = $this->input->post('old_password',TRUE);
        $new = $this->input->post('new_password',TRUE); 
        $email = $this->session->userdata('email');
        $user_data = array(
            'email' => $email,
            'password' => md5($old),
        );
        $result = $this->User_model->check_login($user_data);
        if ($result == "success") {
            $user_data = array(
                'password' => md5($new),
            );
            $this->User_model->update_user($user_data);
            echo "success";
        } else {
            echo "error_old";
        }
    }
    /**
     * User Logout
     */
    public function sign_out() {

        /**
         * Remove Session Data
         */
        // $this->session->sess_destroy();
        $remove_sessions = array('email', 'password');
        $this->session->unset_userdata($remove_sessions);

        redirect();
    }
}