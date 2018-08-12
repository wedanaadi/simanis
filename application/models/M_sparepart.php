<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class M_sparepart extends CI_Model {
 
 	function all() 
 	{
 		$data = $this->db->query('
		SELECT id_sparepart, m_suplayer.nama_suplayer, nama_sparepart, harga_pokok, harga_jual, jumlah_stok
		FROM m_sparepart INNER JOIN m_suplayer ON m_sparepart.id_suplayer = m_suplayer.id_suplayer');
	 	
	 	return $data->result();
 	}

 	function suplayer()
	 {
		$data = $this->db->get('m_suplayer');
		return $data->result();
	 }

	function code_otomatis() 
	 {
        $q = $this->db->query("SELECT MAX(RIGHT(id_sparepart,3)) AS kd_max FROM m_sparepart");
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
        $kodejadi  = "SPA".$kodemax;
        return $kodejadi;
     }

	function create($data)	
	 {
    	$this->db->insert('m_sparepart',$data);
	 }

	function find($id)
	 {
		$this->db->where('id_sparepart',$id);
   	 	$data = $this->db->get('m_sparepart');
    	return $data->row();
	 }
  
	function update($data,$id) 
  	 {
    	$this->db->where('id_sparepart',$id);
    	$this->db->update('m_sparepart',$data);
  	 }
 
 }
 
 /* End of file M_sparepart.php */
 /* Location: ./application/models/M_sparepart.php */ ?>