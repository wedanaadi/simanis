<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class M_pengembalian extends CI_Model {
 
	function last_kode($where)
	{
		$data = $this->db->query("SELECT MAX(id_pengembalian) AS 'kode' FROM `m_pengembalian` WHERE SUBSTR(`id_pengembalian`,4,6) = '$where'")->row();  /*(`id_penerimaan`,4,6) -> pada id penerimaan majukan 4 angka dari kiri kemudian ambil 6 angka*/
		return $data;
	}

	function dataservis()
	{
		$data = $this->db->query
		("  
			SELECT s.id_service, p.id_penerimaan, c.nama_customer, c.notlp_cus, c.alamat_cus, 
			p.id_customer, o.nama_kategori, s.sn_barang, s.nama_barang, t.status_service, g.nama_st,s.kondisi
			FROM m_service s
			JOIN m_penerimaan p ON (s.`id_penerimaan`= p.`id_penerimaan`) 
			JOIN m_customer c ON (p.`id_customer`= c.`id_customer`)
			JOIN m_karyawan k ON (s.`id_karyawan`= k.`id_karyawan`)
			JOIN m_kategoriservis o ON (s.`id_kategori` = o.`id_kategori`)
			JOIN status_service t ON (s.`id_status` = t.`id_status` )
			JOIN garansi g ON (s.`id_garansi` = g.`id_garansi`) WHERE s.kondisi = '1';
		");
		return $data->result();
	}

	function getservice($id)
	{
		$this->db->where('id_service', $id);
		return $data = $this->db->get('m_service')->result();
	}

	public function getDetilService($id)
	{
		$this->db->where('id_service',$id);
		return $data = $this->db->get('m_detailservice')->result();
	}

	function insertDB($pengembalian, $TbServis, $updatekonisi)
	{
		// $this->db->trans_strict(FALSE);
		$this->db->trans_begin();
		//$this->db->update_batch('m_service', $updatekonisi);
		$this->db->update_batch('m_service', $updatekonisi, 'id_service');
		$this->db->insert( 'm_pengembalian', $pengembalian);
		$this->db->insert_batch( 'm_detailpengem', $TbServis);  
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

  function loadpenerimaan($kodepen) 
	{
		$query = $this->db->query
		(
			"SELECT d.`id_pengembalian`, w.`nama_karyawan`, k.`nama_kategori`, d.`id_service`,g.`nama_st`, d.`nama_barang`, d.`sn_barang`, 
			d.`kelengkapan`, d.`keluhan`, DATE_FORMAT(p.tgl_pengembalian,'%d-%m-%Y') AS tgl_pengembalian, p.`bayar`, p.`kembalian`, 
			p.`ppn`, p.`total`, p.`totalfatur`, c.`nama_customer`, c.`notlp_cus`, c.`alamat_cus`, s.`nama_service`, s.`qty`, s.`harga`, s.`subtotal`
			FROM m_detailservice s
			JOIN m_detailpengem d ON ( s.`id_service` = d.`id_service`)
			JOIN m_pengembalian p ON ( d.id_pengembalian = p.id_pengembalian)
			JOIN m_customer c ON (p.`id_customer` = c.`id_customer`)
			JOIN m_kategoriservis k ON (k.`id_kategori` = d.`id_kategori`)
			JOIN garansi g ON (g.`id_garansi` = d.`id_garansi`)
			JOIN m_karyawan w ON (w.`id_karyawan` = d.`id_karyawan`) WHERE d.`id_pengembalian` = '$kodepen';"

		);
		return $query->result() ; 
	}
 }
 
 /* End of file M_pengembalian.php */
 /* Location: ./application/models/M_pengembalian.php */ ?>