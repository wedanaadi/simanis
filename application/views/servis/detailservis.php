<?php 
$this->load->view('layouts/template-atas');
?>

<!-- Content Header (Page header) -->
    <section class="content-header" >
      <h1>
        <a href="<?php echo base_url('index.php/Servis');?>">Data Service</a> / Detail Service
      </h1>
    </section>

<!-- Main content -->
<section class="content" >
    <div class="row" data-toggle="valiator">
        <div class="col-md-12">
             <div class="box box-info" style="border-top-color: #8c8b8b; ">
           <form method="post" id="Simpan" data-toggle="validator" action="#" enctype="multipart/form-data" autocomplete="off">
              <div class="box-body">
              	<div class="row" > <!-- baris 1 -->
                  	<div class="col-md-6" >
                    	<div id ="baris1" class="form-group" name="sparepart" data-toggle="modal" data-target="#datasparepart" style="margin-left: 85px; margin-right: 15px;">
                        <h4 style="text-align: center; margin-top:2px;"><b>Sparepart</b></h4>
                        <hr style="border-top: 3px solid #444; padding: 6px; margin-top: -5px; margin-bottom: 0px;">
              			   <label class="control-label">Nama Sparepart</label>
                       <input type="text" name="NamaSparepart" id="NamaSparepart" class="form-control" required="required">
                        <span class="help-block with-errors"></span>
                        <input type="hidden" name="Id_Servis" id="Id_Servis" readonly="readonly" class="form-control">
                      </div>
                  	</div>
                  	<div class="col-md-6" >
                    	<div id ="baris1" class="form-group" name="jasa" data-toggle="modal" data-target="#datajasa" style="margin-right: 85px; margin-left: 15px;"> 
                        <h4 style="text-align: center; margin-top:2px;"><b>Jasa</b></h4>
                        <hr style="border-top: 3px solid #444; padding: 6px; margin-top: -5px; margin-bottom: 0px;">
                       <label class="control-label">Nama Jasa</label>
                       <input type="text" name="NamaJasa" id="NamaJasa" class="form-control" required="required">
                        <span class="help-block with-errors"></span>
                      </div>
                  	</div>

              	</div>
              	<div class="row"> <!-- baris 2 -->
              		<div class="col-md-6">
                    	<div id ="baris2" class="form-group" style="margin-left: 85px; margin-right: 15px;">
              			   <label class="control-label">Harga</label>
              			   <input type="text" name="HargaSparepart" id="HargaSparepart" readonly="readonly" class="form-control" required="required">
                     	<span class="help-block with-errors"></span>
                      </div>
                  	</div>
                  	<div class="col-md-6">
                    	<div id ="baris2" class="form-group" style="margin-right: 85px; margin-left: 15px;">
              			   <label class="control-label">Harga</label>
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
                       <a style="margin-top:/*70px*/ 12px;" class="btn btn-primary btn-flat TambahkanJasa disabled" id="TambahJasa"><i class='fa fa-plus-square-o'></i>  Tambah  </a>
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
                              <th>Action</th>
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
  $(function () {
    var tabel = $("#TbDetailServis").DataTable({
      paging:false, searching:false
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
      var t = $('#tbservis').DataTable();
      var i = 1;

    $('.tambahkan').on('click', function() {
        var NamaBarang = $('#NamaBarang').val();
        var SN = $('#SN').val();
        var Kelengkapan = $('#Kelengkapan').val();
        var Keluhan = $('#Keluhan').val();
        var KategoriServis = $('#KategoriServis').val();
        var NamaKategori = $( "#KategoriServis option:selected" ).text();
        var Teknisi = $('#Teknisi').val();
        var NamaTeknisi = $("#Teknisi option:selected").text();
        var Action = "<a class='btn btn-danger btn-xs Hapus' title='Remove Item'>  <span class=' fa  fa-minus-square' ></span> </a> "

    var row = t.row.add( [
            NamaBarang,
            SN,
            Kelengkapan,
            Keluhan,
            NamaKategori,
            NamaTeknisi,
            Action
        ] ).draw(false);
        t.row(row).column(0).nodes().to$().addClass('IdServis');

         $('#NamaBarang').val('');
         $('#SN').val('');
         $('#Kelengkapan').val('');
         $('#Keluhan').val('');
         $('#KategoriServis').val('').trigger('change');
         $('#Teknisi').val('').trigger('change');


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
  function panggil()
  {
    $('.save').removeClass('disabled');
  }
  // alert(tabel.rows().data().toArray());
  $(document).on('submit',function(e){
    if(!e.isDefaultPrevented())
    {
      var tabel = $("#tbservis").DataTable();
      var jumlah = tabel.rows().count();
      if(jumlah == 0)
      {
        alert('empty');
      }
      else
      {
        var _data = {
          no_nota: $('input[name=id]').val(),
          customer: $('input[name=IdCustomer]').val(),
          karyawan: $('input[name=karyawan]').val(),
          notelp: $('input[name=notelp]').val(),
          tanggal: $('input[name=tanggal]').val(),

        };

        console.log(_data);
      }
    }
    return false;
  });
</script>