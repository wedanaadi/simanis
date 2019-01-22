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
			<div class="box box-info" style="border-top-color: #d4d4d4; ">
				<form method="post" id="Simpan" data-toggle="validator" action="#" enctype="multipart/form-data" autocomplete="off">
					<div class="box-body">
						<div class="row">
							<div class="col-sm-4">
								<div id ="" class="form-group" style="margin-bottom: -1px;">
									<label class="control-label">Laporan Penerimaan Service</label>
								</div>
							</div>
						</div>
						<div >
						 <hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 6px; margin-bottom: 0px;">
						</div>
						<div class="row" > <!-- baris 1 -->
							<div class="col-sm-3">
								<label>Mulai</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" class="form-control pull-right" id="MulaiPem" name="MulaiPem" required="required">
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
									<input type="text" class="form-control pull-right" id="AkhirPem" name="AkhirPem" required="required">
									<span class="help-block with-errors"></span>
								</div>
							</div>
							<div class="col-sm-1">
								<div class="form-group" >
<!-- 									<div class="col-md-12" align="right" style="margin-top :20px;">
										<button type="simpan" class="btn btn-success btn-lg fa fa-print save" id="Simpan"> Unduh</button>
									</div> -->
									<div class="form-group" >
										<a style="margin-top:22px;" class="btn btn-success save " name="Simpan" id="Simpan"><i class='fa  fa-print'></i>  Unduh  </a> 
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 50px; margin-bottom: -7px;">
							</div>
							<div class="col-sm-4">
								<div id ="" class="form-group" style="margin-bottom: -1px;">
									<label class="control-label">Laporan Invoice Service</label>
								</div>
							</div>
							<div class="col-sm-12">
								<hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 5px; margin-bottom: 0px;">
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
<!-- 									<div class="col-md-12" align="right" style="margin-top :20px;">
										<button type="submit" class="btn btn-success btn-lg fa fa-print Simpan1" id="Simpan1"> Unduh</button>
									</div> -->
									<div class="form-group" >
										<a style="margin-top:22px;" class="btn btn-success Simpan1" name="Simpan1" id="Simpan1"><i class='fa  fa-print'></i>  Unduh  </a> 
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
			$('#Invoice').keyup(function (){
				$('#Tambahkan').removeClass('disabled');
				if ($('#Invoice').val()=='' ) {
					$('#Tambahkan').addClass('disabled');
				};
			});
		</script>



		<script type="text/javascript">
			$(function () {  
				$(".TandaTerima").click(function(){
					var kodepem = $( "#Terima" ).val();
					window.open("<?php echo base_url(). 'index.php/Laporan/CetakPEM/';?>?KodePem="+kodepem ,"MyTargetWindowName")
				}); 
			});
		</script>

		<script type="text/javascript">
			$(".save").click(function(){
				var MulaiPem = $( "#MulaiPem" ).val();
				var AkhirPem = $( "#AkhirPem" ).val();
				window.open("<?php echo base_url(). 'index.php/Laporan/CetakPEM_Tgl/';?>?Status="+ 'Semua' +"&MulaiPem="+ MulaiPem+"&AkhirPem="+AkhirPem ,"MyTargetWindowName")
			});
		</script>

		<script type="text/javascript">
			$(function () {  
				$(".InvoiceServis").click(function(){
					var kodepen = $( "#Invoice" ).val();
					window.open("<?php echo base_url(). 'index.php/Laporan/CetakPEN/';?>?KodePen="+kodepen ,"MyTargetWindowName")
				}); 
			});
		</script>

		<script type="text/javascript">
			$(".Simpan1").click(function(){
				var MulaiIn = $( "#MulaiIn" ).val();
				var AkhirIn = $( "#AkhirIn" ).val();
				window.open("<?php echo base_url(). 'index.php/Laporan/CetakPEN_Tgl/';?>?Status="+ 'Semua' +"&MulaiIn="+ MulaiIn+"&AkhirIn="+AkhirIn ,"MyTargetWindowName")
			});
		</script>