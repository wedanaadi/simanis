<?php 
$this->load->view('layouts/template-atas');
?>

<section class="content-header" >
	<h1>
		Laporan Penerimaan
	</h1>
</section>
<!-- Main content -->
<section class="content" >
	<div class="row" data-toggle="valiator">
		<div class="col-md-12">
			<div class="box box-info" style="border-top-color: #8c8b8b; ">
				<form method="post" id="Simpan" data-toggle="validator" action="#" enctype="multipart/form-data" autocomplete="off">
					<div class="box-body">
						<div class="row">
							<div class="col-sm-4">
								<div id ="barangservis" class="form-group">
									<label class="control-label">Tanda Terima Service</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div id ="barangservis" class="form-group">
									<input type="text" name="Terima" id="Terima" class="form-control">
									<span class="help-block with-errors"></span>
								</div>
							</div>
								<div class="form-group" >
									<a style="margin-top:-1px;" class="btn btn-success disabled" name="terima" id="terima"><i class='fa  fa-print'></i>  Unduh  </a> 
								</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div id ="barangservis" class="form-group">
									<label class="control-label">Laporan Penerimaan Service</label>
								</div>
							</div>
						</div>
						<div class="row" > <!-- baris 1 -->
							<div class="col-sm-3">
								<label>Mulai</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="MulaiPem" required="required">
									<span class="help-block with-errors"></span>
								</div>
							</div>
							<div class="col-sm-1">
								<label style=" padding-top: 30px; padding-left: 20px;">S / D</label>
							</div>
							<div class="col-sm-3">
								<label >Akhir</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="AkhirPem" required="required">
									<span class="help-block with-errors"></span>
								</div>
							</div>
							<div class="col-sm-1">
								<div class="form-group" >
									<div class="col-md-12" align="right" style="margin-top :20px;">
										<button type="submit" class="btn btn-success btn-lg fa fa-print save" id="Simpan"> Unduh</button>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
			</form>  
		</div>
	</section>

	<section class="content-header" >
		<h1>
			Invoice Service
		</h1>
	</section>
	<section class="content" >
		<div class="row" data-toggle="valiator">
			<div class="col-md-12">
				<div class="box box-info" style="border-top-color: #8c8b8b; ">
					<form method="post" id="Simpan" data-toggle="validator" action="#" enctype="multipart/form-data" autocomplete="off">
						<div class="box-body">
							<div class="row">
								<div class="col-sm-4">
									<div id ="barangservis" class="form-group">
										<label class="control-label">Invoice Pengembalian Service</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div id ="barangservis" class="form-group">
										<input type="text" name="Invoice" id="Invoice" class="form-control">
										<span class="help-block with-errors"></span>
									</div>
								</div>
								<div class="form-group" >
									<a style="margin-top:-1px;" class="btn btn-success disabled" id="tambah"><i class='fa  fa-print'></i>  Unduh  </a> 
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div id ="" class="form-group">
										<label class="control-label">Laporan Invoice Service</label>
									</div>
								</div>
							</div>
							<div class="row" > <!-- baris 1 -->
								<div class="col-sm-3">
									<label>Mulai</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="MulaiIn" required="required">
										<span class="help-block with-errors"></span>
									</div>
								</div>
								<div class="col-sm-1">
									<label style=" padding-top: 30px; padding-left: 20px;">S / D</label>
								</div>
								<div class="col-sm-3">
									<label >Akhir</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="AkhirIn" required="required">
										<span class="help-block with-errors"></span>
									</div>
								</div>
								<div class="col-sm-1">
									<div class="col-md-12" align="right" style="margin-top :20px;">
										<button type="submit" class="btn btn-success btn-lg fa fa-print save" id="Simpan"> Unduh</button>
									</div>
								</div>
							</div>			
						</div>
					</div>
				</form>  
			</div>
		</section>

		<?php 
		$this->load->view('layouts/template-bawah');
		?>

<script type="text/javascript">
	$('#MulaiPem, #AkhirPem, #MulaiIn, #AkhirIn').datepicker({
		autoclose: true
	})
</script>

<script>
	$('#Terima').keyup(function (){
	$('#terima').removeClass('disabled');
		if ($('#Terima').val()=='' ) {
			$('#terima').addClass('disabled');
		};
	});
</script>

<script>
	$('#MulaiPem, #AkhirPem').keyup(function (){
	 if ($('#MulaiPem').val()=='' || $('#AkhirPem').val()=='' ){
	 	$('#UnduhPem').addClass('disabled');
	 };
	 if ($('#MulaiPem').val()!='' && $('#AkhirPem').val()!='' ){
	 	$('#UnduhPem').removeClass('disabled');
	 }
	});
</script>
