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
                  <h6 class="m-0 font-weight-bold text-primary">Informasi Dasar Penyedia Lapangan</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#hapusModal">Hapus</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <!-- open form -->
                <form method="post">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3">
                        <div class="row justify-content-center py-3 px-5">
                          <img src=<?php echo base_url("assets/img/provider/logo/{$user->logo}") ?> alt="Futsal" width="150px">
                        </div>
                      </div>
                      <div class="col-lg-9">
                        <table>
                          <tbody>
                            <tr>
                              <td>Nama</td>
                              <td width='10%' class="text-center">:</td>
                              <td width='60%'> <input type="text" name="nama" value="<?php echo $user->nama ?>" class="form-control"> </td>
                            </tr>
                            <tr>
                              <td>E-mail</td>
                              <td class="text-center">:</td>
                              <td> <input type="text" name="email" value="<?php echo $user->email ?>" class="form-control"> </td>
                            </tr>
                            <tr>
                              <td>No Telepon</td>
                              <td class="text-center">:</td>
                              <td> <input type="text" name="no_telepon" value="<?php echo $user->no_telepon ?>" class="form-control"> </td>
                            </tr>
                            <tr>
                              <td>Alamat</td>
                              <td class="text-center">:</td>
                              <td> <textarea name="alamat" rows="2" cols="35" class="form-control"><?php echo $user->alamat ?></textarea> </td>
                            </tr>
                            <tr>
                              <td>Jumlah Lapangan</td>
                              <td class="text-center">:</td>
                              <td> <input type="text" name="jumlah_lapangan" value="<?php echo $user->jumlah_lapangan ?>" class="form-control" disabled> </td>
                            </tr>
                            <tr>
                              <td>Jam Buka</td>
                              <td class="text-center">:</td>
                              <td> <input type="time" name="openAt" class="form-control" value=<?php echo date('H:i', strtotime($user->open_at)) ?>>
                              </td>
                            </tr>
                            <tr>
                              <td>Jam Tutup</td>
                              <td class="text-center">:</td>
                              <td> <input type="time" name="closeAt" class="form-control" value=<?php echo date('H:i', strtotime($user->close_at)) ?>>
                              </td>
                            </tr>
                            <tr>
                              <td>Keterangan</td>
                              <td class="text-center">:</td>
                              <td> <textarea name="keterangan" rows="5" cols="35" class="form-control"><?php echo $user->keterangan ?></textarea> </td>
                            </tr>
                            <tr>
                              <td> <hr> </td><td> <hr> </td><td> <hr> </td>
                            </tr>
                            <tr>
                              <td>Username</td>
                              <td class="text-center">:</td>
                              <td> <input type="text" name="username" value="<?php echo "{$user->username}" ?>" class="form-control" readonly> </td>
                            </tr>
                            <tr>
                              <td>Akun aktif</td>
                              <td class="text-center">:</td>
                              <td>
                                <div class="btn-group btn-group-toggle my-1" data-toggle="buttons">
                                  <label class="btn btn-sm btn-<?php echo ($user->is_active==0)?('danger active'):('secondary '); ?>">
                                    <input type="radio" name="statusAkun" id="option2" autocomplete="off"> <i class="fa fa-times my-1 mx-2"></i>
                                  </label>
                                  <label class="btn btn-sm btn-<?php echo ($user->is_active==1)?('success active'):('secondary'); ?>">
                                    <input type="radio" name="statusAkun" id="option1" autocomplete="off"> <i class="fa fa-check my-1 mx-2"></i>
                                  </label>
                                </div>
                              </td>
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
                      <a href=<?php echo base_url("{$this->session->userdata('privilege')}/data-provider") ?> class="btn btn-secondary">Kembali</a>
                      <button type="submit" class="btn btn-success mx-1" >Simpan</button>
                    </div>
                  </div>
                </form>
                <!-- close form -->
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
