<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa extends CI_Controller {

function __construct() 
	{
  		parent::__construct();
  		/*      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }*/
 		$this->load->model('M_jasa');
	}

function index()
	{
		$data['kodeotomatis'] = $this->M_jasa->code_otomatis();
    	$data['dataall'] = $this->M_jasa->all();
		// print_r($data); exit();
		$this->load->view('jasa/datajasa',$data);
	}
  
function kodeotomatis() 
  	{
    	$data['kodeunik'] = $this->M_jasa->code_otomatis();
  	}


function jasa_addDB()
	{
		$data =
		[
			'id_jasa' => $this->input->post('id'),
			'nama_jasa' => $this->input->post('nama'),
			'harga_jasa' => $this->input->post('hargajasa')
		];
		$this->M_jasa->create($data);
		$this->session->set_flashdata('alert','Data Berhasil Disimpan');
		redirect('Jasa');
	}

function find($id)
  	{
   		$data = $this->M_jasa->find($id);
    	echo json_encode($data);
  	}	

function update() 
  	{
    	$id = $this->input->post('id');
    	$data = 
    	  [
			'id_jasa' => $this->input->post('id'),
			'nama_jasa' => $this->input->post('nama'),
			'harga_jasa' => $this->input->post('hargajasa')
    	  ];
   		$this->M_jasa->update($data,$id);
   		$this->session->set_flashdata('alert','Data Berhasil Disimpan');
	   	redirect('Jasa');
	}

}

 ?>