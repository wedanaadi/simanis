<?php 
$this->load->view('layouts/template-atas');
?>

<!-- Content Header (Page header) -->
    <section class="content-header" >
      <h1>
        Penerimaan Service
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
              		<div class="col-md-3">
                    	<div id ="baris1" class="form-group">
              			   <label class="control-label">No Nota</label>
              			   <input type="text" name="id" readonly="readonly" class="form-control" value="<?php echo $kodetd ?>">
                     	</div>
                  	</div>
                  	<div class="col-md-3" style="margin-left">
                    	<div id ="baris1" class="form-group" name="customerr" data-toggle="modal" data-target="#datacustomer">
              			   <label class="control-label">Customer</label>
                       <input type="text" name="NamaCustomer" id="NamaCustomer" class="form-control" required="required">
                        <span class="help-block with-errors"></span>
              			   <input type="hidden" name="IdCustomer" id="IdCustomer" class="form-control">
                      </div>
                  	</div>

              	</div>
              	<div class="row"> <!-- baris 2 -->
              		<div class="col-md-3">
                    	<div id ="baris2" class="form-group">
              			   <label class="control-label">Karyawan</label>
              			   <input type="text" name="karyawan" readonly="readonly" value="utamaaa" class="form-control" required="required">
                     	<span class="help-block with-errors"></span>
                      </div>
                  	</div>
                  	<div class="col-md-3">
                    	<div id ="baris2" class="form-group">
              			   <label class="control-label">No. Telp</label>
              			   <input type="text" name="notelp" id="notelp" readonly="readonly" class="form-control">
                     	</div>
                  	</div>
              	</div>
              	<div class="row">
                 	<div class="col-md-3">
                    	<div id="baris3" class="form-group">
                    		<label>Tanggal</label>
                      			<div class="input-group date">
                        			<div class="input-group-addon"> 
                        				<i class="fa fa-calendar"></i>
                        			</div>
                        				<input type="text"   value="<?= date('d/m/Y') ?>" class="form-control pull-right" name= "tanggal" id="tanggal" readonly="readonly">
                      			</div>
                  		</div>
                	</div>
                	<div class="col-md-3">
                    	<div id ="baris3" class="form-group">
              			   <label class="control-label">Alamat</label>
              			   <input type="text" name="alamat" id="alamat" readonly="readonly" class="form-control">
                     	</div>
                  	</div>
              	</div>
               
               <div>
               	<hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 5px; margin-bottom: 0px;">
                <h4 class="box-title" style="margin-top: -10px; margin-bottom: 0px;" ><strong>&nbsp;&nbsp;Barang Service</strong> </h4>
                <hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 5px; margin-bottom: 0px;">
               </div>

               <div class="row">
                  <div class="col-md-3">
                    <div id ="barangservis" class="form-group" >
                          <label class="control-label">Nama Barang</label>
                          <input type="text" name="NamaBarang" id="NamaBarang"  class="form-control">
                          <span class="help-block with-errors"></span>
                     </div>
                  </div>
                  <div class="col-md-3">
                    <div id ="barangservis" class="form-group">
                          <label class="control-label">Serial Number</label>
                          <input type="text" name="SN" id="SN" class="form-control">
                          <span class="help-block with-errors"></span>
                     </div>
                  </div>
                  <div class="col-md-3">
                    <div id ="barangservis" class="form-group">
                          <label class="control-label">Kelengkapan</label>
                          <input type="text" name="Kelengkapan" id="Kelengkapan" class="form-control">
                          <span class="help-block with-errors"></span>
                     </div>
                  </div>
                  <div class="col-md-3">
                    <div id ="barangservis" class="form-group">
                          <label class="control-label">Keluhan</label>
                          <input type="text" name="Keluhan" id="Keluhan" class="form-control">
                          <span class="help-block with-errors"></span>
                     </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                      <div id ="barangservis" class="form-group">
                      	<label class="control-label">Kategori Service</label>
                      <select style="width:100%; border-radius: 0" class="form-control" id="KategoriServis" name="KategoriServis">
                        <option value="" disabled="disabled" selected="selected"> --Kategori Servis-- </option>
                        <?php foreach ( $kategori as $h ): ?>
                          <option value="<?php echo $h->id_kategori ?>"> <?php echo $h->nama_kategori ?> </option>
                        <?php endforeach;?>
                      </select>
                      </div>
                   </div>
                   <div class="col-xs-3">
                      <div class="form-group">
                        <label class="control-label">Teknisi</label>
                          <select style="width:100%; border-radius: 0" class="form-control" id="Teknisi" name="Teknisi">
                            <option value="" disabled="disabled" selected="selected"> --Pilih Teknisi-- 
                            </option>
                            <?php foreach ( $teknisi as $k ): ?>
                              <option value="<?php echo $k->id_karyawan?>"> <?php echo $k->nama_karyawan ?> 
                              </option>
                            <?php endforeach;?>
                          </select>
                      </div>
                   </div>
                   <div class="col-xs-2" style="margin-top: -5px;">
                     <div class="form-group" >
                        <a style="margin-top:24px; margin-left:2px; " class="btn btn-primary btn-flat tambahkan disabled" id="tambah"><i class='fa fa-plus-square-o'></i>  Tambah  </a> 
                     </div>
                  </div>
                </div>
                <div>
                  <hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 5px; margin-bottom: 0px;">
                </div>
                <!-- <hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 5px; margin-bottom: 0px;"> -->
                <div class="table-responsive">
                    <table id="tbservis" class="table table-bordered table-striped">
                       <thead>
                           <tr>
                              <th>Nama Barang</th>
                              <th>Serial Number</th>
                              <th>Kelengkapan</th>
                              <th>Keluhan</th>
                              <th>Kategori</th>
                              <th>Teknisi</th>
                              <th style="width: 50px">Action</th>
                              <th style="display:none">idKateg</th>
                              <th style="display:none">idKaryawan</th>
                            </tr>
                        </thead>
                     <tbody id="mytbody"></tbody>
                    </table>
                </div>    
                <div class="col-md-12" align="right" style="margin-top :30px;">
                <button type="submit" class="btn btn-success btn-lg fa fa-save save" id="Simpan"> Simpan</button>
              </div>
              </div>
                </div>
        </form>  
      </div>
</section>

<?php 
$this->load->view('layouts/template-bawah'); 
$this->load->view('Penerimaan/daftarcustomer');
?>

<script type="text/javascript">
  $('#Teknisi').select2();
  $('#KategoriServis').select2();
</script>

  <script type="text/javascript">
  $(function () {
    var tabel = $("#tbservis").DataTable({
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
            Action,
            KategoriServis,
            Teknisi
        ] ).draw(false);
        t.row(row).column(0).nodes().to$().addClass('IdServis');
        t.row(row).column(7).nodes().to$().css('display','none');
        t.row(row).column(8).nodes().to$().css('display','none');

         $('#NamaBarang').val('');
         $('#SN').val('');
         $('#Kelengkapan').val('');
         $('#Keluhan').val('');
         $('#KategoriServis').val('').trigger('change');
         $('#Teknisi').val('').trigger('change');

         panggil();


    })
  })
</script>

<script type="text/javascript">
   $('#tbservis tbody').on('click', '.Hapus', function(e){
      var t = $('#tbservis').DataTable();
      t.row($(this).closest('tr')).remove().draw(false);
 })
</script>

<script>
  $('#NamaBarang,#SN,#Kelengkapan,#Keluhan').keyup(function (){
      if ($('#NamaBarang').val()=='' || $('#SN').val()=='' || $('#Kelengkapan').val()=='' || $('#Keluhan').val()=='' || $('#KategoriServis').val()=='' || $('#Teknisi').val()=='' ) {
        $('#tambah').addClass('disabled');
      };
      if ($('#NamaBarang').val()!='' && $('#SN').val()!='' && $('#Kelengkapan').val()!='' && $('#Keluhan').val()!='') {
        $('#KategoriServis').on('select2:select',function(){
          $('#Teknisi').on('select2:select',function(){
            $('#tambah').removeClass('disabled');
          });
        });
      }
  });
</script>

<script>
  $(document).ready(function(){
    $('#tambah').on('click', function(){
      $('#tambah').addClass('disabled');
    });
  });
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
          tbdetil: tabel.rows().data().toArray(),

        };

        $.ajax({
          url: "<?php echo site_url('Penerimaan/addDB') ?>",
          type: "POST",
          method: "POST",
          data: _data,
          success: function(data)
          {
            obj = JSON.parse(data);
            swal({
                title: "Sukses",
                text: obj.message,
                type: "success",
                button: "ok",
            }, function(){
              window.location = "<?php echo site_url('Penerimaan') ?>";
            });
          }
        });
      }
    }
    return false;
  });
</script>