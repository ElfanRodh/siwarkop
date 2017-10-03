<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warkop extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_warkop');
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
		if ($this->session->userdata('akses') == 'USER') {
			$this->session->set_flashdata('erlog', '1');
			redirect('login');
		}

		$data['judul'] 	= 'WARUNG KOPI';
		$data['konten'] = 'warkop/index.php';
		$data['aktif'] = 'warkop';
		$data['warkop'] = $this->M_warkop->semua()->result();
		$this->load->view('template',$data);
	}

	public function tambah()
	{
		$data['judul'] 	= 'TAMBAH WARUNG KOPI';
		$data['konten'] = 'warkop/tambah.php';
		$data['aktif'] = 'warkop';
		$data['warkop'] = $this->M_warkop->semua()->result();
		$this->load->view('template',$data);
	}

	public function tambah_proses()
	{
		$this->form_validation->set_rules('nama_warkop', 'Nama', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('sekilas', 'Sekilas', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Sekilas Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('lat', 'Latitude', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Latitude Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('long', 'Longitude', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Longitude Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] 	= 'TAMBAH WARUNG KOPI';
			$data['konten'] = 'warkop/tambah.php';
			$data['aktif'] = 'warkop';
			$data['warkop'] = $this->M_warkop->semua()->result();
			$this->load->view('template',$data);
		}else{
			//setting config untuk library upload
			$config['upload_path'] 		= './assets/images/warkop';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']     	= 1000000000;
			$config['max_width'] 		= 1024000;
			$config['max_height'] 		= 768000;

			//pemanggilan librabry upload
			$this->load->library('upload', $config);

			//jika upload gagal
			if ( ! $this->upload->do_upload('foto'))
            {
				$this->session->set_flashdata('gagal_tambah_upload','1');
				redirect('warkop/tambah','refresh');
			//jika upload berhasil
            }else{
            	$gambar = $this->upload->data();

            	//memanggil library image
				$this->load->library('image_lib');
				//setting konfigurasi image_lib
				$this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './assets/images/warkop/'. $gambar['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '20%',
                    'width' => 240
                ));

				//jika fungsi resize image berhasil dijalankam
                if($this->image_lib->resize())
                {
                	//menyimpan kedalam database
                   	$this->M_warkop->tambah_proses($gambar['raw_name'].'_thumb'.$gambar['file_ext']);
					$this->session->set_flashdata('sukses_tambah','1');
					redirect('warkop');

				//jika fung resize image gagal
                }else{
                    $this->session->set_flashdata('gagal_tambah_resize','1');
					redirect('warkop/tambah','refresh');
                }
			}
		}
	}

	public function detail($id)
	{
		$data['judul'] 	= 'DETAIL WARUNG KOPI';
		$data['konten'] = 'warkop/detail.php';
		$data['aktif'] = 'warkop';
		$data['warkop1'] = $this->M_warkop->cek_id($id)->row_array();
		$this->load->view('template',$data);
	}

	public function edit($id)
	{
		$data['judul'] 	= 'EDIT WARUNG KOPI';
		$data['konten'] = 'warkop/edit.php';
		$data['aktif'] = 'warkop';
		$data['warkop1'] = $this->M_warkop->cek_id($id)->row_array();
		$data['warkop_edit'] = $this->M_warkop->cek_id($id)->result();
		$this->load->view('template',$data);
	}

	public function edit_proses($id)
	{
		$this->form_validation->set_rules('nama_warkop', 'Nama', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('sekilas', 'Sekilas', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Sekilas Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('lat', 'Latitude', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Latitude Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('long', 'Longitude', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Longitude Tidak Boleh Kosong.</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] 	= 'EDIT WARUNG KOPI';
			$data['konten'] = 'warkop/edit.php';
			$data['aktif'] = 'warkop';
			$data['warkop1'] = $this->M_warkop->cek_id($id)->row_array();
			$data['warkop_edit'] = $this->M_warkop->cek_id($id)->result();
			$this->load->view('template',$data);
		}else{
		//jika validasi berhasil
			if($_FILES["foto_baru"]["name"] == ""){
				//menyimpan kedalam database tanpa foto
				$foto_lama = $this->input->post('foto_lama');
               	$this->M_warkop->edit_proses($id, $foto_lama);
				$this->session->set_flashdata('sukses_edit','1');
				if ($this->session->userdata('akses') == 'ADMIN') {
					redirect('warkop');
				} else if ($this->session->userdata('akses') == 'USER'){
					redirect('user/profil/'.$this->session->userdata('id_user'));
				}
			} else {
				//setting config untuk library upload
				$config['upload_path'] 		= './assets/images/warkop';
				$config['allowed_types'] 	= 'gif|jpg|png';
				$config['max_size']     	= 1000000000;
				$config['max_width'] 		= 102400000;
				$config['max_height'] 		= 76800000;

				//pemanggilan librabry upload
				$this->load->library('upload', $config);

				//jika upload gagal
				if ( ! $this->upload->do_upload('foto_baru'))
	            {
					$this->session->set_flashdata('gagal_edit_upload','1');
					redirect('warkop/edit/'.$id);
				//jika upload berhasil
	            }else{
	            	$gambar = $this->upload->data();

	            	//memanggil library image
					$this->load->library('image_lib');
					//setting konfigurasi image_lib
					$this->image_lib->initialize(array(
	                    'image_library' => 'gd2',
	                    'source_image' => './assets/images/warkop/'. $gambar['file_name'],
	                    'maintain_ratio' => true,
	                    'create_thumb' => true,
	                    'quality' => '20%',
	                    'width' => 240,
	                    'height' => 240
	                ));

					//jika fungsi resize image berhasil dijalankam
	                if($this->image_lib->resize())
	                {
	                	//menyimpan kedalam database
	                   	$this->M_warkop->edit_proses($id, $gambar['raw_name'].'_thumb'.$gambar['file_ext']);
						$this->session->set_flashdata('sukses_edit','1');
						if ($this->session->userdata('akses') == 'ADMIN') {
							redirect('warkop');
						} else if ($this->session->userdata('akses') == 'USER'){
							redirect('user/profil/'.$this->session->userdata('id_user'));
						}

					//jika fungsi resize image gagal
	                }else{
	                    $this->session->set_flashdata('gagal_edit_resize','1');
						redirect('warkop/edit'.$id);
	                }
            	}
			} 
		}
	}

	public function hapus($id)
	{
		$this->db->where('id_warkop', $id);
		$this->db->delete('warkop');
		$this->session->set_flashdata('sukses_hapus','1');
		redirect('warkop','refresh');
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id_warkop, nama_warkop, alamat');
		$this->datatables->from('warkop');
		echo $this->datatables->generate();
	}
}
