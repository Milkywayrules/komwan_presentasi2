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
  <link href=<?php echo base_url("assets/template/sbadmin/vendor/fontawesome-free/css/all.min.css"); ?> rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href=<?php echo base_url("assets/template/sbadmin/css/sb-admin-2.min.css"); ?> rel="stylesheet">

  <!-- Codebase Core JS -->
  <!-- <script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/core/bootstrap.bundle.min.js"></script> -->
  <script src=<?php echo base_url('assets/js/plugins/sweetalert2/sweetalert.min.js') ?>></script>

  <?php if ( isset($dataTables) ): ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo base_url('assets/template/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
  <?php endif; ?>



</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

<!-- ===============================================BEGIN OF LEFT NAVBAR=============================================== -->
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- ===============================================TULISAN JUDUL POJOK KIRI ATAS=============================================== -->
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> <?php echo $sidebarBrand ?> </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
<!-- ===============================================DASHBOARD=============================================== -->
      <!-- Nav Item - Dashboard -->
      <li class="nav-item  <?php if ($active == 'dashboard') { echo "active"; } ?>">
        <a class="nav-link" href=<?php echo base_url("{$tipeAkun}") ?>>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
<!-- ===============================================TAMBAH DATA=============================================== -->
      <!-- Heading -->
      <div class="sidebar-heading">
        Tambah
      </div>

      <!-- Nav Item - Add Member -->
      <li class="nav-item <?php if ($active == 'add_member') { echo "active"; } ?>">
        <a class="nav-link" href=<?php echo base_url("{$tipeAkun}/add-member") ?>>
          <i class="fas fa-fw fa-info-circle"></i>
          <span>Add Member</span></a>
      </li>

      <!-- Nav Item - Add Provider -->
      <li class="nav-item <?php if ($active == 'add_provider') { echo "active"; } ?>">
        <a class="nav-link" href=<?php echo base_url("{$tipeAkun}/add-provider") ?>>
          <i class="fas fa-fw fa-info-circle"></i>
          <span>Add Provider</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
<!-- ===============================================TAMPILKAN DATA=============================================== -->
      <!-- Heading -->
      <div class="sidebar-heading">
        Tampilkan
      </div>

      <!-- Nav Item - Data Member -->
      <li class="nav-item <?php if ($active == 'data_member') { echo "active"; } ?>">
        <a class="nav-link" href=<?php echo base_url("{$tipeAkun}/data-member") ?>>
          <i class="fas fa-fw fa-info-circle"></i>
          <span>Data Member</span></a>
        </li>

      <!-- Nav Item - Data Provider -->
      <li class="nav-item <?php if ($active == 'data_provider') { echo "active"; } ?>">
        <a class="nav-link" href=<?php echo base_url("{$tipeAkun}/data-provider") ?>>
          <i class="fas fa-fw fa-info-circle"></i>
          <span>Data Provider</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
<!-- ===============================================END OF LEFT NAVBAR=============================================== -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
<!-- ===============================================MENU POJOK KANAN ATAS=============================================== -->
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo 'Bonjour, <b>' . $this->session->userdata('username') . '</b>'; ?></span>
                <!-- AMBIL GAMBAR FOTO PROFIL SESUAI AKUN LOGIN -->
                <?php if ($this->session->userdata('privilege') == 'member'): ?>
                  <img class="img-profile rounded-circle" src=<?php echo base_url("assets/img/{$this->session->userdata('privilege')}/foto_profil/{$this->session->userdata('foto_profil')}") ?>>
                <?php endif; ?>
                <?php if ($this->session->userdata('privilege') == 'provider'): ?>
                  <img class="img-profile rounded-circle" src=<?php echo base_url("assets/img/{$this->session->userdata('privilege')}/logo/{$this->session->userdata('logo')}") ?>>
                <?php endif; ?>
                <?php if ($this->session->userdata('privilege') == 'superadmin'): ?>
                  <img class="img-profile rounded-circle" src=<?php echo base_url("assets/img/{$this->session->userdata('privilege')}/foto_profil/1.png") ?>>
                <?php endif; ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href=<?php echo base_url("") ?>>
                  <i class="fas fa-ethernet fa-sm fa-fw mr-2 text-gray-400"></i>
                  Halaman Utama
                </a>
                <a class="dropdown-item" href=<?php echo base_url("{$tipeAkun}/profil") ?>>
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href=<?php echo base_url("{$tipeAkun}/ubah-password") ?>>
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ubah Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href=<?php echo base_url('logout') ?> data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
<!-- ===============================================END OF V_HEADER=============================================== -->
