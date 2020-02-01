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
                      <div class="col-7 col-sm-6 my-5">
                          <!-- form open -->
                          <form method="post">
                              <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >Username <sup>*</sup> </label>
                                  <div class="col-lg-8">
                                      <input type="text" id="username" class="form-control <?php if(form_error('username') !== ''){ echo 'is-invalid'; } ?>" name="username" placeholder="Username" required autofocus>
                                      <div class="form-text text-danger"><?php echo form_error('username') ?></div>
                                  </div>
                              </div>
                               <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >E-mail <sup>*</sup> </label>
                                  <div class="col-lg-8">
                                      <input type="email" id="email" class="form-control <?php if(form_error('email') !== ''){ echo 'is-invalid'; } ?>" name="email" placeholder="E-mail" required>
                                      <div class="form-text text-danger"><?php echo form_error('email') ?></div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Password <sup>*</sup> </label>
                                <div class="col-lg-8">
                                  <input type="password" id="password" class="form-control <?php if(form_error('password') !== ''){ echo 'is-invalid'; } ?>" name="password" placeholder="Password" required>
                                  <div class="form-text text-danger"><?php echo form_error('password') ?></div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Ulang Password <sup>*</sup> </label>
                                <div class="col-lg-8">
                                  <input type="password" id="passwordUlang" class="form-control <?php if(form_error('passwordUlang') !== ''){ echo 'is-invalid'; } ?>" name="passwordUlang" placeholder="Ulangi Password" required>
                                  <div class="form-text text-danger"><?php echo form_error('passwordUlang') ?></div>
                                </div>
                              </div>
                              <hr>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Nama Lengkap <sup>*</sup> </label>
                                <div class="col-lg-8">
                                  <input type="text" id="nama" class="form-control <?php if(form_error('nama') !== ''){ echo 'is-invalid'; } ?>" name="nama" placeholder="Nama Lengkap" required>
                                  <div class="form-text text-danger"><?php echo form_error('nama') ?></div>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Nomor Telepon </label>
                                <div class="col-lg-8">
                                  <input type="text" id="telepon" class="form-control <?php if(form_error('telepon') !== ''){ echo 'is-invalid'; } ?>" name="telepon" placeholder="Nomor Telepon">
                                  <div class="form-text text-danger"><?php echo form_error('telepon') ?></div>
                                </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >Alamat </label>
                                  <div class="col-lg-8">
                                      <input type="text" id="alamat" class="form-control <?php if(form_error('alamat') !== ''){ echo 'is-invalid'; } ?>" name="alamat" placeholder="Alamat Sekarang">
                                      <div class="form-text text-danger"><?php echo form_error('alamat') ?></div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Privilege <sup>*</sup> </label>
                                <div class="col-lg-8">
                                  <select id="privilege" class="form-control <?php if(form_error('privilege') !== ''){ echo 'is-invalid'; } ?>" name="privilege" readonly>
                                    <option value="member"> Member </option>
                                  </select>
                                  <div class="form-text text-danger"><?php echo form_error('privilege') ?></div>
                                </div>
                              </div>
                              <div class="row justify-content-center">
                                <div class="col-lg-12">
                                  <button type="submit" class="btn btn-success text-black btn-lg btn-block" ><?php echo $heading ?></button>
                                </div>
                              </div>
                          </form>
                          <!-- form close -->
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
