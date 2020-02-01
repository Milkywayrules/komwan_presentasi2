<?php

$config = array(
        // validasi form untuk menambah member
        // baik dari sisi superadmin atau pun daftar secara mandiri
        'add_member' => array(
                array(
                  'field' => 'username',
                  'label' => 'username',
                  'rules' => 'trim|required|alpha_numeric|min_length[5]|max_length[20]|is_unique[tb_user.username]',
                  'errors' => array(
                                'required' => '%s harus diisi.',
                                'min_length' => '%s minimal terdiri dari 5 karakter.',
                                'max_length' => '%s maksimal terdiri dari 20 karakter.',
                                'alpha_numeric' => '%s hanya boleh berisikan alfabet dan angka.',
                                'is_unique' => '%s sudah terdaftar, silakan beralih ke yang lebih unik.',
                              ),
                ),
                array(
                  'field' => 'email',
                  'label' => 'email',
                  'rules' => 'trim|required|valid_email|is_unique[tb_user.email]',
                  'errors' => array(
                                'required' => '%s harus diisi.',
                                'valid_email' => '%s harus diisi dengan E-Mail yang valid.',
                                'is_unique' => '%s sudah terdaftar, silakan beralih ke yang lebih unik.',
                              ),
                ),
                array(
                  'field' => 'password',
                  'label' => 'Password',
                  'rules' => 'required|min_length[5]',
                  'errors' => array(
                                'required' => 'Kolom ini harus diisi.',
                                'min_length' => '%s minimal terdiri dari 5 karakter.',
                              ),
                ),
                array(
                  'field' => 'passwordUlang',
                  'label' => 'ulang password',
                  'rules' => 'matches[password]',
                  'errors' => array(
                                'matches' => 'password dengan %s tidak cocok.',
                              ),
                ),
                array(
                  'field' => 'nama',
                  'label' => 'nama',
                  'rules' => 'trim|required|min_length[3]|max_length[50]',
                  'errors' => array(
                                'required'    => '%s harus diisi.',
                                'min_length'  => '%s minimal terdiri dari 3 karakter.',
                                'max_length'  => '%s maksimal terdiri dari 50 karakter.',
                              ),
                ),
                array(
                  'field' => 'telepon',
                  'label' => 'nomor telepon',
                  'rules' => 'trim|numeric|min_length[10]|max_length[15]',
                  'errors' => array(
                                'min_length'  => '%s minimal terdiri dari 10 angka.',
                                'max_length'  => '%s maksimal terdiri dari 15 angka.',
                                'numeric'     => '%s hanya boleh berisikan angka.',
                              ),
                ),
                array(
                  'field' => 'alamat',
                  'label' => 'alamat',
                  'rules' => 'trim|min_length[10]|max_length[150]',
                  'errors' => array(
                                'min_length' => '%s minimal terdiri dari 10 karakter.',
                                'max_length' => '%s maksimal terdiri dari 150 karakter.',
                              ),
                ),
        ),
        // validasi form untuk menambah provider
        // hanya bisa dari sisi superadmin
        'add_provider' => array(
                array(
                  'field' => 'username',
                  'label' => 'username',
                  'rules' => 'trim|required|min_length[3]|max_length[20]|alpha_numeric|is_unique[tb_user.username]',
                  'errors' => array(
                                'required' => '%s harus diisi.',
                                'min_length' => '%s minimal terdiri dari 3 karakter.',
                                'max_length' => '%s maksimal terdiri dari 20 karakter.',
                                'alpha_numeric' => '%s hanya boleh berisikan alfabet dan angka.',
                                'is_unique' => '%s sudah terdaftar, silakan beralih ke yang lebih unik.',
                              ),
                ),
                array(
                  'field' => 'email',
                  'label' => 'email',
                  'rules' => 'trim|required|valid_email|is_unique[tb_user.email]',
                  'errors' => array(
                                'required' => '%s harus diisi.',
                                'valid_email' => '%s harus diisi dengan E-Mail yang valid.',
                                'is_unique' => '%s sudah terdaftar, silakan beralih ke yang lebih unik.',
                              ),
                ),
                array(
                  'field' => 'password',
                  'label' => 'Password',
                  'rules' => 'required|trim|min_length[5]',
                  'errors' => array(
                                'required' => 'Kolom ini harus diisi.',
                                'min_length' => '%s minimal terdiri dari 5 karakter.',
                              ),
                ),
                array(
                  'field' => 'nama',
                  'label' => 'nama',
                  'rules' => 'trim|required|min_length[3]|max_length[50]',
                  'errors' => array(
                                'required' => '%s harus diisi.',
                                'min_length' => '%s minimal terdiri dari 3 karakter.',
                                'max_length' => '%s maksimal terdiri dari 50 karakter.',
                              ),
                ),
                array(
                  'field' => 'telepon',
                  'label' => 'nomor telepon',
                  'rules' => 'trim|min_length[10]|max_length[15]|numeric',
                  'errors' => array(
                                'min_length' => '%s minimal terdiri dari 10 angka.',
                                'max_length' => '%s maksimal terdiri dari 15 angka.',
                                'numeric' => '%s hanya boleh berisikan angka.',
                              ),
                ),
                array(
                  'field' => 'alamat',
                  'label' => 'alamat',
                  'rules' => 'trim|required|min_length[10]|max_length[150]|trim',
                  'errors' => array(
                                'required' => '%s harus diisi.',
                                'min_length' => '%s minimal terdiri dari 10 karakter.',
                                'max_length' => '%s maksimal terdiri dari 150 karakter.',
                              ),
                ),
        ),
        // validasi form untuk .....
        // keterangan tambahan
        'reserved_for_next_rules' => array(
                array(
                  'field' => 'username',
                  'label' => 'username',
                  'rules' => 'required|min_length[5]|max_length[20]|alpha_numeric|is_unique[tb_user.username]',
                  'errors' => array(
                                'required' => '%s harus diisi.',
                                'min_length' => '%s minimal terdiri dari 5 karakter.',
                                'max_length' => '%s maksimal terdiri dari 20 karakter.',
                                'alpha_numeric' => '%s hanya boleh berisikan alfabet dan angka.',
                                'is_unique' => '%s sudah terdaftar, silakan beralih ke yang lebih unik.',
                              ),
                ),
                array(
                  'field' => 'email',
                  'label' => 'email',
                  'rules' => 'required|valid_email|is_unique[tb_user.email]',
                  'errors' => array(
                                'required' => '%s harus diisi.',
                                'valid_email' => '%s harus diisi dengan E-Mail yang valid.',
                                'is_unique' => '%s sudah terdaftar, silakan beralih ke yang lebih unik.',
                              ),
                ),
                array(
                  'field' => 'password',
                  'label' => 'Password',
                  'rules' => 'required|trim|min_length[8]',
                  'errors' => array(
                                'required' => 'Kolom ini harus diisi.',
                                'min_length' => '%s minimal terdiri dari 8 karakter.',
                              ),
                ),
                array(
                  'field' => 'nama',
                  'label' => 'nama',
                  'rules' => 'required|min_length[3]|max_length[50]',
                  'errors' => array(
                                'required' => '%s harus diisi.',
                                'min_length' => '%s minimal terdiri dari 3 karakter.',
                                'max_length' => '%s maksimal terdiri dari 50 karakter.',
                              ),
                ),
                array(
                  'field' => 'telepon',
                  'label' => 'nomor telepon',
                  'rules' => 'min_length[10]|max_length[15]|numeric',
                  'errors' => array(
                                'min_length' => '%s minimal terdiri dari 10 angka.',
                                'max_length' => '%s maksimal terdiri dari 15 angka.',
                                'numeric' => '%s hanya boleh berisikan angka.',
                              ),
                ),
                array(
                  'field' => 'alamat',
                  'label' => 'alamat',
                  'rules' => 'required|min_length[10]|max_length[150]|trim',
                  'errors' => array(
                                'required' => '%s harus diisi.',
                                'min_length' => '%s minimal terdiri dari 10 karakter.',
                                'max_length' => '%s maksimal terdiri dari 150 karakter.',
                              ),
                ),
        ),
);

 ?>
