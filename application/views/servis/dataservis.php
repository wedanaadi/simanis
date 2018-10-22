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
                  <?php 
                      //$no = 1;
                      foreach ($dataall as $data ) {
                  ?>
                      <tr class='odd gradeX context' >
                          <td><?php echo $data->id_service ?> </td>
                          <td><?php echo $data->id_penerimaan ?></td>
                          <td><?php echo $data->tgl_penerimaan ?></td>
                          <td><?php echo $data->nama_barang ?></td>
                          <td><?php echo $data->nama_karyawan ?></td>
                          <td><?php echo $data->status_service ?></td>
                          <td align="center"> <!-- tambahan "edit" pada class dibawah untuk ajax -->
                           <a class="btn btn-primary btn-sm edit" data-id="#" data-toggle="modal" data-target="#ubahsparepart"><i class="fa fa-pencil-square"></i> Edit
                          </a> &nbsp;
                          <a class="btn btn-primary btn-sm edit" href="<?php echo base_url('index.php/Servis/view_detail');?>"><i class="fa fa-pencil-square"></i> Detail
                          </a>
                          </td>
                      </tr>
                  <?php 
                      //$no++;
                      }
                  ?>
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