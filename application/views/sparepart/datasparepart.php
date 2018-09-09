<?php 
$this->load->view('layouts/template-atas');
?>

    
    <section class="content-header" >
      <h1>
        Data Sparepart
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
                <a style="float:right"  href="#" class=" btn btn-primary tambah" data-toggle="modal" data-target="#tambahsparepart" title="Tambah Data">
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
                    <th>ID Sparepart</th>
                    <th>Nama Suplayer</th>
                    <th>Nama Sparepart</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Action</th>
                  </tr>
              </thead>
                  <?php 
                      $no = 1;
                      foreach ($dataall as $data ) {
                  ?>
                      <tr class='odd gradeX context' >
                          <td><?php echo $no; ?> </td>
                          <td><?php echo $data->id_sparepart ?></td>
                          <td><?php echo $data->nama_suplayer ?></td>
                          <td><?php echo $data->nama_sparepart?></td>
                          <td><?php echo "Rp. ".number_format($data->harga_jual,2,",",",") ?></td>
                          <td><?php echo $data->jumlah_stok?></td>
                          <td align="center"> <!-- tambahan "edit" pada class dibawah untuk ajax -->
                           <a class="btn btn-primary edit" data-id="<?php echo $data->id_sparepart ?>" data-toggle="modal" data-target="#ubahsparepart" class="btn btn-primary btn-xs" class=" btn btn-primary"><i class="fa fa-pencil-square"></i> Edit
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
$this->load->view('sparepart/sparepart_Add');
$this->load->view('sparepart/sparepart_edit');
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
    var id = $(this).attr('data-id')
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('index.php/sparepart/find/') ?>"+id,
      success: function(sparepart) {
        var ambil = JSON.parse(sparepart);
        $('[name="id"]').val(ambil.id_sparepart);
        $('[name="suplayer"]').val(ambil.id_suplayer);
        $('[name="nama"]').val(ambil.nama_sparepart);
        $('[name="pokok"]').val(ambil.harga_pokok);
        $('[name="jual"]').val(ambil.harga_jual);
        $('[name="stok"]').val(ambil.jumlah_stok);
        }
    });
  });
</script>

<script type="text/javascript">
    $('.tambah').on('click',function(){
      $('#form1')[0].reset();
    });
</script>
