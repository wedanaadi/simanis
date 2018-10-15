<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

function all()
	 {
	 	$data = $this->db->query('
	 		SELECT id_karyawan, nama_karyawan, hak_akses.hak_akses, notlp_kar, alamat_kar, username, pass, email
	 		FROM m_karyawan INNER JOIN hak_akses ON m_karyawan.id_hakakses = hak_akses.id_hakakses;
	 		');
	 	return $data->result();
	 }
	
function hakakses()
	 {
		$data = $this->db->get('hak_akses');
		return $data->result();
	 }

function code_otomatis() {
        $q = $this->db->query("SELECT MAX(RIGHT(id_karyawan,3)) AS kd_max FROM m_karyawan");
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
        $kodejadi  = "KAR".$kodemax;
        return $kodejadi;
    }

function create($data)	
	 {
    	$this->db->insert('m_karyawan',$data);
	 }

function find($id)
	{
		$this->db->where('id_karyawan',$id);
   	 	$data = $this->db->get('m_karyawan');
    	return $data->row();
	}
  
function update($data,$id) 
  	{
    	$this->db->where('id_karyawan',$id);
    	$this->db->update('m_karyawan',$data);
  	}

function cek_login($table, $where)
    {
        return $this->db->get_where($table,$where);
    }

function getdata($username, $password) 
    {
        $this->db->where("username", $username);
        $this->db->where("pass", $password);
        return $this->db->get('m_karyawan');
    }

function check_username($username)
    {
           $this->db->where('username', $username);  
           $query = $this->db->get("m_karyawan");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }
    }

}
 ?>