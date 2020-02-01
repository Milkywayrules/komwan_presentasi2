<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	//
	//  main = Controller main default
	//

	function __construct(){
  	parent::__construct();
		$this->load->model('M_provider');
		// inisialisasi variabel kelas global
		// $this->header1 = array(
		// 	'tipeAkun'			=>	'provider',
		// 	'sidebarBrand'	=>	'provider',
		// 	'tipeLogin' 		=>  ucfirst($tipeLogin),
		// );
  }

	public function index()
	{
		$this->data['provider']		= $this->M_provider->get_provider_by_id('pro_meteor')->row();
		$this->data['lapangan']		= $this->M_provider->get_lapangan_by_provider('pro_meteor')->result();
		// echo "<pre>";
		// print_r(unset($this->data['provider']));
		// die();
		$this->load->view('v_home', $this->data);
	}

	public function pwgen()
	{
		// mencari nilai COST terbaik
		// $timetarget = 0.05;
		// $cost = 8;
		// do {
		// 	$cost++;
		// 	$start = microtime(true);
		// 	password_hash("testing", PASSWORD_BCRYPT, ['cost' => $cost]);
		// 	$end = microtime(true);
		// 	echo "{$cost}<br><hr>";
		// } while (($end - $start) < $timetarget);
		// selesai mencari $argon2i$v=19$m=1024,t=2,p=2$czZrU3NmSkwyZWFCZzZqcg$4BCXT3Xjj+nwslQZOa8I2rO760hSmVmzCiSQ/8cfcDs

		$a = password_hash('admin', PASSWORD_ARGON2I);
		echo "{$a}<br>";
		$b = password_verify('superadmin', $a);
		echo "{$b}";
		die();
	}

	public function as()
	{
		$a = password_hash('admin', PASSWORD_ARGON2I);
		echo "{$a}<br>";
		$b = password_verify('admin', $a);
		echo "{$b}";
		die('<br><hr><br>');

		?>
		<input type="text" name="pw" value="superadmin">
		<?php
		$password = password_hash( $this->input->post('pw', TRUE), PASSWORD_BCRYPT );
		die($password);
	}



}
