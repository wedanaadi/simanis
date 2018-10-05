<?php 
$this->load->view('layouts/template-atas');
?>

<!-- Content Header (Page header) -->
    <section class="content-header" >
      <h1>
        Penerimaan Servis
      </h1>
    </section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
             <div class="box box-info" style="border-top-color: #8c8b8b; ">
           <form method="post" id="Simpan" action="<?php echo base_url(). 'index.php/Purchase_order/add_po'; ?>" enctype="multipart/form-data">
              <div class="box-body">
              	
              	<div class="row"> <!-- baris 1 -->
              		<div class="col-md-3">
                    	<div id ="baris1" class="form-group">
              			   <label class="control-label">No Nota</label>
              			   <input type="text" name="id" readonly="readonly" class="form-control" value=" <?php echo $kodetd ?> ">
                     	</div>
                  	</div>
                  	<div class="col-md-3">
                    	<div id ="baris1" class="form-group" name="customerr" data-toggle="modal" data-target="#datacustomer">
              			   <label class="control-label">Customer</label>
                       <input type="text" name="NamaCustomer" id="NamaCustomer" class="form-control">
              			   <input type="hidden" name="IdCustomer" id="IdCustomer" class="form-control">
                     	</div>
                  	</div>
                  <div class="col-sm-3">
                      <div id ="baris1" class="form-group">
                      	<label class="control-label">Teknisi</label>
                      		<select style="width:100%; border-radius: 0" class="form-control" id="Teknisi" name="Teknisi" required="required">
                        		<option value="" disabled="disabled" selected="selected"> --Pilih Teknisi-- 
                        		</option>
                        		<?php foreach ( $teknisi as $k ): ?>
                          		<option value="<?php echo $k->id_karyawan?>"> <?php echo $k->nama_karyawan ?> 
                          		</option>
                        		<?php endforeach;?>
                      		</select>
                      </div>
                   </div>
              	</div>
              	<div class="row"> <!-- baris 2 -->
              		<div class="col-md-3">
                    	<div id ="baris2" class="form-group">
              			   <label class="control-label">Karyawan</label>
              			   <input type="text" name="karyawan" readonly="readonly" class="form-control">
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
               </div>
               <div class="row">
                  <div class="col-md-2">
                    <div id ="barangservis" class="form-group" >
                          <label class="control-label">Nama Barang</label>
                          <input type="text" name="NamaBarang" id="NamaBarang"  class="form-control">
                     </div>
                  </div>
                  <div class="col-md-2">
                    <div id ="barangservis" class="form-group">
                          <label class="control-label">Serial Number</label>
                          <input type="text" name="SN" id="SN" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-2">
                    <div id ="barangservis" class="form-group">
                          <label class="control-label">Kelengkapan</label>
                          <input type="text" name="Kelengkapan" id="Kelengkapan" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-3">
                    <div id ="barangservis" class="form-group">
                          <label class="control-label">Keluhan</label>
                          <input type="text" name="Keluhan" id="Keluhan" class="form-control">
                     </div>
                  </div>
                  <div class="col-sm-2">
                      <div id ="barangservis" class="form-group">
                      	<label class="control-label">Kategori Servis</label>
                      <select style="width:100%; border-radius: 0" class="form-control" id="KategoriServis" name="KategoriServis" required="required">
                        <option value="" disabled="disabled" selected="selected"> --Kategori Servis-- </option>
                        <?php foreach ( $kategori as $h ): ?>
                          <option value="<?php echo $h->id_kategori ?>"> <?php echo $h->nama_kategori ?> </option>
                        <?php endforeach;?>
                      </select>
                      </div>
                   </div>
                   <div class="col-md-1" style="margin-left: -16px;">
                     <div class="form-group" >
                        <a style="margin-top:24px; margin-left:2px; " class="btn btn-primary btn-flat tambahkan" id="tambah"><i class='fa fa-plus-square-o'></i>  Tambah  </a> 
                     </div>
                  </div>
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
                              <th>Action</th>
                            </tr>
                        </thead>
                     <tbody id="mytbody"></tbody>
                    </table>
                </div>    
                <div class="col-md-12" align="right" style="margin-top :30px;">
                    <div class="form-group" >
                       <a   type="submit" class="btn btn-success btn-flat"  id="simpan"  ><i class='fa fa-save'></i>   Simpan  </a>  
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
  $('#teknisi').select2();
  $('#kategoriservis').select2();
</script>

  <script type="text/javascript">
  $(function () {
    $("#tbservis").DataTable({
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
         $('#KategoriServis').val('');

    })
  })
</script>

<script type="text/javascript">
   $('#tbservis tbody').on('click', '.Hapus', function(e){
      var t = $('#tbservis').DataTable();
      t.row($(this).closest('tr')).remove().draw(false);
 })
</script>
