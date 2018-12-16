<!-- modal -->
        <div class="modal fade" id="ubahkaryawan" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Karyawan</h4>
              </div>
              <div class="modal-body">
                <!-- form -->
                <form id="form" class="form-horizontal" data-toggle="validator" action="<?php echo base_url('index.php/karyawan/update') ?>" method="post" autocomplete="off">
              <div class="box-body">


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="id" id="id" readonly>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" placeholder = "masukan nama" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
                      <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Hak Akses</label>
                    <div class="col-sm-4">
                      <select class="form-control" required oninvalid="this.setCustomValidity('Pilih Hak Akses')" oninput="setCustomValidity()" id="hakakses" name="akses">
                        <option value="" selected="" disabled="" hidden=""> --Pilih Hak Akses-- </option>
                        <?php foreach ( $akses as $k ): ?>
                          <option value="<?php echo $k->id_hakakses?>"> <?php echo $k->hak_akses ?> </option>
                        <?php endforeach;?>
                      </select>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">No. Telp</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tlp" placeholder = "masukan nomer telepon" required oninvalid="this.setCustomValidity('Masukan Nomer Telepon')" oninput="setCustomValidity('')" onkeypress="return hanyaAngka(event)">
                      <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Alamat</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3" style="resize: vertical;" name="alamat"  placeholder = "masukan alamat" required oninvalid="this.setCustomValidity('Masukan Alamat')" oninput="setCustomValidity('')"></textarea>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" readonly="readonly" name="username" placeholder = "masukan username" required oninvalid="this.setCustomValidity('Masukan Nomer Username')" oninput="setCustomValidity('')">
                    <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="pass" placeholder = "masukan password" required oninvalid="this.setCustomValidity('Masukan Nomer Password')" oninput="setCustomValidity('')">
                    <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email"  placeholder = "masukan email" required oninvalid="this.setCustomValidity('Masukan Email')" oninput="setCustomValidity('')">
                    <span class="help-block with-errors"></span>
                    </div>
                </div>

                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right fa fa-save" > Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  <script>
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
  </script>