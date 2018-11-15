<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

function __construct() 
	{
  	parent::__construct();
      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }
 		$this->load->model('M_karyawan');
	}

	public function index()
	{
		//$data['akses'] = $this->M_karyawan->hakakses();
    $data['dataprofil'] = $this->M_karyawan->idfrofil();
    //print_r($data); exit();
		$this->load->view('profil/dataprofil',$data);
	}
	
function update() 
    {
      //$id = $this->session->userdata('kodeuser');
      $id = $this->input->post('IdKaryawan');
      $data = 
      [
          'id_karyawan' => $this->input->post('IdKaryawan'), 
          'nama_karyawan' => $this->input->post('NamaKaryawan'),
          'id_hakakses' => $this->input->post('IdAkses'), 
          'notlp_kar' => $this->input->post('NoTlp'), 
          'alamat_kar' => $this->input->post('Alamat'),
          'username' => $this->input->post('Username'),
          'pass' => $this->input->post('Pass'),
          'email' => $this->input->post('Email') 
      ];
      //print_r($data); exit();
      $this->M_karyawan->update($data,$id);
      $this->session->set_flashdata('alert','Data Berhasil Disimpan');
      redirect('Profil');
  }

  function updatepass() 
    {
      $id = $this->input->post('IdKaryawan');
      $data = 
      [
          'id_karyawan' => $this->input->post('IdKaryawan'), 
          'pass' => $this->input->post('inputPassword')
      ];
      //print_r($data); exit();
      $this->M_karyawan->update($data,$id);
      $this->session->set_flashdata('alert','Data Berhasil Disimpan');
      redirect('Profil');
  }
	
}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */
 ?>