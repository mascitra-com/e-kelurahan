<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));
		$this->load->helper(array('dump_helper'));
		$this->load->model(array('organisasi_m'));
		$this->load->model(array('keluarga_m', 'penduduk_m'));
	}

	public function index()
	{
		// $data['kelurahans'] = $this->organisasi_m->where('id >', '1')->fields('id, nama, slug, status, updated_at')->with_akuns('fields:id,id_organisasi,username,active', 'where:`id`>\'1\'')->get_all();

		// $data['kelurahan_verifs'] = $this->organisasi_m->where('id >', '1')->where('status', array('0','2'))->get_all();

		$penduduk_hidup = $this->penduduk_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->fields('nik, id_organisasi')->with_meninggals('fields:id, id_organisasi')->get_all();
		dump($penduduk_hidup);
		// $this->render('keluarga/index');
	}

	public function ambil_kep_nik()
	{
		
	}
}