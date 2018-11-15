<?php 
$this->load->view('layouts/template-atas');
?>

    <section class="content-header" >
      <h1>
        Dashboard
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row" >
          <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>150</h3>

                <h4>Service Masuk</h4>
              </div>
              <div class="icon">
                <i class="fa fa-download"></i>
              </div>
                <a  class="small-box-footer">-Perhari ini-<i class="fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>53</h3><!-- <sup style="font-size: 20px">%</sup> -->

                <h5>Pengembalian Service</h5>
              </div>
              <div class="icon">
                <i class="fa fa-upload"></i>
              </div>
               <a  class="small-box-footer">-Perhari ini-<i class="fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>44</h3>

                <h5>Service Selesai</h5>
              </div>
              <div class="icon">
                <i class="glyphicon glyphicon-ok"></i>
              </div>
               <a  class="small-box-footer">-Total Semua-<i class="fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>44</h3>

                <h5>Proses Service</h5>
              </div>
              <div class="icon">
                <i class="fa fa-wrench"></i>
              </div>
               <a  class="small-box-footer">-Total Semua-<i class="fa"></i></a>
            </div>
          </div>
        <!-- ./col -->
      </div>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori Barang Service</h3>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Jumlah Penerimaan Dan Pengembalian Service</h3>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
      
      
<?php  
$this->load->view('layouts/template-bawah');
?>