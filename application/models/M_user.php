<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	function semua()
	{
		return $this->db->get('user');
	}

	function cek_id($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('user');
	}

	function cek_warkop($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('warkop');
	}

	function tambah_proses($fotoup)
	{
		$data = array(
			'nama_user'	=> $this->input->post('nama_user'),
			'jk'		=> $this->input->post('jk'),
			'alamat'	=> $this->input->post('alamat'),
			'email'		=> $this->input->post('email'),
			'no_telp'	=> $this->input->post('no_telp'),
			'username'	=> $this->input->post('email'),
			'password'	=> md5($this->input->post('no_telp')),
			'foto'		=> $fotoup 
		);

		$this->db->insert('user', $data);
	}

	public function tambah_warkop_proses($foto)
	{
		$data = array(
				'nama_warkop' 	=> $this->input->post('nama_warkop'),
				'id_user' 	=> $this->session->userdata('id_user'),
				'alamat' 		=> $this->input->post('alamat'),
				'sekilas' 		=> $this->input->post('sekilas'),
				'lat' 			=> $this->input->post('lat'),
				'lng' 			=> $this->input->post('long'),
				'foto' 			=> $foto
			);
		$this->db->insert('warkop', $data);
	}

	function edit_proses($id, $foto)
	{
		$data = array(
			'nama_user'	=> $this->input->post('nama_user'),
			'jk'		=> $this->input->post('jk'),
			'alamat'	=> $this->input->post('alamat'),
			'email'		=> $this->input->post('email'),
			'no_telp'	=> $this->input->post('no_telp'),
			'foto'		=> $foto
		);
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */