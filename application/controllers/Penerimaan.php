<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaan extends CI_Controller {

 function __construct() 
	{
		$this->CI =& get_instance();
  		parent::__construct();
      /*      if ($this->session->userdata('kodeuser')==NULL) {
	  redirect('Login'); }*/
		$this->load->model('M_penerimaan');
		$this->load->helper(array('url'));
		$this->load->library( array('create_kode'));
	}

 function index()
	{
		$tahun = date('y'); 
        $bulan = date('m');
		$hari	= date ('d'); 
		$last_kode = $this->M_penerimaan->last_kode($tahun.$bulan.$hari);
		$data['kodetd'] = $this->create_kode->generate_menu($last_kode->kode, 3, 9, 'PEM', $tahun.$bulan.$hari);
		$data['teknisi'] = $this->M_penerimaan->teknisi();
		$data['kategori'] = $this->M_penerimaan->kategori();
		$data['customer'] = $this->M_penerimaan->customer();
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
				'id_karyawan' => $this->input->post('tbdetil')[$i][8],
				'id_kategori' => $this->input->post('tbdetil')[$i][7],
				'sn_barang' => $this->input->post('tbdetil')[$i][1],
				'nama_barang' => $this->input->post('tbdetil')[$i][0],
				'kelengkapan' => $this->input->post('tbdetil')[$i][2],
				'keluhan' => $this->input->post('tbdetil')[$i][3],
				'id_status' => '3',
				'kondisi' => '1'
			];
		}

		$this->M_penerimaan->insertDB($penerimaan,$service);
		echo json_encode(['success' => true,'message' => 'Berhasil']);
	}
}


/* End of file Penerimaan.php */
/* Location: ./application/controllers/Penerimaan.php */ 

?>