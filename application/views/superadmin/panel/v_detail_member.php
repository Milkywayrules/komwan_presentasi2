<!--  -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $heading ?></h1>
          </div>

          <div class="row justify-content-center">

            <div class="col-lg-10">

              <!-- Dropdown Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Informasi Dasar Member</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                        <div class="row justify-content-center py-3 px-5">
                          <img src=<?php echo base_url("assets/img/member/foto_profil/{$user->foto_profil}") ?> alt="Avatar" width="150px">
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <table>
                        <tbody>
                          <tr>
                            <td>Nama</td>
                            <td width='10%' class="text-center">:</td>
                            <td> <?php echo $user->nama ?> </td>
                          </tr>
                          <tr>
                            <td>Username</td>
                            <td class="text-center">:</td>
                            <td> <?php echo "@{$user->username}" ?> </td>
                          </tr>
                          <tr>
                            <td>E-mail</td>
                            <td class="text-center">:</td>
                            <td> <?php echo $user->email ?> </td>
                          </tr>
                          <tr>
                            <td>No Telepon</td>
                            <td class="text-center">:</td>
                            <td> <?php echo $user->no_telepon ?> </td>
                          </tr>
                          <tr>
                            <td>Alamat</td>
                            <td class="text-center">:</td>
                            <td> <?php echo $user->alamat ?> </td>
                          </tr>
                          <tr>
                            <td>Status</td>
                            <td class="text-center">:</td>
                            <td> <?php echo $user->privilege ?> </td>
                          </tr>
                          <tr>
                            <td>Akun aktif</td>
                            <td class="text-center">:</td>
                            <td> <i class="fa fa-<?php echo ($user->is_active==1)?('check'):('times'); ?> mt-2"></i> </td>
                          </tr>
                          <tr>
                            <td>Bergabung sejak</td>
                            <td class="text-center">:</td>
                            <td> <?php echo $user->created_at[0] ?> </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <hr>
                  <div class="row justify-content-center">
                    <a href=<?php echo base_url("{$this->session->userdata('privilege')}/data-member") ?> class="btn btn-secondary">Kembali</a>
                    <a href=<?php echo base_url("{$this->session->userdata('privilege')}/data-member/edit/{$user->username}") ?> class="btn btn-info mx-1">Ubah</a>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

<!--  -->

<script type="text/javascript">
  function excel(){
    location.href='<?php echo base_url('report/excel'); ?>';
  }
  function pdf(){
    location.href='<?php echo base_url('report/pdf'); ?>';
  }
</script>
