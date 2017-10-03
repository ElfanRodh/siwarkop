<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	function cek_admin($u, $p){
		$this->db->where('username', $u);
		$this->db->where('password', $p);
		return $this->db->get('admin');
	}

	function cek_user($u, $p){
		$this->db->where('username', $u);
		$this->db->where('password', $p);
		return $this->db->get('user');
	}

	function cek_user_email($mail, $p){
		$this->db->where('email', $mail);
		$this->db->where('password', $p);
		return $this->db->get('user');
	}

	function register()
	{
		$data = array(
				'nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('register-username'),
				'password' => md5($this->input->post('register-password')),
				'email' => $this->input->post('register-email')
			);

		$this->db->insert('user', $data);
	}

	function cek_mail($email)
	{
		$this->db->where('email', $email);
		return $this->db->get('user');
	}

	function ubah($id, $p)
	{
		$data = array('password' => md5($p) );
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */