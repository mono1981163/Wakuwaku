<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Gacha_model');
    }
    public function index() {
        $data['latest'] = $this->Gacha_model->get_latest_gacha();

		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);

        $this->load->view('template/header.php');
        $this->load->view('terms.php');
        $this->load->view('template/footer.php', $data);
    }
}