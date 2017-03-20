<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		// TODO Fix This
        $this->_accessable = TRUE;
		$this->load->library(array('form_validation'));
		$this->load->model(array('surat_m'));
	}

	public function index()
	{
		$this->render('dashboard/index');
	}

    public function notifikasi()
    {
        $this->load->helper('surat');
        $data = $this->db
            ->select('jenis, COUNT(id) as jumlah')
            ->where('status', '0')
            ->group_by('jenis')
            ->having('jumlah >', '0')
            ->get('surat')
            ->result();
        $total = 0;
        foreach ($data as $index => $value){
            $data[$index]->jenis = get_tipe_surat($value->jenis);
            $data[$index]->link = 'surat/' . strtolower(str_replace(' ', '_', $data[$index]->jenis));
            $total += $data[$index]->jumlah;
        }
        $result = array('notif_count' => $total,
            'notif_list' => $data
        );
        echo json_encode($result);
	}
}