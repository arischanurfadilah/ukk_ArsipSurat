<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function get_tanggal()
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$bln_awal = $this->input->post('bln_awal');
		$thn_akhir = $this->input->post('thn_akhir');
		$bln_akhir = $this->input->post('bln_akhir');
		$thn_akhir = $this->input->post('thn_akhir');

		return $this->db->query->('SELECT count(id_surat_masuk) as total from surat_masuk where date(tgl_kirim) >= '.$tgl_awal.' and date(tgl_kirim) <= '.$tgl_akhir.' and month(tgl_kirim) >= '.$bln_awal.' and month(tgl_kirim) <= '.$bln_akhir.' and year(tgl_kirim) >= '.$tgl_awal.' and year(tgl_kirim) >= '.$thn_akhir.'')
						->row();
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */