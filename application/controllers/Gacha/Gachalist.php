<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gachalist extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model("Gacha_model");
    }
    public function index() {
        $data['list'] = $this->Gacha_model->get_all_gacha();
        $data['latest'] = $this->Gacha_model->get_latest_gacha();
        $currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);
        $this->load->view('template/header.php');
        $this->load->view('gacha/list.php',$data);
        $this->load->view('template/footer.php',$data);
    }

}