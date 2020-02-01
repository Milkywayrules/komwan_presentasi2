<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href=<?php echo base_url("assets/img/icontab/futsal2.png") ?>>

  <title> <?php echo $tabTitle ?> - Futsalbandung.com </title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/template/sbadmin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/template/sbadmin/css/sb-admin-2.min.css') ?>" rel="stylesheet">

  <!-- Codebase Core JS -->
  <!-- <script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/core/bootstrap.bundle.min.js"></script> -->
  <script src=<?php echo base_url('assets/js/plugins/sweetalert2/sweetalert.min.js') ?>></script>

</head>

<body style="min-height:100vh; min-width:100vh;" class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-7 col-md-9 col-sm-12 col-8">
        <div class="my-4 col-sm-2 col-2 mx-auto">
          <a href="<?php echo base_url() ?>"><img src=<?php echo base_url("assets/img/icontab/futsal2.png") ?> alt="" width="100%" align='center'></a>
        </div>
        <div class="card o-hidden border-0 shadow-lg my-3">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Buat akun baru!</h1>
                  </div>

                  <!-- buka form -->
                  <form class="user" method="post">
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user <?php if(form_error('nama') !== ''){ echo 'is-invalid'; } ?>" id="inputNama" placeholder="Nama Lengkap" name="nama" autofocus>
                        <div class="form-text text-danger"><?php echo form_error('nama') ?></div>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user <?php if(form_error('telepon') !== ''){ echo 'is-invalid'; } ?>" id="inputTelepon" placeholder="No Telelon" name="telepon" required>
                        <div class="form-text text-danger"><?php echo form_error('telepon') ?></div>
                      </div>
                    </div>
                    <!--  -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user <?php if(form_error('username') !== ''){ echo 'is-invalid'; } ?>" id="inputUsername" placeholder="Username" name="username">
                        <div class="form-text text-danger"><?php echo form_error('username') ?></div>
                      </div>
                      <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user <?php if(form_error('email') !== ''){ echo 'is-invalid'; } ?>" id="inputEmail" placeholder="E-mail" name="email">
                        <div class="form-text text-danger"><?php echo form_error('email') ?></div>
                      </div>
                    </div>
                    <!--  -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user <?php if(form_error('password') !== ''){ echo 'is-invalid'; } ?>" id="inputPassword" placeholder="Password" name="password">
                        <div class="form-text text-danger"><?php echo form_error('password') ?></div>
                      </div>
                      <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user <?php if(form_error('passwordUlang') !== ''){ echo 'is-invalid'; } ?>" id="inputPasswordUlang" placeholder="Ulangi Password" name="passwordUlang">
                        <div class="form-text text-danger"><?php echo form_error('passwordUlang') ?></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user <?php if(form_error('alamat') !== ''){ echo 'is-invalid'; } ?>" id="inputAlamat" placeholder="Alamat Sekarang" name="alamat" required>
                      <div class="form-text text-danger"><?php echo form_error('alamat') ?></div>
                    </div>
                    <!--  -->
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="submitDaftar">
                      Daftar Akun
                    </button>
                  </form>
                  <!-- tutup form -->

                  <hr>
                  <div class="text-center">
                    <a class="small" href=<?php echo base_url("lupa-password") ?>>Lupa password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href=<?php echo base_url("login") ?>>Sudah punya akun? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div> <!-- end of container (v_header) -->

  <?php if ($this->session->userdata('success_message')): ?>
    <script>
    swal({
      title: "<?php echo $this->session->userdata('title'); ?>",
      text: "<?php echo $this->session->userdata('text'); ?>",
      timer: 3000,
      button: false,
      icon: 'success'
    });
    </script>
  <?php endif; ?>
  <?php if ($this->session->userdata('failed_message')): ?>
    <script>
      swal({
         title: "<?php echo $this->session->title; ?>",
         text: "<?php echo $this->session->text; ?>",
         timer: 3000,
         button: false,
         icon: 'error'
      });
    </script>
  <?php endif; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/template/sbadmin/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/template/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/template/sbadmin/vendor/jquery-easing/jquery.easing.min.js')?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/template/sbadmin/js/sb-admin-2.min.js')?>"></script>

</body>

</html>
