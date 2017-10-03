<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_warkop');
	}

	public function index()
	{
		$data['warkop'] = $this->M_warkop->semua()->result();
		$this->load->view('front/index', $data);
	}

	public function detail($id)
	{
		$data['warkop_detail'] = $this->M_warkop->cek_id($id)->row_array();
		$this->load->view('front/detail', $data);
	}

}

/* End of file Front.php */
/* Location: ./application/controllers/Front.php */ 