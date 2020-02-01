<!--  -->

<?php
  // $members = object($members);
  // echo "<pre>";
  // print_r($members);
  // die();
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $heading ?> </h1>
            <button onclick="excel()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Excel Report</button>
          </div>

          <!-- Content Row -->
          <!-- <div class="row"> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Total Lapangan Terdaftar : <?php echo count($lapangan) ?> Lapang</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width='5%'>No</th>
                      <th width='25%'>Nama Lapang</th>
                      <th width='20%'>Jenis</th>
                      <th width='25%'>Harga</th>
                      <th width='12%'>Buka Jam</th>
                      <th width='12%'>Tutup Jam</th>
                      <th width='25%'>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;
                    if($lapangan != ''){
                      foreach ($lapangan as $lapang):
                        $no++;?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $lapang->nama ?></td>
                          <td><?php echo $lapang->jenis ?></td>
                          <td><?php echo $lapang->harga_sewa ?></td>
                          <td><?php echo $lapang->open_at ?></td>
                          <td><?php echo $lapang->close_at ?></td>
                          <td class="">
                            <a href=<?php echo current_url() . "/detail/{$lapang->username}" ?> class="btn-sm btn-primary my-1 text-decoration-none">Detail</a>
                            <a href=<?php echo current_url() . "/edit/{$lapang->username}" ?> class="btn-sm btn-info my-1 text-decoration-none">Ubah</a>
                          </td>
                        </tr>
                      <?php endforeach;
                    }else {
                      'No data';
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- </div> -->

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
  function confirm_delete(){
    var yakin = confirm("You are going to DELETE this data PERMANENTLY, are you sure ?");
    // if (yakin == true) {
    //   window.location.href = 'delete_url';
    // }
    return yakin;
  }
</script>
