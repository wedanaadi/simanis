<!-- modal -->
        <div class="modal fade" id="tambahsparepart" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Sparepart</h4>
              </div>
              <div class="modal-body">
                <!-- form -->
                <form id="form1" class="form-horizontal" action="<?php echo base_url('index.php/sparepart/sparepart_addDB') ?>" method="post">
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
                      <select class="form-control" required="required" oninput="this.setCustomValidity('Masukan Nama sparepart')" id="suplayer" name="suplayer" style="width: 100%;" style="text-align: left;">
                        <option selected="selected" disabled="" value=""> --Pilih Suplayer-- </option>
                        <?php foreach ( $akses as $k ): ?>
                          <option value="<?php echo $k->id_suplayer?>"> <?php echo $k->nama_suplayer ?> </option> 
                        <?php endforeach;?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama" placeholder = "masukan nama sparepart" required oninvalid="this.setCustomValidity('Masukan Nama sparepart')" oninput="setCustomValidity('')">
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align: left;">Harga Pokok</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="pokok" id="pokok" placeholder = "masukan harga" required oninvalid="this.setCustomValidity('Masukan Harga')" oninput="setCustomValidity('')" onkeypress="return hanyaAngka(event)" onkeyup="sum();">
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
                      <input type="text" class="form-control" name="stok" placeholder = "masukan stok" required oninvalid="this.setCustomValidity('Masukan Jumlah Stok')" oninput="setCustomValidity('')">
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

<script type="text/javascript">
  $('#suplayer').select2();
</script>