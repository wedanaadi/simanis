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
      $this->session->set_flashdata('alert','Data Berhasil Disimpan');
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
      $this->session->set_flashdata('alert','Data Berhasil Disimpan');
	    redirect('karyawan');
	}

// function checkusername() 
//   {
//       if ($this->M_karyawan->check_username($_POST["username"]))
//           {  
//             echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';
//           }  
      
//       else {
//         echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email Available</label>';
//       }
//   }
//   
  function checkusername()
  {
    $username = $this->input->get('dataUser');
    $data = $this->db->query("SELECT * FROM m_karyawan WHERE username = '$username'")->result();
    if(count($data) != 0)
    {
      echo json_encode(['msg' => 'ada']);
    }
    else
    {
      echo json_encode(['msg' => 'tidak']);
    }
  }
}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */
 ?>