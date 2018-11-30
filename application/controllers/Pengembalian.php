<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	 function __construct()
	{
		$this->CI =& get_instance();
  		parent::__construct();
  		if ($this->session->userdata('kodeuser')==NULL) {
  			redirect('Login'); }
		$this->load->model('M_pengembalian');
		$this->load->library(array('session','create_pdf','create_kode'));
		$this->load->helper(array('url'));

	}

	public function index()
	{
		$tahun = date('y');
        $bulan = date('m');
		$hari	= date ('d');
		$last_kode = $this->M_pengembalian->last_kode($tahun.$bulan.$hari);
		$data['kodetd'] = $this->create_kode->generate_menu($last_kode->kode, 3, 9, 'PEG', $tahun.$bulan.$hari);
		$data['dataservis'] = $this->M_pengembalian->dataservis();
		$this->load->view('Pengembalian/pengembalianservis',$data);
	}

	public function getservice()
	{
		$id = $this->input->get('id_service');
		//$data = $this->db->query("SELECT * FROM m_detailservice WHERE id_service = '$id'")->result();
		$data = $this->M_pengembalian->getservice($id);
		echo json_encode($data);
	}

	public function getdetail()
	{
		$id = $this->input->get('id_serviceI');
		// $data = $this->db->query("SELECT * FROM m_detailservice WHERE id_service = '$id'")->result();
		$data = $this->M_pengembalian->getDetilService($id);
		echo json_encode($data);
	}

	public function addpenerimaan()
	{
		$pengembalian = [
			'id_pengembalian' => $this->input->post('no_nota'),
			'id_customer' => $this->input->post('customer'),
			'id_karyawan' => $this->input->post('karyawan'),
			'tgl_pengembalian' => date('Y-m-d H:i:s'),
			'total' => $this->input->post('total'),
			'ppn' => $this->input->post('PPN'),
			'totalfatur' => $this->input->post('TotalFatur'),
			'bayar' => $this->input->post('bayar'),
			'kembalian' => $this->input->post('kembalian')
		];

		for ($i=0; $i < count($this->input->post('TbServis')); $i++)
		{
			$updatekonisi[] = [
				'id_service' => $this->input->post('TbServis')[$i][0],
				'kondisi' => '0'
			];

		$TbServis[] = [
				'id_pengembalian' => $this->input->post('no_nota'),
				'id_karyawan' => $this->input->post('TbServis')[$i][7],
				'id_kategori' => $this->input->post('TbServis')[$i][8],
				'id_garansi' => $this->input->post('TbServis')[$i][6],
				'id_service' => $this->input->post('TbServis')[$i][0],
				'nama_barang' => $this->input->post('TbServis')[$i][1],
				'sn_barang' => $this->input->post('TbServis')[$i][2],
				'kelengkapan' => $this->input->post('TbServis')[$i][3],
				'keluhan' => $this->input->post('TbServis')[$i][4]
			];
		}

		$this->M_pengembalian->insertDB($pengembalian,$TbServis, $updatekonisi);
		$this->session->set_flashdata('no_nota', $this->input->post('no_nota'));
		echo json_encode(['success' => true,'message' => 'Berhasil']);
	}

	function CetakPEN()
	{
		$KodePen = $this->input->get('KodePen', TRUE);
	    $data['header'] = $this->load->view('layouts/cetak_head',null,TRUE);
	    $data['konten'] = $this->M_pengembalian->loadpengembalian($KodePen);
	    $html=$this->load->view('pengembalian/cetakpen',$data, TRUE);
     	$this->create_pdf->load($html,'Invoice'.'-'.$data['konten'][0]->id_pengembalian, 'A4');
	}

	function CetakPEN_Tgl()
	{
	   $MulaiIn = $this->input->get('MulaiIn', TRUE);
	   $AkhirIn = $this->input->get('AkhirIn', TRUE);

	   $TglAwal1 = DateTime::createFromFormat('m/d/Y',$MulaiIn);
	   $TglAwal2 = $TglAwal1->format("Y-m-d");
	   $TglAwal3 = $TglAwal1->format("d-m-Y");
	   $TglAkhir1 = DateTime::createFromFormat('m/d/Y',$AkhirIn);
	   $TglAkhir2 = $TglAkhir1->format("Y-m-d");
	   $TglAkhir3 = $TglAkhir1->format("d-m-Y");

	   $data['header'] = $this->load->view('layouts/cetak_head',null,TRUE);
	   $data['konten'] = $this->M_pengembalian->pengembalianbytanggal($TglAwal2, $TglAkhir2);
	   $data['periode'] = array('MulaiIn' => $TglAwal3 , 'AkhirIn' => $TglAkhir3);
	   $html=$this->load->view('laporan/pengembalian_bytgl',$data, TRUE);
		  //print_r($this->db->last_query());exit();
		  //print_r($data);exit();
	   $this->create_pdf->load($html,'TandaTerima'.' '.$TglAwal3.' '.'-'.' '.$TglAkhir3, 'A4-P','');

	}
}

/* End of file Pengembalian.php */
/* Location: ./application/controllers/Pengembalian.php */
 /*?>*/
