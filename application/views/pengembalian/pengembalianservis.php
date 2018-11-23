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
									<input type="text" name="id" readonly="readonly" class="form-control" value="<?php echo $kodetd ?>"
									>
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
									<!-- <label class="control-label" style="font-size:xx-large; padding-top: 20px; padding-left: 40px;" >TOTAL</label> -->
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
										<input type="text"   value="<?= date('d/m/Y') ?>" class="form-control pull-right" name="tanggal" id="tanggal" readonly="readonly">
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
							<table id="TbServis" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th style="width: 100px">ID Service</th>
										<th>Nama Barang</th>
										<th>Serial Number</th>
										<th>Kelengkapan</th>
										<th>Keluhan</th>
										<th style="width: 50px">Action</th>
										<th style="display: none;">id_garansi</th>
										<th style="display: none;">id_karyawan</th>
										<th style="display: none;">id_kategori</th>
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
        <div class="col-xs-7">
        </div>
        <div class="col-xs-5">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left; padding-top: 7px;">Total</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control total" name="Total" id="Total" value="0" readonly="readonly" required >
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-7">
        </div>
        <div class="col-xs-5">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left; padding-top: 7px;">PPN</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control PPN" name="PPN" value="0" id="PPN" readonly="readonly" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-7">
        </div>
        <div class="col-xs-5">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left; padding-top: 7px;">Total Fatur</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control TotalFatur" name="TotalFatur" value="0" id="TotalFatur" readonly="readonly" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-7">
        </div>
        <div class="col-xs-5">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left; padding-top: 7px;">Bayar</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control Bayar" name="Bayar" id="Bayar" placeholder = "Masukan Pembayaran" required>
                      <span class="help-block with-errors"></span>
                    </div>
                </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-7">
        </div>
        <div class="col-xs-5">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left; padding-top: 7px;">Kembalian</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control Kembalian" name="Kembalian" value="0" id="Kembalian" readonly="readonly" required>
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
    $("#TbServis").DataTable({
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
   	 var b = $('#TbServis').DataTable();
	 var tabel = $('#tbdetailservis').DataTable();
     var tb1 = b.row($(this).parents('tr')).data();
     var idser1 = tb1[0];
		 var datadetil = [];
		 var grand_total = $('input[name=Total]').inputmask('unmaskedvalue');
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
				PPN = parseFloat(grand_total) * (10 / 100);
				TotalFatur = parseFloat(grand_total) + parseFloat(PPN);
			}
			console.log(grand_total);
			$('input[name=Total]').val(grand_total);
			$('input[name=PPN]').val(PPN);
			$('input[name=TotalFatur]').val(TotalFatur);
			//$('.totalL').text('Rp. '+ TotalFatur);

   	}
   return false;
 });
</script>

<script type="text/javascript">
	$('.total, .Bayar, .Kembalian, .PPN, .TotalFatur').inputmask("numeric", 
	{
    	groupSeparator: ".",
        digits: 0,
        autoGroup: true,
        rightAlign: false,
        removeMaskOnSubmit: true,
        allowMinus: true
    });
</script>

<script type="text/javascript">
	$('#Bayar').on('input',function (){ 
		var zz = $('#TotalFatur').inputmask('unmaskedvalue');
        var aa = $('#Bayar').inputmask('unmaskedvalue');
        var hasil = parseFloat(aa) - parseFloat(zz);
        /*console.log(hasil);*/
        $('#Kembalian').val(hasil);
        console.log(aa);
        console.log(zz);
        if(aa-zz < 0) {
        	$('.save').prop('disabled',true);
        	console.log('mati');
        }
        else if(aa-zz > 0){
        	$('.save').prop('disabled',false);
        	console.log('hidup');
        }
        else if(aa-zz == 0){
        	$('.save').prop('disabled',false);
        	console.log('hidup');
        }

	});
</script>

<script>
  $(document).on('submit',function(e){
    if(!e.isDefaultPrevented())
    {
      var tabel = $("#TbServis").DataTable();

      var _data = {
          no_nota: $('input[name=id]').val(),
          customer: $('input[name=IdCustomer]').val(),
          karyawan: $('input[name=IDKaryawan]').val(),
          tanggal: $('input[name=tanggal]').val(),
          bayar: $('input[name=Bayar]').val(),
          total: $('input[name=Total]').val(),
          kembalian: $('input[name=Kembalian]').val(),
          PPN: $('input[name=PPN]').val(),
          TotalFatur: $('input[name=TotalFatur]').val(),
          TbServis: tabel.rows().data().toArray(),
        };

        $.ajax({
          url: "<?php echo site_url('Pengembalian/addpenerimaan') ?>",
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
              window.location = "<?php echo site_url('Pengembalian') ?>";
            });
          }
        });
      }
    /*}*/
    return false;
  });
</script>

<?php if($this->session->flashdata('no_nota')): ?>
<?php $kodecetak =  $this->session->flashdata('no_nota');?> 
<script type="text/javascript">
  $(document).ready(function() {
    var kodepen = "<?php echo $kodecetak;?>"
          window.open("<?php echo base_url(). 'index.php/Pengembalian/CetakPEN/';?>?KodePen="+kodepen ,"MyTargetWindowName")
  });
  </script>
<?php endif; ?>