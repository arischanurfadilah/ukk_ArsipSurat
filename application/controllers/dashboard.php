<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0 ){
			$data['main_view'] = 'dashboard_custom_view';
			$data['title'] = "Dashboard";
			$data['dasboard'] = $this->dashboard_model->get_tanggal();
	 		$this->load->view('template_view', $data);
		} else {
			redirect('login');
		}
	}
}