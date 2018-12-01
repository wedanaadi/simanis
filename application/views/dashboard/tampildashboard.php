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
                <?php 
                      foreach ($servismasuk as $data ) {
                  ?>
                <h3 ><?php echo $data->penerimaan ?> Unit</h3>
                  <?php 
                      }
                  ?>
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
                  <?php 
                      foreach ($serviskeluar as $data ) {
                  ?>
                <h3><?php echo $data->pengembalian ?> Unit</h3><!-- <sup style="font-size: 20px">%</sup> -->
                  <?php 
                      }
                  ?>
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
                  <?php 
                      foreach ($servis_selesai as $data ) {
                  ?>
                <h3><?php echo $data->servis_selesai ?> Unit</h3>
                  <?php 
                      }
                  ?>
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
                  <?php 
                      foreach ($proses_selesai as $data ) {
                  ?>
                <h3><?php echo $data->proses_selesai ?> Unit</h3>
                  <?php 
                      }
                  ?>
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

        <!-- /.col (LEFT) -->
        <div class="col-md-12">
          <!-- LINE CHART -->

                    <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart Penerimaan dan Pengembalian Service</h3>

              <div class="box-tools pull-right">
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:310px"></canvas>
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
<script>
  $(function () {
    var Bulan = [];
    var Bulan2 = [];
    var Jumlah_Data = [];
    var Jumlah_Data2 = [];

    $.ajax({
      method: "POST",
      url: "<?php echo base_url('index.php/Dashboard/hitungpenerimaan') ?>",
      success: function(hitung) {
        var obj = JSON.parse(hitung);
        $.each(obj, function (test, item) {
          Bulan.push(item.bulan);
          Jumlah_Data.push(item.jumlah_Data);
          //console.log(Bulan);
        });
    
    $.ajax({
      method: "POST",
      url: "<?php echo base_url('index.php/Dashboard/hitungpengembalian') ?>",
      success: function(hitung) {
        var obj = JSON.parse(hitung);
        $.each(obj, function (test, item) {
          Bulan2.push(item.bulan2);
          Jumlah_Data2.push(item.jumlah_Data2);
          //console.log(Bulan2);
        });

        

    var areaChartData = {
      labels  : Bulan,
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : Jumlah_Data 
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : Jumlah_Data2
        }
      ]
    }
 

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
       }
      });
    }
    });
  });
</script>