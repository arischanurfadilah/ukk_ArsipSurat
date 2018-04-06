<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function cek_user()
	{
		if ($this->input->post('submit')) {
			if ($this->login_model->cek_user() == TRUE) {
				// $this->session->set_flashdata('notif', 'Login berhasil');
				redirect('surat_masuk');
			} else {
				$this->session->set_flashdata('notif', 'NIP atau password salah');
				redirect('login');
			}
		}
	}

	public function logout()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			session_destroy();
			redirect('login');
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */