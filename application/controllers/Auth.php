<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// .
// .
// .
// .
//                            user
// .
// .
// .
// .

class Auth extends CI_Controller {

	function __construct() {
			parent::__construct();
			$this->load->model('M_user');
			$this->load->model('M_random_code');
			// $this->load->library('my_mail');
	}

	private function _validasiLogin(){
		// sudah login atau belum
		// kalau sudah redirect ke home
		if ( $this->session->userdata('isLogin') == 1 ) {
			redirect(base_url());
		}
	}
	private function _validasiPrivilege($tipeLogin = ''){
		// ada 3 tipe login
		// superadmin, provider, biasa (untuk member)
		if ( ($tipeLogin == 'superadmin') or ($tipeLogin == 'provider') or ($tipeLogin == '') ) {
		}else {
      redirect(base_url('login'));
    }
	}

//  ===============================================LOGIN===============================================
	public function login($tipeLogin = '')
	{
		// --- $tipeLogin diambil dari parameter sebelum login pada URL
		// --- misal, website.com/SUPERADMIN/login, maka $tipeLogin = 'SUPERADMIN'

		// sudah login atau belum
		// kalau sudah redirect ke home
		$this->_validasiLogin();
		// superadmin harus login melalui superadmin/login
		// provider harus login melalui provider/login
		// lakukan validasi apakah superadmin/provider login melalui halan login biasa atau sudah sesuai
    $this->_validasiPrivilege($tipeLogin);

		// syarat form
		$this->form_validation->set_rules('emailUsername', 'E-Mail / Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		$header = array(
			'tabTitle' 	=> 'Login ' . ucfirst($tipeLogin),
      'tipeLogin' =>  ucfirst($tipeLogin),
		);
		if ($this->form_validation->run() == FALSE){
			// jika syarat form belum terpenuhi (tombol login belum ditekan)
      $this->load->view('v_login', $header);
    }else{
			// jika syarat pada form sudah terpenuhi (tombol login sudah ditekan)
			// cek email / username pada db
			$query = $this->M_user->get_user_by_username_email( $this->input->post('emailUsername', true) );
			if ( $query != false ) {
				// jika email dan privilege >= 5 terdaftar pada db
				$user = $query->row();
				// lalu cek apakah password sesuai dengan db
				// jika benar akun terdaftar pada tb_user
				if ( password_verify($this->input->post('password', true), $user->password) ) {
					$this->session->set_flashdata('success_message', 1);
					$this->session->set_flashdata('title', "Bonjour, {$user->username} !");
					$this->session->set_flashdata('text', 'Selamat menggunakan Futsalbandung.com');
					$this->session->set_userdata('isLogin', 1);

					// --- cek jenis akun yg login (privilege akun)
					// MEMBER
					// validasi member harus login dari halaman login biasa
					if ($user->privilege == 'member' AND ($tipeLogin != 'superadmin' OR $tipeLogin != 'provider')) {
						// get info dari tb_member
						$query = $this->M_user->get_member_by_username($user->username);
						$member = $query->row();
						// set session userdata
						$this->session->set_userdata((array)$member);
						redirect(base_url(''));

					// PROVIDER
				}elseif ($user->privilege == 'provider' AND $tipeLogin == 'provider') {
						// get info dari tb_provider
						$query = $this->M_user->get_provider_by_username($user->username);
						$provider = $query->row();
						// set session userdata
						$this->session->set_userdata((array)$provider);
						// echo "<pre>";
						// print_r($this->session->userdata());
						// die();
						redirect(base_url('provider/dashboard'));

					// SUPERADMIN
				}elseif ($user->privilege == 'superadmin' AND $tipeLogin == 'superadmin') {
						// set session userdata
						$this->session->set_userdata((array)$user);
						redirect(base_url('superadmin'));

					// TIDAK LOGIN SESUAI DENGAN HALAMAN LOGIN
					}else {
						$this->session->set_userdata('isLogin', 0);
						$this->session->set_flashdata('failed_message', 1);
						$this->session->set_flashdata('title', 'Login gagal !');
						$this->session->set_flashdata('text', 'Kredensi yang anda gunakan salah !');
						redirect(base_url("{$tipeLogin}/login"));
					}

				// jika password inputan tidak cocok pada db
				}else {
					$this->session->set_flashdata('failed_message', 1);
					$this->session->set_flashdata('title', 'Login gagal !');
					$this->session->set_flashdata('text', 'Username / E-mail / password salah !');
					redirect(base_url("{$tipeLogin}/login"));
				}
			}else {
				// jika username/email tidak terdaftar pada db
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Login gagal !');
				$this->session->set_flashdata('text', 'Username / E-mail / password salah !');
				redirect(base_url("{$tipeLogin}/login"));
			}
    }
	} //end fungsi login

//  ===============================================REGISTER===============================================
  public function register()
	{
		$this->_validasiLogin();
		$this->_validasiPrivilege();

		// syarat form
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		if ($this->form_validation->run('add_member') == FALSE) {
			// jika syarat form belum terpenuhi (tombol register belum ditekan)
      $header = array(
  			'tabTitle' => 'Daftar Member',
  		);
			$this->load->view('v_daftar', $header);

		}else {
			$post 						= $this->input->post();
			$fotoProfil				= mt_rand(1, 6).'.png';
			$post['privilege']= 'member';
			$post['password']	= password_hash($post['password'], PASSWORD_BCRYPT);
			// inisialisasi untuk random code
			$vc								= $this->generate_code(33);
			$ec								= $this->generate_code(33);
			$cc								= $this->generate_code(33);

			$newUser 					= $this->M_user->set_new_user		($post['username'], $post['email'], $post['password'], $post['privilege']);
			$newMember 				= $this->M_user->set_new_member	($post['nama'], $post['telepon'], $post['alamat'], $fotoProfil, $post['username']);
			$newVerifCode			= $this->M_random_code->set_new_register_code($post['email'], $vc, $ec, $cc);

			// jika sukses eksekusi query $newUser dan $newMember
			if ($newUser == TRUE AND $newMember == TRUE AND $newVerifCode == TRUE) {

				$row			= $this->M_random_code->get_new_register_code($post['email'])->row();
				$vc				= $row['verification_code'];
				$ec				=	$row['email_code'];
				$cc				=	$row['created_at_code'];
				$verifLink=	base_url("verifikasi?email={$row['email']}&vc={$vc}&ec={$ec}&cc={$cc}");
				// $this->my_mail->kirim_kode_verifikasi($verifLink);

				$this->session->set_flashdata('success_message', 1);
				$this->session->set_flashdata('title', 'Daftar Member Sukses !');
				$this->session->set_flashdata('text', 'Silakan cek E-Mail anda untuk aktivasi akun !');
				redirect(current_url());

			// jika gagal eksekusi query $newUser dan/atau $newMember, berarti ada yg salah harus crosscheck kodingan
			}else {
				$this->session->set_flashdata('failed_message', 1);
				$this->session->set_flashdata('title', 'Daftar Member Gagal !');
				$this->session->set_flashdata('text', 'Silakan cek kembali data diri atau hubungi kami jika ini terus berlanjut !');
				redirect(current_url());
			}

		}
	}

//  ===============================================RESET PASSWORD===============================================
/**
 *
 * ----------------------------
 * $this->input->get():
 *  rc = reset password code
 *  ec = email code
 *  cc = created at code
 *  ----------------------------
 * @param string $resetCode [description]
 */
	public function reset($resetCode = '')
	{
		$this->_validasiLogin();
		$this->_validasiPrivilege();

		if ( ($this->input->get('rc') != '') AND ($this->input->get('ec') != '') AND ($this->input->get('cc') != '') ) {
			die('asdqwd');
		}

		// if ( $resetCode != '' ) {
    //   // kalo masuk ke resetpassword/(:any)
		// 	if ( $this->M_user->get_reset_code($resetCode)->num_rows() == 1 ) {
    //     // cek reset_code nya ada di db atau engga
		// 		$row = $this->M_user->get_reset_code($resetCode)->row();
		// 		echo $row->activation_code;
		// 	}
		// 	// print_r($res);
		// 	die();
		// }

		// syarat form
		$this->form_validation->set_rules('reset-email', 'E-Mail', 'trim|required|valid_email');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

		$header = array(
			'tabTitle' => 'Reset Password'
		);
		if ( $this->form_validation->run() == FALSE ) {
			$this->load->view('v_lupa_password', $header);
		}else {
			$this->session->set_flashdata('reset-email', $this->input->post('reset-email'));
			// redirect(base_url( 'mail/reset-password' ));
				$this->load->view('v_lupa_password', $header);
		}
	}

//  ===============================================LOGOUT===============================================
/**
 * hancurkan seluruh session dan redirect ke 'auth/logout_sw'
 * @return [redirect] [auth/logout_sw]
 */
  public function logout(){
    $this->session->sess_destroy();
		$this->session->set_flashdata('redirect_logout', 1);
		redirect(base_url('auth/logout_sw'));
  }
	/**
	 * jika dari logout maka destroy seluruh session
	 * jika tidak dari logout maka kembali ke halaman login dan session tetap ada
	 * @return [redirect] [home / login]
	 */
	public function logout_sw(){
		if ($this->session->flashdata('redirect_logout') == 1) {
			$this->session->set_flashdata('success_message', 1);
			$this->session->set_flashdata('title', 'Berhasil logout!');
			$this->session->set_flashdata('text', 'Sampai berjumpa kembali dilain waktu');
			redirect(base_url());

		}else {
			redirect(base_url('login'));
		}
  }

//  ===============================================GENERATE CODE===============================================
function generate_code( $length = 33, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ){
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

}
