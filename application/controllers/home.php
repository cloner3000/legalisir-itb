<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_mahasiswa','mahasiswa');
	}
	
	public function index()
	{
		$data['verified'] = $this->mahasiswa->getData(array('status_verifikasi'=>'1'),array('waktu_verifikasi'=>'desc'),0,20);
		$data['customCss'] = '.jumbotron{margin-bottom: 0px;padding-bottom: 0px;}';
		$this->show_view('welcome_message',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */