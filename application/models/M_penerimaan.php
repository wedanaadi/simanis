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

   function kodetd(){
   	    $tahun = date('y'); 
        $bulan = date('m');
		$hari	= date ('d'); 
        $q = $this->db->query("SELECT MAX(RIGHT(id_penerimaan, 3)) AS kd_max FROM m_penerimaan");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        $kodemax = str_pad($kd,3,"0",STR_PAD_LEFT);
        $kodejadi  = "PEM".$tahun.$bulan.$hari.$kodemax;
        return $kodejadi;
    }

}

/* End of file M_penerimaan.php */
/* Location: ./application/models/M_penerimaan.php */