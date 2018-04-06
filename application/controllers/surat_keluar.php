<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_keluar_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			$data['main_view'] = 'surat_keluar_view';
			$data['title'] = "Data Surat Keluar";
			$data['surat_keluar'] = $this->surat_keluar_model->get_surat();
 			$this->load->view('template_view', $data);
		} else {
			redirect('login');
		}
	}

	public function tambah_surat()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			if ($this->input->post('submit')) {
				$config['upload_path'] = './file_keluar/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']  = '2000';
				
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('file_surat')){
					if ($this->surat_keluar_model->tambah_surat($this->upload->data()) == TRUE) {
						$this->session->set_flashdata('notif', 'Tambah Surat Berhasil');
						redirect('surat_keluar');
					} else {
						$this->session->set_flashdata('notif', 'Tambah Surat Gagal');
						redirect('surat_keluar');
					}
				}
				else{
					$this->session->set_flashdata('notif', $this->upload->display_errors());
					redirect('surat_keluar');
				}
			}
		} else {
			redirect('login');
		}
	}

	public function edit_surat()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			if ($this->input->post('submit')) {
				if ($this->surat_keluar_model->edit_surat() == TRUE) {
					$this->session->set_flashdata('notif', 'Edit Surat Berhasil');
					redirect('surat_keluar');
				} else {
					$this->session->set_flashdata('notif', 'Edit Surat Gagal');
					redirect('surat_keluar');
				}
			}
		} else {
			redirect('login');
		}
	}

	public function edit_file()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			if ($this->input->post('submit')) {
				$config['upload_path'] = './file_keluar/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']  = '2000';
				
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('file_surat')){
					if ($this->surat_keluar_model->edit_file($this->upload->data()) == TRUE) {
						$this->session->set_flashdata('notif', 'Edit File Berhasil');
						redirect('surat_keluar');
					} else {
						$this->session->set_flashdata('notif', 'Edit File Gagal');
						redirect('surat_keluar');
					}
				}
				else{
					$this->session->set_flashdata('notif', $this->upload->display_errors());
					redirect('surat_keluar');
				}
			}
		} else {
			redirect('login');
		}
	}

	public function hapus_surat()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			if ($this->input->post('submit')) {
				if ($this->surat_keluar_model->hapus_surat() == TRUE) {
					$this->session->set_flashdata('notif', 'Hapus Surat Berhasil');
					redirect('surat_keluar');
				} else {
					$this->session->set_flashdata('notif', 'Hapus Surat Gagal');
					redirect('surat_keluar');
				}
			}
		} else {
			redirect('login');
		}
	}

	public function update_status()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			if ($this->input->post('submit')) {
				if ($this->surat_keluar_model->update_status() == TRUE) {
					$this->session->set_flashdata('notif', 'Selesai');
					redirect('surat_keluar');
				} else {
					$this->session->set_flashdata('notif', 'Proses');
					redirect('surat_keluar');
				}
			}
		} else {
			redirect('login');
		}
	}

	public function surat_selesai()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			$data['main_view'] = 'surat_keluar_view';
			$data['title'] = "Data Surat Keluar Yang Selesai Diproses";
			$data['surat_keluar'] = $this->surat_keluar_model->get_surat_selesai();
	 		$this->load->view('template_view', $data);
		} else {
			redirect('login');
		}
	}

	public function surat_proses()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			$data['main_view'] = 'surat_keluar_view';
			$data['title'] = "Data Surat Keluar Dalam Proses";
			$data['surat_keluar'] = $this->surat_keluar_model->get_surat_proses();
	 		$this->load->view('template_view', $data);
		} else {
			redirect('login');
		}
	}

}

/* End of file surat_keluar.php */
/* Location: ./application/controllers/surat_keluar.php */