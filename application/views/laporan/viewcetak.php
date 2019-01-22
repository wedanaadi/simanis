<?php 
$this->load->view('layouts/template-atas');
?>

<section class="content-header" >
	<h1>
		Cetak Ulang
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
									<label class="control-label">Tanda Terima Service</label>
								</div>
							</div>
						</div>
						<div >
						 <hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 6px; margin-bottom: 0px;">
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div id ="barangservis" class="form-group">
									<label class="control-label">Nomer Tanda Terima</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div id ="barangservis" class="form-group">
									<input type="text" name="Terima" id="Terima" class="form-control ">
									<span class="help-block with-errors"></span>
								</div>
							</div>
							<div class="form-group" >
								<a style="margin-top:-1px;" class="btn btn-success disabled TandaTerima" name="terima" id="terima"><i class='fa  fa-print'></i>  Unduh  </a> 
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 40px; margin-bottom: -7px;">
							</div>
							<div class="col-sm-4">
								<div id ="" class="form-group" style="margin-bottom: -1px;">
									<label class="control-label">Invoice Pengembalian Service</label>
								</div>
							</div>
							<div class="col-sm-12">
								<hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 5px; margin-bottom: 0px;">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div id ="barangservis" class="form-group">
									<label class="control-label">Nomer Invoice</label>
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
								<a style="margin-top:-1px;" class="btn btn-success disabled InvoiceServis" id="Tambahkan"><i class='fa  fa-print'></i>  Unduh  </a> 
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