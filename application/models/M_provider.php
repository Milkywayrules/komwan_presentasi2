<?php

  /**
   *
   */
  class M_provider extends CI_Model
  {

    public function __construct(){
  		parent::__construct();
       $provider     = 'pro_meteor';
       $tb_user      = 'tb_user';
       $tb_provider  = 'tb_provider';
       $tb_member    = 'tb_member';
  	}


//  ===============================================GETTER===============================================
    // get semua member dari tb_member dan tb_user
    // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
    public function get_provider_by_id($id = ''){
      // insert data register ke db
      $this->db->select('*');
      $this->db->from('tb_provider');
      $this->db->where("id  = '{$id}'");
      $query = $this->db->get();
      if ( $query->num_rows() != 0) {
        return $query;
      }
      return 0;
    }

    // get semua member dari tb_member dan tb_user
    // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
    public function get_lapangan_by_provider($id = 'pro_meteor'){
      // insert data register ke db
      $this->db->select('*');
      $this->db->from('tb_lapangan');
      $this->db->where("id_provider  = '{$id}'");
      $query = $this->db->get();
      if ( $query->num_rows() != 0) {
        return $query;
      }
      return 0;
    }

}


 ?>
