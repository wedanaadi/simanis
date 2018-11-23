<?php 
$this->load->view('layouts/template-atas');
?>

<section class="content-header" >
	<h1>
		Laporan Service
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
								<label class="control-label">Laporan</label>
								<select  class="form-control" id="Laporan" name="Laporan" required="required">
									<option value="" disabled="disabled" selected="selected"> --Pilih Laporan-- </option>
									<option value="1">Pengembalian Service</option>
									<option value="2">Penerimaan Service</option>
								</select>
								<span class="help-block with-errors"></span>
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
									<input type="text" class="form-control pull-right" id="Mulai" required="required">
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
									<input type="text" class="form-control pull-right" id="Akhir" required="required">
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
	$('#Mulai, #Akhir').datepicker({
      autoclose: true
    })
</script>