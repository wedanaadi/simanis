<!-- modal -->
        <div class="modal fade" id="ubahkategori" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Kategori Servis</h4>
              </div>
              <div class="modal-body">
                <!-- form -->
                <form id="form1" class="form-horizontal" data-toggle="validator" action="<?php echo base_url('index.php/kategori/update') ?>" method="post" autocomplete="off">
              <div class="box-body">


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="id" id="id" value="<?php echo $kodeotomatis ?>" readonly>
                    <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" placeholder = "masukan nama" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
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