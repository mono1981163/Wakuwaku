<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('Admin_model');
    }

    public function index() {
        $this->load->view("manage/header.php");
        $this->load->view("admin/login.php");
        $this->load->view("manage/footer.php");
    }
    public function login()
	{
        $id = $this->input->post('id', TRUE);
        $login_data = array(
            'id' => $id,
            'password' => md5($this->input->post('password', TRUE)),
        );

        /**
         * Load User Model
         */
        $result = $this->Admin_model->check_login($login_data);

        if ($result == 2) {
            /**
             * Create Session
             * -----------------
             * First Load Session Library
             */
            $this->session->set_userdata('admin_id',$id);
            echo true;
        } else if ($result == 1) {
            echo false;
        } else {
            echo  false;
        }
    }
    
    /**
     * User Logout
     */
    public function logout() {

        /**
         * Remove Session Data
         */
        $remove_sessions = array('email', 'password');
        $this->session->unset_userdata($remove_sessions);

        redirect();
    }
}