<!-- modal -->
        <div class="modal fade" id="ubahsparepart" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Sparepart</h4>
              </div>
              <div class="modal-body">
                <!-- form -->
                <form id="form1" class="form-horizontal" data-toggle="validator" action="<?php echo base_url('index.php/sparepart/update') ?>" method="post" autocomplete="off">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="id" id="id" value="<?php echo $kodeotomatis ?>" readonly>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Suplayer</label>
                    <div class="col-sm-4">
                      <select class="form-control" required oninvalid="this.setCustomValidity('Pilih Suplayer')" oninput="setCustomValidity()" id="suplayer" name="suplayer">
                        <option selected="" hidden=""> --Pilih Suplayer-- </option>
                        <?php foreach ( $akses as $k ): ?>
                          <option value="<?php echo $k->id_suplayer?>"> <?php echo $k->nama_suplayer ?> </option> 
                        <?php endforeach;?>
                        <span class="help-block with-errors"></span>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" placeholder = "masukan nama sparepart" required oninvalid="this.setCustomValidity('Masukan Nama sparepart')" oninput="setCustomValidity('')">
                    <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Harga Pokok</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="pokok" id="pokok" placeholder = "masukan harga" required oninvalid="this.setCustomValidity('Masukan Harga')" oninput="setCustomValidity('')" onkeypress="return hanyaAngka(event)" onkeyup="sum();">
                    <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Harga Jual</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="jual" id="jual" placeholder = "0" required oninvalid="this.setCustomValidity('')" oninput="setCustomValidity('')" readonly onkeyup="sum();" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Stok</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="stok" placeholder = "masukan stok" required oninvalid="this.setCustomValidity('Masukan Jumlah Stok')" oninput="setCustomValidity('')" onkeypress="return hanyaAngka(event)">
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

  <script>
    function sum() {
        var a = document.getElementById('pokok').value;
        var hasil = parseFloat(a) + (parseFloat(a)*(10/100));
        if (!isNaN(hasil)) {
          document.getElementById('jual').value = hasil;
        } else  {
          document.getElementById('jual').value = 0;
        }
    }
  </script>