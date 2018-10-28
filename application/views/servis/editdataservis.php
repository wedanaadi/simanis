<!-- modal -->
        <div class="modal fade" id="editdataservis" data-backdrop="static" data-keyboard="false" style="display:none;">
          <div class="modal-dialog modal-lg" style="height: 650px; overflow-y: auto;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Service</h4>
              </div>
              <form method="post" id="" action="<?php echo base_url('index.php/Servis/update') ?>" autocomplete="off" data-toggle="validator">
              <div class="modal-body">
                  <div class="box-body">
                    <div class="row" > <!-- baris 1 -->
                      <div class="col-md-6">
                          <div id ="baris1" class="form-group">
                              <label class="control-label">No Nota</label>
                              <input type="text" name="NoNota" name="NoNota" readonly="readonly"  class="form-control" required="required">
                              <span class="help-block with-errors"></span>
                          </div>
                      </div>
                      <div class="col-md-6 form-group">
                           <label class="control-label">ID Service</label>
                              <input type="text" name="IDService" readonly="readonly" id="" class="form-control" required>
                            <span class="help-block with-errors"></span>
                      </div>
                    </div> 
                    <div class="row" > <!-- baris 2 -->
                      <div class="col-md-6">
                          <div id ="baris1" class="form-group">
                              <label class="control-label">Karyawan</label>
                              <input type="text" name="Karyawan" name="Karyawan" readonly="readonly" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-6 form-group" style="margin-left">
                           <label class="control-label">Nama Barang</label>
                              <input type="text" name="NamaBarang" id="NamaBarang" class="form-control" required="required">
                            <span class="help-block with-errors"></span>
                      </div>
                    </div>
                    <div class="row" > <!-- baris 3 -->
                      <div class="col-md-6">
                          <div id="baris3" class="form-group">
                            <label>Tanggal</label>
                                <div class="input-group date">
                                  <div class="input-group-addon"> 
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                    <input type="text"   value="<?= date('d/m/Y') ?>" class="form-control pull-right" name= "Tanggal" id="Tanggal" readonly="readonly">
                                </div>
                          </div>
                      </div>
                      <div class="col-md-6 form-group" style="margin-left">
                           <label class="control-label">Serial Number</label>
                              <input type="text" name="SerialNumber" id="SerialNumber" class="form-control" required="required">
                            <span class="help-block with-errors"></span>
                      </div>
                    </div>
                    <div class="row" > <!-- baris 4 -->
                      <div class="col-md-6">
                           <label class="control-label">Nama Customer</label>
                              <input type="text" name="NamaCustomer" id="NamaCustomer" class="form-control" required="required" readonly="readonly">
                            <span class="help-block with-errors"></span>
                      </div>
                      <div class="col-md-6 form-group" style="margin-left">
                           <label class="control-label">Kelengkapan</label>
                              <input type="text" name="Kelengkapan" id="Kelengkapan" class="form-control" required="required">
                            <span class="help-block with-errors"></span>
                      </div>
                    </div>
                    <div class="row" > <!-- baris 5 -->
                      <div class="col-md-6">
                          <div id ="baris1" class="form-group">
                              <label class="control-label">No Telepon</label>
                              <input type="text" name="NoTelepon" id="NoTelepon" readonly="readonly" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-6 form-group" style="margin-left">
                           <label class="control-label">Keluhan</label>
                              <input type="text" name="Keluhan" id="Keluhan" class="form-control" required="required">
                              <input type="hidden" name="Kondisi" id="Kondisi" readonly="readonly" class="form-control">
                            <span class="help-block with-errors"></span>
                      </div>
                    </div>
                    <div class="row" > <!-- baris 6 -->
                      <div class="col-md-6">
                          <div id ="baris1" class="form-group">
                              <label class="control-label">Alamat</label>
                              <input type="text" name="Alamat" id="Alamat" readonly="readonly" class="form-control">
                          </div>
                      </div>
                       <div class="col-xs-6">
                          <div class="form-group">
                            <label class="control-label">Kategori</label>
                              <select style="width:100%; border-radius: 0" class="form-control" id="Kategori" name="Kategori" required="required">
                                <option value="" disabled="disabled" hidden="hidden"> --Pilih Kategori-- 
                                </option>
                                <?php foreach ( $kategori as $s ): ?>
                                  <option value="<?php echo $s->id_kategori ?>"> <?php echo $s->nama_kategori ?> </option> 
                                <?php endforeach;?>
                              </select>
                              <span class="help-block with-errors"></span>
                          </div>
                       </div>
                    </div>
                    <div class="row" > <!-- baris 7 -->
                       <div class="col-xs-6">
                          <div class="form-group">
                            <label class="control-label">Teknisi</label>
                              <select style="width:100%; border-radius: 0" class="form-control" id="Teknisi" name="Teknisi" required="required">
                                <option value="" disabled="disabled" hidden="hidden"> --Pilih Teknisi-- 
                                </option>
                                <?php foreach ( $teknisi as $k ): ?>
                                  <option value="<?php echo $k->id_karyawan?>"> <?php echo $k->nama_karyawan ?> 
                                  </option>
                                <?php endforeach;?>
                              </select>
                              <span class="help-block with-errors"></span>
                          </div>
                       </div>
                       <div class="col-xs-6">
                          <div class="form-group">
                            <label class="control-label">Status Service</label>
                              <select style="width:100%; border-radius: 0" class="form-control" id="Status" name="Status" required="required">
                                <option value="" disabled="disabled" hidden=""> --Pilih Status Service-- 
                                </option>
                                <?php foreach ( $status as $j ): ?>
                                  <option value="<?php echo $j->id_status?>"> <?php echo $j->status_service ?> 
                                  </option>
                                <?php endforeach;?>
                              </select>
                              <span class="help-block with-errors"></span>
                          </div>
                       </div>
                    </div>             
                    <div class="box-footer">
                        <button type="submit" id="Simpan" id="Simpan" class="save btn btn-info pull-right fa fa-save" > Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>

  
<script type="text/javascript">
  $(function () {
    $("#TbJasa").DataTable();
  });
</script>

<!-- <script type="text/javascript">
  $('#Teknisi').select2();
  $('#Kategori').select2();
  $('#Status').select2();
</script> -->