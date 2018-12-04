<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servis extends CI_Controller {

	function __construct() 
	{
  	parent::__construct();
      if ($this->session->userdata('kodeuser')==NULL) {
      redirect('Login'); }
 		$this->load->model(array('M_servis','M_sparepart'));
	}

	public function index()
	{
		$data['dataall'] = $this->M_servis->all();
		$data['status'] = $this->M_servis->status();
		$data['teknisi'] = $this->M_servis->teknisi();
		$data['kategori'] = $this->M_servis->kategori();
		$data['garansi'] = $this->M_servis->garansi();
		$this->load->view('servis/dataservis', $data);
	}

	function view_detail($id)
	{
		$data['jasa'] = $this->M_servis->jasa();
		$data['sparepart'] = $this->M_servis->datasparepart();
    	$data['getidservis'] = $this->M_servis->getidservis($id);
		//print_r($data); exit();
		$this->load->view('servis/detailservis', $data);
	}

	function findpenerimaan($id)
  	{
   		$data = $this->M_servis->findpenerimaan($id);
    	echo json_encode($data);
  	}

  	function findservis($id)
  	{
   		$data = $this->M_servis->findservis($id);
    	echo json_encode($data);
  	}

  	function update() 
  	{
    	$id = $this->input->post('IDService');
    	$data = 
    	[
      		'id_service' => $this->input->post('IDService'), 
      		'id_penerimaan' => $this->input->post('NoNota'),
      		'id_karyawan' => $this->input->post('Teknisi'), 
      		'id_kategori' => $this->input->post('Kategori'), 
      		'sn_barang' => $this->input->post('SerialNumber'),
      		'nama_barang' => $this->input->post('NamaBarang'),
      		'kelengkapan' => $this->input->post('Kelengkapan'),
      		'keluhan' => $this->input->post('Keluhan'),
      		'id_status' => $this->input->post('Status'),
      		'id_garansi' => $this->input->post('Garansi'),
      		'kondisi' => $this->input->post('Kondisi')

    	];
    	$this->M_servis->update($data,$id);
    	echo json_encode(['success' => true,'message' => 'Data Berhasil Disimpan']);
/*      	$this->session->set_flashdata('alert','Data Berhasil Disimpan');
	    redirect('Servis');*/
	}

/*	function cencel()
	{
			$dataold = $this->M_servis->getDetilService($this->input->post('IDService')); //select data detilservice berdasarkan id
			$stockAkhirLama = []; // set valiabel array
			for ($a=0; $a < count($dataold); $a++) // hitung data hasil select dari variable dataold
			{ 
				if($dataold[$a]->status  == '1') // jika status nya adalah 1 lakukan aksi dibawah
				{
					$getSparepartLama = $this->M_sparepart->find($dataold[$a]->nama_id); // get spare part
					// hitung stock yang ditambah
					$stockLama[] = [ 
						'id_sparepart' => $dataold[$a]->nama_id,
						'jumlah_stok' => $getSparepartLama->jumlah_stok + $dataold[$a]->qty
					];
					$stockAkhirLama = []; //kosongkan array
					$stockAkhirLama = array_merge($stockAkhirLama, $stockLama); //gabungkan stock akhir lama dengan stock lama kemudian set stock akhir lama
				}
			}
			$this->M_servis->update_sparepart_old($stockAkhirLama, $this->input->post('IDService'), count($stockAkhirLama)); //lihat di model

		$id = $this->input->post('IDService');
    	$data = 
    	[
      		'id_service' => $this->input->post('IDService'), 
      		'id_penerimaan' => $this->input->post('NoNota'),
      		'id_karyawan' => $this->input->post('Teknisi'), 
      		'id_kategori' => $this->input->post('Kategori'), 
      		'sn_barang' => $this->input->post('SerialNumber'),
      		'nama_barang' => $this->input->post('NamaBarang'),
      		'kelengkapan' => $this->input->post('Kelengkapan'),
      		'keluhan' => $this->input->post('Keluhan'),
      		'id_status' => $this->input->post('Status'),
      		'id_garansi' => $this->input->post('Garansi'),
      		'kondisi' => $this->input->post('Kondisi')

    	];
    	$this->M_servis->update($data,$id);
    	echo json_encode(['success' => true,'message' => 'Data Berhasil Disimpan']);
	}
*/

	function save_detil()
	{
		// ini untuk stock spare part yang dihapus /lama
		if($this->input->post('adadata') > 0) // cek jumlah request dari view detil service
		{
			$dataold = $this->M_servis->getDetilService($this->input->post('id_service')); //select data detilservice berdasarkan id
			$stockAkhirLama = []; // set valiabel array
			for ($a=0; $a < count($dataold); $a++) // hitung data hasil select dari variable dataold
			{ 
				if($dataold[$a]->status  == '1') // jika status nya adalah 1 lakukan aksi dibawah
				{
					$getSparepartLama = $this->M_sparepart->find($dataold[$a]->nama_id); // get spare part
					// hitung stock yang ditambah
					$stockLama[] = [ 
						'id_sparepart' => $dataold[$a]->nama_id,
						'jumlah_stok' => $getSparepartLama->jumlah_stok + $dataold[$a]->qty
					];
					$stockAkhirLama = []; //kosongkan array
					$stockAkhirLama = array_merge($stockAkhirLama, $stockLama); //gabungkan stock akhir lama dengan stock lama kemudian set stock akhir lama
				}
			}
			$this->M_servis->update_sparepart_old($stockAkhirLama, $this->input->post('id_service'), count($stockAkhirLama)); //lihat di model
		}

		// data baru
		$stockAkhir = []; // set array variable
		for ($i=0; $i < count($this->input->post('tbdetil')); $i++) 
		{ 
			if($this->input->post('tbdetil')[$i][8] == '1')
			{
				$getSparepart = $this->M_sparepart->find($this->input->post('tbdetil')[$i][7]);
				$stock[] = [
					'id_sparepart' => $this->input->post('tbdetil')[$i][7],
					'jumlah_stok' => $getSparepart->jumlah_stok - $this->input->post('tbdetil')[$i][2]
				];
				$stockAkhir = [];
				$stockAkhir = array_merge($stockAkhir,$stock);
				// $this->M_sparepart->update($stockAkhir,$this->input->post('tbdetil')[$i][7]);
			}
			
			$dataDetil[] = [
				'id_service' => $this->input->post('tbdetil')[$i][6],
				'nama_id' => $this->input->post('tbdetil')[$i][7],
				'nama_service' => $this->input->post('tbdetil')[$i][1],
				'qty' => $this->input->post('tbdetil')[$i][2],
				'harga' => $this->input->post('tbdetil')[$i][3],
				'subtotal' => $this->input->post('tbdetil')[$i][4],
				'status' => $this->input->post('tbdetil')[$i][8]
			];
		}

		$this->M_servis->save_detil($stockAkhir, $dataDetil, count($stockAkhir));
		echo json_encode(['success' => true,'message' => 'Berhasil']);

	}

	public function get_detil()
	{
		$id = $this->input->get('id_service');
		//$data = $this->db->query("SELECT * FROM m_detailservice WHERE id_service = '$id'")->result();
		$data = $this->M_servis->getDetilService($id);
		echo json_encode($data);
	}

}

/* End of file Servis.php */
/* Location: ./application/controllers/Servis.php */

 ?>
