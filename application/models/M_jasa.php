<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jasa extends CI_Model {

function all()
	{
		$data = $this->db->get('m_jasa');
		return $data->result();
	}
 

function create($data)	
	{
    	$this->db->insert('m_jasa',$data);
	}

function find($id)
	{
		$this->db->where('id_jasa',$id);
   	 	$data = $this->db->get('m_jasa');
    	return $data->row();
	}
  
function update($data,$id) 
  	{
    	$this->db->where('id_jasa',$id);
    	$this->db->update('m_jasa',$data);
  	}

/*function code_otomatis(){
            $this->db->select('Right(m_customer.id_customer,4) as kode ',FALSE);
            $this->db->order_by('id_customer', 'DESC');
            $this->db->limit(1);
            $query = $this->db->get('m_customer'); //cek kode 
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            } else {
                $kode = 10;
            }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi  = "CUS".$kodemax;
            return $kodejadi;
        }*/

function code_otomatis(){
        $q = $this->db->query("SELECT MAX(RIGHT(id_jasa,3)) AS kd_max FROM m_jasa");
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
        $kodejadi  = "JAS".$kodemax;
        return $kodejadi;
    }
}
