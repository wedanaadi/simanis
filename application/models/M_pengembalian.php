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
			o.nama_kategori, s.sn_barang, s.nama_barang, t.status_service, g.nama_st,s.kondisi
			FROM m_service s
			JOIN m_penerimaan p ON (s.`id_penerimaan`= p.`id_penerimaan`) 
			JOIN m_customer c ON (p.`id_customer`= c.`id_customer`)
			JOIN m_karyawan k ON (s.`id_karyawan`= k.`id_karyawan`)
			JOIN m_kategoriservis o ON (s.`id_kategori` = o.`id_kategori`)
			JOIN status_service t ON (s.`id_status` = t.`id_status` )
			JOIN garansi g ON (s.`id_garansi` = g.`id_garansi`);
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
 }
 
 /* End of file M_pengembalian.php */
 /* Location: ./application/models/M_pengembalian.php */ ?>