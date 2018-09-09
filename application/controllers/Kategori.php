<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

function __construct() 
	{
  		parent::__construct();
  		/*      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }*/
 		$this->load->model('M_kategori');
	}

function index()
	{
		$data['kodeotomatis'] = $this->M_kategori->code_otomatis();
    	$data['dataall'] = $this->M_kategori->all();
		// print_r($data); exit();
		$this->load->view('Kategori/datakategori',$data);
	}
  
function kodeotomatis() 
  	{
    	$data['kodeunik'] = $this->M_kategori->code_otomatis();
  	}


function kategori_addDB()
	{
		$data =
		[
			'id_kategori' => $this->input->post('id'),
			'nama_kategori' => $this->input->post('nama'),
		];
		$this->M_kategori->create($data);
		redirect('Kategori');
	}

function find($id)
  	{
   		$data = $this->M_kategori->find($id);
    	echo json_encode($data);
  	}	

function update() 
  	{
    	$id = $this->input->post('id');
    	$data = 
    	  [
			'id_kategori' => $this->input->post('id'),
			'nama_kategori' => $this->input->post('nama')
    	  ];
   		$this->M_kategori->update($data,$id);
	   	redirect('Kategori');
	}

}

 ?>