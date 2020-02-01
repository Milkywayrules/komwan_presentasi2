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
                                  <label class="col-lg-4 col-form-label" >id <sup>*</sup> </label>
                                  <div class="col-lg-8">
                                      <input type="text" id="id" class="form-control <?php if(form_error('id') !== ''){ echo 'is-invalid'; } ?>" name="id" placeholder="id" required autofocus>
                                      <div class="form-text text-danger"><?php echo form_error('id') ?></div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Nama Lapang <sup>*</sup> </label>
                                <div class="col-lg-8">
                                  <input type="text" id="nama" class="form-control <?php if(form_error('nama') !== ''){ echo 'is-invalid'; } ?>" name="nama" placeholder="Nama Lapang" required>
                                  <div class="form-text text-danger"><?php echo form_error('nama') ?></div>
                                </div>
                              </div>
                               <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >Jenis <sup>*</sup> </label>
                                  <div class="col-lg-8">
                                      <input type="text" id="jenis" class="form-control <?php if(form_error('jenis') !== ''){ echo 'is-invalid'; } ?>" name="jenis" placeholder="Jenis Lapang" required>
                                      <div class="form-text text-danger"><?php echo form_error('jenis') ?></div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-lg-4 col-form-label" >Harga Sewa <sup>*</sup> </label>
                                <div class="col-lg-8">
                                  <input type="number" id="harga" class="form-control <?php if(form_error('harga') !== ''){ echo 'is-invalid'; } ?>" name="harga" placeholder="Harga / Jam">
                                  <div class="form-text text-danger"><?php echo form_error('harga') ?></div>
                                </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >Jam Buka <sup>*</sup> </label>
                                  <div class="col-lg-8">
                                      <input type="time" name="open_at" class="form-control" >
                                      <div class="form-text text-danger"><?php echo form_error('open_at') ?></div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >Jam Tutup <sup>*</sup> </label>
                                  <div class="col-lg-8">
                                      <input type="time" name="close_at" class="form-control" >
                                      <div class="form-text text-danger"><?php echo form_error('close_at') ?></div>
                                  </div>
                              </div>
                               <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >Keterangan <sup>*</sup> </label>
                                  <div class="col-lg-8">
                                      <input type="text" id="keterangan" class="form-control <?php if(form_error('keterangan') !== ''){ echo 'is-invalid'; } ?>" name="keterangan" placeholder="Keterangan" required>
                                      <div class="form-text text-danger"><?php echo form_error('keterangan') ?></div>
                                  </div>
                              </div>
                               <!-- <div class="form-group row">
                                  <label class="col-lg-4 col-form-label" >F <sup>*</sup> </label>
                                  <div class="col-lg-8">
                                      <input type="text" id="jenis" class="form-control <?php if(form_error('jenis') !== ''){ echo 'is-invalid'; } ?>" name="jenis" placeholder="Jenis Lapang" required>
                                      <div class="form-text text-danger"><?php echo form_error('jenis') ?></div>
                                  </div>
                              </div> -->
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
