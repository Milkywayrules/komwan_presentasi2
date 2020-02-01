<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CS_panel extends CI_Controller {
//
//
//
//  CS_panel = Controller Superdmin panel
//
//
//
//  ===============================================CONSTRUCT===============================================
	public function __construct(){
		parent::__construct();
		$this->load->model('M_user');
		// inisialisasi variabel kelas global
		$this->header1 = array(
			'tipeAkun'			=>	'superadmin',
			'sidebarBrand'	=>	'superadmin',
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
	// public function index()
	// {
	// 	$this->header2 = array(
	// 		'tabTitle' 		=> 'Data Member - superadmin',
	// 		'heading' 		=> 'Data Member',
	// 		'active' 			=> 'data_member',
	// 		'dataTables' 	=> '1',
	// 	);
	// 	$this->header = array_merge($this->header1, $this->header2);
	//
	// 	$this->load->view($this->header['tipeAkun'] . '/template/v_header', $header);
	// 	$this->load->view($this->header['tipeAkun'] . '/v_dashboard');
	// 	$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	// }
//  ===============================================DETAIL DATA PROVIDER / MEMBER===============================================
	public function detail($from = '', $username ='')
	{
		// die($from.'/'.$id);
		// DETAIL PROVIDER
		if ($from == 'data_provider') {
			$this->header2 = array(
				'tabTitle' 		=> 'Detail Provider - superadmin',
				'heading' 		=> "Detail Provider : @{$username}",
				'active' 			=> 'data_provider',
			);
			$this->header = array_merge($this->header1, $this->header2);
			// ambil data member berdasarkan username
			// lalu pecah created_at untuk menghasilkan tanggal dan waktu yang terpisah
			// kemudian insert kembali ke dalam object. created_at yg sudah dipecah insert ke dalam key created_at
			$this->data['user'] = $this->M_user->get_provider_by_username($username)->row();
			$explode = explode(' ', $this->data['user']->created_at);
			$this->data['user']->created_at = $explode;

			$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
			$this->load->view($this->header['tipeAkun'] . '/panel/v_detail_provider', $this->data);
			$this->load->view($this->header['tipeAkun'] . '/template/v_footer');

		// DETAIL MEMBER
		}elseif ($from == 'data_member') {
			$this->header2 = array(
				'tabTitle' 		=> 'Detail Member - superadmin',
				'heading' 		=> "Detail Member : @{$username}",
				'active' 			=> 'data_member',
			);
			$this->header = array_merge($this->header1, $this->header2);
			// ambil data member berdasarkan username
			// lalu pecah created_at untuk menghasilkan tanggal dan waktu yang terpisah
			// kemudian insert kembali ke dalam object. created_at yg sudah dipecah insert ke dalam key created_at
			$this->data['user'] = $this->M_user->get_member_by_username($username)->row();
			$explode = explode(' ', $this->data['user']->created_at);
			$this->data['user']->created_at = $explode;
			// echo "<pre>";
			// print_r($this->data['user']);
			// die();

			$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
			$this->load->view($this->header['tipeAkun'] . '/panel/v_detail_member', $this->data);
			$this->load->view($this->header['tipeAkun'] . '/template/v_footer');

		}
	}

//  ===============================================DETAIL DATA PROVIDER / MEMBER===============================================
	public function edit($from = '', $username ='')
	// futsalbandng.com/superadmin/data-member/edit/member4
	// data-member = $from | member4 = $username
	{
		// die($from.'/'.$id);
		// EDIT PROVIDER
		if ($from == 'data_provider') {
			// set form rules
			$this->form_validation->set_rules('nama', 'nama', 						'trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('email', 'email', 					'trim|required|valid_email');
			$this->form_validation->set_rules('no_telepon', 'no_telepon', 'trim|required|min_length[10]|max_length[15]|numeric');
			$this->form_validation->set_rules('alamat', 'alamat', 				'trim|required|min_length[10]|max_length[150]|trim');
			$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			// jika masuk ke "data-provider/edit" dan belum isi data pada form
			if ($this->form_validation->run() == false) {
				$this->header2 = array(
					'tabTitle' 		=> 'Edit Provider - superadmin',
					'heading' 		=> "Edit Provider : @{$username}",
					'active' 			=> 'data_provider',
				);
				$this->header = array_merge($this->header1, $this->header2);
				// ambil data provider berdasarkan username
				// lalu pecah created_at untuk menghasilkan tanggal dan waktu yang terpisah
				// kemudian insert kembali ke dalam object. created_at yg sudah dipecah insert kembali ke dalam key created_at
				$this->data['user'] = $this->M_user->get_provider_by_username($username)->row();
				$explode = explode(' ', $this->data['user']->created_at);
				$this->data['user']->created_at = $explode;

				$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
				$this->load->view($this->header['tipeAkun'] . '/panel/v_edit_provider', $this->data);
				$this->load->view($this->header['tipeAkun'] . '/template/v_footer');

			// jika masuk ke "data-provider/edit" dan sudah isi data sesuai rules diatas
			}else {
				$post					= $this->input->post();
				$editProvider = $this->M_user->set_update_provider($post['nama'], $post['email'], $post['no_telepon'], $post['alamat'], $post['openAt'],
																													$post['closeAt'], $post['keterangan'], $post['username']);
				// jika sukses eksekusi query $editProvider
				if ($editProvider == TRUE) {
					$this->session->set_flashdata('success_message', 1);
					$this->session->set_flashdata('title', 'Ubah Data Provider Sukses !');
					$this->session->set_flashdata('text', 'Data Provider Berhasil Diperbarui !');
					redirect(current_url());

				// jika gagal eksekusi query $editProvider, berarti ada yg salah harus crosscheck kodingan
				}else {
					$this->session->set_flashdata('failed_message', 1);
					$this->session->set_flashdata('title', 'Ubah Data Provider Gagal !');
					$this->session->set_flashdata('text', 'Data Provider Gagal Diperbarui !');
					redirect(current_url());
				}
			}

		// EDIT MEMBER
		}elseif ($from == 'data_member') {
			// set form rules
			$this->form_validation->set_rules('nama', 'nama', 						'trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('email', 'email', 					'trim|required|valid_email');
			$this->form_validation->set_rules('no_telepon', 'no_telepon', 'trim|min_length[10]|max_length[15]|numeric');
			$this->form_validation->set_rules('alamat', 'alamat', 				'trim|min_length[10]|max_length[150]|trim');
			$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
			// jika masuk ke "data-member/edit" dan belum isi data pada form
			if ($this->form_validation->run() == false) {
				$this->header2 = array(
					'tabTitle' 		=> 'Edit Member - superadmin',
					'heading' 		=> "Edit Member : @{$username}",
					'active' 			=> 'data_member',
				);
				$this->header = array_merge($this->header1, $this->header2);
				// ambil data member berdasarkan username
				// lalu pecah created_at untuk menghasilkan tanggal dan waktu yang terpisah
				// kemudian insert kembali ke dalam object. created_at yg sudah dipecah insert ke dalam key created_at
				$this->data['user'] = $this->M_user->get_member_by_username($username)->row();
				$explode = explode(' ', $this->data['user']->created_at);
				$this->data['user']->created_at = $explode;

				$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
				$this->load->view($this->header['tipeAkun'] . '/panel/v_edit_member', $this->data);
				$this->load->view($this->header['tipeAkun'] . '/template/v_footer');

			// jika masuk ke "data-member/edit" dan sudah isi data sesuai rules diatas
			}else {
				$post					= $this->input->post();
				$editMember		= $this->M_user->set_update_member($post['nama'], $post['email'], $post['no_telepon'], $post['alamat'], $post['username']);
				// jika sukses eksekusi query $editMember
				if ($editMember == TRUE) {
					$this->session->set_flashdata('success_message', 1);
					$this->session->set_flashdata('title', 'Ubah Data Member Sukses !');
					$this->session->set_flashdata('text', 'Data Member Berhasil Diperbarui !');
					redirect(current_url());

				// jika gagal eksekusi query $editMember, berarti ada yg salah harus crosscheck kodingan
				}else {
					$this->session->set_flashdata('failed_message', 1);
					$this->session->set_flashdata('title', 'Ubah Data Member Gagal !');
					$this->session->set_flashdata('text', 'Data Member Gagal Diperbarui !');
					redirect(current_url());
				}
			}
		} // end data-member (edit)
	}


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


//  ===============================================GENERATE REPORT===============================================
	public function report()
	{
		$this->header2 = array(
			'tabTitle' 		=> 'Generate laporan - superadmin',
			'heading' 		=> 'Generate Laporan',
			'active' 			=> 'laporan',
			// 'dataTables' 	=> '1',
		);
		$this->header = array_merge($this->header1, $this->header2);

		$this->load->view($this->header['tipeAkun'] . '/template/v_header', $this->header);
		$this->load->view($this->header['tipeAkun'] . '/v_dashboard');
		$this->load->view($this->header['tipeAkun'] . '/template/v_footer');
	}

}
