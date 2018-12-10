<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
   function __construct() 
	{
		$this->CI =& get_instance();
  		parent::__construct();
  		if ($this->session->userdata('kodeuser')==NULL) {
  			redirect('Login'); }
		$this->load->model('M_penerimaan');
		$this->load->model('M_pengembalian');
		$this->load->helper(array('url'));
		$this->load->library(array('session','create_pdf'));
	}

   public function index()
	{
		$this->load->view('laporan/viewlaporan');
	}

	function CetakPEM()
	{
		$KodePem = $this->input->get('KodePem', TRUE);
	    $data['header'] = $this->load->view('layouts/cetak_head',null,TRUE);
	    $data['konten'] = $this->M_penerimaan->loadpenerimaan($KodePem);
	    $html=$this->load->view('penerimaan/cetakpem',$data, TRUE);
     	$this->create_pdf->load($html,'TandaTerima'.'-'.$data['konten'][0]->id_penerimaan, 'A4');	
	}

	function CetakPEM_Tgl(){
	   $MulaiPem = $this->input->get('MulaiPem', TRUE);
	   $AkhirPem = $this->input->get('AkhirPem', TRUE);

	   $TglAwal1 = DateTime::createFromFormat('m/d/Y',$MulaiPem);
	   $TglAwal2 = $TglAwal1->format("Y-m-d");
	   $TglAwal3 = $TglAwal1->format("d-m-Y");
	   $TglAkhir1 = DateTime::createFromFormat('m/d/Y',$AkhirPem);
	   $TglAkhir2 = $TglAkhir1->format("Y-m-d");
	   $TglAkhir3 = $TglAkhir1->format("d-m-Y");

	   $data['header'] = $this->load->view('layouts/cetak_head',null,TRUE);
	   $data['konten'] = $this->M_penerimaan->penerimaanbytanggal($TglAwal2, $TglAkhir2);
	   $data['periode'] = array('MulaiPem' => $TglAwal3 , 'AkhirPem' => $TglAkhir3);
	   $html=$this->load->view('laporan/penerimaan_bytgl',$data, TRUE);
	  //print_r($this->db->last_query());exit();
	  //print_r($data);exit();
	  $this->create_pdf->load($html,'TandaTerima'.' '.$TglAwal3.' '.'-'.' '.$TglAkhir3, 'A4-P','');
		
	}

	function CetakPEN()
	{
		$KodePen = $this->input->get('KodePen', TRUE);
	    $data['header'] = $this->load->view('layouts/cetak_head',null,TRUE);
	    $data['konten'] = $this->M_pengembalian->loadpengembalian($KodePen);
	    $html=$this->load->view('pengembalian/cetakpen',$data, TRUE);
     	$this->create_pdf->load($html,'Invoice'.'-'.$data['konten'][0]->id_pengembalian, 'A4');
	}

	function CetakPEN_Tgl()
	{
	   $MulaiIn = $this->input->get('MulaiIn', TRUE);
	   $AkhirIn = $this->input->get('AkhirIn', TRUE);

	   $TglAwal1 = DateTime::createFromFormat('m/d/Y',$MulaiIn);
	   $TglAwal2 = $TglAwal1->format("Y-m-d");
	   $TglAwal3 = $TglAwal1->format("d-m-Y");
	   $TglAkhir1 = DateTime::createFromFormat('m/d/Y',$AkhirIn);
	   $TglAkhir2 = $TglAkhir1->format("Y-m-d");
	   $TglAkhir3 = $TglAkhir1->format("d-m-Y");

	   $data['header'] = $this->load->view('layouts/cetak_head',null,TRUE);
	   $data['konten'] = $this->M_pengembalian->pengembalianbytanggal($TglAwal2, $TglAkhir2);
	   $data['periode'] = array('MulaiIn' => $TglAwal3 , 'AkhirIn' => $TglAkhir3);
	   $html=$this->load->view('laporan/pengembalian_bytgl',$data, TRUE);
		  //print_r($this->db->last_query());exit();
		  //print_r($data);exit();
	   $this->create_pdf->load($html,'TandaTerima'.' '.$TglAwal3.' '.'-'.' '.$TglAkhir3, 'A4-P','');

	}	

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
?>