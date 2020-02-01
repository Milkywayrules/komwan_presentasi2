<div class="row">
  <div class="col-lg-12">
    <div class="block">
      <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="#"><?php echo $heading ?></a>
        </li>
      </ul>

      <div class="tab-pane" id="ubahPassword" role="tabpanel">
        <div class="row justify-content-center">
          <div class="col-7 col-sm-6 col-md-5 col-lg-6 my-5">
            <form class="validasi-ubah-sandi" method="post">
              <input hidden type="email" name="email" value="<?= '$email';?>">
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" >Password Lama</label>
                <div class="col-lg-8">
                  <input type="password" id="passwordLama" class="form-control <?php if(form_error('passwordLama') !== ''){ echo 'is-invalid'; } ?>" name="passwordLama"  placeholder="Password Lama">
                  <div class="form-text text-danger"><?php echo form_error('passwordLama') ?></div>
                </div>
              </div>
               <div class="form-group row">
                <label class="col-lg-4 col-form-label" >Password Baru</label>
                <div class="col-lg-8">
                  <input type="password" id="passwordBaru" class="form-control <?php if(form_error('passwordBaru') !== ''){ echo 'is-invalid'; } ?>" name="passwordBaru" placeholder="Password Baru">
                  <div class="form-text text-danger"><?php echo form_error('passwordBaru') ?></div>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-4 col-form-label" >Ulangi Password Baru</label>
                <div class="col-lg-8">
                  <input type="password" id="passwordUlang" class="form-control <?php if(form_error('passwordUlang') !== ''){ echo 'is-invalid'; } ?>" name="passwordUlang" placeholder="Ulangi Password Baru">
                  <div class="form-text text-danger"><?php echo form_error('passwordUlang') ?></div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg-12">
                  <button type="submit" class="btn btn-success text-black btn-lg btn-block"><?php echo $heading ?></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<!-- <script type="text/javascript">
var url = document.location.toString();
if (url.match('#')) {
  $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
}

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
  window.location.hash = e.target.hash;
})
</script> -->
