<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CM_main extends CI_Controller {
//
//
//
//  CP_main = Controller Provider main
//
//
//
//  ===============================================CONSTRUCT===============================================
	public function __construct(){
		parent::__construct();
		$this->load->model('M_user');
		// inisialisasi variabel kelas global
		$this->header1 = array(
			'tipeAkun'			=>	'member',
			'sidebarBrand'	=>	'member',
		);
		// --- inisialisasi method validasi untuk seluruh method dalam kelas
		// sudah login atau belum
		// kalau sudah redirect ke home
		$this->_validasiLogin();
		// controller CS_main.php khusus untuk superadmin yang sudah login
		// lakukan validasi privilege dengan paramater dari header1['tipeAkun'] diatas
		$this->_validasiPrivilege($this->header1['tipeAkun']);
	}
//
//
//  ===============================================VALIDASI LOGIN DAN PRIVILEGE===============================================
  private function _validasiLogin(){
		// sudah login atau belum
		// kalau sudah redirect ke home
		if ( $this->session->userdata('isLogin') == 0 ) {
			redirect(base_url(), 'refresh');
		}
	}
	private function _validasiPrivilege($tipeAkun){
		// jenis privilege / tipe akun :
		// 	superadmin, provider, member
		if ( $this->session->userdata('privilege') != $tipeAkun ) {
			redirect(base_url(), 'refresh');
		}
	}
//
//
//  ===============================================DASHBOARD===============================================
	public function index()
	{
		$this->header2 = array(
			'tabTitle' 	=> 'Member',
			'heading' 	=> 'Dashboard',
			'active' 		=> 'dashboard',
		);
		$this->header = array_merge($this->header1, $this->header2);
		$this->data		= array(
											'totProvider' => count($this->M_user->get_all_provider()->result()),
											'totLapangan' => count($this->M_user->get_all_provider()->result()),
											'totMember' 	=> count($this->M_user->get_all_member()->result()),
										);
		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_dashboard', $this->data);
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

//  ===============================================TAMBAH DATA===============================================
	public function add_booking()
	{
		// jika masuk ke add_lapangan dan belum isi data pada form
		if ($this->form_validation->run('add_booking') == false) {
			$this->header2 = array(
				'tabTitle' 		=> 'Tambah Book - member',
				'heading' 		=> 'Tambah Book',
				'active' 			=> 'add_booking',
			);
			$this->header = array_merge($this->header1, $this->header2);
			$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
			$this->load->view($this->header['tipeAkun'] . '/v_add_booking');
			$this->load->view($this->header['tipeAkun'] . '/template/v_footer');

		// jika masuk ke add_lapangan dan sudah isi data sesuai rules pada "config/form_validation.php"
		}else {
			$post 						= $this->input->post();
			echo "<pre>";
			print_r($post);
			die();

			// jika sukses eksekusi query $newUser dan $newMember
			if ($newUser == TRUE AND $newMember == TRUE) {
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', 'Tambah Member Sukses !');
				$this->session->set_flashdata('text', 'Member baru berhasil ditambah !');
				redirect(current_url());

			// jika gagal eksekusi query $newUser dan/atau $newMember, berarti ada yg salah harus crosscheck kodingan
			}else {
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Tambah Member Gagal !');
				$this->session->set_flashdata('text', 'Member baru gagal ditambah !');
				redirect(current_url());
			}
		}
	}

//  ===============================================TAMPILKAN DATA===============================================
	public function data_lapangan()
	{
		$this->header2 = array(
			'tabTitle' 		=> 'Data Lapangan - member',
			'heading' 		=> 'Data Lapangan',
			'active' 			=> 'data_lapangan',
			'dataTables' 	=> '1',
		);
		$this->header = array_merge($this->header1, $this->header2);
		$this->data['lapangan'] = $this->M_user->get_all_lapangan()->result();

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_data_lapangan', $this->data);
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

	public function data_booking()
	{
		$this->header2 = array(
			'tabTitle' 		=> 'Data Booking - member',
			'heading' 		=> 'Data Booking Lapangan',
			'active' 			=> 'data_booking',
			'dataTables' 	=> '1',
		);
		$this->header = array_merge($this->header1, $this->header2);
		$this->data['bookings'] = $this->M_user->get_all_booking()->result();
		// if ($this->data['bookings'] != '') {
		// 	echo "string";
		// }else {
		// 	echo "123123";
		// }
		// echo "<pre>";
		// print_r($this->data['bookings']);
		// die();

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_data_booking', $this->data);
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

//  ===============================================MENU POJOK KANAN ATAS===============================================

	public function profil()
	{
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|max_length[50]');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
		// jika masuk ke profil dan belum isi data pada form
		if ($this->form_validation->run() == false) {
			$this->header2 = array(
				'tabTitle' 		=> 'Profil - member',
				'heading' 		=> 'Informasi Dasar',
				'active' 			=> 'profil',
			);
			$this->header = array_merge($this->header1, $this->header2);
			$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
			$this->load->view($this->header['tipeAkun'] . '/v_profil');
			$this->load->view($this->header['tipeAkun'] . '/template/v_footer');

		// jika masuk ke profil dan sudah isi data sesuai rules diatas
		}else {
			$post	= $this->input->post();
			$editProfil = $this->M_user->set_update_profil_provider($post['nama'], $post['email'], $post['noTelepon'], $post['alamat'], $post['keterangan'], $this->session->userdata('username'));

			// jika sukses eksekusi query $editProfil
			if ($editProfil == TRUE) {
				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', 'Ubah Data Profil Sukses !');
				$this->session->set_flashdata('text', 'Data Profil Berhasil Diperbarui !');
				// ambil data terupdate untuk dimasukkan ke dalam session
				// kemudian masukkan data baru yg sudah difetch ke dalam session
				$user = $this->M_user->get_user_by_username_email($this->session->userdata('username'))->row();
				$this->session->set_userdata('email', $user->email);
				redirect(current_url());

			// jika gagal eksekusi query $editProfil, berarti ada yg salah harus crosscheck kodingan
			}else {
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Ubah Data Profil Gagal !');
				$this->session->set_flashdata('text', 'Data Profil Gagal Diperbarui !');
				redirect(current_url());
			}
		}
	}


	// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	public function ubah_password()
	{
		$this->header2 = array(
			'tabTitle' 		=> 'Ubah Password - member',
			'heading' 		=> 'Ubah Password',
			'active' 			=> 'ubah_password',
		);
		$this->header = array_merge($this->header1, $this->header2);

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_ubah_password');
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

//  ===============================================END OF CLASS===============================================
}
