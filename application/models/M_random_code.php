<?php

  /**
   *
   */
  class M_random_code extends CI_Model
  {

    var $tb_random_code      = 'tb_random_code';

//  ===============================================SETTER===============================================
    // set register kode baru ketika user member mendaftar
    public function set_new_register_code($email, $vc, $ec, $cc){
      $createdAt = unix_to_human(now(), true, 'europe');
      $expiredAt = unix_to_human(now() + (366 * 24 * 60 * 60), true, 'europe');
  		$data = array(
  		  "email"             => $email,
        "created_at"        => $createdAt,
        "expired_at"        => $expiredAt,
        "verification_code" => $vc,
  		  "email_code"        => $ec,
  		  "created_at_code"   => $cc,
  		);
  		return $this->db->insert($this->tb_random_code, $data);
    }
//  ===============================================SETTER===============================================
    // get register kode berdasar email
    public function get_new_register_code($email){

  		$this->db->from($this->tb_random_code);
      $this->db->where('email', $email);
      return $this->db->get();
    }

  }


 ?>
