<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMANIS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/startboot/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/startboot/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/datatables/datatables.min.css') ?>">
    <!-- sweetalert -->
    <link rel="stylesheet" href="<?php echo base_url('assets/sweetalert/dist/sweetalert.css') ?>">

    <!-- Theme CSS -->
    <link href="<?php echo base_url('assets/startboot/css/agency.min.css')?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">SIMANIS</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#Portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#CekService">Cek Service</a>
                    </li>
                    <li>
                        <a class="" href="<?php echo base_url('index.php/Login') ?>">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Sistem Informasi Manajemen Service</div>
                <div class="intro-heading">Baliyoni Computer</div>
            </div>
        </div>
    </header>

    <section id="Portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Portfolio</h2>
                    <br><br>
                </div>
            </div>
            <div class="row text-center">
              <div class="col-md-4">
                <h4 class="service-heading">Visi</h4>
                <p class="text-muted">Mengoptimalkan pemanfaatan teknologi informasi sebagai solusi efektif (one stop solution) yang di landasi kreativitas dan inovasi.</p>
            </div>
            <div class="col-md-4">
                <h4 class="service-heading">Misi</h4>
                <p class="text-muted">1. Menghadirkan produk teknologi informasi terkini dan terpercaya, 2. Menyediakan layanan pengolah data yang handal, 3. Merancang desain arsitektur enterprice sebagai solusi IT skala global, 4. Memberikan layanan purna jual yang lengkap dan, 5. memuaskan dan Mengembangkan mitra kerja.</p>
            </div>
            <div class="col-md-4">
                <h4 class="service-heading">Moto</h4>
                <p class="text-muted">“One Stop IT Solution“</p>
            </div>
        </div>
        </div>
    </section>

    <section id="CekService">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Cek Service</h2>
                    <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                  <div class="form-group" >
                          <label class="control-label">No Nota</label>
                          <input type="text" name="NoNota" id="NoNota"  class="form-control">
                          <input type="text" style="display: none;" name="EmailCustomer" id="EmailCustomer"  class="form-control">
                    </div>
                </div>
                <div class="col-xs-2" style="margin-top: 8px;">
                    <div class="form-group" >
                        <a style="margin-top:17px; margin-left:2px; " class="btn btn-success btn-flat Cari disabled" id="Cari"><i class='fa fa-search'></i>  Cari  </a> 
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                  <div class="form-group" >
                          <label class="control-label">Nama Customer</label>
                          <input type="text" name="NamaCustomer" id="NamaCustomer" readonly="readonly" class="form-control">
                    </div>
                </div>
            </div>
            <div class="box-body">
<!--               <div class="col-md-10"> -->
                <!-- <div class="box-body"> -->
                  <div class="table-responsive">
                    <table id="tabel1" class="table table-bordered table-striped" style="width: 100%" >
                      <thead>
                        <tr>
                          <th>Nama Barang</th>
                          <th>Serial Number</th>
                          <th>Kelengkapan</th>
                          <th>Keluhan</th>
                          <th>Status Servis</th>
                          <th>Action</th>
                          <th style="display: none;">No</th>
                        </tr>
                        <a class='btn btn-success btn-flat Harga disabled'><span class='fa fa-envelope'> Request Harga Service</span></a>
                        <br><br>
                      </thead>
                    </table>
                  </div>
                <!-- </div> -->
<!--               </div> -->
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row" align="left">
                
                    <strong>Copyright &copy; 2018 <a href="">SIMANIS</a>.</strong> All rights
           
        </div>
    </footer>

    <!-- jQuery -->

</body>
<script src="<?php echo base_url('assets/startboot/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/startboot/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/startboot/js/jqBootstrapValidation.js')?>"></script>
<script src="<?php echo base_url('assets/startboot/js/contact_me.js')?>"></script>
<script src="<?php echo base_url('assets/sweetalert/dist/sweetalert.js')  ?>"></script>
<script src="<?php echo base_url('assets/startboot/loadingoverlay.min.js')  ?>"></script>
<script src=" <?php echo base_url('assets/validator/validator.js')?> "></script>

<!-- Loading Overlay -->
<script type="text/javascript">
	$.LoadingOverlaySetup({
    color           : "rgba(255, 255, 255, 0.8)" ,
    image           : "<?php echo base_url('assets/startboot/2.gif') ?>",
    maxSize         : "64px",
    minSize         : "64px",
    resizeInterval  : 0,
    size            : "100%"
});
</script>

<!-- Theme JavaScript -->
<script src="<?php echo base_url('assets/startboot/js/agency.min.js')?>"></script>
<?php $this->load->view('login/showdetail'); ?>

</html>

  <script type="text/javascript">
  $(function () {
    $("#tabel1").DataTable({
/*      paging:false, searching:false*/
    });
  });
  </script>

   <script>
      $('#NoNota').keyup(function (){
        $('#Cari').removeClass('disabled');
        if ($('#NoNota').val()=='' ) {
          $('#Cari').addClass('disabled');
        };
      });
  </script>

  <script type="text/javascript">
  $('.Cari').on('click',function(){
     var nonota = $('input[name=NoNota]').val();
     var t = $('#tabel1').DataTable();
     t.clear();
     var jumlah = t.rows().count();
      if(jumlah =! 0)
      {
        $('.Harga').removeClass('disabled');
      }

      $.ajax({
      url: "<?php echo site_url('Login/cariservice') ?>",
      method: "GET",
      type: "JSON",
      data: {id_penerimaan: nonota},
      success: function(data)
      {
        var obj = JSON.parse(data);
        console.log(obj);
        var Action = "<a class='btn btn-success btn-xs DetailData'><span class='fa fa-share-square-o' data-toggle='modal' data-target='#show'> Cek Service</span></a>" 
        var t = $('#tabel1').DataTable();
        $('#NamaCustomer').val(obj[0].nama_customer);
        $('#EmailCustomer').val(obj[0].email_cus);
        for (var i = 0; i < obj.length; i++) {
            t.row.add([
            obj[i].nama_barang,
            obj[i].sn_barang,
            obj[i].kelengkapan,
            obj[i].keluhan,
            obj[i].status_service,
            Action,
            obj[i].id_service,
          ]).draw(false);
            t.row(t).column(6).nodes().to$().css('display','none');
        }          
      }
    }); 
  });
</script>

<script type="text/javascript">
   $(document).on('click', '.DetailData', function(e){
    if(!e.isDefaultPrevented()){
     var t = $('#tabel1').DataTable();
     var b = $('#tabel12').DataTable();
     b.clear();
     var tb1 = t.row($(this).parents('tr')).data();
     var idser1 = tb1[6];
     console.log(idser1);
        $.ajax({
        url: "<?php echo site_url('Login/caridetail') ?>",
        method: "GET",
        type: "JSON",
        data: {nonota2: idser1},
        success: function(detilservice)
          {
            var obj2 = JSON.parse(detilservice);
            var b = $('#tabel12').DataTable();
            console.log(obj2[0]);
            for (var i = 0; i < obj2.length; i++) {
                b.row.add([
                i+1,
                obj2[i].nama_service,
                obj2[i].qty,
              ]).draw();
            }
          }
        });
    }
   return false;
 });
</script>

<script>
  $('.Harga').on('click',function(e){
    if(!e.isDefaultPrevented())
    $.LoadingOverlay("show");
      {
        var _data = {
          no_nota: $('input[name=NoNota]').val(),
          emailcus : $('input[name=EmailCustomer]').val(),
        };
        $.ajax({
          url: "<?php echo site_url('Login/Email') ?>",
          type: "POST",
          method: "POST",
          data: _data,
          success: function(data)
          {
            obj = JSON.parse(data);
            $.LoadingOverlay("hide");
            swal({
                title: "Sukses",
                text: obj.message,
                type: "success",
                timer: 2000,
                button: "ok",
            });
          }
        });
      }
    return false;
  });
</script>