<!-- modal -->
        <div class="modal fade" id="datacustomer" data-backdrop="static" data-keyboard="false" style="display:none;">
          <div class="modal-dialog modal-lg" style="height: 600px; overflow-y: auto;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Customer</h4>
              </div>
              <div class="modal-body">
              	<div class="table-responsive">
                    <table id="tbcustomer" class="table table-bordered table-striped">
                       <thead>
                           <tr>
      			                    <th>No</th>
      			                    <th>ID Customer</th>
      			                    <th>Nama</th>
      			                    <th>Nomer Telepon</th>
      			                    <th>Alamat</th>
      			                    <th>Email</th>
      			                    <th>Action</th>
                           </tr>
                        </thead>
                          <?php 
                            $no = 1;
                            foreach ($customer as $cus) {
                          ?>
                            <tr class='odd gradeX context' >
                                <td><?php echo $no; ?> </td>
                                <td class="IdCustomer"><?php echo $cus->id_customer ?></td>
                                <td class="NamaCustomer" ><?php echo $cus->nama_customer?></td>
                                <td class="NoTlpCus"><?php echo $cus->notlp_cus?></td>
                                <td class="AlamatCus"><?php echo $cus->alamat_cus?></td>
                                <td class="EmailCus"><?php echo $cus->email_cus?></td>
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
    $("#tbcustomer").DataTable();
  });
  </script>

<script type="text/javascript">
  $('.pilih').on('click',function(){
      $('.help-block').text('');
      $('.form-group').removeClass('has-error');
      var IdCustomer=$(this).closest('tr').children('td.IdCustomer').text();
      var NamaCustomer =$(this).closest('tr').children('td.NamaCustomer').text();
      var NoTlpCus =$(this).closest('tr').children('td.NoTlpCus').text();
      var AlamatCus =$(this).closest('tr').children('td.AlamatCus').text();
      var datacustomer = $('#datacustomer');
      
        $('#IdCustomer').val(IdCustomer);
        $('#NamaCustomer').val(NamaCustomer);
        $('#notelp').val(NoTlpCus);
        $('#alamat').val(AlamatCus);
        panggil();
        datacustomer.modal('hide');   
  });
</script>