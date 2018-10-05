<?php 
$this->load->view('layouts/template-atas');
?>

    <section class="content-header" >
      <h1>
        Data Service
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
            <!-- /.box-header -->
            <!-- /.box-body -->
          </div> <!-- /.box -->

          <div class="box" style="border-top-color: #8c8b8b;">
            <div class="box-header">
            <div class="box-header"> <!-- tambahan "tambah" pada class dibawah untuk ajax -->
                <a style="float:right"  href="#" class=" btn btn-primary tambah" data-toggle="modal" data-target="#tambahcustomer" title="Tambah Data">
                 <i class="fa fa-plus-circle"></i> Tambah Data
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="TBservis" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>ID Servis</th>
                    <th>No Nota</th>
                    <th>Tgl Masuk</th>
                    <th>Nama Barang</th>
                    <th>Teknisi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
              </thead>
              			<!-- data service -->
              </table>
            </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
    </section>

<?php
$this->load->view('layouts/template-bawah');
 ?>

<script type="text/javascript">
  $(function () {
    $("#TBservis").DataTable({
    });
  });
</script>