<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('Top_model');
        $this->load->model('Gacha_model');
		$this->load->helper('url');
    }

	public function index()
	{
		$currentURL = current_url();
		$this->session->set_userdata('cur_url',  $currentURL);
		$data['topimage'] = $this->Top_model->get_top_image();
		$data['latest'] = $this->Gacha_model->get_latest_gacha();
		$this->load->view('template/header.php', $data);
		$this->load->view('welcome_message');
		$this->load->view('template/footer.php',$data);
	}
	public function switchLang() {
		if($this->session->has_userdata('site_lang')) {
			if($this->session->userdata('site_lang') == "chinese") {
				$this->session->set_userdata('site_lang', 'japanese');
			} else {
				$this->session->set_userdata('site_lang', 'chinese');
			}
		} else {
			$this->session->set_userdata('site_lang', 'japanese');
		}
		if($this->session->has_userdata('cur_url')) {
			redirect($this->session->userdata('cur_url'));
		} else {
			redirect('Welcome');
		}
	}
}
