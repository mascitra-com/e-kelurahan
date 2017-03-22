<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends MY_Controller
{	
	function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->helper(array('dump', 'form'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('surat_m', 'organisasi_m', 'penduduk_m', 'keluarga_m', 'detail_kk_m'));
	}

	public function index($optionalData = NULL, $optStatus = FALSE)
	{
		$no_kk = $this->keluarga_m
		->where('nik', $this->ion_auth->get_current_nik())
		->fields('no')
		->get()->no;

		$niks = $this->detail_kk_m
		->where('no_kk', $no_kk)
		->fields('nik')
		->get_all();

		$arr_niks = array();

		foreach ($niks as $nik) {
			array_push($arr_niks, $nik->nik);
		}

		$data['surats'] = $this->surat_m
		->with_penduduk('fields:nama')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('nik', $arr_niks)
		->fields('no_surat, jenis, status, tanggal_verif, keterangan, nama_pengambil, created_at, updated_at, updated_by')
		->get_all();

		if ($optStatus) {
			$data['prev_input'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);	
		}

		$this->render('warga/surat/status_pengajuan', $data);
	}
}