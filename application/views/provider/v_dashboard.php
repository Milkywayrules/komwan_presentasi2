<!--  -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $heading ?></h1>
            <button onclick="excel()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Excel Report</button>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- TOTAL PENYEDIA LAPANGAN -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url("{$tipeAkun}/data-provider") ?>" style="text-decoration:none">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penyedia Lapangan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "{$totProvider}" ?> Provider</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
            </div>

            <!-- TOTAL LAPANGAN TERDAFTAR -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="<?php echo base_url("{$tipeAkun}/data-provider") ?>" style="text-decoration:none">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Lapangan Terdaftar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "{$totLapangan}" ?> Lapangan</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- TOTAL MEMBER TERDAFTAR -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="<?php echo base_url("{$tipeAkun}/data-member") ?>" style="text-decoration:none">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Member Terdaftar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "{$totMember}" ?> Member</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
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
