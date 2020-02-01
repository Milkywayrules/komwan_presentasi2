<div class="row">
    <div class="col-lg-12">
        <div class="block">
            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><?php echo $heading ?></a>
                </li>
            </ul>

            <div class="block-content tab-content pb-30">
              <div class="tab-pane active" id="info-umum" role="tabpanel">
                  <div class="row justify-content-center">
                      <div class="col-7 col-sm-6 col-md-5 col-lg-6 my-5">
                          <form method="post">
                              <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >Username</label>
                                  <div class="col-lg-8">
                                      <input type="text" id="username" class="form-control <?php if(form_error('username') !== ''){ echo 'is-invalid'; } ?>" name="username" value="<?php echo $this->session->userdata('username'); ?>"  placeholder="username" disabled>
                                      <div class="form-text text-danger"><?php echo form_error('username') ?></div>
                                      <sup>Username tidak bisa diubah</sup>
                                  </div>
                              </div>
                               <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >E-mail</label>
                                  <div class="col-lg-8">
                                      <input type="email" id="email" class="form-control <?php if(form_error('email') !== ''){ echo 'is-invalid'; } ?>" name="email" value="<?php echo $this->session->userdata('email'); ?>"  placeholder="E-mail" >
                                      <div class="form-text text-danger"><?php echo form_error('email') ?></div>
                                  </div>
                              </div>
                              <!-- <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Full Name</label>
                                <div class="col-lg-8">
                                  <input type="text" id="nama" class="form-control <?php if(form_error('nama') !== ''){ echo 'is-invalid'; } ?>" name="nama" value="<?php echo $this->session->userdata('name'); ?>"  placeholder="Full Name" >
                                  <div class="form-text text-danger"><?php echo form_error('nama') ?></div>
                                </div>
                              </div> -->
                              <div class="row justify-content-center">
                                  <div class="col-lg-12">
                                      <button type="submit" class="btn btn-success text-black btn-lg btn-block" >Simpan</button>
                                  </div>
                              </div>
                          </form>
                      </div>
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
