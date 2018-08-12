<?php
class Customer extends CI_Controller {

function __construct() 
	{
  	parent::__construct();
/*      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }*/
 		$this->load->model('M_customer');
	}

function index()
	{
		$data['kodeotomatis'] = $this->M_customer->code_otomatis();
    $data['dataall'] = $this->M_customer->all();
		// print_r($data); exit();
		$this->load->view('customer/datacustomer',$data);
	}
  
function kodeotomatis() 
  {
    $data['kodeunik'] = $this->m_customer->code_otomatis();
  }

function Customer_AddDB() 
	{
		$data =
    	 [
      		'id_customer' => $this->input->post('id'), 
      		'nama_customer' => $this->input->post('nama'),
      		'notlp_cus' => $this->input->post('tlp'), 
      		'alamat_cus' => $this->input->post('alamat'), 
      		'email_cus' => $this->input->post('email') 
    	 ];
    	// print_r($data); exit();
    	$this->M_customer->create($data);
    	redirect('customer');
	}

function find($id)
  	{
   		$data = $this->M_customer->find($id);
    	echo json_encode($data);
  	}	

function update() 
  	{
    	$id = $this->input->post('id');
    	$data = 
    	[
      		'id_customer' => $this->input->post('id'), 
      		'nama_customer' => $this->input->post('nama'),
      		'notlp_cus' => $this->input->post('tlp'), 
      		'alamat_cus' => $this->input->post('alamat'), 
      		'email_cus' => $this->input->post('email') 
    	];
    $this->M_customer->update($data,$id);
	   redirect('customer');
}

}