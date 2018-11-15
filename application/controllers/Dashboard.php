<?php 
class Dashboard extends CI_Controller {

	function __construct() 
	{
  		parent::__construct();
      /*      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }*/
 		$this->load->model('M_karyawan');
	}
	
	public function index()
	{
		$this->load->view('dashboard/tampildashboard');
	}
}
 ?>