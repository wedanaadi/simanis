<!-- modal -->
        <div class="modal fade" id="datajasa" data-backdrop="static" data-keyboard="false" style="display:none;">
          <div class="modal-dialog modal-lg" style="height: 600px; overflow-y: auto;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Jasa</h4>
              </div>
              <div class="modal-body">
              	<div class="table-responsive">
                    <table id="TbJasa" class="table table-bordered table-striped">
                       <thead>
                           <tr>
      			                    <th>No</th>
      			                    <th>ID Jasa</th>
      			                    <th>Nama Jasa</th>
      			                    <th>Harga Jasa</th>
      			                    <th>Action</th>
                           </tr>
                        </thead>
                          <!-- data -->
                          <?php 
                            $no = 1;
                            foreach ($jasa as $j) {
                          ?>
                            <tr class='odd gradeX context' >
                                <td><?php echo $no; ?> </td>
                                <td class="IdJasa"><?php echo $j->id_jasa ?></td>
                                <td class="NamaJasa" ><?php echo $j->nama_jasa?></td>
                                <td class="HargaJasa"><?php echo /*number_format($j->harga_jasa,2,".",".") */$j->harga_jasa ?></td>
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
    $("#TbJasa").DataTable();
  });
</script>

<script type="text/javascript">
  $('.pilih').on('click',function(){
      $('.help-block').text('');
      $('.form-group').removeClass('has-error');
      var IdJasa=$(this).closest('tr').children('td.IdJasa').text();
      var NamaJasa =$(this).closest('tr').children('td.NamaJasa').text();
      var HargaJasa =$(this).closest('tr').children('td.HargaJasa').text();
      var datajasa = $('#datajasa');
      
        $('#IdJasa').val(IdJasa);
        $('#NamaJasa').val(NamaJasa);
        if($('#Garansi').val() == 1){
          $('#HargaJasa').val(0);
        }
        else
        {
          $('#HargaJasa').val(HargaJasa);
        }
        panggil();
        datajasa.modal('hide');   
  });
</script>
