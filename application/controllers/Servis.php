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
		$data['status'] = $this->M_servis->status();
		$data['teknisi'] = $this->M_servis->teknisi();
		$data['kategori'] = $this->M_servis->kategori();
		$this->load->view('servis/dataservis', $data);
	}

	function view_detail($id)
	{
		$data['jasa'] = $this->M_servis->jasa();
		$data['sparepart'] = $this->M_servis->datasparepart();
    $data['getidservis'] = $this->M_servis->getidservis($id);
		//print_r($data); exit();
		$this->load->view('servis/detailservis', $data);
	}

	function findpenerimaan($id)
  	{
   		$data = $this->M_servis->findpenerimaan($id);
    	echo json_encode($data);
  	}

  	function findservis($id)
  	{
   		$data = $this->M_servis->findservis($id);
    	echo json_encode($data);
  	}

  	function update() 
  	{
    	$id = $this->input->post('IDService');
    	$data = 
    	[
      		'id_service' => $this->input->post('IDService'), 
      		'id_penerimaan' => $this->input->post('NoNota'),
      		'id_karyawan' => $this->input->post('Teknisi'), 
      		'id_kategori' => $this->input->post('Kategori'), 
      		'sn_barang' => $this->input->post('SerialNumber'),
      		'nama_barang' => $this->input->post('NamaBarang'),
      		'kelengkapan' => $this->input->post('Kelengkapan'),
      		'keluhan' => $this->input->post('Keluhan'),
      		'id_status' => $this->input->post('Status'),
      		'kondisi' => $this->input->post('Kondisi')

    	];
    	$this->M_servis->update($data,$id);
      	$this->session->set_flashdata('alert','Data Berhasil Disimpan');
	    redirect('Servis');
	}
}

/* End of file Servis.php */
/* Location: ./application/controllers/Servis.php */

 ?>
