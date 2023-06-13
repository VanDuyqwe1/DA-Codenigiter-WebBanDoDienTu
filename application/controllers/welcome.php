<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function threejs_demo()
	{	
		$this->load->view('threejs_view');
		
	}
	
}
