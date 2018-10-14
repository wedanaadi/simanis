<!-- modal -->
        <div class="modal fade" id="ubahsuplayer" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Suplayer</h4>
              </div>
              <div class="modal-body">
                <!-- form -->
                <form id="form1" class="form-horizontal" data-toggle="validator" action="<?php echo base_url('index.php/suplayer/update') ?>" method="post">
              <div class="box-body">


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="id" id="id" value="<?php echo $kodeotomatis ?>" readonly>
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