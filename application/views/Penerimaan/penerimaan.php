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
             <div class="box box-info">
           <form method="post" id="Simpan" action="<?php echo base_url(). 'index.php/Purchase_order/add_po'; ?>" enctype="multipart/form-data">
              <div class="box-body">
              	
              	<div class="row"> <!-- baris 1 -->
              		<div class="col-md-3">
                    	<div id ="baris1" class="form-group">
              			   <label class="control-label">Id</label>
              			   <input type="text" name="id" readonly="readonly" class="form-control">
                     	</div>
                  	</div>
                  	<div class="col-md-3">
                    	<div id ="baris1" class="form-group">
              			   <label class="control-label">Customer</label>
              			   <input type="text" name="customer" class="form-control">
                     	</div>
                  	</div>
                  <div class="col-sm-3">
                      <div id ="baris1" class="form-group">
                      	<label class="control-label">Teknisi</label>
                      		<select style="width:100%; border-radius: 0" class="form-control" id="teknisi" name="teknisi" required="required">
                        		<option value="" disabled="disabled" selected="selected"> --Pilih Teknisi-- 
                        		</option>
                        		<?php foreach ( $akses as $k ): ?>
                          		<option value="<?php echo $k->id_hakakses?>"> <?php echo $k->hak_akses ?> 
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
              			   <input type="text" name="notelp" readonly="readonly" class="form-control">
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
              			   <input type="text" name="alamat" readonly="readonly" class="form-control">
                     	</div>
                  	</div>
              	</div>
               <div>
               	<!-- <hr style="border-top: 3px solid #8c8b8b; padding: 3px; margin-top: 5px; margin-bottom: 0px;"> -->
               </div>
               <div class="row">
                  <div class="col-md-2">
                    <div id ="barangservis" class="form-group">
                          <label class="control-label">Nama Barang</label>
                          <input type="text" name="namabarang" id="namabarang"  class="form-control">
                     </div>
                  </div>
                  <div class="col-md-2">
                    <div id ="barangservis" class="form-group">
                          <label class="control-label">Serial Number</label>
                          <input type="text" name="sn" id="sn" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-2">
                    <div id ="barangservis" class="form-group">
                          <label class="control-label">Kelengkapan</label>
                          <input type="text" name="kelengkapan" id="kelengkapan" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-3">
                    <div id ="barangservis" class="form-group">
                          <label class="control-label">Keluhan</label>
                          <input type="text" name="keluhan" id="keluhan" class="form-control">
                     </div>
                  </div>
                  <div class="col-sm-2">
                      <div id ="barangservis" class="form-group">
                      	<label class="control-label">Kategori Servis</label>
                      <select style="width:100%; border-radius: 0" class="form-control" id="kategoriservis" name="kategoriservis" required="required">
                        <option value="" disabled="disabled" selected="selected"> --Kategori Servis-- </option>
                        <?php foreach ( $akses as $k ): ?>
                          <option value="<?php echo $k->id_hakakses?>"> <?php echo $k->hak_akses ?> </option>
                        <?php endforeach;?>
                      </select>
                      </div>
                   </div>
                   <div class="col-md-1">
                     <div class="form-group" >
                        <a style="margin-top:20px; margin-right:10px; " class="btn btn-primary btn-flat" id="tambah"  ><i class='fa fa-plus-square-o'></i>  Tambah  </a> 
                     </div>
                  </div>
                </div>
                <div class="table-responsive">
                    <table id="tbservis" class="table table-bordered table-striped">
                       <thead>
                           <tr>
                              <th>No</th>
                              <th>Id Servis</th>
                              <th>Nama Barang</th>
                              <th>Serial Number</th>
                              <th>Kelengkapan</th>
                              <th>Keluhan</th>
                              <th>Kategori</th>
                            </tr>
                        </thead>
                     <tbody id="mytbody"></tbody>
                    </table>
                </div>    
                <div class="col-md-12" align="right" style="margin-top :30px;">
                    <div class="form-group" >
                       <a   type="submit" class="btn btn-success btn-flat"  id="simpan1"  ><i class='fa fa-save'></i>   Simpan  </a>  
                     </div>
                </div>
        </form>  
      </div>
</section>

<?php $this->load->view('layouts/template-bawah'); ?>

<script type="text/javascript">
  $('#teknisi').select2();
  $('#kategoriservis').select2();
</script>