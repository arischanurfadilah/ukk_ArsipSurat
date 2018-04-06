<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

	public function tambah_pegawai()
	{
		$data = array(
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'nip' => $this->input->post('nip'),
			'password' => md5($this->input->post('password')),
			'id_jabatan' => $this->input->post('jabatan')
		);

		$this->db->insert('pegawai', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_pegawai()
	{
		return $this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan')
						->get('pegawai')
						->result();

	}

	public function get_jabatan()
	{
		return $this->db->get('jabatan')
						->result();


	}

	public function hapus_pegawai()
	{
		$this->db->where('id_pegawai', $this->uri->segment(3))
				 ->delete('pegawai');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_pegawai()
	{
		$data = array(
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'nip' => $this->input->post('nip'),
			'password' => md5($this->input->post('password')),
			'id_jabatan' => $this->input->post('jabatan') );

		$this->db->where('id_pegawai', $this->uri->segment(3))
				 ->update('pegawai', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file pegawai_model.php */
/* Location: ./application/models/pegawai_model.php */