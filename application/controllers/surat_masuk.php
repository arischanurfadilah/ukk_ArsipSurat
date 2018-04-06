<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_masuk_model');
		$this->load->model('surat_keluar_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if($this->session->userdata('level') == 0){
				// $data['main_view'] = 'dashboard_view';
				// $data['januari'] = $this->surat_masuk_model->count_masuk_januari();
				// $data['februari'] = $this->surat_masuk_model->count_masuk_februari();
				// $data['maret'] = $this->surat_masuk_model->count_masuk_maret();

				$data = array(
					'main_view' => 'dashboard_view',
					'title' => "HOME | Aplikasi Pengarsipan Surat",
					'januari' => $this->surat_masuk_model->count_masuk_januari(),
					'februari' => $this->surat_masuk_model->count_masuk_februari(),
					'maret' => $this->surat_masuk_model->count_masuk_maret(),
					'april' => $this->surat_masuk_model->count_masuk_april(),
					'mei' => $this->surat_masuk_model->count_masuk_mei(),
					'juni' => $this->surat_masuk_model->count_masuk_juni(),
					'juli' => $this->surat_masuk_model->count_masuk_juli(),
					'agustus' => $this->surat_masuk_model->count_masuk_agustus(),
					'september' => $this->surat_masuk_model->count_masuk_september(),
					'oktober' => $this->surat_masuk_model->count_masuk_oktober(),
					'november' => $this->surat_masuk_model->count_masuk_november(),
					'desember' => $this->surat_masuk_model->count_masuk_desember(),
					'jan' => $this->surat_keluar_model->count_keluar_januari(),
					'feb' => $this->surat_keluar_model->count_keluar_februari(),
					'mar' => $this->surat_keluar_model->count_keluar_maret(),
					'apr' => $this->surat_keluar_model->count_keluar_april(),
					'mei' => $this->surat_keluar_model->count_keluar_mei(),
					'jun' => $this->surat_keluar_model->count_keluar_juni(),
					'jul' => $this->surat_keluar_model->count_keluar_juli(),
					'agu' => $this->surat_keluar_model->count_keluar_agustus(),
					'sep' => $this->surat_keluar_model->count_keluar_september(),
					'okt' => $this->surat_keluar_model->count_keluar_oktober(),
					'nov' => $this->surat_keluar_model->count_keluar_november(),
					'des' => $this->surat_keluar_model->count_keluar_desember() );
				$this->load->view('template_view', $data);

			} else {
				$data['main_view'] = 'disposisi_masuk_view';
				$data['title'] = 'Data Disposisi Masuk '.$this->session->userdata('nama_pegawai');
				$data['disposisi'] = $this->surat_masuk_model->get_disposisi_masuk();
		 		$this->load->view('template_view', $data);
			}
		} else {
			redirect('login');
		}

	}

	public function data_surat_masuk()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0 ){
			$data['main_view'] = 'surat_masuk_view';
			$data['title'] = "Data Surat Masuk";
			$data['surat_masuk'] = $this->surat_masuk_model->get_surat();
	 		$this->load->view('template_view', $data);
		} else {
			redirect('login');
		}
	}

	public function tambah_surat()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			if ($this->input->post('submit')) {
				$config['upload_path'] = './file_masuk/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']  = '2000';
				
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('file_surat')){
					if ($this->surat_masuk_model->tambah_surat($this->upload->data()) == TRUE) {
						$this->session->set_flashdata('notif', 'Tambah Surat Berhasil');
						redirect('surat_masuk/data_surat_masuk');
					} else {
						$this->session->set_flashdata('notif', 'Tambah Surat Gagal');
						redirect('surat_masuk/data_surat_masuk');
					}
				}
				else{
					$this->session->set_flashdata('notif', $this->upload->display_errors());
					redirect('surat_masuk/data_surat_masuk');
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
				if ($this->surat_masuk_model->edit_surat() == TRUE) {
					$this->session->set_flashdata('notif', 'Edit Surat Berhasil');
					redirect('surat_masuk/data_surat_masuk');
				} else {
					$this->session->set_flashdata('notif', 'Edit Surat Gagal');
					redirect('surat_masuk/data_surat_masuk');
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
				$config['upload_path'] = './file_masuk/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']  = '2000';
				
				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('file_surat')){
					if ($this->surat_masuk_model->edit_file($this->upload->data()) == TRUE) {
						$this->session->set_flashdata('notif', 'Edit File Berhasil');
						redirect('surat_masuk/data_surat_masuk');
					} else {
						$this->session->set_flashdata('notif', 'Edit File Gagal');
						redirect('surat_masuk/data_surat_masuk');
					}
				}
				else{
					$this->session->set_flashdata('notif', $this->upload->display_errors());
					redirect('surat_masuk/data_surat_masuk');
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
				if ($this->surat_masuk_model->hapus_surat() == TRUE) {
					$this->session->set_flashdata('notif', 'Hapus Surat Berhasil');
					redirect('surat_masuk/data_surat_masuk');
				} else {
					$this->session->set_flashdata('notif', 'Hapus Surat Gagal');
					redirect('surat_masuk/data_surat_masuk');
				}
			}
		} else {
			redirect('login');
		}
	}

	public function disposisi()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') == 0) {
				$data['main_view'] = 'disposisi_keluar_view';
				$data['title'] = "Data Disposisi Keluar";
				$data['disposisi'] = $this->surat_masuk_model->get_disposisi($this->uri->segment(3));
				// $data['surat_masuk'] = $this->surat_masuk_model->get_surat_by_id($this->uri->segment(3));
				$data['jabatan'] = $this->surat_masuk_model->get_jabatan();
	 			$this->load->view('template_view', $data);
			} else {
				$data['main_view'] = 'disposisi_keluar_view';
				$data['title'] = "Data Disposisi Keluar";
				$data['disposisi'] = $this->surat_masuk_model->get_disposisi_keluar($this->uri->segment(3));
				$data['jabatan'] = $this->surat_masuk_model->get_jabatan();
	 			$this->load->view('template_view', $data);
			}
			
		} else {
			redirect('login');
		}
	}

	public function hapus_disposisi($id_disposisi, $id_surat_masuk)
	{
		
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				if ($this->surat_masuk_model->hapus_disposisi() == TRUE) {
					$this->session->set_flashdata('notif', 'Hapus Disposisi Berhasil');
					redirect('surat_masuk/disposisi/'.$id_surat_masuk);
				} else {
					$this->session->set_flashdata('notif', 'Hapus Disposisi Gagal');
					redirect('surat_masuk/disposisi/'.$id_surat_masuk);
				}
			}
		} else {
			redirect('login');
		}
	}

	public function tambah_disposisi()
	{
		// $id_surat = $this->uri->segment(3);
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				if ($this->surat_masuk_model->tambah_disposisi() == TRUE) {
					$this->session->set_flashdata('notif', 'Tambah Disposisi Berhasil');
					redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
				} else {
					$this->session->set_flashdata('notif', 'Tambah Disposisi Gagal');
					redirect('surat_masuk/disposisi/'.$this->uri->segment(3));
				}
			}
		} else {
			redirect('login');
		}
	}

	public function get_pegawai_by_jabatan($id_jabatan)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data = $this->surat_masuk_model->get_pegawai_by_jabatan($id_jabatan);
			echo json_encode($data);
		}
	}

	public function update_status()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			if ($this->input->post('submit')) {
				if ($this->surat_masuk_model->update_status() == TRUE) {
					$this->session->set_flashdata('notif', 'Selesai');
					redirect('surat_masuk/data_surat_masuk');
				} else {
					$this->session->set_flashdata('notif', 'Proses');
					redirect('surat_masuk/data_surat_masuk');
				}
			}
		} else {
			redirect('login');
		}
	}

	public function surat_selesai()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			$data['main_view'] = 'surat_masuk_view';
			$data['title'] = "Data Surat Masuk Yang Selesai Diproses";
			$data['surat_masuk'] = $this->surat_masuk_model->get_surat_selesai();
	 		$this->load->view('template_view', $data);
		} else {
			redirect('login');
		}
	}

	public function surat_proses()
	{
		if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == 0) {
			$data['main_view'] = 'surat_masuk_view';
			$data['title'] = "Data Surat Masuk Dalam Proses";
			$data['surat_masuk'] = $this->surat_masuk_model->get_surat_proses();
	 		$this->load->view('template_view', $data);
		} else {
			redirect('login');
		}
	}

}

/* End of file surat_masuk.php */
/* Location: ./application/controllers/surat_masuk.php */