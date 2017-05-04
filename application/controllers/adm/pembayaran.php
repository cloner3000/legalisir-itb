<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_mahasiswa','mahasiswa');
		$this->load->model('m_pengajuan','pengajuan');
		$this->load->model('m_pengajuan_detail','pengajuan_detail');
		$this->load->model('m_pembayaran','pembayaran');
	}
	
	public function submit_ambil($nim,$id_pengajuan)
	{
		if($nim<>'' && $id_pengajuan<>'')
		{
			$pengajuan = $this->pengajuan->getRowByPks(array($id_pengajuan));
			if(isset($pengajuan->id_pengajuan))
				$this->pengajuan->updateCondition(array('id_pengajuan'=>$pengajuan->id_pengajuan),array('status'=>'4','perubahan_status'=>date('Y-m-d H:i:s')));
		}
		redirect('adm/pembayaran/index','refresh');
	}
	public function submit_selesai($nim,$id_pengajuan)
	{
		if($nim<>'' && $id_pengajuan<>'')
		{
			$pengajuan = $this->pengajuan->getRowByPks(array($id_pengajuan));
			if(isset($pengajuan->id_pengajuan))
				$this->pengajuan->updateCondition(array('id_pengajuan'=>$pengajuan->id_pengajuan),array('status'=>'3','perubahan_status'=>date('Y-m-d H:i:s')));
		}
		redirect('adm/pembayaran/index','refresh');
	}
	public function submit_bayar($nim,$id_pengajuan)
	{
		if($nim<>'' && $id_pengajuan<>'')
		{
			$pengajuan = $this->pengajuan->getRowByPks(array($id_pengajuan));
			$this->pengajuan->updateCondition(array('id_pengajuan'=>$pengajuan->id_pengajuan),array('status'=>'2','perubahan_status'=>date('Y-m-d H:i:s')));	
			
			$data = array();
			$data['id_pengajuan']	=	$pengajuan->id_pengajuan;
			$data['nim']			=	$pengajuan->nim;
			$data['nama']			=	$pengajuan->nama;
			$data['waktu_pengajuan']=	$pengajuan->waktu_pengajuan;
			$data['waktu_bayar']	=	date('Y-m-d H:i:s');
			$data['biaya_total']	=	$this->pengajuan_detail->getTotalTagihan($pengajuan->id_pengajuan);
			$this->pembayaran->save($data);	
		}
		redirect('adm/pembayaran/index','refresh');
	}
	public function index($filterStatus=1)
	{
		if($filterStatus>0&&$filterStatus<=4):
			$data['pengajuan'] = $this->pengajuan->getData(array('status'=>$filterStatus));					
		else:
			$data['pengajuan'] = $this->pengajuan->getData();
		endif;
		$data['filter'] = $filterStatus;
		foreach($data['pengajuan']->result() as $pengajuan)
		{
			$res = $this->pengajuan_detail->getData(array('id_pengajuan'=>$pengajuan->id_pengajuan));
			foreach($res->result() as $detail):				
				$data['detail'][$pengajuan->id_pengajuan][] = $detail;
			endforeach;			
		}
		
		
		$data['customCssSource'] = array('table_jui.css','smoothness/jquery-ui-1.8.4.custom.css');
		$data['customJsSource'] = array('jquery.js');
		$data['customJsSource'] = array('jquery.dataTables.js');
		$data['customJs'] = '$(document).ready(function() {
				oTable = $(\'#data\').dataTable({
					"sPaginationType": "full_numbers",					
					"aaSorting": [[ 0, "desc" ],[ 6, "asc" ],],
					"oLanguage": {
            			"sUrl": "'.base_url('js/id_ID.txt').'"
					},
					aoColumnDefs: [{
					     bSortable: false,
					     aTargets: [ -1,1,2 ]
					  }]                    
				});				
				
			} );
			';
		
		$this->show_view('adm/pembayaran',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */