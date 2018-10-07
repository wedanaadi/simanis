<?php 
if ($this->session->flashdata('alert')) : ?>

<script>
	swal({
  		title: "",
  		text: "<?php echo $this->session->flashdata('alert'); ?>",
  		type: "success",
  		button: "ok",
	});
</script>
		
<?php 
endif;
 ?>