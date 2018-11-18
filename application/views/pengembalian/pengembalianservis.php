<?php 
$this->load->view('layouts/template-atas');
?>

<!-- Content Header (Page header) -->
<section class="content-header" >
	<h1>
		Pengembalian Service
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
							<div class="col-md-6"> <!-- RP -->
								<div id ="baris2" class="form-group">
									<label class="control-label totalL" style="font-size: xx-large; padding-left: 40px;" id="totalsemua"></label>
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
									<a class="btn btn-primary btn-flat tambahkan" id="tambah" data-toggle="modal" data-target="#showdataservis"><i class='fa fa-plus-square-o'></i>  Tambah Data Service </a> 
								</div>
							</div>
						</div>
		               <div>
		               	<hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 1px; margin-bottom: 0px;">
		                <h4 class="box-title" style="margin-top: -10px; margin-bottom: 0px;" ><strong>&nbsp;&nbsp;Barang Service</strong> </h4>
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
		               	<hr style="border-top: 3px solid #8c8b8b; padding: 6px; margin-top: 15px; margin-bottom: 0px;">
		                <h4 class="box-title" style="margin-top: -10px; margin-bottom: 0px;" ><strong>&nbsp;&nbsp;Detail Service</strong> </h4>
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
                      <input type="text" class="form-control total" name="Total" value="0" readonly="readonly" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
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
                      <input type="text" class="form-control Bayar" name="Bayar" placeholder = "Masukan Pembayaran" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
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
                      <input type="text" class="form-control Kembalian" name="Kembalian" readonly="readonly" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
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
  });
  </script>

<script type="text/javascript">
   $(document).on('click', '.Hapus', function(e){
   	if(!e.isDefaultPrevented()){
   	 var b = $('#tbservis').DataTable();
		 var tabel = $('#tbdetailservis').DataTable();
     var tb1 = b.row($(this).parents('tr')).data();
     var idser1 = tb1[0];
		 var datadetil = [];
		 var grand_total = $('input[name=Total]').val();
     b.row($(this).closest('tr')).remove().draw(false);
		  $('#tbdetailservis tbody tr').each(function(index){
				$row = $(this);
				var id = $row.find("td:eq(0)").text();
				if(id.indexOf(idser1) === 0) {
						row_id = tabel.row(this);
						aksi = true;
						datadetil.push(row_id.data());
						row_id.remove().draw(false);
				}
			});
			for (let w = 0; w < datadetil.length; w++) {
				grand_total = parseFloat(grand_total) - parseFloat(datadetil[w][4]);
			}
			console.log(grand_total);
			$('input[name=Total]').val(grand_total);
			$('.totalL').text('Rp. '+ grand_total);

   	}
   return false;
 });
</script>

<script type="text/javascript">
	$('.total, .Bayar, .Kembalian').inputmask("numeric", 
	{
    	groupSeparator: ".",
        digits: 0,
        autoGroup: true,
        rightAlign: false,
        removeMaskOnSubmit: true,
        allowMinus: false
    });
</script>