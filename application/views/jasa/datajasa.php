<?php 
  $this->load->view('layouts/template-atas');
?>

<section class="content-header" >
      <h1>
        Data Jasa
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
                <a style="float:right"  href="#" class=" btn btn-primary tambah" data-toggle="modal" data-target="#tambahjasa" title="Tambah Data">
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
                    <th>ID Jasa</th>
                    <th>Nama Jasa</th>
                    <th>Harga Jasa</th>
                    <th>Action</th>
                  </tr>
              </thead>
                  <?php 
                      $no = 1;
                      foreach ($dataall as $data ) {
                  ?>
                      <tr class='odd gradeX context' >
                          <td><?php echo $no; ?> </td>
                          <td><?php echo $data->id_jasa ?></td>
                          <td><?php echo $data->nama_jasa?></td>
                          <td><?php echo "Rp. ".number_format($data->harga_jasa,2,",",",") ?></td>
                          <td align="center"> <!-- tambahan "edit" pada class dibawah untuk ajax -->
                           <a class="btn btn-primary edit" data-id="<?php echo $data->id_jasa ?>" data-toggle="modal" data-target="#ubahjasa" class="btn btn-primary btn-xs" class=" btn btn-primary"><i class="fa fa-pencil-square"></i> Edit
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
$this->load->view('jasa/Jasa_Add');
$this->load->view('jasa/Jasa_edit');
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
    $('.help-block').text('');
    $('.form-group').removeClass('has-error');
    var id = $(this).attr('data-id')
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('index.php/Jasa/find/') ?>"+id,
      success: function(jasa) {
        var ambil = JSON.parse(jasa);
        $('[name="id"]').val(ambil.id_jasa);
        $('[name="nama"]').val(ambil.nama_jasa);
        $('[name="hargajasa"]').val(ambil.harga_jasa);
      }
    });
  });
</script>

<script type="text/javascript">
    $('.tambah').on('click',function(){
    $('#form1')[0].reset();
    });
</script>

