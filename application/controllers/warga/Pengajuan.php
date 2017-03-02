<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends MY_Controller
{
	private $_nik = '389475932753034750954';
	private $_id_org = '2';

	function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->helper(array('dump', 'form'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('surat_m', 'organisasi_m', 'penduduk_m', 'keluarga_m'));
	}

	public function blankoktp()
	{
		$data['anggotas'] = $this->keluarga_m
		->with_penduduk('fields:nama')
		->with_detailKK(array(
			'fields' => 'nik',
			'with' => array(
				'relation' => 'penduduk',
				'fields' => 'nama'
				)
			))
		->where(array(
			'nik' => $this->_nik,
			'id_organisasi' => $this->_id_org
			))
		->fields('nik')
		->get();

		$this->generateCsrf();
		$this->render('warga/pengajuan/pengajuan_ktp', $data);
	}

	public function blankoktp_simpan()
	{
		//AMBIL NO SURAT DENGAN JENIS YANG BERSANGKUTAN PALING TERAKHIR
		$no_surat = $this->surat_m
		->where(array(
			'id_organisasi' => $this->_id_org,
			'jenis' => '0'
		))
		->order_by('no_surat', 'desc')
		->get_all();
		dump($no_surat);

		$data = $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], '|')));
		$data_insert = array(
			'id_organisasi' => $this->_id_org,
			'jenis' => '0',
		);

		$insert = $this->surat_m->insert($data);

		if($insert === FALSE){
            $this->message('Berhasil menyimpan data Pindah');
            foreach ($pengikut as $item){
                $temp = array('id_mutasi' => $id_mutasi, 'nik' => $item);
                $this->mutasi_keluar_detail_m->insert($temp);
            }
        }

		dump($data);
	}
}