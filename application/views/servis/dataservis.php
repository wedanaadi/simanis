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
                           <a class="btn btn-primary btn-sm edit ubah" data-id="<?php echo $data->id_service ?>" id="<?php echo $data->id_penerimaan?>" data-toggle="modal" data-target="#editdataservis"><i class="fa fa-pencil"></i> Edit
                          </a> &nbsp;
                          <a class="btn btn-primary btn-sm detail" href="<?php echo base_url('index.php/Servis/view_detail/'.$data->id_service);?>"><i class="fa fa-plus"></i> Detail
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
$this->load->view('servis/editdataservis');
 ?>

<script type="text/javascript">
  $(function () {
    $("#TBservis").DataTable({
    });
  });
</script>

<script type="text/javascript">
  $('.edit').on('click',function(){
    $('.save').removeClass('disabled');
    $('.help-block').text('');
    $('.form-group').removeClass('has-error');
    var id = $(this).attr('id')
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('index.php/Servis/findpenerimaan/') ?>"+id,
      success: function(penerimaan) {
        var ambil = JSON.parse(penerimaan);
        $('[name="NoNota"]').val(ambil.id_penerimaan);
        $('[name="Karyawan"]').val(ambil.nama_karyawan);
        $('[name="Tanggal"]').val(ambil.tgl_penerimaan);
        $('[name="NamaCustomer"]').val(ambil.nama_customer);
        $('[name="NoTelepon"]').val(ambil.notlp_cus);
        $('[name="Alamat"]').val(ambil.alamat_cus);
      }
    });
  });
</script>

<script type="text/javascript">
  $('.ubah').on('click',function(){
    $('.help-block').text('');
    $('.form-group').removeClass('has-error');
    var id = $(this).attr('data-id')
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('index.php/Servis/findservis/') ?>"+id,
      success: function(service) {
        var ambil = JSON.parse(service);
        $('[name="IDService"]').val(ambil.id_service);
        $('[name="NamaBarang"]').val(ambil.nama_barang);
        $('[name="SerialNumber"]').val(ambil.sn_barang);
        $('[name="Kelengkapan"]').val(ambil.kelengkapan);
        $('[name="Keluhan"]').val(ambil.keluhan);
        $('[name="Teknisi"]').val(ambil.id_karyawan);
        $('[name="Status"]').val(ambil.id_status);
        $('[name="Kondisi"]').val(ambil.kondisi);
      }
    });
  });
</script>



