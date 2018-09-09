<?php 
$this->load->view('layouts/template-atas');
 ?>


<?php $this->load->view('layouts/template-bawah'); ?>
<script src="<?php echo base_url();?>assets/lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
  $(function () {
    $('#datepicker').datepicker({
      autoclose: true
    })
  })
</script>