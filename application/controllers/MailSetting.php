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
        $this->load->view('manage/header.php');
        $this->load->view('manage/mailSetting.php');
        $this->load->view('manage/footer.php');
    }
}