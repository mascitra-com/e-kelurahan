<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Berita extends MY_Controller
{
	
	public function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->helper(array('dump', 'form', 'potong_teks', 'cek_file'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('berita_m'));
	}

	public function index()
	{
		//BERITA
		$data['beritas'] = $this->berita_m
		->where('status',array('0', '1'))
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->order_by('tanggal_publish','desc')
		->limit(5)
		->fields('judul, isi, slug, gambar, tanggal_publish, status')
		->with_akun('fields:username')
		->get_all();

		$this->render('berita/berita', $data);
	}
}