<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servis extends CI_Controller {

	function __construct() 
	{
  	parent::__construct();
/*      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }*/
 		$this->load->model('M_servis');
	}

	public function index()
	{
		$data['dataall'] = $this->M_servis->all();
		$this->load->view('servis/dataservis', $data);
	}

	function view_detail()
	{
		$data['jasa'] = $this->M_servis->jasa();
		$data['sparepart'] = $this->M_servis->datasparepart();
		//print_r($data); exit();
		$this->load->view('servis/detailservis', $data);
	}
}

/* End of file Servis.php */
/* Location: ./application/controllers/Servis.php */

 ?>