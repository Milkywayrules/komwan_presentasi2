
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ringkes.in 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href=<?php echo base_url("logout") ?>>Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- END LOGOUT MODEL -->
  <!-- Hapus data Modal-->
  <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin hapus data?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan "Hapus" dibawah jika kamu yakin ingin hapus data dengan username : <?php echo "@{$user->username}" ?> ?</div>
        <div class="modal-footer">
          <a class="btn btn-danger" href=<?php echo base_url("") ?>>Hapus</a>
          <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END HAPUS DATA MODEL -->

  <!-- sweetalert modal notification -->
  <?php if ($this->session->flashdata('success_message')): ?>
    <script>
    swal({
      title: "<?php echo $this->session->title; ?>",
      text: "<?php echo $this->session->text; ?>",
      timer: 3000,
      button: false,
      icon: 'success'
    });
    </script>
  <?php endif; ?>
  <?php if ($this->session->flashdata('failed_message')): ?>
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
  <!-- sweetalert end -->

  <!-- Bootstrap core JavaScript-->
  <script src=<?php echo base_url("assets/template/sbadmin/vendor/jquery/jquery.min.js"); ?>></script>
  <script src=<?php echo base_url("assets/template/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"); ?>></script>

  <!-- Core plugin JavaScript-->
  <script src=<?php echo base_url("assets/template/sbadmin/vendor/jquery-easing/jquery.easing.min.js"); ?>></script>

  <!-- Custom scripts for all pages-->
  <script src=<?php echo base_url("assets/template/sbadmin/js/sb-admin-2.min.js"); ?>></script>

  <?php if ( isset($chart) ): ?>
    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/template/sbadmin/vendor/chart.js/Chart.min.js')?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/template/sbadmin/js/demo/chart-area-demo.js')?>"></script>
    <script src="<?php echo base_url('assets/template/sbadmin/js/demo/chart-pie-demo.js')?>"></script>
  <?php endif; ?>

  <?php if ( isset($dataTables) ): ?>
    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/template/sbadmin/vendor/datatables/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/template/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/template/sbadmin/js/demo/datatables-demo.js')?>"></script>
  <?php endif; ?>

</body>

</html>
