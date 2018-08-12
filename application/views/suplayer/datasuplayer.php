<?php 
$this->load->view('layouts/template-atas');
?>

   <section class="content-header" >
      <h1>
        Data Suplayer
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
            <!-- /.box-header -->
            <!-- /.box-body -->
          </div> <!-- /.box -->

          <div class="box">
            <div class="box-header">
            <div class="box-header"> <!-- tambahan "tambah" pada class dibawah untuk ajax -->
                <a style="float:right"  href="#" class=" btn btn-primary tambah" data-toggle="modal" data-target="#tambahsuplayer" title="Tambah Data">
                 <i class="fa fa-plus-circle"></i> Tambah Data
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Suplayer</th>
                    <th>Nama</th>
                    <th>Nomer Telepon</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
              </thead>
                  <?php 
                      $no = 1;
                      foreach ($dataall as $data ) {
                  ?>
                      <tr class='odd gradeX context' >
                          <td><?php echo $no; ?> </td>
                          <td><?php echo $data->id_suplayer ?></td>
                          <td><?php echo $data->nama_suplayer?></td>
                          <td><?php echo $data->notlp_sp?></td>
                          <td><?php echo $data->alamat_sp?></td>
                          <td align="center"> <!-- tambahan "edit" pada class dibawah untuk ajax -->
                           <a class="btn btn-primary edit" data-id="<?php echo $data->id_suplayer ?>" data-toggle="modal" data-target="#ubahsuplayer" class="btn btn-primary btn-xs" class=" btn btn-primary"><i class="fa fa-pencil-square"></i> Edit
                          </a>
                          </td>
                      </tr>
                  <?php 
                      $no++;
                      }
                  ?>
              </table>
            </div>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
    </section>

<?php 
$this->load->view('layouts/template-bawah');
$this->load->view('suplayer/Suplayer_Add');
$this->load->view('suplayer/Suplayer_edit');
?>

<script>
  $(function () {
    $('#example1').dataTable( {
  "language": {
    "search": "Cari : "
  }
} );
  })
</script>

<!-- <script type="text/javascript">
  $('#ubahcustomer').on('hidden.bs.modal', function(e){
    $('[name="id"]').val('');
            $('[name="nama"]').val('');
            $('[name="alamat"]').val('');
            $('[name="tlp"]').val('');
            $('[name="email"]').val('');
  });
</script> -->

<script type="text/javascript">
  $('.edit').on('click',function(){
    var id = $(this).attr('data-id')
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('index.php/Suplayer/find/') ?>"+id,
      success: function(suplayer) {
        var ambil = JSON.parse(suplayer);
        $('[name="id"]').val(ambil.id_suplayer);
        $('[name="nama"]').val(ambil.nama_suplayer);
        $('[name="alamat"]').val(ambil.alamat_sp);
        $('[name="tlp"]').val(ambil.notlp_sp);
      }
    });
  });
</script>

<script type="text/javascript">
    $('.tambah').on('click',function(){
    $('#form1')[0].reset();
    });
</script>

