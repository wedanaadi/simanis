<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

 function __construct() 
	{
		$this->CI =& get_instance();
  		parent::__construct();
  		if ($this->session->userdata('kodeuser')==NULL) {
  			redirect('Login'); }
		$this->load->model('M_penerimaan');
		$this->load->library(array('session','create_pdf','create_kode'));
		$this->load->helper(array('url'));
	}

 function index()
	{
		$tahun = date('y'); 
        $bulan = date('m');
		$hari	= date ('d'); 
		$last_kode = $this->M_penerimaan->last_kode($tahun.$bulan.$hari); 
		/* last_kode($tahun.$bulan.$hari); --> $where pada M_penerimaan untuk mencocokan tgl sekarang dengan id_penerimaan*/ 
		
		$data['kodetd'] = $this->create_kode->generate_menu($last_kode->kode, 3, 9, 'PEM', $tahun.$bulan.$hari);
		
		$data['teknisi'] = $this->M_penerimaan->teknisi();
		$data['kategori'] = $this->M_penerimaan->kategori();
		$data['customer'] = $this->M_penerimaan->customer();
		$data['garansi'] = $this->M_penerimaan->garansi();
		$this->load->view('Penerimaan/Penerimaan',$data);
	}

	function addDB()
	{
		$penerimaan = [
			'id_penerimaan' => $this->input->post('no_nota'),
			'id_customer' => $this->input->post('customer'),
			'id_karyawan' => $this->input->post('karyawan'),
			'tgl_penerimaan' => date('Y-m-d H:i:s')
		];

		for ($i=0; $i < count($this->input->post('tbdetil')); $i++) 
		{ 
			$service[] = [
				'id_penerimaan' => $this->input->post('no_nota'),
				'id_karyawan' => $this->input->post('tbdetil')[$i][9],
				'id_kategori' => $this->input->post('tbdetil')[$i][8],
				'sn_barang' => $this->input->post('tbdetil')[$i][1],
				'nama_barang' => $this->input->post('tbdetil')[$i][0],
				'kelengkapan' => $this->input->post('tbdetil')[$i][2],
				'keluhan' => $this->input->post('tbdetil')[$i][3],
				'id_garansi' => $this->input->post('tbdetil')[$i][10],
				'id_status' => '1',
				'kondisi' => '1'
			];
		}

		$this->M_penerimaan->insertDB($penerimaan,$service);
		$this->session->set_flashdata('no_nota', $this->input->post('no_nota'));
		echo json_encode(['success' => true,'message' => 'Berhasil']);
	}

/*	function Cetak(){
		$data1= $this->load->view('layouts/cetak_head',null,TRUE);
		return $data1;
	}*/

	function CetakPEM(){
		$KodePem = $this->input->get('KodePem', TRUE);
	    $data['header'] = $this->load->view('layouts/cetak_head',null,TRUE);
	    $data['konten'] = $this->M_penerimaan->loadpenerimaan($KodePem);
	    $html=$this->load->view('penerimaan/cetakpem',$data, TRUE);
     	$this->create_pdf->load($html,'TandaTerima'.'-'.$data['konten'][0]->id_penerimaan, 'A4');	
	}

}




/* End of file Penerimaan.php */
/* Location: ./application/controllers/Penerimaan.php */ 

?>