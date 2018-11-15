<?php 
$this->load->view('layouts/template-atas');
?>

<!-- Content Header (Page header) -->
    <section class="content-header" >
      <h1> 
        <a href="<?php echo base_url('index.php/Servis')?>">Data Service</a> / Detail Service
      </h1>
    </section>

<!-- Main content -->
<section class="content" >
    <div class="row" data-toggle="valiator">
        <div class="col-md-12">
             <div class="box box-info" style="border-top-color: #8c8b8b; ">
           <form method="post" id="Simpan" action="#" enctype="multipart/form-data" autocomplete="off">
              <div class="box-body">
              	<div class="row" > <!-- baris 1 -->
                  	<div class="col-md-6" >
                    	<div id ="baris1" class="form-group" name="sparepart" data-toggle="modal" data-target="#datasparepart" style="margin-left: 85px; margin-right: 15px;">
                        <h4 style="text-align: center; margin-top:2px;"><b>Sparepart</b></h4>
                        <hr style="border-top: 3px solid #444; padding: 6px; margin-top: -5px; margin-bottom: 0px;">
              			   <label class="control-label">Nama Sparepart</label>
                       <input type="text" name="NamaSparepart" id="NamaSparepart" class="form-control">
                        <input type="hidden" name="IdSparepart" id="IdSparepart" readonly="readonly" class="form-control">
                      </div>
                  	</div>
                  	<div class="col-md-6" >
                    	<div id ="baris1" class="form-group" name="Jasa" id="Jasa" data-toggle="modal" data-target="#datajasa" style="margin-right: 85px; margin-left: 15px;"> 
                        <h4 style="text-align: center; margin-top:2px;"><b>Jasa</b></h4>
                        <hr style="border-top: 3px solid #444; padding: 6px; margin-top: -5px; margin-bottom: 0px;">
                       <label class="control-label">Nama Jasa</label>
                       <input type="text" name="NamaJasa" id="NamaJasa" class="form-control">
                       <input type="hidden" name="IdJasa" id="IdJasa" readonly="readonly" class="form-control">
                      </div>
                  	</div>

              	</div>
              	<div class="row"> <!-- baris 2 -->
              		<div class="col-md-6">
                    	<div id ="baris2" class="form-group" style="margin-left: 85px; margin-right: 15px;">
              			   <label class="control-label">Harga</label>
              			   <input type="text" name="HargaSparepart" id="HargaSparepart" readonly="readonly" class="form-control" required="required">
                      <input type="hidden" name="IdServis" id="IdServis" value="<?php echo $getidservis->id_service ?>"  class="form-control">
                      <input type="hidden" name="Garansi" id="Garansi" value="<?php echo $getidservis->id_garansi ?>"  class="form-control">
                     	<span class="help-block with-errors"></span>
                      </div>
                  	</div>
                  	<div class="col-md-6">
                    	<div id ="baris2" class="form-group" style="margin-right: 85px; margin-left: 15px;">
              			   <label class="control-label">Harga jasa</label>
              			   <input type="text" name="HargaJasa" id="HargaJasa" readonly="readonly" class="form-control">
                     	</div>
                  	</div>
              	</div>
              	<div class="row">
                	<div class="col-md-6">
                    	<div id ="baris3" class="form-group" style="margin-left: 85px; margin-right: 15px;">
              			   <label class="control-label">Qty</label>
              			   <input type="text" name="QtySparepart" id="QtySparepart" class="form-control">
                       <a style="margin-top:12px;" class="btn btn-primary btn-flat TambahkanSparepar disabled" id="TambahSparepart"><i class='fa fa-plus-square-o'></i>  Tambah  </a>
                     	</div>
                  	</div>
                  	<div class="col-md-6">
                    	<div id ="baris3" class="form-group" style="margin-right: 85px; margin-left: 15px;">
              			   <label class="control-label" hidden="">Qty</label>
              			   <input type="hidden" name="QtyJasa" id="QtyJasa" readonly="readonly" value="1" class="form-control">
                       <a style="margin-top:/*70px*/ 12px;" class="btn btn-primary btn-flat TambahkanJasa disabled " id="TambahJasa"><i class='fa fa-plus-square-o'></i>  Tambah  </a>
                     	</div>
                  	</div>
              </div>
            </form>
                <hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 5px; margin-bottom: 0px;">
                <div class="table-responsive">
                    <table id="TbDetailServis" class="table table-bordered table-striped">
                       <thead>
                           <tr>
                              <th>No</th>
                              <th>Service</th>
                              <th>Qty</th>
                              <th>Harga</th>
                              <th>Sub Total</th>
                              <th style="width: 50px">Action</th>
                              <th style="display:none">id_Servis</th>
                              <th style="display:none">nama_id</th>
                              <th style="display:none">Status</th>
                            </tr>
                        </thead>
                     <tbody id="mytbody"></tbody>
                    </table>
                </div>    
                <div class="col-md-12" style="margin-top :30px;">
                <button type="submit" class="btn btn-success btn-lg fa fa-save save" id="Simpan"> Simpan</button>
                </div>
              </div>
            </div>
        </form> 
      </div>
</section>

<?php 
$this->load->view('layouts/template-bawah'); 
$this->load->view('servis/daftarsparepart');
$this->load->view('servis/daftarjasa');
?>

<script type="text/javascript">
  var isEmpty = null;
  $(function () {
    var tabel = $("#TbDetailServis").DataTable({
      columnDefs:[{
        targets:[3,4], render: $.fn.dataTable.render.number('.',',','','Rp. ')
      }],
      paging:false, searching:false
    });
  });

  $(document).ready(function(){
    $('#TambahJasa').on('click', function(){
      $('#TambahJasa').addClass('disabled');
    });
  });

  $(document).ready(function(){
    $('#TambahSparepart').on('click', function(){
      $('#TambahSparepart').addClass('disabled');
    });
  });
</script>


<script> /*Sparepart*/
  $('#NamaSparepart, #HargaSparepart, #QtySparepart').keyup(function (){
      if ($('#NamaSparepart').val()=='' || $('#HargaSparepart').val()=='' || $('#QtySparepart').val()=='' ) {
        $('#TambahSparepart').addClass('disabled');
      };
      if ($('#NamaSparepart').val()!='' && $('#HargaSparepart').val()!='' && $('#QtySparepart').val()!='' ) {
        $('#TambahSparepart').removeClass('disabled');
      };
  });
</script>

<script> /*Jasa*/
  function panggil()
  {
    $('#TambahJasa').removeClass('disabled');
  }
</script>

<script type="text/javascript">
    $(document).ready(function(){
      var t = $('#TbDetailServis').DataTable();
      var i = 1

    $('.TambahkanSparepar').on('click', function() {
        var No = i
        var IdServis = $('#IdServis').val();
        var NamaSparepart = $('#NamaSparepart').val();
        var QtySparepart = $('#QtySparepart').val();
        var HargaSparepart = $('#HargaSparepart').val();
        var jumlah = parseFloat(HargaSparepart) * parseFloat(QtySparepart);
        //var harga = jumlah;
        var Action = "<a class='btn btn-danger btn-xs Hapus' title='Remove Item'>  <span class=' fa  fa-minus-square' ></span> </a> ";
        var IdSparepart = $('#IdSparepart').val();
        var status = "1"

        if(jumlahStockPilih - QtySparepart < 0) 
        {
          //alert('stock melebih');
            swal({
                title: "STOK KURANG",
                text: "",
                type: "warning",
                timer: 2000
            });
        }
        else {
          var row = t.row.add( [
                  No,
                  NamaSparepart,
                  QtySparepart,
                  HargaSparepart,
                  jumlah,
                  Action,
                  IdServis,
                  IdSparepart,
                  status
              ] ).draw(false);
              t.row(row).column(0).nodes().to$().addClass('IdDetailServis');
              t.row(row).column(6).nodes().to$().css('display','none');
              t.row(row).column(7).nodes().to$().css('display','none');
              t.row(row).column(8).nodes().to$().css('display','none');
              i++;
              $('#NamaSparepart').val('');
              $('#QtySparepart').val('');
              $('#HargaSparepart').val('');
        }

    })

    //load data 
    $.ajax({
      url: "<?php echo site_url('Servis/get_detil') ?>",
      method: "GET",
      type: "JSON",
      data: {id_service: $('#IdServis').val()},
      success: function(data)
      {
        var obj = JSON.parse(data);
        var Action = "<a class='btn btn-danger btn-xs Hapus' title='Remove Item'>  <span class=' fa  fa-minus-square' ></span> </a> "
        isEmpty = obj.length;
        for (let index = 0; index < obj.length; index++) {
            var row = t.row.add( [
                  index+1,
                  obj[index].nama_service,
                  obj[index].qty,
                  obj[index].harga,
                  obj[index].subtotal,
                  Action,
                  obj[index].id_service,
                  obj[index].nama_id,
                  obj[index].status
              ] ).draw(false);
              t.row(row).column(0).nodes().to$().addClass('IdDetailServis');
              t.row(row).column(6).nodes().to$().css('display','none');
              t.row(row).column(7).nodes().to$().css('display','none');
              t.row(row).column(8).nodes().to$().css('display','none');
              i++;
        }
      }
    });

    $('.TambahkanJasa').on('click', function() {
        var No = i
        var IdServis = $('#IdServis').val();
        var NamaJasa = $('#NamaJasa').val();
        var QtyJasa = "1"
        var HargaJasa = $('#HargaJasa').val();
        var harga = $('#HargaJasa').val();
        var Action = "<a class='btn btn-danger btn-xs Hapus' title='Remove Item'>  <span class=' fa  fa-minus-square' ></span> </a> "
        var IdJasa = $('#IdJasa').val();
        var status = "2"

    var row = t.row.add( [
            No,
            NamaJasa,
            QtyJasa,
            HargaJasa,
            harga,
            Action,
            IdServis,
            IdJasa,
            status
        ] ).draw(false);
        t.row(row).column(0).nodes().to$().addClass('IdDetailServis');
        t.row(row).column(6).nodes().to$().css('display','none');
        t.row(row).column(7).nodes().to$().css('display','none');
        t.row(row).column(8).nodes().to$().css('display','none');
        i++;
         $('#NamaJasa').val('');
         $('#HargaJasa').val('');
    })

  })
</script>

<script type="text/javascript">
   $('#TbDetailServis tbody').on('click', '.Hapus', function(e){
      var t = $('#TbDetailServis').DataTable();
      t.row($(this).closest('tr')).remove().draw(false);
 })
</script>

<script>
    $('form').on('submit',function(e){
      if(!e.isDefaultPrevented())
      {
        var tabel = $('#TbDetailServis').DataTable();
        var jumlah = tabel.rows().count();
        if(jumlah == 0)
        {
            swal({
                title: "Detail Kosong",
                text: "Masukan Data Perbaikan Service",
                type: "warning",
                timer: 2000
            });
        }
        else
        {
          var _data = {
            id_service: $('#IdServis').val(),
            adadata: isEmpty,
            tbdetil: tabel.rows().data().toArray(),
          };

          $.ajax({
            url: "<?php echo site_url('Servis/save_detil') ?>",
            method: "POST",
            type: "POST",
            data: _data,
            success: function(data)
            {
              obj = JSON.parse(data);
              swal({
                  title: "Sukses",
                  text: obj.message,
                  type: "success",
                  button: "ok",
                  timer: 2000
              }, function(){
                window.location = "<?php echo site_url('Servis') ?>";
              });
            }
          });
        }
      }
      return false;
    });
</script>