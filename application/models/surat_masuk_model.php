<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk_model extends CI_Model {

	public function tambah_surat($file_surat)
	{
		$data = array(
			'nomor_surat' => $this->input->post('nomor_surat'),
			'tgl_kirim' => $this->input->post('tgl_kirim'),
			'tgl_terima' => $this->input->post('tgl_terima'),
			'pengirim' => $this->input->post('pengirim'),
			'perihal' => $this->input->post('perihal'),
			'status' => 0,
			'file_surat' => $file_surat['file_name'] );

		$this->db->insert('surat_masuk', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_surat()
	{
		return $this->db->get('surat_masuk')
						->result();


	}

	public function edit_surat()
	{
		$data = array(
			'nomor_surat' => $this->input->post('nomor_surat'),
			'tgl_kirim' => $this->input->post('tgl_kirim'),
			'tgl_terima' => $this->input->post('tgl_terima'),
			'pengirim' => $this->input->post('pengirim'),
			'perihal' => $this->input->post('perihal') );

		$this->db->where('id_surat_masuk', $this->uri->segment(3))
				 ->update('surat_masuk', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function edit_file($file_surat)
	{
		$path = './file_masuk/'.$this->input->post('nama_surat');
		unlink($path);

		$data = array('file_surat' => $file_surat['file_name'] );

		$this->db->where('id_surat_masuk', $this->uri->segment(3))
				 ->update('surat_masuk', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus_surat()
	{
		$path = './file_masuk/'.$this->input->post('nama_surat');
		unlink($path);

		$this->db->where('id_surat_masuk', $this->uri->segment(3))
				 ->delete('surat_masuk');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_disposisi($id_surat_masuk)
	{
		return $this->db->join('disposisi', 'disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
						->join('pegawai AS penerima', 'penerima.id_pegawai = disposisi.id_pegawai_penerima')
						->join('jabatan', 'penerima.id_jabatan = jabatan.id_jabatan')
						->where('disposisi.id_surat_masuk', $id_surat_masuk)
						->get('surat_masuk')
						->result();
	}

	public function get_surat_by_id($id_surat_masuk)
	{
		return $this->db->where('id_surat_masuk', $id_surat_masuk)
						->get('surat_masuk')
						->result();
	}

	public function tambah_disposisi()
	{
		$data = array(
			'id_surat_masuk' => $this->uri->segment(3),
			'id_pegawai_penerima' => $this->input->post('tujuan_pegawai'),
			'id_pegawai_pengirim' => $this->session->userdata('id_pegawai'),
			'keterangan' => $this->input->post('keterangan')
		);

		$this->db->insert('disposisi', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus_disposisi()
	{
		$this->db->where('id_disposisi', $this->uri->segment(3))
				 ->delete('disposisi');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_pegawai_by_jabatan($id_jabatan)
	{
		return $this->db->where('id_jabatan', $id_jabatan)
						->get('pegawai')
						->result();
	}

	public function get_jabatan()
	{
		return $this->db->get('jabatan')
						->result();
	}

	public function get_disposisi_masuk()
	{
		return $this->db->join('disposisi', 'disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
						->join('pegawai AS pengirim', 'pengirim.id_pegawai = disposisi.id_pegawai_pengirim')
						->join('jabatan', 'pengirim.id_jabatan = jabatan.id_jabatan')
						->where('disposisi.id_pegawai_penerima', $this->session->userdata('id_jabatan'))
						// ->where('disposisi.id_surat_masuk', $id_surat_masuk)
						->get('surat_masuk')
						->result();
	}

	public function get_disposisi_keluar($id_surat_masuk)
	{
		return $this->db->join('disposisi', 'disposisi.id_surat_masuk = surat_masuk.id_surat_masuk')
						->join('pegawai', 'pegawai.id_pegawai = disposisi.id_pegawai_penerima')
						->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan')
						->where('disposisi.id_pegawai_pengirim', $this->session->userdata('id_jabatan'))
						->where('disposisi.id_surat_masuk', $id_surat_masuk)
						->get('surat_masuk')
						->result();
	}

	public function update_status()
	{
		$data = array('status' => 1 );

		$this->db->where('id_surat_masuk', $this->uri->segment(3))
				 ->update('surat_masuk', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_surat_selesai()
	{
		return $this->db->where('status', 1)
						->get('surat_masuk')
						->result();
	}

	public function get_surat_proses()
	{
		return $this->db->where('status', 0)
						->get('surat_masuk')
						->result();
	}

	public function count_masuk_januari()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 1')
						->row();
	}

	public function count_masuk_februari()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 2')
						->row();
	}

	public function count_masuk_maret()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 3')
						->row();
	}

	public function count_masuk_april()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 4')
						->row();
	}

	public function count_masuk_mei()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 5')
						->row();
	}

	public function count_masuk_juni()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 6')
						->row();
	}

	public function count_masuk_juli()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 7')
						->row();
	}

	public function count_masuk_september()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 8')
						->row();
	}

	public function count_masuk_agustus()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 9')
						->row();
	}

	public function count_masuk_oktober()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 10')
						->row();
	}

	public function count_masuk_november()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 11')
						->row();
	}

	public function count_masuk_desember()
	{
		return $this->db->query('SELECT count(id_surat_masuk) as total from surat_masuk where month(tgl_terima) = 12')
						->row();
	}

}

/* End of file surat_masuk_model.php */
/* Location: ./application/models/surat_masuk_model.php */