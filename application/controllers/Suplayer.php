<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplayer extends CI_Controller {

function __construct() 
	{
  		parent::__construct();
  		/*      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }*/
 		$this->load->model('M_suplayer');
	}

function index()
	{
		$data['kodeotomatis'] = $this->M_suplayer->code_otomatis();
    	$data['dataall'] = $this->M_suplayer->all();
		// print_r($data); exit();
		$this->load->view('suplayer/datasuplayer',$data);
	}
  
function kodeotomatis() 
  	{
    	$data['kodeunik'] = $this->m_suplayer->code_otomatis();
  	}


function suplayer_addDB()
	{
		$data =
		[
			'id_suplayer' => $this->input->post('id'),
			'nama_suplayer' => $this->input->post('nama'),
			'notlp_sp' => $this->input->post('tlp'),
			'alamat_sp' => $this->input->post('alamat')
		];
		$this->M_suplayer->create($data);
		$this->session->set_flashdata('alert','Data Berhasil Disimpan');
		redirect('Suplayer');
	}

function find($id)
  	{
   		$data = $this->M_suplayer->find($id);
    	echo json_encode($data);
  	}	

function update() 
  	{
    	$id = $this->input->post('id');
    	$data = 
    	  [
			'id_suplayer' => $this->input->post('id'),
			'nama_suplayer' => $this->input->post('nama'),
			'notlp_sp' => $this->input->post('tlp'),
			'alamat_sp' => $this->input->post('alamat')
    	  ];
   		$this->M_suplayer->update($data,$id);
   		$this->session->set_flashdata('alert','Data Berhasil Disimpan');
	   	redirect('Suplayer');
	}

}

 ?>