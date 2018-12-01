<?php 
class Dashboard extends CI_Controller {

	function __construct() 
	{
  		parent::__construct();
	      if ($this->session->userdata('kodeuser')==NULL) {
	      redirect('Login'); }
 		$this->load->model('M_penerimaan');
 		$this->load->model('M_pengembalian');
 		$this->load->model('M_servis');
	}
	
	public function index()
	{
		$data['servismasuk'] = $this->M_penerimaan->hitungservismasuk();
    	$data['serviskeluar'] = $this->M_pengembalian->hitungserviskeluar();
    	$data['servis_selesai'] = $this->M_servis->servis_selesai();
    	$data['proses_selesai'] = $this->M_servis->proses_selesai();
		//print_r($data); exit();
		$this->load->view('dashboard/tampildashboard',$data);
	}

	function hitungpenerimaan() 
	{
		//$data = array();
		$data = $this->M_penerimaan->hitungpenerimaan();
    	echo json_encode($data);
    	//print_r($cek);exit();
	}

	function hitungpengembalian() 
	{
		//$data = array();
		$data = $this->M_pengembalian->hitungpengembalian();
    	echo json_encode($data);
    	//print_r($cek);exit();
	}
}
 ?>