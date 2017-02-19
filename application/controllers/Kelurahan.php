<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));
		$this->load->helper(array('dump_helper'));
		$this->load->model(array('organisasi_m'));
		$this->load->model(array('akun_m'));
	}

	public function index()
	{
		$data['kelurahans'] = $this->organisasi_m->where('id >', '1')->fields('id, nama, slug, status, updated_at')->with_akuns('fields:id,id_organisasi,username,active', 'where:`id`>\'1\'')->get_all();
	
		$data['kelurahan_verifs'] = $this->organisasi_m->where('id >', '1')->where('status', array('0','2'))->get_all();

		$this->render('kelurahan/index', $data);
	}

	public function nonaktifkan($id = NULL)
	{
		if ($id != NULL && !empty($id)) {
			if ($this->akun_m->where('id_organisasi', $id)->update(array('active' => '0'))) {
				$this->go('kelurahan');
			}else{
				die('Terjadi kesalahan saat menonaktifkan');
			}
		}else{
			die('Alamat tidak valid {id NULL atau kosong}');
		}
	}
}