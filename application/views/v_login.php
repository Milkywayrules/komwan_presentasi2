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

  <!-- google signin cred -->
  <meta name="google-signin-scope" content="profile email">
  <meta name="google-signin-client_id" content="670354732780-nnpm4nem6veihhj68sdk9oir8e51e27n.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>

</head>

<body style="min-height:100vh; min-width:100vh;" class="bg-gradient-primary">

  <div class="container">

<!--  -->

<!--  -->
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-4 col-lg-5 col-md-7 col-9">
        <div class="my-4 col-lg-3 col-sm-3 col-3 mx-auto">
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
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang <?php echo $tipeLogin ?> !</h1>
                  </div>

                  <?php echo form_open('', 'class="user"'); ?>
                    <div class="form-group">
                      <input name="emailUsername" type="text" class="form-control form-control-user" id="inputEmailUsername" aria-describedby="emailUsernameHelp" placeholder="E-Mail / Username" required autofocus>
                      <sup><?php echo form_error('emailUsername') ?></sup>
                    </div>
                    <div class="form-group">
                      <input name="password" type="password" class="form-control form-control-user" id="inputPassword" placeholder="Password" required>
                      <sup><?php echo form_error('password') ?></sup>
                    </div>
                    <div class="form-group">
                      <!-- <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div> -->
                      <br>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                    <!-- <hr>
                    <div class="g-signin2 d-flex justify-content-center" data-onsuccess="onSignIn" data-theme="dark"></div> -->
                    <!-- <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('lupa-password') ?>">Lupa password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('daftar') ?>">Buat akun sekarang!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        var id = profile.getId(); // Don't send this directly to your server!
        var name = profile.getName();
        var imageUrl = profile.getImageUrl();
        var email = profile.getEmail();

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;

        window.location.href = "?id=" + id + "&name=" + name + "&imageUrl=" + imageUrl + "&email=" + email + "&id_token=" + id_token + "&login=1";
      }
    </script>

    <?php

    if ( $this->input->get('login') ) {
      $login    = $this->input->get('login');
      $id       = $this->input->get('id');
      $name     = $this->input->get('name');
      $imageUrl = $this->input->get('imageUrl');
      $email    = $this->input->get('email');
      $idToken  = $this->input->get('id_token');

      die($idToken);
      redirect(base_url('u/dashboard'));
    }

     ?>

<!--  -->

<!--  -->

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
