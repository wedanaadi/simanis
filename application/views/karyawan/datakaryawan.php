<?php 
$this->load->view('layouts/template-atas');
?>
    
    <section class="content-header" >
      <h1>
        Data Karyawan
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
                <a style="float:right"  href="#" class=" btn btn-primary tambah" data-toggle="modal" data-target="#tambahkaryawan" title="Tambah Data">
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
                    <th>ID Karyawan</th>
                    <th>Nama</th>
                    <th>Hak Akses</th>
                    <th>Action</th>
                  </tr>
              </thead>
                  <?php 
                      $no = 1;
                      foreach ($dataall as $data ) {
                  ?>
                      <tr class='odd gradeX context' >
                          <td><?php echo $no; ?> </td>
                          <td><?php echo $data->id_karyawan ?></td>
                          <td><?php echo $data->nama_karyawan?></td>
                          <td><?php echo $data->hak_akses?></td>
                          <td align="center"> <!-- tambahan "edit" pada class dibawah untuk ajax -->
                           <a class="btn btn-primary edit" data-id="<?php echo $data->id_karyawan ?>" data-toggle="modal" data-target="#ubahkaryawan" class="btn btn-primary btn-xs" class=" btn btn-primary"><i class="fa fa-pencil-square"></i> Edit
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
$this->load->view('karyawan/karyawan_Add');
$this->load->view('karyawan/karyawan_edit');
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

<script type="text/javascript">
    $('.edit').on('click',function(){
    $('.help-block').text('');
    $('.form-group').removeClass('has-error');
    var id = $(this).attr('data-id')
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('index.php/karyawan/find/') ?>"+id,
      success: function(karyawan) {
        var ambil = JSON.parse(karyawan);
        $('[name="id"]').val(ambil.id_karyawan);
        $('[name="nama"]').val(ambil.nama_karyawan);
        $('[name=akses').val(ambil.id_hakakses);
        $('[name="tlp"]').val(ambil.notlp_kar);
        $('[name="alamat"]').val(ambil.alamat_kar);
        $('[name="username"]').val(ambil.username);
        $('[name="pass"]').val(ambil.pass);
        $('[name="email"]').val(ambil.email);
        }
    });
  });
</script>

<script type="text/javascript">
    $('.tambah').on('click',function(){
      $('#form1')[0].reset();
    });
</script>
