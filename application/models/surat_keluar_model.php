<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar_model extends CI_Model {

	public function get_surat()
	{
		return $this->db->get('surat_keluar')
						->result();

	}

	public function tambah_surat($file_surat)
	{
		$data = array(
			'nomor_surat' => $this->input->post('nomor_surat'),
			'tgl_kirim' => $this->input->post('tgl_kirim'),
			'penerima' => $this->input->post('penerima'),
			'perihal' => $this->input->post('perihal'),
			'file_surat' => $file_surat['file_name'] );

		$this->db->insert('surat_keluar', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_surat()
	{
		$data = array(
			'nomor_surat' => $this->input->post('nomor_surat'),
			'tgl_kirim' => $this->input->post('tgl_kirim'),
			'penerima' => $this->input->post('penerima'),
			'perihal' => $this->input->post('perihal') );

		$this->db->where('id_surat_keluar', $this->uri->segment(3))
				 ->update('surat_keluar', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_file($file_surat)
	{
		$path = './file_keluar/'.$this->input->post('nama_surat');
		unlink($path);

		$data = array('file_surat' => $file_surat['file_name'] );

		$this->db->where('id_surat_keluar', $this->uri->segment(3))
				 ->update('surat_keluar', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus_surat()
	{
		$path = './file_keluar/'.$this->input->post('nama_surat');
		unlink($path);

		$this->db->where('id_surat_keluar', $this->uri->segment(3))
				 ->delete('surat_keluar');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function update_status()
	{
		$data = array('status' => 1 );

		$this->db->where('id_surat_keluar', $this->uri->segment(3))
				 ->update('surat_keluar', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_surat_selesai()
	{
		return $this->db->where('status', 1)
						->get('surat_keluar')
						->result();
	}

	public function get_surat_proses()
	{
		return $this->db->where('status', 0)
						->get('surat_keluar')
						->result();
	}

	public function count_keluar_januari()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 1')
						->row();
	}

	public function count_keluar_februari()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 2')
						->row();
	}

	public function count_keluar_maret()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 3')
						->row();
	}

	public function count_keluar_april()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 4')
						->row();
	}

	public function count_keluar_mei()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 5')
						->row();
	}

	public function count_keluar_juni()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 6')
						->row();
	}

	public function count_keluar_juli()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 7')
						->row();
	}

	public function count_keluar_september()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 8')
						->row();
	}

	public function count_keluar_agustus()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 9')
						->row();
	}

	public function count_keluar_oktober()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 10')
						->row();
	}

	public function count_keluar_november()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 11')
						->row();
	}

	public function count_keluar_desember()
	{
		return $this->db->query('SELECT count(id_surat_keluar) as total from surat_keluar where month(tgl_kirim) = 12')
						->row();
	}

}

/* End of file surat_keluar_model.php */
/* Location: ./application/models/surat_keluar_model.php */