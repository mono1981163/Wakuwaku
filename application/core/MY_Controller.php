<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	function __construct() {
        parent:: __construct();
		$this->load->library(array('session'));
		// $this->load->model('mailserver');	
	}
	// $this->load->library(array('session'));
	// $this->load->model('mailserver');

	public function index() {
		
	}

}