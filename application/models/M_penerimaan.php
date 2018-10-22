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

	function last_kode($where)
	{
		$data = $this->db->query("SELECT MAX(id_penerimaan) AS 'kode' FROM `m_penerimaan` WHERE SUBSTR(`id_penerimaan`,4,6) = '$where'")->row();
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
				echo "A";
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