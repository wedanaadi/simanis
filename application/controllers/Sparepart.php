<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sparepart extends CI_Controller {
	function __construct() 
	  {
  		parent::__construct();
      /*      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }*/
 		$this->load->model('M_sparepart');
	  }

	public function index()
	  {
		  $data['kodeotomatis'] = $this->M_sparepart->code_otomatis();
    	$data['akses'] = $this->M_sparepart->suplayer();
    	$data['dataall'] = $this->M_sparepart->all();
		//print_r($data); exit();
		$this->load->view('sparepart/datasparepart',$data);
	  }
  

	function kodeotomatis() 
  	  {
    	$data['kodeunik'] = $this->M_sparepart->code_otomatis();
  	  }

  	function sparepart_addDB() 
	  {
		$data =
    	 [
      		'id_sparepart' => $this->input->post('id'), 
      		'id_suplayer' => $this->input->post('suplayer'),
      		'nama_sparepart' => $this->input->post('nama'), 
      		'harga_pokok' => $this->input->post('pokok'), 
      		'harga_jual' => $this->input->post('jual'),
      		'jumlah_stok' => $this->input->post('stok')
    	 ];
    	// print_r($data); exit();
    	$this->M_sparepart->create($data);
      $this->session->set_flashdata('alert','Data Berhasil Disimpan');
    	redirect('sparepart');
	  }

	function find($id)
  	  {
   		$data = $this->M_sparepart->find($id);
    	echo json_encode($data);
  	  }	

	function update() 
  	  {
    	$id = $this->input->post('id');
    	$data = 
    	[
          'id_sparepart' => $this->input->post('id'), 
          'id_suplayer' => $this->input->post('suplayer'),
          'nama_sparepart' => $this->input->post('nama'), 
          'harga_pokok' => $this->input->post('pokok'), 
          'harga_jual' => $this->input->post('jual'),
          'jumlah_stok' => $this->input->post('stok')
    	];
    	$this->M_sparepart->update($data,$id);
      $this->session->set_flashdata('alert','Data Berhasil Disimpan');
	    redirect('sparepart');
	  }

}

/* End of file Sparepart.php */
/* Location: ./application/controllers/Sparepart.php */
 ?>