<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function index()
	{	
		$this->load->view('template/header');
		$this->load->view('login/index');
		$this->load->view('template/footer');
	}
	public function login()
	{	
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required'=>'Bạn nên điền %s']);

		if ($this->form_validation->run() == TRUE)
        {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
			$reult = $this->LoginModel->CheckLogin($email, $password);
			if ($reult) {
				$session_array = [
					'id' => $reult[0]->id,
					'user_name' => $reult[0]->user_name,	
					'email' => $reult[0]->email,
				];
				$this->session->set_userdata('LoggedIn',$session_array);
				$this->session->set_flashdata('success', 'Đăng nhập thành công');
				redirect(base_url('/dashboard'));
			}
			else{
				$this->session->set_flashdata('fail', 'Đăng nhập thất bại');
				redirect(base_url('login'));
			}
       	}
    	else
        {
            $this->index();
        }
	}
	
}
