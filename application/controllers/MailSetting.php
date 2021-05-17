<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MailSetting extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('Mail_model');
    }

    public function index() {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }

        // $data['sendmessage_japan'] = $this->Mail_model->get_sendmessage_japan();
        
        $this->load->view('manage/header.php');
        $this->load->view('manage/mailSetting.php');
        $this->load->view('manage/footer.php');
    }
    public function mailcheck() {

        $data['send_ja'] = $this->input->post('send_ja');
        $data['send_cn'] = $this->input->post('send_cn');
        $data['cancel_ja'] = $this->input->post('cancel_ja');
        $data['cancel_cn'] = $this->input->post('cancel_cn');

        $this->load->view('manage/header.php');
        $this->load->view('manage/mailcheck.php', $data);
        $this->load->view('manage/footer.php');
    }
}