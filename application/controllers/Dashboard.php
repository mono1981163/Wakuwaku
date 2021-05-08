<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('Gacha_model');
        $this->load->model('Purchase_model');
    }

    public function index() {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $data['list'] = $this->Purchase_model->get_purchase_of_gacha();
        
        $data['sale_year'] = $this->Purchase_model->get_all_purchase_year();
        $data['sale_month'] = $this->Purchase_model->get_all_purchase_month(); 
        $data['sale_week'] = $this->Purchase_model->get_all_purchase_week(); 
        
        $this->load->view('manage/header.php');
        $this->load->view('manage/dashboard.php',$data);
        $this->load->view('manage/footer.php');
    }
}