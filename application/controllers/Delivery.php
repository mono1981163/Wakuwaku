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
        $this->load->view('manage/header.php');
		$this->load->view('manage/delivery');
        $this->load->view('manage/footer.php');
    }
    public function selectOption() {
        if (!$this->session->has_userdata('admin_id')) {
            redirect("User/Admin");
        }
        $config = array();
        $config["base_url"] = base_url() . "delivery/selectOption";
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["full_tag_open"] = '<div class="pagination">';
		$config["full_tag_close"] = '</div>';
		$config["first_link"] = '≪';
		$config["last_link"] = '≫';
        $tab = $this->input->post('selectTabs');
        $option = $this->input->post('selectOptions');
        if($tab == "All_purchase") {
            $config["total_rows"] = $this->Delivery_model->get_count($option);
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['InboxMessage'] = $this->Delivery_model->getAllPurchase($config["per_page"], $page, $option);
            $data['tabnumber'] = 1;
        }
        else if($tab == "Not_send") {
            $config["total_rows"] = $this->Delivery_model->get_not_sent_count($option);
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['InboxMessage'] = $this->Delivery_model->getNotSendPurchase($config["per_page"], $page, $option);
            $data['tabnumber'] = 2;
            
        }
        else if ($tab == "Done") {
            $config["total_rows"] = $this->Delivery_model->get_complete_count($option);
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["InboxMessage"] = $this->Delivery_model->getCompletePurchase($config["per_page"], $page, $option);
            $data['tabnumber'] = 3;
        }
        $data["links"] = $this->pagination->create_links();
        echo json_encode($data);
    }
}