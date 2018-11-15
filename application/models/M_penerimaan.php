<?php
class M_penerimaan extends CI_Model {

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
	function customer()
	{
		$data = $this->db->get('m_customer');
		return $data->result();
	}
	
	function garansi()
	{
		$data = $this->db->get('garansi');
		return $data->result();
	}

/*   function kodetd(){
   	    $tahun = date('y'); 
        $bulan = date('m');
		$hari	= date ('d'); 
		$where = $tahun.$bulan.$hari;
		$lastKode = $this->db->query("SELECT MAX(id_penerimaan) AS 'kode' FROM `m_penerimaan` WHERE SUBSTR(`id_penerimaan`,4,6) = '$where'")->row();
		$kode = substr($lastKode->kode,9);
		$angka = (int)$kode;
		$angka_baru = 'PEM'.$where.str_repeat("0", 3 - strlen($angka+1)).($angka+1);
		return $angka_baru;
	}*/

	function last_kode($where)
	{
		$data = $this->db->query("SELECT MAX(id_penerimaan) AS 'kode' FROM `m_penerimaan` WHERE SUBSTR(`id_penerimaan`,4,6) = '$where'")->row();  /*(`id_penerimaan`,4,6) -> pada id penerimaan majukan 4 angka dari kiri kemudian ambil 6 angka*/
		return $data;
	}
	
	function insertDB($penerimaan, $service)
	{
		// $this->db->trans_strict(FALSE);
		$this->db->trans_begin();
		$this->db->insert( 'm_penerimaan', $penerimaan);
		$this->db->insert_batch( 'm_service', $service);  
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

}

/* End of file M_penerimaan.php */
/* Location: ./application/models/M_penerimaan.php */