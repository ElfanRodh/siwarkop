<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_warkop');
		$this->load->model('M_user');
		if (!$this->session->userdata('username_siwarkop')) {
			$this->session->set_flashdata('erlog', '1');
			redirect('login');
		}
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
		$data['judul'] = 'DASHBOARD';
		$data['konten'] = 'home.php';
		$data['aktif'] = 'home';
		$data['warkop'] = $this->M_warkop->semua()->result();
		$data['allwarkop'] = $this->M_warkop->semua()->num_rows();
		$data['alluser'] = $this->M_user->semua()->num_rows();
		$this->load->view('template',$data);
	}
}
