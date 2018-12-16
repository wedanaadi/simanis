<?php 
class Login extends CI_Controller {
	
	function __construct() 
	{
		$this->CI =& get_instance(); 
		parent::__construct();		
		$this->load->model(array('M_karyawan'));
		$this->load->model(array('M_servis'));
		$this->load->helper(array('url'));
		//$this->load->library(array('create_pdf'));	
	}

	public function index()
	{
		redirect(site_url('login/login'));
	}

	function login()
	{
		if ($this->session->userdata('kodeuser')!=NULL) {
			redirect('Dashboard');
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login/login');
			return;
		}
		$username = $this->input->post('username');
		$password = $this->input->post('pass');
		$result = $this->M_karyawan->getdata($username, $password)->result();

		if (!empty($result)) {
		 $user_session = array(
		 	'session_id' => $this->session->userdata('session_id'),
		 	'kodeuser' => $result[0]->id_karyawan,
		 	'namauser' => $result[0]-> nama_karyawan,
		 	'hak_akses' => $result[0]-> hak_akses,
		 	'id_akses' => $result[0]-> id_hakakses,
		 	'notlp' => $result[0]-> notlp_kar,
		 	'alamat' => $result[0]-> alamat_kar,
		 	'usernameuser' => $result[0]-> username,
		 	'pass' => $result[0]-> pass,
		 	'emailuser' => $result[0]-> email
		 );
		 $this->session->set_userdata($user_session);
		 redirect('Dashboard');
		}
		else {
			$respon['errorno']=1;
			$respon['message']='Username Atau Password Salah' ;
			$this->load->view('login/Login',$respon);
		}
	}
	function logout()
		{
			$this->session->sess_destroy();
			redirect('Login');
		}

	function hlmutama()
		{
			$this->load->view('login/hlmutama');
		}

	function cariservice()
	{
		$id = $this->input->get('id_penerimaan');
		$data = $this->M_servis->cariservice($id);
		echo json_encode($data);
		//print_r($data);exit();
	}

	function caridetail()
	{
		$id = $this->input->get('nonota2');
		$data = $this->M_servis->caridetail($id);
		echo json_encode($data);
		
	}

	function Email()
	{
		$Kode = $this->input->post('no_nota', TRUE);
		$EmailCustomer = $this->input->post('emailcus', TRUE);
	    $data['header'] = $this->load->view('layouts/cetak_headEmail',null,TRUE);
	    $data['konten'] = $this->M_servis->request($Kode);
	    $html = $this->load->view('login/request', $data, TRUE);
	    echo json_encode(['success' => true,'message' => 'Cek Email Anda']);
     	//$this->create_pdf->load($html,'Cek'.'-'.$data['konten'][0]->id_penerimaan, 'A4');

     	$config = array('protocol' => 'smtp',
     		'smtp_host' => 'ssl://smtp.googlemail.com',
     		'smtp_port' => 465, 
     		'smtp_user' => 'baliyonikomputer@gmail.com',
     		'smtp_pass' => 'baliyoni1996',
     		'mailtype' => 'html',
     		'charset' => 'iso-8859-1' );
     	$this->load->library('email', $config);
     	$this->email->set_newline("\r\n");
     	$this->email->from('baliyonikomputer@gmail.com', 'Baliyoni Computer');
     	$this->email->to($EmailCustomer);
     	$ululuuuu = $this->load->view('pengembalian/cetakpen',$data, TRUE);
     	$this->email->subject('Cek Service');
     	$this->email->message($html);
     	$this->email->send();	
	}
}
 ?>

