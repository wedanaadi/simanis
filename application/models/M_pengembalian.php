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

	function hitungserviskeluar()
	 {
		$data = $this->db->query('
			SELECT p.id_pengembalian, COUNT(p.tgl_pengembalian) AS pengembalian 
			FROM m_detailpengem d
			JOIN m_pengembalian p ON (d.`id_pengembalian` = p.`id_pengembalian`)
			WHERE tgl_pengembalian = CURDATE();
			');
		return $data->result();
	 }
	function hitungpengembalian()
	 {
		$data = $this->db->query("
			SELECT CONCAT(YEAR(p.tgl_pengembalian),'/',MONTH(p.tgl_pengembalian)) AS tahun_bulan, DATE_FORMAT(p.tgl_pengembalian, '%M') AS bulan2, COUNT(*) AS jumlah_Data2
			FROM m_detailpengem d
			JOIN m_pengembalian p ON (d.`id_pengembalian` = p.`id_pengembalian`) 
			WHERE CONCAT(YEAR(p.tgl_pengembalian),'/',MONTH(p.tgl_pengembalian))= CONCAT(YEAR(NOW()),'/',MONTH(p.tgl_pengembalian))
			GROUP BY YEAR(p.tgl_pengembalian),MONTH(p.tgl_pengembalian);
			");
		return $data->result();
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

  function loadpengembalian($kodepen)
	{
		$query = $this->db->query
		(
			"SELECT dp.`id_pengembalian`, k.`nama_karyawan`, ks.`nama_kategori`, dp.`id_service`, g.`nama_st`, dp.`nama_barang`,
      dp.`sn_barang`, dp.`kelengkapan`, dp.`kelengkapan`, dp.`keluhan`, DATE_FORMAT(pb.tgl_pengembalian,'%d-%m-%Y') AS tgl_pengembalian,
      pb.`bayar`, pb.`ppn`, pb.`total`, pb.`totalfatur`, c.`nama_customer`, c.`notlp_cus`, c.`alamat_cus`, ds.`nama_service`, ds.`qty`,
      ds.`harga`, ds.`subtotal`, pb.`kembalian`,
      (SELECT COUNT(`id_service`) FROM `m_detailservice` WHERE `id_service` = dp.`id_service`) AS jumlah
      FROM `m_detailpengem` AS dp
      INNER JOIN `m_detailservice` AS ds ON ds.`id_service` = dp.`id_service`
      INNER JOIN `m_pengembalian` AS pb ON dp.`id_pengembalian` = pb.`id_pengembalian`
      INNER JOIN `m_customer` AS c ON c.`id_customer` = pb.`id_customer`
      INNER JOIN `m_kategoriservis` AS ks ON ks.`id_kategori` = dp.`id_kategori`
      INNER JOIN `garansi` AS g ON g.`id_garansi` = dp.`id_garansi`
      INNER JOIN `m_karyawan` AS k ON k.`id_karyawan` = pb.`id_karyawan`
      WHERE dp.`id_pengembalian` = '$kodepen';"

		);
		return $query->result() ;
	}

  function pengembalianbytanggal($MulaiIn, $AkhirIn) 
  { $query = $this->db->query 
  	(
  		"SELECT dp.`id_pengembalian`, k.`nama_karyawan`, ks.`nama_kategori`, dp.`id_service`, g.`nama_st`, dp.`nama_barang`,
      dp.`sn_barang`, dp.`kelengkapan`, dp.`kelengkapan`, dp.`keluhan`, DATE_FORMAT(pb.tgl_pengembalian,'%d-%m-%Y') AS tgl_pengembalian,
      pb.`bayar`, pb.`ppn`, pb.`total`, pb.`totalfatur`, c.`nama_customer`, c.`notlp_cus`, c.`alamat_cus`, ds.`nama_service`, ds.`qty`,
      ds.`harga`, ds.`subtotal`, pb.`kembalian`,
      (SELECT COUNT(`id_service`) FROM `m_detailservice` WHERE `id_service` = dp.`id_service`) AS jumlah
      FROM `m_detailpengem` AS dp
      INNER JOIN `m_detailservice` AS ds ON ds.`id_service` = dp.`id_service`
      INNER JOIN `m_pengembalian` AS pb ON dp.`id_pengembalian` = pb.`id_pengembalian`
      INNER JOIN `m_customer` AS c ON c.`id_customer` = pb.`id_customer`
      INNER JOIN `m_kategoriservis` AS ks ON ks.`id_kategori` = dp.`id_kategori`
      INNER JOIN `garansi` AS g ON g.`id_garansi` = dp.`id_garansi`
      INNER JOIN `m_karyawan` AS k ON k.`id_karyawan` = pb.`id_karyawan`
      WHERE tgl_pengembalian BETWEEN '$MulaiIn' AND '$AkhirIn' ORDER BY dp.`id_pengembalian`;"
  	);
  	return $query->result() ;
  }

  function grafix()
  {
  	$query = $this->db->query
  	("
		  		SELECT tahun_bulan, bulan, SUM(pen) AS 'penerimaan', SUM(pem) AS 'pengembalian', month_num FROM (
			SELECT CONCAT(YEAR(p.tgl_penerimaan),'/',MONTH(p.tgl_penerimaan)) AS tahun_bulan, 
			DATE_FORMAT(p.tgl_penerimaan, '%M') AS bulan, 
			COUNT(*) AS 'pen',
			'0' AS 'pem',
			'1' AS 'status',
			MONTH(p.tgl_penerimaan) AS 'month_num'
			FROM m_service s
			JOIN m_penerimaan p ON (s.`id_penerimaan` = p.`id_penerimaan`)
			WHERE CONCAT(YEAR(p.tgl_penerimaan),'/',MONTH(p.tgl_penerimaan))= CONCAT(YEAR(NOW()),'/',MONTH(p.tgl_penerimaan))
			GROUP BY YEAR(p.tgl_penerimaan),MONTH(p.tgl_penerimaan)

			UNION	
			
			SELECT CONCAT(YEAR(p.tgl_pengembalian),'/',MONTH(p.tgl_pengembalian)) AS tahun_bulan, 
			DATE_FORMAT(p.tgl_pengembalian, '%M') AS bulan, 
			'0' AS 'pen',
			COUNT(*) AS 'pem',
			'2' AS 'status',
			MONTH(p.tgl_pengembalian) AS 'month_num'
			FROM m_detailpengem d
			JOIN m_pengembalian p ON (d.`id_pengembalian` = p.`id_pengembalian`) 
			WHERE CONCAT(YEAR(p.tgl_pengembalian),'/',MONTH(p.tgl_pengembalian))= CONCAT(YEAR(NOW()),'/',MONTH(p.tgl_pengembalian))
			GROUP BY YEAR(p.tgl_pengembalian),MONTH(p.tgl_pengembalian)
		) AS grafik
		GROUP BY bulan
		ORDER BY month_num
  	");
  	return $query->result() ;
  }

 }

 /* End of file M_pengembalian.php */
 /* Location: ./application/models/M_pengembalian.php */ ?>
