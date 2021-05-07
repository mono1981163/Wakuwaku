<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model("Delivery_model");
        $this->load->library("pagination"); 
    }
    public function index() {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $config = array();
		$config["base_url"] = base_url() . "delivery";
        $config["total_rows"] = $this->Delivery_model->get_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 2;
        // $config['full_tag_open'] = '<div class="operation-block page-nav">';
        // $config['full_tag_close'] = '</div>';
        $config["full_tag_open"] = '<div class="pagination">';
		$config["full_tag_close"] = '</div>';
		$config["first_link"] = '≪';
		$config["last_link"] = '≫';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['InboxMessage'] = $this->Delivery_model->getAllPurchase($config["per_page"], $page);
        $data['tabnumber'] = 1;
        $this->load->view('manage/header.php');
		$this->load->view('manage/delivery', $data);
        $this->load->view('manage/footer.php');
    }
    public function not_Send() {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $config = array();
		$config["base_url"] = base_url() . "delivery/not_Send";
        $config["total_rows"] = $this->Delivery_model->get_not_sent_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        // $config['full_tag_open'] = '<div class="operation-block page-nav">';
        // $config['full_tag_close'] = '</div>';
        $config["full_tag_open"] = '<div class="pagination">';
		$config["full_tag_close"] = '</div>';
		$config["first_link"] = '≪';
		$config["last_link"] = '≫';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['InboxMessage'] = $this->Delivery_model->getNotSendPurchase($config["per_page"], $page);
        $data['tabnumber'] = 2;
        $this->load->view('manage/header.php');
		$this->load->view('manage/delivery', $data);
        $this->load->view('manage/footer.php');
    }
    public function complete() {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $config = array();
		$config["base_url"] = base_url() . "delivery/complete";
        $config["total_rows"] = $this->Delivery_model->get_complete_count();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        // $config['full_tag_open'] = '<div class="operation-block page-nav">';
        // $config['full_tag_close'] = '</div>';
        $config["full_tag_open"] = '<div class="pagination">';
		$config["full_tag_close"] = '</div>';
		$config["first_link"] = '≪';
		$config["last_link"] = '≫';
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['tabnumber'] = 3;
        $data['InboxMessage'] = $this->Delivery_model->getCompletePurchase($config["per_page"], $page);
        $this->load->view('manage/header.php');
		$this->load->view('manage/delivery', $data);
        $this->load->view('manage/footer.php');
    }
}