<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends MY_Controller
{
	private $_nik = '389475932753034750954';
	private $_id_org = '2';
	
	function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->helper(array('dump', 'form'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('surat_m', 'organisasi_m', 'penduduk_m'));
	}

	public function blankoktp($optionalData = NULL, $optStatus = FALSE)
	{
		$data['blankos'] = $this->surat_m
		->with_penduduk('fields:nama')
		->where('jenis', '0')
		->where('status !=', '1')
		->where('id_organisasi', $this->_id_org)
		->fields('no_surat, jenis, tanggal_verif, created_at, updated_at, updated_by')
		->get_all();

		if ($optStatus) {
			$data['prev_input'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);	
		}
		dump($data['blankos']);
		$this->render('warga/surat/status_pengajuan', $data);
	}
}