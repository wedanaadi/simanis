<!-- modal -->
        <div class="modal fade" id="showdataservis" data-backdrop="static" data-keyboard="false" style="display:none;">
          <div class="modal-dialog modal-lg" style="height: 600px; overflow-y: auto;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Service</h4>
              </div>
              <div class="modal-body">
              	<div class="table-responsive">
                    <table id="TbService" class="table table-bordered table-striped" style="width: 100%">
                       <thead>
                           <tr>
                              <th>ID</th>
                              <th>No Nota</th>
                              <th>Nama Barang</th>
                              <th>SN</th>
                              <th>Status Service</th>
                              <th>Status barang</th>
                              <th>Action</th>
                              <th style="display: none;">nama_customer</th>
                              <th style="display: none;">tlpr</th>
                              <th style="display: none;">alamat</th>
                              <th style="display: none;">idcus</th>
                           </tr>
                        </thead>
                          <!-- data -->
                          <?php 
                            //$no = 1;
                            foreach ($dataservis as $s) {
                          ?>
                            <tr class='odd gradeX context' >
                                <td class="IdService"><?php echo $s->id_service ?></td>
                                <td class="IdPenerimaan" ><?php echo $s->id_penerimaan?></td>
                                <td class="NamaBarang"><?php echo $s->nama_barang?></td>
                                <td class="SN"><?php echo $s->sn_barang?></td>
                                <td class="Status"><?php echo $s->status_service?></td>
                                <td class="Garansi"><?php echo $s->nama_st?></td>
                                <td align="center"> 
                                    <a class="btn btn-primary btn-xs pilih"><i class="fa fa-plus-circle"></i> Tambah</a>
                                </td>
                                <td style="display: none;" class="nama_customer"><?php echo $s->nama_customer?></td>
                                <td style="display: none;" class="notlp_cus"><?php echo $s->notlp_cus?></td>
                                <td style="display: none;" class="alamat_cus"><?php echo $s->alamat_cus?></td>
                                <td style="display: none;" class="id_customer"><?php echo $s->id_customer?></td>
                            </tr>
                          <?php 
                          //$no++;
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
    $("#TbService").DataTable();
  });
  </script>


<script type="text/javascript">
  $('.pilih').on('click',function(){
      $('.help-block').text('');
      $('.form-group').removeClass('has-error');
      var IdService =$(this).closest('tr').children('td.IdService').text();
      var NamaCus =$(this).closest('tr').children('td.nama_customer').text();
      var TlpCus =$(this).closest('tr').children('td.notlp_cus').text();
      var AlamatCus =$(this).closest('tr').children('td.alamat_cus').text();
      var IdCustomer =$(this).closest('tr').children('td.id_customer').text();
      var showdataservis = $('#showdataservis');

      $('#NamaCustomer').val(NamaCus);
      $('#notelp').val(TlpCus);
      $('#alamat').val(AlamatCus);
      $('#IdCustomer').val(IdCustomer);

      console.log(IdService);
      $.ajax({
      url: "<?php echo site_url('Pengembalian/getservice') ?>",
      method: "GET",
      type: "JSON",
      data: {id_service: IdService},
      success: function(data)
      {
        var obj = JSON.parse(data);
        var Action = "<a class='btn btn-danger btn-xs Hapus' title='Remove Item'>  <span class=' fa  fa-minus-square' ></span> </a> "
        var t = $('#TbServis').DataTable();
        console.log(obj[0]);
        t.row.add([
          obj[0].id_service,
          obj[0].nama_barang,
          obj[0].sn_barang,
          obj[0].kelengkapan,
          obj[0].keluhan,
          Action,
          obj[0].id_garansi,
          obj[0].id_karyawan,
          obj[0].id_kategori,
        ]).draw(false);
        t.row(t).column(6).nodes().to$().css('display','none');
        t.row(t).column(7).nodes().to$().css('display','none');
        t.row(t).column(8).nodes().to$().css('display','none');
        
        $.ajax({
          url: "<?php echo site_url('Pengembalian/getdetail') ?>",
          method: "GET",
          type: "JSON",
          data: {id_serviceI: IdService},
          success: function(detil)
          {
            var obj2 = JSON.parse(detil);
            var Action = "<a class='btn btn-danger btn-xs Hapus' title='Remove Item'>  <span class=' fa  fa-minus-square' ></span> </a> "
            var b = $('#tbdetailservis').DataTable();
            console.log(obj2[0]);
            var grand_total = $('input[name=Total]').inputmask('unmaskedvalue');
            for (var i = 0; i < obj2.length; i++) {
                b.row.add([
                obj2[i].id_service,
                obj2[i].nama_service,
                obj2[i].qty,
                obj2[i].harga,
                obj2[i].subtotal,
              ]).draw();

              grand_total = parseFloat(grand_total) + parseFloat(obj2[i].subtotal);
              PPN = parseFloat(grand_total) * (10 / 100);
              TotalFatur = parseFloat(grand_total) + parseFloat(PPN);
            }
            $('input[name=Total]').val(grand_total);
            $('input[name=PPN]').val(PPN);
            $('input[name=TotalFatur]').val(TotalFatur);
            //$('.totalL').text('Rp. '+ TotalFatur);
          }
        });         
      }
    }); 
      showdataservis.modal('hide');
  });
</script>

