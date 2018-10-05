<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

 function __construct() 
	{
  		parent::__construct();
      /*      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }*/
 		$this->load->model('M_penerimaan');
	}

 function index()
	{
		$data['teknisi'] = $this->M_penerimaan->teknisi();
		$data['kategori'] = $this->M_penerimaan->kategori();
		$data['customer'] = $this->M_penerimaan->customer();
		$data['kodetd'] = $this->M_penerimaan->kodetd();
		$this->load->view('Penerimaan/Penerimaan',$data);
	}

}

/* End of file Penerimaan.php */
/* Location: ./application/controllers/Penerimaan.php */ 

?>