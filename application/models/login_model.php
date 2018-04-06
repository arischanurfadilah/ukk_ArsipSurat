<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek_user()
	{
		$query = $this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan')
						  ->where('nip', $this->input->post('nip'))
						  ->where('password', md5($this->input->post('password')))
						  ->get('pegawai');

		if ($query->num_rows() == 1) {
			$data = $query->row();
			$session = array(
				'logged_in' => TRUE,
				'nip' => $data->nip,
				'id_pegawai' => $data->id_pegawai,
				'nama_pegawai' => $data->nama_pegawai,
				'id_jabatan' => $data->id_jabatan,
				'level' => $data->level );

			$this->session->set_userdata($session);

			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */