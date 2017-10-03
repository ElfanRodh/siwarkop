<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_user');
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

		$data['judul'] 	= 'USER || SIWARKOP';
		$data['konten'] = 'user/index.php';
		$data['aktif'] = 'user';
		$data['user'] = $this->M_user->semua()->result();
		$this->load->view('template',$data);
	}

	public function tambah()
	{
		$data['judul'] 	= 'TAMBAH USER || SIWARKOP';
		$data['konten'] = 'user/tambah.php';
		$data['aktif'] = 'user';
		$data['user'] = $this->M_user->semua()->result();
		$this->load->view('template',$data);
	}

	public function tambah_proses()
	{
		$this->form_validation->set_rules('nama_user', 'Nama', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis Kelamin Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|is_unique[user.email]|valid_email',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> E-mail Tidak Boleh Kosong.</div>',
					'is_unique' => '<div class="alert alert-danger"><strong>Error!</strong> E-mail sudah terdaftar.</div>',
					'valid_email' => '<div class="alert alert-danger"><strong>Error!</strong> E-mail tidak valid.</div>'
					)
			);
		$this->form_validation->set_rules('no_telp', 'No. Telp', 'required|trim|integer',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> No. Telp Tidak Boleh Kosong </div>',
					'integer' => '<div class="alert alert-danger"><strong>Error!</strong> No. Telp tidak valid</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['modal_show'] = "$('#modal-fade').modal('show');";
			$data['judul'] 	= 'USER || SIWARKOP';
			$data['konten'] = 'user/index.php';
			$data['aktif'] = 'user';
			$data['user'] = $this->M_user->semua()->result();
			$this->load->view('template',$data);
		}else{
			//setting config untuk library upload
			$config['upload_path'] 		= './assets/images/user';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']     	= 1000000000;
			$config['max_width'] 		= 1024000;
			$config['max_height'] 		= 768000;

			//pemanggilan librabry upload
			$this->load->library('upload', $config);

			//jika upload gagal
			if ( ! $this->upload->do_upload('foto'))
            {
				$data['modal_show'] = "$('#modal-fade').modal('show');";
				$data['judul'] 	= 'USER || SIWARKOP';
				$data['konten'] = 'user/index.php';
				$data['aktif'] = 'user';
				$data['user'] = $this->M_user->semua()->result();
				$this->session->set_flashdata('gagal_tambah_upload','1');
				$this->load->view('template',$data);
			//jika upload berhasil
            }else{
            	$gambar = $this->upload->data();

            	//memanggil library image
				$this->load->library('image_lib');
				//setting konfigurasi image_lib
				$this->image_lib->initialize(array(
                    'image_library' => 'gd2',
                    'source_image' => './assets/images/user/'. $gambar['file_name'],
                    'maintain_ratio' => true,
                    'create_thumb' => true,
                    'quality' => '20%',
                    'width' => 240
                ));

				//jika fungsi resize image berhasil dijalankam
                if($this->image_lib->resize())
                {
                	//menyimpan kedalam database
                   	$this->M_user->tambah_proses($gambar['raw_name'].'_thumb'.$gambar['file_ext']);
					$this->session->set_flashdata('sukses_tambah','1');
					redirect('user');

				//jika fung resize image gagal
                }else{
                	$data['modal_show'] = "$('#modal-fade').modal('show');";
					$data['judul'] 	= 'USER || SIWARKOP';
					$data['konten'] = 'user/index.php';
					$data['aktif'] = 'user';
					$data['user'] = $this->M_user->semua()->result();
                    $this->session->set_flashdata('gagal_tambah_resize','1');
					$this->load->view('template',$data);
                }
			}
		}
	}

	public function detail($id)
	{
		$data['judul'] 	= 'DETAIL USER || SIWARKOP';
		$data['konten'] = 'user/detail.php';
		$data['aktif'] = 'user';
		$data['user']  = $this->M_user->cek_id($id)->row_array();
		$data['warkop_user']  = $this->M_user->cek_warkop($id)->result();
		$this->load->view('template', $data);
	}

	public function edit($id)
	{
		$data['judul'] 	= 'EDIT USER || SIWARKOP';
		$data['konten'] = 'user/edit.php';
		$data['aktif'] = 'user';
		$data['user1'] = $this->M_user->cek_id($id)->row_array();
		$this->load->view('template',$data);
	}

	public function edit_proses($id)
	{
		$this->form_validation->set_rules('nama_user', 'Nama', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Nama Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Jenis Kelamin Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> Alamat Tidak Boleh Kosong.</div>'
					)
			);
		$this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> E-mail Tidak Boleh Kosong.</div>',
					'valid_email' => '<div class="alert alert-danger"><strong>Error!</strong> E-mail tidak valid.</div>'
					)
			);
		$this->form_validation->set_rules('no_telp', 'No. Telp', 'required|trim|integer',
				array(
					'required' => '<div class="alert alert-danger"><strong>Error!</strong> No. Telp Tidak Boleh Kosong </div>',
					'integer' => '<div class="alert alert-danger"><strong>Error!</strong> No. Telp tidak valid (gunakan hanya angka)</div>'
					)
			);

		//jika validasi gagal
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] 	= 'EDIT USER || SIWARKOP';
			$data['konten'] = 'user/edit.php';
			$data['aktif'] = 'user';
			$data['user1'] = $this->M_user->cek_id($id)->row_array();
			$this->load->view('template',$data);
		}else{
		//jika validasi berhasil
			if($_FILES["foto_baru"]["name"] == ""){
				//menyimpan kedalam database tanpa foto
				$foto_lama = $this->input->post('foto_lama');
               	$this->M_user->edit_proses($id, $foto_lama);
				$this->session->set_flashdata('sukses_edit','1');
				if ($this->session->userdata('akses') == 'ADMIN') {
					redirect('user');
				} else if ($this->session->userdata('akses') == 'USER') {
					redirect('user/profil/'.$id);
				}
			} else {
				//setting config untuk library upload
				$config['upload_path'] 		= './assets/images/user';
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
					redirect('user/edit/'.$id);
				//jika upload berhasil
	            }else{
	            	$gambar = $this->upload->data();

	            	//memanggil library image
					$this->load->library('image_lib');
					//setting konfigurasi image_lib
					$this->image_lib->initialize(array(
	                    'image_library' => 'gd2',
	                    'source_image' => './assets/images/user/'. $gambar['file_name'],
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
	                   	$this->M_user->edit_proses($id, $gambar['raw_name'].'_thumb'.$gambar['file_ext']);
						$this->session->set_flashdata('sukses_edit','1');
						if ($this->session->userdata('akses') == 'ADMIN') {
							redirect('user');
						} else if ($this->session->userdata('akses') == 'USER') {
							redirect('user/profil/'.$id);
						}

					//jika fungsi resize image gagal
	                }else{
	                    $this->session->set_flashdata('gagal_edit_resize','1');
						redirect('user/edit'.$id);
	                }
            	}
			} 
		}
	}
	
	public function hapus($id)
	{
		$this->db->where('id_user', $id);
		if ($this->db->delete('user')) {
			$this->session->set_flashdata('sukses_hapus','1');
		} else {
			$this->session->set_flashdata('gagal_hapus','1');
		}
		redirect('user');
	}

	public function data_server()
	{
		$this->load->library('Datatables');
		$this->datatables->select('id_user, nama_user, jk, alamat');
		$this->datatables->from('user');
		echo $this->datatables->generate();
	}

	public function cetakPDF()
	{
		$this->load->library('dompdf_gen'); //me load ibrary dompdf_gen yang telah di copy kan
		$data['judul']	= 'CETAK USER'; //mengabil data dari M_user
		$data['user']	= $this->M_user->semua()->result(); //mengabil data dari M_user
		$this->load->view('user/print', $data); //me load view user/print

		$dompdf 			= new DOMPDF(); //membuat objek baru bernama $dompdf

		$paper_size		= 'A4'; //membuat variabel untuk menampung data settingan paper_size
		$orientation	= 'landscape'; //membuat variabel untuk menampung data settingan orientation
		$this->dompdf->set_paper($paper_size, $orientation); //mengeksekusi fungsi set_paper

		$html 			= $this->output->get_output();
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream('laporan_user.pdf', array('Attachment' => 0)); //fungsi untuk mencetak
		unset($html);
		unset($dompdf);
	}

	public function profil($id)
	{
		$data['judul'] 	= 'SIWARKOP';
		$data['konten'] = 'user/profil.php';
		$data['aktif'] = 'user_profil';
		$data['user']  = $this->M_user->cek_id($id)->row_array();
		$data['warkop_user']  = $this->M_user->cek_warkop($id)->result();
		$this->load->view('template', $data);
	}

	public function tambah_warkop()
	{
		$data['judul'] 	= 'TAMBAH WARUNG KOPI';
		$data['konten'] = 'user/tambah_warkop.php';
		$data['aktif'] = 'user_profil';
		$data['warkop'] = $this->M_warkop->semua()->result();
		$this->load->view('template',$data);
	}

	public function tambah_warkop_proses()
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
			$data['konten'] = 'user/tambah_warkop.php';
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
				redirect('user/tambah_warkop','refresh');
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
                   	$this->M_user->tambah_warkop_proses($gambar['raw_name'].'_thumb'.$gambar['file_ext']);
					$this->session->set_flashdata('sukses_tambah','1');
					redirect('user/profil/'.$this->session->userdata('id_user'));

				//jika fung resize image gagal
                }else{
                    $this->session->set_flashdata('gagal_tambah_resize','1');
					redirect('user/tambah_warkop','refresh');
                }
			}
		}
	}

}
