<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper('captcha');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login/index');
	}

	public function admin()
	{
		$this->load->view('login/index_admin');
	}

	public function login_user()
	{
		$u = $this->input->post('username');
		$p = md5($this->input->post('password'));
		$cek = $this->M_login->cek_user($u, $p)->num_rows();
		$cek2 = $this->M_login->cek_user_email($u, $p)->num_rows();
		$userd = $this->M_login->cek_user($u, $p)->row_array();
		$usermail = $this->M_login->cek_user_email($u, $p)->row_array();
		if ($cek > 0) {
			$this->session->set_userdata('id_user', $userd['id_user']);
			$this->session->set_userdata('nama_user', $userd['nama_user']);
			$this->session->set_userdata('username_siwarkop', $userd['username']);
			$this->session->set_userdata('akses', 'USER');
			redirect('user/profil/'.$userd['id_user']);
		}else{
			if ($cek2 > 0) {
				$this->session->set_userdata('id_user', $usermail['id_user']);
				$this->session->set_userdata('nama_user', $usermail['nama_user']);
				$this->session->set_userdata('username_siwarkop', $usermail['username']);
				$this->session->set_userdata('akses', 'USER');
				redirect('user/profil/'.$usermail['id_user']);
			} else {
				$this->session->set_flashdata('error_login', '1');
				redirect('login','refresh');
			}
		}
	}

	public function login_admin()
	{
		$u = $this->input->post('username');
		$p = md5($this->input->post('password'));
		$cek = $this->M_login->cek_admin($u, $p)->num_rows();
		$userd = $this->M_login->cek_admin($u, $p)->row_array();
		if ($cek > 0) {
			$this->session->set_userdata('id_admin', $userd['id_admin']);
			$this->session->set_userdata('nama_admin', $userd['nama_admin']);
			$this->session->set_userdata('username_siwarkop', $userd['username']);
			$this->session->set_userdata('akses', 'ADMIN');
			redirect('home');
		}else{
			$this->session->set_flashdata('error_login', '1');
			redirect('login/admin','refresh');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username_siwarkop');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('id_admin');
		$this->session->unset_userdata('nama_user');
		$this->session->unset_userdata('nama_admin');
		$this->session->unset_userdata('akses');
		redirect('front','refresh');
	}

	public function register()
	{
		//capcha
		$vals = array(
					'img_path'	 	=> './captcha/',
					'img_url'	 		=> base_url().'captcha/',
					'img_width'	 	=> 350,
					'img_height' 	=> 50
					);
		// membuat capcha
		$cap = create_captcha($vals);
		$this->session->set_userdata('mycaptcha', $cap['word']);
		$this->session->set_userdata('image', $cap['image']);

		$data['image'] = $cap['image'];
		$this->load->view('login/register', $data);
	}

	public function register_proses()
	{
		$this->form_validation->set_rules('nama_user', 'Nama', 'trim|required',
		array(
			'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
			)
		);
		$this->form_validation->set_rules('register-username', 'Username', 'trim|required',
		array(
			'required' => '<div class="alert alert-danger"><strong>Error!</strong> Username Tidak Boleh Kosong.</div>'
			)
		);
		$this->form_validation->set_rules('register-email', 'E-mail', 'trim|required|is_unique[user.email]|valid_email',
		array(
			'is_unique' => '<div class="alert alert-danger"><strong>Error!</strong> E-mail sudah terdaftar.</div>',
			'valid_email' => '<div class="alert alert-danger"><strong>Error!</strong> E-mail tidak valid.</div>'
			)
		);
		$this->form_validation->set_rules('register-password', 'Password', 'trim|required',
		array(
			'required' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Boleh Kosong.</div>'
			)
		);
		$this->form_validation->set_rules('register-password-verify', 'Password', 'trim|matches[register-password]',
		array(
			'matches' => '<div class="alert alert-danger"><strong>Error!</strong> Konfirmasi Password tidak sama.</div>'
			)
		);

		//kirim e-mail
		$this->load->library('email');
	  	$this->email->initialize(array(
	         'protocol' 	=> 'smtp',
	         'smtp_host' 	=> 'ssl://smtp.gmail.com',
	         'smtp_user' 	=> 'elfanrodhian@gmail.com',
	         'smtp_pass' 	=> 'Elfanrodhian123',
	         'smtp_port' 	=> 465,
	         'mailtype' 	=> 'html',
	         'newline' 		=> "\r\n" // kode yang harus di tulis pada konfigurasi controler email
	   	));

	  	$site 		= site_url('login'); 
		$username 	= $this->input->post('register-username');
		$pass 		= $this->input->post('register-password');
		$from 		= 'elfanrodhian@gmail.com';
	   	$nama 		= 'Tugas Besar Framework SIWARKOP';
	   	$to 		= $this->input->post('register-email');
	   	$subject 	= 'Sukses Register';
	   	$message 	= '<p>Terimakasih Sudah Mendaftar :), sekarang anda dapat menambahkan Data Warung Kopi, silahkan masuk ke Website <a href = '.$site.' target="_blank">SIWARKOP</a> dengan : <br> USERNAME	: <strong>'.$username.'</strong><br>PASSWORD	: <strong>'. $pass.'</strong></p>';

	   	$this->email->from($from, $nama )
	               ->to($to)
	               ->subject($subject)
	               ->message($message);

		if ($this->form_validation->run() == FALSE) {
			$data['image'] = $this->session->userdata('image');
			$this->load->view('login/register', $data);
		}else{
			$user = $this->input->post('register-username');
			$pass = $this->input->post('register-password');
			$capp = $this->input->post('captcha');
			$cek = $this->M_login->cek_user($user, md5($pass))->num_rows();
			if ($cek > 0) {
				$this->session->set_flashdata('errorregister', '1');
				redirect('login/register');
			}else{
				if ($capp != "" && $capp == $this->session->userdata('mycaptcha')) {
					if ($this->email->send()) {
						$this->M_login->register();
						$this->session->set_flashdata('suksesregister', '1');
						redirect('login/register');
					}
				}else{
					$this->session->set_flashdata('errorcap', '1');
					redirect('login/register');
				}
			}
		}
	}

	public function lupa()
	{
		//capcha
		$vals = array(
					'img_path'	 	=> './captcha/',
					'img_url'	 		=> base_url().'captcha/',
					'img_width'	 	=> 350,
					'img_height' 	=> 50
					);
		// membuat capcha
		$cap = create_captcha($vals);
		$this->session->set_userdata('cap_lupa', $cap['word']);
		$this->session->set_userdata('image', $cap['image']);

		$data['image'] = $cap['image'];
		$this->load->view('login/lupa', $data);
	}

	public function lupa_proses()
	{
		$this->form_validation->set_rules('register-email', 'E-mail', 'trim|required|valid_email',
		array(
			'valid_email' => '<div class="alert alert-danger"><strong>Error!</strong> E-mail tidak valid.</div>'
			)
		);
		//kirim e-mail
		$this->load->library('email');
	  	$this->email->initialize(array(
	         'protocol' 	=> 'smtp',
	         'smtp_host' 	=> 'ssl://smtp.gmail.com',
	         'smtp_user' 	=> 'elfanrodhian@gmail.com',
	         'smtp_pass' 	=> 'Elfanrodhian123',
	         'smtp_port' 	=> 465,
	         'mailtype' 	=> 'html',
	         'newline' 		=> "\r\n" // kode yang harus di tulis pada konfigurasi controler email
	   	));

		$cek 		= $this->M_login->cek_mail($this->input->post('register-email'))->row_array();
	  	$site 		= site_url('login/ubahpass/'.$cek['id_user']); 
		$u 			= $cek['username'];
		$p 			= $this->session->userdata('cap_lupa');
		$from 		= 'elfanrodhian@gmail.com';
	   	$nama 		= 'Tugas Besar Framework SIWARKOP';
	   	$to 		= $this->input->post('register-email');
	   	$subject 	= 'Sukses Reset Password';
	   	$message 	= '<p>Selamat Password Anda berhasil direset :), silahkan masuk ke Halaman <a href = '.$site.' target="_blank"><strong>SIWARKOP</strong></a> untuk mereset';

	   	$this->email->from($from, $nama )
	               ->to($to)
	               ->subject($subject)
	               ->message($message);

		if ($this->form_validation->run() == FALSE) {
			$data['image'] = $this->session->userdata('image');
			$this->load->view('login/lupa', $data);
		}else{
			$mail = $this->M_login->cek_mail($this->input->post('register-email'))->num_rows();
			if ($mail > 0) {
				if ($this->input->post('captcha') == $this->session->userdata('cap_lupa')) {
					if ($this->email->send()) {
						$this->session->set_flashdata('sukseslupa', '1');
						redirect('login/lupa');
					} else {
						show_error($this->email->print_debugger());
					}
				}else{
					$this->session->set_flashdata('errorcap', '1');
					redirect('login/lupa');
				}
			}else{
				$this->session->set_flashdata('errorlupa', '1');
				redirect('login/lupa');
			}
		}
	}

	public function ubahpass($id_user)
	{
		//capcha
		$vals = array(
					'img_path'	 	=> './captcha/',
					'img_url'	 		=> base_url().'captcha/',
					'img_width'	 	=> 350,
					'img_height' 	=> 50
					);
		// membuat capcha
		$cap = create_captcha($vals);
		$this->session->set_userdata('cap_ubah', $cap['word']);
		$this->session->set_userdata('image', $cap['image']);

		$data['image'] = $cap['image'];
		$data['id'] = $id_user;
		$this->load->view('login/ubah', $data);
	}

	public function ubah_proses($id_user)
	{
		$this->form_validation->set_rules('register-password', 'Password', 'trim|required',
		array(
			'required' => '<div class="alert alert-danger"><strong>Error!</strong> Password Tidak Boleh Kosong.</div>'
			)
		);
		$this->form_validation->set_rules('register-password-verify', 'Password', 'trim|matches[register-password]',
		array(
			'matches' => '<div class="alert alert-danger"><strong>Error!</strong> Konfirmasi Password tidak sama.</div>'
			)
		);

		if ($this->form_validation->run() == FALSE) {
			$data['image'] = $this->session->userdata('image');
			$this->load->view('login/ubah', $data);
		}else{
			$this->M_login->ubah($id_user, $this->input->post('register-password'));
			$this->session->set_flashdata('suksesubah', '1');
			redirect('login/ubahpass/'.$id_user);
		}
	}
}
