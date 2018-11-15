<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	 function __construct() 
	{
		$this->CI =& get_instance();
  		parent::__construct();
      /*      if ($this->session->userdata('kodeuser')==NULL) {
	  redirect('Login'); }*/
		$this->load->model('M_pengembalian');
		$this->load->helper(array('url'));
		$this->load->library( array('create_kode'));
	}

	public function index()
	{
		$tahun = date('y'); 
        $bulan = date('m');
		$hari	= date ('d'); 
		$last_kode = $this->M_pengembalian->last_kode($tahun.$bulan.$hari); 
		$data['kodetd'] = $this->create_kode->generate_menu($last_kode->kode, 3, 9, 'PEG', $tahun.$bulan.$hari);
		$data['dataservis'] = $this->M_pengembalian->dataservis();
		$this->load->view('Pengembalian/pengembalianservis',$data);
	}
	
	public function getservice()
	{
		$id = $this->input->get('id_service');
		//$data = $this->db->query("SELECT * FROM m_detailservice WHERE id_service = '$id'")->result();
		$data = $this->M_pengembalian->getservice($id);
		echo json_encode($data);
	}

	public function getdetail()
	{
		$id = $this->input->get('id_serviceI');
		// $data = $this->db->query("SELECT * FROM m_detailservice WHERE id_service = '$id'")->result();
		$data = $this->M_pengembalian->getDetilService($id);
		echo json_encode($data);
	}

}

/* End of file Pengembalian.php */
/* Location: ./application/controllers/Pengembalian.php */
 ?>