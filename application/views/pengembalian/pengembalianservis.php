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
									<input type="text" name="NamaCustomer" id="NamaCustomer" class="form-control" required="required" readonly="readonly">
									<span class="help-block with-errors"></span>
									<input type="hidden" name="IdCustomer" id="IdCustomer" class="form-control">
								</div>
							</div>
							<div class="col-md-3" style="margin-left">
								<div id ="baris1" class="form-group" name="customerr">
									<label class="control-label" style="font-size:xx-large; padding-top: 20px; padding-left: 40px;" >TOTAL</label>
								</div>
							</div>

						</div>
						<div class="row"> <!-- baris 2 -->
							<div class="col-md-3">
								<div id ="baris2" class="form-group">
									<label class="control-label">Karyawan</label>
									<input type="hidden" name="IDKaryawan" readonly="readonly" value="<?php echo $this->session->userdata('kodeuser')?>" class="form-control" required="required">
									<input type="text" name="NamaKaryawan" readonly="readonly" value="<?php echo $this->session->userdata('namauser')?>" class="form-control" required="required">
									<span class="help-block with-errors"></span>
								</div>
							</div>
							<div class="col-md-3">
								<div id ="baris2" class="form-group">
									<label class="control-label">No. Telp</label>
									<input type="text" name="notelp" id="notelp" readonly="readonly" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div id ="baris2" class="form-group">
									<label class="control-label" style="font-size: xx-large; padding-left: 40px;">Rp.  </label>
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
						<div class="row">
							<div class="col-xs-12" align="right">
								<div class="form-group" >
									<a class="btn btn-primary btn-flat tambahkan" id="tambah" data-toggle="modal" data-target="#showdataservis"><i class='fa fa-plus-square-o'></i>  Tambah  </a> 
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
										<th style="width: 100px">ID Service</th>
										<th>Nama Barang</th>
										<th>Serial Number</th>
										<th>Kelengkapan</th>
										<th>Keluhan</th>
										<th style="width: 50px">Action</th>
									</tr>
								</thead>
								<tbody id="mytbody"></tbody>
							</table>
						</div>
						<div>
							<hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 5px; margin-bottom: 0px;">
						</div>
						<div class="table-responsive">
							<table id="tbdetailservis" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th style="width: 100px">ID Service</th>
										<th>Nama Service</th>
										<th>Qty</th>
										<th>Harga</th>
										<th>Subotal</th>
									</tr>
								</thead>
								<tbody id="mytbody"></tbody>
							</table>
						</div> 
  
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left; padding-top: 7px;">Total</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="Total" placeholder = "masukan nama" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
        </div>
      </div>
            <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left; padding-top: 7px;">Bayar</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="Bayar" placeholder = "masukan nama" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
        </div>
      </div>
            <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left; padding-top: 7px;">Kembalian</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="Kembalian" placeholder = "masukan nama" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
        </div>
      </div>
						<div class="col-md-12" align="left" style="margin-top :30px;">
							<button type="submit" class="btn btn-success btn-lg fa fa-save save" id="Simpan"> Simpan</button>
						</div>			
					</div>
				</div>
			</form>  
		</div>
	</section>

	<?php 
	$this->load->view('layouts/template-bawah');
	$this->load->view('pengembalian/showdataservis');
	?>

  <script type="text/javascript">
  $(function () {
    $("#tbservis").DataTable({
      paging:false, searching:false
    });

    $('#tbdetailservis').DataTable({
      columnDefs:[{
        targets:[3,4], render: $.fn.dataTable.render.number('.',',','','Rp. ')
      }],
      paging:false, searching:false
    });
    //paging:false, searching:false
  });
  </script>

