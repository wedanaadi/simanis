<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
   function __construct() 
	{
		$this->CI =& get_instance();
  		parent::__construct();
  		if ($this->session->userdata('kodeuser')==NULL) {
  			redirect('Login'); }
		//$this->load->model('M_penerimaan');
		$this->load->helper(array('url'));
		$this->load->library(array('session','create_pdf'));
	}

   public function index()
	{
		$this->load->view('laporan/viewlaporan');
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
?>