<script src="<?php echo base_url('assets/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLte/js/adminlte.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/lte/bower_components/select2/dist/js/select2.full.min.js')?>"></script>
<script src="<?php echo base_url('assets/sweetalert/dist/sweetalert.js')  ?>"></script>
<!-- ChartJS -->
<script src=" <?php echo base_url('assets/lte/bower_components/chart.js/Chart.js')?>"></script>
<script src=" <?php echo base_url('assets/validator/validator.js')?> "></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/lte/bower_components/raphael/raphael.min.js')?>"></script>
<script src="<?php echo base_url('assets/lte/bower_components/morris.js/morris.min.js')?>"></script>
<!-- bootstrap datepicker -->
<script src=" <?php echo base_url('assets/lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?> "></script>
<script src=" <?php echo base_url('assets/imask/min/inputmask/inputmask.min.js')?> "></script>
<script src=" <?php echo base_url('assets/imask/min/inputmask/inputmask.extensions.min.js')?> "></script>
<script src=" <?php echo base_url('assets/imask/min/inputmask/inputmask.numeric.extensions.min.js')?> "></script>
<script src=" <?php echo base_url('assets/imask/min/inputmask/jquery.inputmask.min.js')?> "></script>

<script type="text/javascript">
      /** add active class and stay opened when selected */
var url = window.location;
//alert(url)

// for sidebar menu entirely but not cover treeview
$('uL.sidebar-menu a').filter(function() {
     return this.href == url;
}).parent().addClass('active');

// for treeview
$('ul.treeview-menu a').filter(function() {
     return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
</script>