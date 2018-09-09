<?php
class Karyawan extends CI_Controller {

function __construct() 
	{
  		parent::__construct();
      /*      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }*/
 		$this->load->model('M_karyawan');
	}

function index()
	{
    	$data['kodeotomatis'] = $this->M_karyawan->code_otomatis();
    	$data['akses'] = $this->M_karyawan->hakakses();
    	$data['dataall'] = $this->M_karyawan->all();
		//print_r($data); exit();
		$this->load->view('karyawan/datakaryawan',$data);
	}

function kodeotomatis() 
  	{
    	$data['kodeunik'] = $this->M_karyawan->code_otomatis();
  	}

function karyawan_addDB() 
	{
		$data =
    	 [
      		'id_karyawan' => $this->input->post('id'), 
      		'nama_karyawan' => $this->input->post('nama'),
      		'id_hakakses' => $this->input->post('akses'), 
      		'notlp_kar' => $this->input->post('tlp'), 
      		'alamat_kar' => $this->input->post('alamat'),
      		'username' => $this->input->post('username'),
      		'pass' => $this->input->post('pass'),
      		'email' => $this->input->post('email') 
    	 ];
    	// print_r($data); exit();
    	$this->M_karyawan->create($data);
    	redirect('karyawan');
	}

function find($id)
  	{
   		$data = $this->M_karyawan->find($id);
    	echo json_encode($data);
  	}	

function update() 
  	{
    	$id = $this->input->post('id');
    	$data = 
    	[
      		'id_karyawan' => $this->input->post('id'), 
      		'nama_karyawan' => $this->input->post('nama'),
      		'id_hakakses' => $this->input->post('akses'), 
      		'notlp_kar' => $this->input->post('tlp'), 
      		'alamat_kar' => $this->input->post('alamat'),
      		'username' => $this->input->post('username'),
      		'pass' => $this->input->post('pass'),
      		'email' => $this->input->post('email') 
    	];
    	$this->M_karyawan->update($data,$id);
	    redirect('karyawan');
	}

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
 ?>