<!DOCTYPE html>
<html>
<?php  
	$this->load->view('layouts/_partial/head');
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php  
	$this->load->view('layouts/_partial/top-menu');
  ?>
  <aside class="main-sidebar" style="background-color: black">
    <?php  
		$this->load->view('layouts/_partial/left-sidebar');
	?>
  </aside>
  <div class="content-wrapper">