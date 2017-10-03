<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_warkop extends CI_Model {

	public function semua(){
		return $this->db->get('warkop');
	}

	public function tambah_proses($foto)
	{
		$data = array(
				'nama_warkop' 	=> $this->input->post('nama_warkop'),
				'alamat' 		=> $this->input->post('alamat'),
				'sekilas' 		=> $this->input->post('sekilas'),
				'lat' 			=> $this->input->post('lat'),
				'lng' 			=> $this->input->post('long'),
				'foto' 			=> $foto
			);
		$this->db->insert('warkop', $data);
	}

	public function cek_id($id)
	{
		$this->db->where('id_warkop', $id);
		return $this->db->get('warkop');
	}

	public function edit_proses($id_warkop, $foto)
	{
		$data = array(
				'nama_warkop' 	=> $this->input->post('nama_warkop'),
				'alamat' 		=> $this->input->post('alamat'),
				'sekilas' 		=> $this->input->post('sekilas'),
				'lat' 			=> $this->input->post('lat'),
				'lng' 			=> $this->input->post('long'),
				'foto' 			=> $foto
			);
		$this->db->where('id_warkop', $id_warkop);
		$this->db->update('warkop', $data);
	}

}

/* End of file M_warkop.php */
/* Location: ./application/models/M_warkop.php */