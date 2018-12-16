<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_servis extends CI_Model {

	function all()
	{	
		$idaaa = $this->session->userdata('kodeuser');
		$id2 = $this->session->userdata('id_akses');
		
		if ($id2 == 2) 
		{
			$data = $this->db->query("SELECT m_service.id_service, m_penerimaan.id_penerimaan, m_service.id_karyawan, 
			m_karyawan.id_hakakses, m_penerimaan.tgl_penerimaan, m_service.nama_barang, m_karyawan.nama_karyawan, 
			status_service.status_service, garansi.nama_st, m_service.kondisi FROM m_service 
			JOIN m_penerimaan ON (m_service.id_penerimaan = m_penerimaan.id_penerimaan) 
			JOIN m_karyawan ON (m_service.id_karyawan = m_karyawan.id_karyawan)
			JOIN garansi ON (m_service.id_garansi = garansi.id_garansi)
			JOIN status_service ON (m_service.id_status = status_service.id_status) 
			WHERE m_service.id_karyawan = '$idaaa' AND m_service.kondisi = '1'");

		return $data->result();
		}
		elseif ($id2 == 1) 
		{
			$data = $this->db->query('SELECT id_service, m_penerimaan.id_penerimaan, m_penerimaan.tgl_penerimaan, 
			nama_barang, m_karyawan.nama_karyawan, status_service.status_service, garansi.nama_st, kondisi FROM m_service 
			INNER JOIN m_penerimaan ON m_service.id_penerimaan = m_penerimaan.id_penerimaan 
			INNER JOIN m_karyawan ON m_service.id_karyawan = m_karyawan.id_karyawan
			INNER JOIN garansi ON m_service.id_garansi = garansi.id_garansi
			INNER JOIN status_service ON m_service.id_status = status_service.id_status WHERE kondisi = "1"');

		return $data->result();
		}

	}

function servis_selesai()
	 {
		$data = $this->db->query("SELECT COUNT(id_status) AS servis_selesai FROM m_service WHERE id_status = '2' AND kondisi ='1';");
		return $data->result();
	 }

function proses_selesai()
	 {
		$data = $this->db->query("SELECT COUNT(id_status) AS proses_selesai FROM m_service WHERE id_status != '2';");
		return $data->result();
	 }
	
function jasa()
	{
		$data = $this->db->get('m_jasa');
		return $data->result();
	}

function garansi()
	{
		$data = $this->db->get('garansi');
		return $data->result();
	}

function datasparepart() 
 	{
 		$data = $this->db->query('
		SELECT id_sparepart, m_suplayer.nama_suplayer, nama_sparepart, harga_pokok, harga_jual, jumlah_stok
		FROM m_sparepart INNER JOIN m_suplayer ON m_sparepart.id_suplayer = m_suplayer.id_suplayer ORDER BY id_sparepart ASC;');
	 	
	 	return $data->result();
 	}

function status()
	 {
		$data = $this->db->get('status_service');
		return $data->result();
	 }
	 
function teknisi()
	 {
		$data = $this->db->query('
			SELECT * FROM m_karyawan WHERE id_hakakses="2";
			');
		return $data->result();
	 }

function kategori()
	{
		$data = $this->db->get('m_kategoriservis');
		return $data->result();
	}

function findpenerimaan($id)
	{
		$this->db->where('id_penerimaan',$id);
   	 	$data = $this->db->query("SELECT id_penerimaan,m_karyawan.nama_karyawan,tgl_penerimaan,m_customer.nama_customer, m_customer.notlp_cus, m_customer.alamat_cus FROM m_penerimaan
			INNER JOIN m_customer ON m_penerimaan.id_customer = m_customer.id_customer
			INNER JOIN m_karyawan ON m_penerimaan.id_karyawan = m_karyawan.id_karyawan where id_penerimaan = '$id'");
   	 	//$data = $this->db->get('m_penerimaan');
    	return $data->row();
	}

function findservis($id)
	{
		$this->db->where('id_service',$id);
   	 	$data = $this->db->get('m_service');
    	return $data->row();
	}

	function update($data,$id) 
  	{
    	$this->db->where('id_service',$id);
    	$this->db->update('m_service',$data);
  	}


  	function getidservis($id) 
  	{
    	$this->db->where('id_service',$id);
    	$data = $this->db->get('m_service');
    	return $data->row();
	}

	public function update_sparepart_old($sparepartOld, $id_service, $count)
	{
		$this->db->trans_begin();
		if($count > 0)
		{
			$this->db->update_batch('m_sparepart', $sparepartOld, 'id_sparepart');
		}
		$this->db->query("DELETE FROM m_detailservice WHERE id_service = '$id_service'");
		$this->db->trans_complete(); 
		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
				return FALSE;
		}
		else
		{
				$this->db->trans_commit();
				return TRUE;
		}
	}

	public function save_detil($updateStock, $insertDetil, $hitung_sparepart)
	{
		$this->db->trans_begin();
		if($hitung_sparepart > 0) {
			$this->db->update_batch('m_sparepart', $updateStock, 'id_sparepart');
		}
		$this->db->insert_batch( 'm_detailservice', $insertDetil);  
		$this->db->trans_complete(); 
		if ($this->db->trans_status() === FALSE)
		{
				$this->db->trans_rollback();
				return FALSE;
		}
		else
		{
				$this->db->trans_commit();
				return TRUE;
		}
	}

	public function getDetilService($id)
	{
		$this->db->where('id_service',$id);
		return $data = $this->db->get('m_detailservice')->result();
	}
	  
	public function cariservice($id)
	{
		$data = $this->db->query
		("
			SELECT s.id_service, p.id_penerimaan, c.nama_customer, c.email_cus, 
			s.sn_barang, s.nama_barang, t.status_service, s.kondisi, s.keluhan, s.kelengkapan
			FROM m_service s
			JOIN m_penerimaan p ON (s.`id_penerimaan`= p.`id_penerimaan`)
			JOIN m_customer c ON (p.`id_customer`= c.`id_customer`)
			JOIN status_service t ON (s.`id_status` = t.`id_status` )
			WHERE p.id_penerimaan = '$id';
		");
		return $data->result();
	}

	public function caridetail($id)
	{
		$this->db->where('id_service',$id);
		return $data = $this->db->get('m_detailservice')->result();
	}

	function request($Kode)
	{
		$query = $this->db->query
		(
			"SELECT p.`id_penerimaan`, d.`id_service`, s.`nama_barang`, s.`sn_barang`, s.`keluhan`,s.`kelengkapan`, d.`nama_service`, d.`qty`,d.`harga`, d.`subtotal`,c.`nama_customer`,
			(SELECT COUNT(`id_service`) FROM `m_detailservice` WHERE `id_service` = d.`id_service`) AS jumlah
			FROM m_detailservice d
			JOIN m_service s ON (s.id_service = d.`id_service`)
			JOIN m_penerimaan p ON (p.`id_penerimaan` = s.`id_penerimaan`)
			JOIN m_karyawan k ON (k.`id_karyawan` = p.`id_karyawan`)
			JOIN m_customer c ON (c.`id_customer` = p.`id_customer`)
			WHERE p.id_penerimaan = '$Kode';"
		);
		return $query->result();
	}

}

/* End of file M_servis.php */
/* Location: ./application/models/M_servis.php */

?>