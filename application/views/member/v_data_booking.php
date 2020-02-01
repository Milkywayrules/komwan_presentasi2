<!--  -->

<?php
  // $bookings = object($bookings);
  // echo "<pre>";
  // print_r($bookings);
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
              <h6 class="m-0 font-weight-bold text-primary">Daftar Booking Lapangan : <?php echo count($bookings) ?> Bookingan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width='5%'>No</th>
                      <th width='5%'>ID</th>
                      <th width='17%'>Atas Nama</th>
                      <th width='20%'>Tangal Booking</th>
                      <th width='15%'>Jam Mulai</th>
                      <th width='23%'>Jam Selesai</th>
                      <th width='12%'>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 0;
                    if($bookings != ''){
                      foreach ($bookings as $booking):
                        $no++;?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $booking->id ?></td>
                          <td><?php echo $booking->atas_nama ?></td>
                          <td><?php echo $booking->tanggal_booking ?></td>
                          <td><?php echo $booking->start_at ?></td>
                          <td><?php echo $booking->end_at ?></td>
                          <td class="">
                            <a href=<?php echo current_url() . "/detail/{$booking->username}" ?> class="btn-sm btn-primary my-1 text-decoration-none">Detail</a>
                            <a href=<?php echo current_url() . "/edit/{$booking->username}" ?> class="btn-sm btn-info my-1 text-decoration-none">Ubah</a>
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
