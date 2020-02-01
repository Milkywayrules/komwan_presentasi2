<?php

  /**
   *
   */
  class M_user extends CI_Model
  {

    var $tb_user      = 'tb_user';
    var $tb_provider  = 'tb_provider';
    var $tb_member    = 'tb_member';

//  ===============================================SETTER===============================================
    // daftar user baru
    public function set_new_user($username, $email, $password, $privilege){
      $createdAt = unix_to_human(now(), true, 'europe');
  		$data = array(
  		  "username"    => $username,
  		  "email"       => $email,
  		  "password"    => $password,
  		  "privilege"   => $privilege,
        "is_active"   => '1',
        "created_at"  => $createdAt,
  		);
  		return $this->db->insert('tb_user', $data);
    }

    // daftar member baru
    public function set_new_member($nama, $noTelepon, $alamat, $fotoProfil, $username){
  		$data = array(
  		  "nama"            => $nama,
  		  "no_telepon"      => $noTelepon,
  		  "alamat"          => $alamat,
        "foto_profil"     => $fotoProfil,
        "username"        => $username,
  		);
  		return $this->db->insert('tb_member', $data);
    }

    // daftar provider baru
    public function set_new_provider($id, $nama, $noTelepon, $alamat, $openAt, $closeAt, $username){
      $data = array(
        "id"              => $id,
        "nama"            => $nama,
        "no_telepon"      => $noTelepon,
        "alamat"          => $alamat,
        "open_at"         => $openAt,
        "close_at"        => $closeAt,
        "jumlah_lapangan" => 0,
        "keterangan"      => 'Silakan isi keterangan tambahan yang dibutuhkan sebagai penunjang untuk member memahami.',
        "username"        => $username,
      );
      return $this->db->insert('tb_provider', $data);
    }


//  ===============================================UPDATE PROFIL===============================================
    // update data provider
    public function set_update_provider($nama, $email, $noTelepon, $alamat, $openAt, $closeAt, $keterangan, $username){
      $data1 = array(
        "nama"            => $nama,
        "no_telepon"      => $noTelepon,
        "alamat"          => $alamat,
        "open_at"         => $openAt,
        "close_at"        => $closeAt,
        "keterangan"      => $keterangan,
      );
      $data2 = array(
        "email"           => $email,
      );
      $update1 = $this->db->update('tb_provider', $data1, "username = '{$username}'");
      $update2 = $this->db->update('tb_user', $data2, "username = '{$username}'");
      if ($update1 == true AND $update2 == true) {
        return true;
      }else {
        return false;
      }
    }

    // update data member
    public function set_update_member($nama, $email, $noTelepon, $alamat, $username){
      $data1 = array(
        "nama"            => $nama,
        "no_telepon"      => $noTelepon,
        "alamat"          => $alamat,
      );
      $data2 = array(
        "email"           => $email,
      );
      $update1 = $this->db->update('tb_member', $data1, "username = '{$username}'");
      $update2 = $this->db->update('tb_user', $data2, "username = '{$username}'");
      if ($update1 == true AND $update2 == true) {
        return true;
      }else {
        return false;
      }
    }

    // update data profil superadmin
    public function set_update_profil_superadmin($emailBaru, $username){
  		$data = array(
  		  "email"  => $emailBaru,
  		);
      $this->db->where('username', $username);
  		return $this->db->update('tb_user', $data);
    }

    // update data provider
    public function set_update_profil_provider($nama, $email, $noTelepon, $alamat, $keterangan, $username){
      $data1 = array(
        "nama"            => $nama,
        "no_telepon"      => $noTelepon,
        "alamat"          => $alamat,
        "keterangan"      => $keterangan,
      );
      $data2 = array(
        "email"           => $email,
      );
      $update1 = $this->db->update('tb_provider', $data1, "username = '{$username}'");
      $update2 = $this->db->update('tb_user', $data2, "username = '{$username}'");
      if ($update1 == true AND $update2 == true) {
        return true;
      }else {
        return false;
      }
    }

    // update data profil member
    // public function set_update_profil_member($emailBaru, $username){
  	// 	$data = array(
  	// 	  "email"  => $emailBaru,
  	// 	);
    //   $this->db->where('username', $username);
  	// 	return $this->db->update('tb_user', $data);
    // }

    // update data profil provider
    // public function set_update_profil_provider(){
  	// 	$data = array(
  	// 	  "email"  => $emailBaru,
  	// 	);
    //   $this->db->where('username', $username);
  	// 	return $this->db->update('tb_user', $data);
    // }
    // update data profil member
    // public function set_update_profil_member(){
  	// 	$data = array(
  	// 	  "email"  => $emailBaru,
  	// 	);
    //   $this->db->where('username', $username);
  	// 	return $this->db->update('tb_user', $data);
    // }


//  ===============================================GETTER===============================================
    // get semua member dari tb_member dan tb_user
    // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
    public function get_all_user($select = '*'){
      // insert data register ke db
      $this->db->select($select);
      $this->db->from('tb_user');
      $query = $this->db->get();
      if ( $query->num_rows() != 0) {
        return $query;
      }
      return 0;
    }

    // get semua member dari tb_member dan tb_user
    // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
    public function get_all_member($select = '*'){
      // insert data register ke db
      $this->db->select($select);
      $this->db->from('tb_member');
      $this->db->join('tb_user', 'tb_user.username=tb_member.username');
      $this->db->order_by('tb_user.no', 'desc');
      $query = $this->db->get();
      if ( $query->num_rows() != 0) {
        return $query;
      }
      return 0;
    }

    // get semua member dari tb_member dan tb_user
    // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
    public function get_all_provider($select = '*'){
      // insert data register ke db
      $this->db->select($select);
      $this->db->from('tb_provider');
      $this->db->join('tb_user', 'tb_user.username=tb_provider.username');
      $this->db->order_by('tb_user.no', 'desc');
      $query = $this->db->get();
      if ( $query->num_rows() != 0) {
        return $query;
      }
      return 0;
    }

    // get semua member dari tb_member dan tb_user
    // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
    public function get_all_booking($select = '*'){
      // insert data register ke db
      $this->db->select($select);
      $this->db->from('tb_booking');
      $this->db->join('tb_member',        'tb_member.id = tb_booking.id_member');
      $this->db->join('tb_lapangan',      'tb_lapangan.id = tb_booking.id_lapangan');
      $this->db->join('tb_bayar_booking', 'tb_bayar_booking.id = tb_booking.id_bayar_booking');
      $this->db->order_by('tb_booking.no', 'desc');
      $query = $this->db->get();
      if ( $query->num_rows() != 0) {
        return $query;
      }
      return $query;
    }

    // get semua member dari tb_member dan tb_user
    // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
    public function get_all_lapangan($select = '*'){
      // insert data register ke db
      $this->db->select($select);
      $this->db->from('tb_lapangan');
      $this->db->join('tb_provider', 'tb_provider.id = tb_lapangan.id_provider');
      $this->db->order_by('tb_lapangan.no', 'desc');
      $query = $this->db->get();
      if ( $query->num_rows() != 0) {
        return $query;
      }
      return $query;
    }

    // get 1 user berdasarkan username / email
    // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
    public function get_user_by_username_email($emailUsername, $select = '*'){
      // insert data register ke db
      $this->db->select($select);
      $this->db->from('tb_user');
      $this->db->where('email', $emailUsername);
      $this->db->or_where('username', $emailUsername);
      $query = $this->db->get();
      if ( $query->num_rows() == 1) {
        return $query;
      }
      return false;
    }

    // get 1 member berdasarkan username dari tb_member dan tb_user
    // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
    public function get_member_by_username($username, $select = '*'){
      // insert data register ke db
      $this->db->select($select);
      $this->db->from('tb_member');
      $this->db->join('tb_user', 'tb_user.username=tb_member.username');
      $this->db->where('tb_member.username', $username);
      $query = $this->db->get();
      if ( $query->num_rows() == 1) {
        return $query;
      }
      return false;
    }

    // get 1 provider berdasarkan username dari tb_provider dan tb_user
    // masukkan parameter kedua sebagai nama kolom pada database, untuk select kolom
    public function get_provider_by_username($username, $select = '*'){
      // insert data register ke db
      $this->db->select($select);
      $this->db->from('tb_provider');
      $this->db->join('tb_user', 'tb_user.username=tb_provider.username');
      $this->db->where('tb_provider.username', $username);
      $query = $this->db->get();
      if ( $query->num_rows() == 1) {
        return $query;
      }
      return false;
    }


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


    // daftar user baru
    public function create($name, $username, $email, $phone, $gender, $password, $privilege, $activation_code){
      // insert data register ke db
      // $create_at = unix_to_human(now(), true, 'europe');
      return $this->db->query("INSERT INTO user (name, username, email, phone, gender, password, privilege, activation_code, create_at)
                              VALUES ('{$name}', '{$username}', '{$email}', '{$phone}', '{$gender}', '{$password}', '{$privilege}', '{$activation_code}', '{$create_at}');");
    }

    // ganti info pada settings
    function set_info($email, $name, $phone, $username){
      return $this->db->query( "UPDATE user SET email='{$email}', name='{$name}', phone='{$phone}' WHERE username='{$username}';" );
    }

    function set_reset_code($email, $code){
      return $this->db->query( "UPDATE user SET reset_code='{$code}' WHERE email='{$email}';" );
    }

    // ambil semua user dan data usernya
    public function get_all(){
      $this->db->order_by('id', 'ASC');
      $this->db->from($this->table);
      // fetch seluruh hasil pada db berupa array
      return $this->db->get()->result();
    }

    // ambil reset code untuk reset password
    public function get_reset_code($code){
      $this->db->from($this->table);
      $this->db->where('reset_code',$code);
      // fetch seluruh hasil pada db berupa array
      return $this->db->get();
    }

    // ambil user berdasarkan email / username
    public function get_user2($emailUsername){
      $this->db->from($this->table);
      $this->db->where('email',$emailUsername);
      $this->db->or_where('username',$emailUsername);
      $this->db->where('privilege >=', 5);
      // fetch seluruh hasil pada db berupa array
      return $this->db->get();
    }

    // ambil admin berdasarkan username
    public function get_admin_by_username($username){
      $this->db->from($this->table);
      $this->db->where('username',$username);
      $this->db->where('privilege <=', 4);
      // fetch seluruh hasil pada db berupa array
      return $this->db->get();
    }

  }


 ?>
