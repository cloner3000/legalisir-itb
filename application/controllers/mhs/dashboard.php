<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_mahasiswa','mahasiswa');
		$this->load->model('m_pengajuan','pengajuan');
		$this->load->model('m_pengajuan_detail','pengajuan_detail');
	}
	public function index()
	{
		$data['pengajuan'] = $this->pengajuan->getData(array('nim'=>$this->session->userdata('logged_as')['nim']),array('waktu_pengajuan'=>'desc'));
		foreach($data['pengajuan']->result() as $pengajuan)
		{
			$res = $this->pengajuan_detail->getData(array('id_pengajuan'=>$pengajuan->id_pengajuan));
			foreach($res->result() as $detail):				
				$data['detail'][$pengajuan->id_pengajuan][] = $detail;
			endforeach;			
		}
		$this->show_view('mhs/dashboard',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */