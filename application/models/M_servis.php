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
}

/* End of file M_servis.php */
/* Location: ./application/models/M_servis.php */

?>