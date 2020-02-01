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

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat akun baru!</h1>
              </div>

              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="inputNama" placeholder="Nama Lengkap">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="inputTelepon" placeholder="No Telelon">
                  </div>
                </div>
                <!--  -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="inputUsername" placeholder="Username">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="inputEmail" placeholder="E-mail">
                  </div>
                </div>
                <!--  -->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="inputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="inputPasswordUlang" placeholder="Ulangi Password">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="inputAlamat" placeholder="Alamat Sekarang">
                </div>
                <!--  -->
                <a href="login.html" class="btn btn-primary btn-user btn-block">
                  Daftar Akun
                </a>
              </form>

              <hr>
              <div class="text-center">
                <a class="small" href=<?php echo base_url("reset-password") ?>>Lupa password?</a>
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
