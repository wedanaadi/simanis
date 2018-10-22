<!-- modal -->
        <div class="modal fade" id="datasparepart" data-backdrop="static" data-keyboard="false" style="display:none;">
          <div class="modal-dialog modal-lg" style="height: 600px; overflow-y: auto;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Sparepart</h4>
              </div>
              <div class="modal-body">
              	<div class="table-responsive">
                    <table id="TbSparepart" class="table table-bordered table-striped">
                       <thead>
                           <tr>
      			                    <th>No</th>
      			                    <th>ID Sparepart</th>
      			                    <th>Suplayer</th>
      			                    <th>Nama Sparepart</th>
      			                    <th>Harga Jual</th>
      			                    <th>Stok</th>
      			                    <th>Action</th>
                           </tr>
                        </thead>
                          <!-- data -->
                        <?php 
                            $no = 1;
                            foreach ($sparepart as $s) {
                          ?>
                            <tr class='odd gradeX context' >
                          <td><?php echo $no; ?> </td>
                          <td><?php echo $s->id_sparepart ?></td>
                          <td><?php echo $s->nama_suplayer ?></td>
                          <td><?php echo $s->nama_sparepart?></td>
                          <td><?php echo "Rp. ".number_format($s->harga_jual,2,",",",") ?></td>
                          <td><?php echo $s->jumlah_stok?></td>
                          <td align="center">
                              <a class="btn btn-primary btn-xs pilih"><i class="fa fa-plus-circle"></i> Tambah</a>
                          </td>
                          </tr>
                          <?php 
                          $no++;
                          }
                          ?>
                     <tbody id="mytbody"></tbody>
                    </table>
                </div>    
              </div>
          </div>
      </div>
  </div>

  
  <script type="text/javascript">
  $(function () {
    $("#TbSparepart").DataTable();
  });
  </script>
