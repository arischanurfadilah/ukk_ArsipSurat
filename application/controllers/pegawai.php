<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			$data['main_view'] = 'pegawai_view';
			$data['title'] = "Data Pegawai";
			$data['pegawai'] = $this->pegawai_model->get_pegawai();
			$data['jabatan'] = $this->pegawai_model->get_jabatan();
			$this->load->view('template_view', $data);
		} else {
			redirect('login');
		}
	}

	public function tambah_pegawai()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			if ($this->input->post('submit')) {
				if ($this->pegawai_model->tambah_pegawai() == TRUE) {
					$this->session->set_flashdata('notif', 'Tambah Pegawai Berhasil');
					redirect('pegawai');
				} else {
					$this->session->set_flashdata('notif', 'Tambah Pegawai Gagal');
					redirect('pegawai');
				}
			}
		} else {
			redirect('login');
		}
	}

	public function hapus_pegawai()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			if ($this->input->post('submit')) {
				if ($this->pegawai_model->hapus_pegawai() == TRUE) {
					$this->session->set_flashdata('notif', 'Hapus Pegawai Berhasil');
					redirect('pegawai');
				} else {
					$this->session->set_flashdata('notif', 'Hapus Pegawai Gagal');
					redirect('pegawai');
				}
			}
		} else {
			redirect('login');
		}
	}

	public function edit_pegawai()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			if ($this->input->post('submit')) {
				if ($this->pegawai_model->edit_pegawai() == TRUE) {
					$this->session->set_flashdata('notif', 'Edit Pegawai Berhasil');
					redirect('pegawai');
				} else {
					$this->session->set_flashdata('notif', 'Edit Pegawai Gagal');
					redirect('pegawai');
				}
			}
		} else {
			redirect('login');
		}
	}

}

/* End of file pegawai.php */
/* Location: ./application/controllers/pegawai.php */