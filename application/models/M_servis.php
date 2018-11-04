<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_servis extends CI_Model {

	function all()
	{
		$data = $this->db->query('SELECT id_service, m_penerimaan.id_penerimaan, m_penerimaan.tgl_penerimaan, nama_barang, m_karyawan.nama_karyawan, status_service.status_service, kondisi FROM m_service 
			INNER JOIN m_penerimaan ON m_service.id_penerimaan = m_penerimaan.id_penerimaan 
			INNER JOIN m_karyawan ON m_service.id_karyawan = m_karyawan.id_karyawan
			INNER JOIN status_service ON m_service.id_status = status_service.id_status WHERE kondisi = "1"');

		return $data->result();
	}
	
function jasa()
	{
		$data = $this->db->get('m_jasa');
		return $data->result();
	}

function datasparepart() 
 	{
 		$data = $this->db->query('
		SELECT id_sparepart, m_suplayer.nama_suplayer, nama_sparepart, harga_pokok, harga_jual, jumlah_stok
		FROM m_sparepart INNER JOIN m_suplayer ON m_sparepart.id_suplayer = m_suplayer.id_suplayer');
	 	
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
/*   	 	$data = $this->db->query("SELECT id_service, id_penerimaan, nama_barang, sn_barang, kelengkapan, keluhan, 
			m_kategoriservis.nama_kategori, m_karyawan.nama_karyawan, status_service.status_service, kondisi FROM m_service 
			INNER JOIN m_kategoriservis ON m_service.id_kategori = m_kategoriservis.id_kategori 
			INNER JOIN m_karyawan ON m_service.id_karyawan = m_karyawan.id_karyawan
			INNER JOIN status_service ON m_service.id_status = status_service.id_status 
			WHERE id_service = '$id'");*/
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
	  
}

/* End of file M_servis.php */
/* Location: ./application/models/M_servis.php */

?>