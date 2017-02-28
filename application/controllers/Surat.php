<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends MY_Controller
{
	
	public function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->helper(array('helper'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('surat_m', 'organisasi_m', 'penduduk_m'));
	}

	public function blankoktp()
	{
		// $this->message('Terjadi kesalahan saat mengambil data untuk mencetak', 'danger');
		
		$this->render('surat/blanko_ktp');
	}
}