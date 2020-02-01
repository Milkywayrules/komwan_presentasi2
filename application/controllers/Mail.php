<?php /**
 *
 */
class Mail extends CI_Controller
{

  public function __construct(){
    parent::__construct();

    $this->load->model('M_user');
    $this->load->library('email');
    // load library email
    $config['protocol'] = 'smtp';                 //sender's protocol

    // mailtrap dio yg bawah
    // $config['smtp_host'] = 'smtp.mailtrap.io';
    // $config['smtp_port'] =  465;
    // $config['smtp_user'] = '59e577e45c057f';
    // $config['smtp_pass'] = 'eba61ef82aba85';

    $config['smtp_host'] = 'mail.ringkes.in'; //sender's smtp hosting
    $config['smtp_port'] = '465';                 //sender's smtp port
    $config['smtp_user'] = 'tester@ringkes.in';         //sender's email
    $config['smtp_pass'] = 'tester2020';          //sender's password

    // $config['smtp_host'] = 'mx1.hostinger.co.id'; //sender's smtp hosting
    // $config['smtp_port'] = '587';                 //sender's smtp port
    // $config['smtp_user'] = 'hi@qopas.in';         //sender's email
    // $config['smtp_pass'] = 'leomessi10';          //sender's password

    $config['mailtype']   = 'html';
    $config['charset']    = 'iso-8859-1';
    $config['wordwrap']   = 'TRUE';
    $config['newline']    = '\r\n';
    $config['smtp_crypto']= 'ssl';
    // setting config email
    $this->email->initialize($config);
    // inisialisasi semua config tadi
  }

  public function index(){
    $data = array(
      'verifLink'   =>  $verifLink,
    );

    // $this->email->clear();
    $this->email->from('tester@ringkes.in', 'Akun Tester');
    $this->email->to('tester@ringkes.in');
    $this->email->subject($this->load->view('mail/v_daftar'), $data);
    $this->email->message('Bonjoourr!');
    if ( ! $this->email->send() ) {
      $a = $this->email->send();
      var_dump($a);
      die();
    }else {
      echo "string";
      die();
    }

  }


  public function reset_password()
  {
    // header("Refresh:1; URL=".base_url('auth/reset'));
    // die('belom bisa ehe');
    // $this->load->library( 'converter' );
    // //
    // $code = $this->converter->base64_encode( $this->input->post('emailContact') );
    //
    // $aa = $this->M_users->get_user('dadssdy');
    // echo $this->session->userdata('reset-email');
    $user = $this->M_users->get_user( $this->session->userdata('reset-email') );
    // print_r( $user->num_rows() );die();
    if ( $user->num_rows() == 1 ) {
      $user = $user->row();
      $data = array(
        'name' => $user->name,
        'username' => $user->username,
        'reset_code' => md5(rand().time()),
      );
      if ( $this->M_users->set_reset_code($user->email, $data['reset_code']) ) {
        $to = $this->session->userdata('reset-email');
        $this->email->from( 'Hi@qopas.in', 'Service from pendekin' );
        $this->email->to( $to );
        // set from and where this email goes to
        // $this->email->cc('tes001@tes.com, tes002@tes.com, dioilham123@gmail.com');
        // $this->email->bcc('dioilham1234@gmail.com');
        // set cc and bcc sebagai salinan/backupan
        // set message subject
        $this->email->subject( "Password reset for {$user->name}" );
        // set message body
        $body = $this->load->view('v_email_resetpassword', $data, TRUE);
        $this->email->message($body);

        // load lib notif
        if( ! $this->email->send() ){
          // jika email gagal terkirim
          $this->session->set_flashdata('failed_message', 1);
          $this->session->set_flashdata('title', 'E-Mail couldn\'t be sent !');
          $this->session->set_flashdata('text', 'Please contact us for more advance');
          $this->email->print_debugger();
          redirect(base_url('resetpassword'));
        }else {
          // jika email berhasil terkirim
          $this->session->set_flashdata('success_message', 1);
          $this->session->set_flashdata('title', 'E-Mail for reset sent !');
          $this->session->set_flashdata('text', 'Please check your e-mail for step-by-step');
          redirect(base_url('login'));
        }
      }else {
        die('duh gagal euy');
      }
    }else {
      $this->session->set_flashdata('failed_message', 1);
      $this->session->set_flashdata('title', 'E-Mail not found !');
      $this->session->set_flashdata('text', 'Please double-check your e-mail again');
      redirect(base_url('resetpassword'));
    }
  } // end of reset password method
}
?>
