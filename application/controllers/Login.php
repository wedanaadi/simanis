<?php 
class Login extends CI_Controller {
	
	function __construct() 
	{
		$this->CI =& get_instance(); 
		parent::__construct();		
		$this->load->model(array('M_karyawan'));
		$this->load->helper(array('url'));	
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
}
 ?>