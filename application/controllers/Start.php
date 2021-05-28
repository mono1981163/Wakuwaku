<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('Admin_model');
    }

    public function index() {
        $this->load->view("manage/header.php");
        $this->load->view("start.php");
        $this->load->view("manage/footer.php");
    }
    public function login()
	{
        $id = $this->input->post('id', TRUE);
        $login_data = array(
            'id' => $id,
            'password' => md5($this->input->post('password', TRUE)),
        );
        $result = $this->Admin_model->check_login($login_data);

        if ($result == 2) {
            echo "success";
        } else {
            echo "error";
        }
    }
}