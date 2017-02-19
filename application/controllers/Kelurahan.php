<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation', 'slug'));
		$this->load->helper(array('dump_helper'));
		$this->load->model(array('organisasi_m'));
		$this->load->model(array('akun_m'));
		$this->slug_config($this->organisasi_m->table, 'nama');
	}

	public function index()
	{
		$data['kelurahans'] = $this->organisasi_m->where('id >', '1')->fields('id, nama, slug, status, updated_at')->with_akuns('fields:id,id_organisasi,username,active', 'where:`id`>\'1\'')->get_all();

		$data['kelurahan_verifs'] = $this->organisasi_m->where('id >', '1')->where('status', array('0','2'))->get_all();

		$this->render('kelurahan/index', $data);
	}

	public function simpan()
	{
		$data = $this->input->post();

		if (empty($data['id'])) {
			if ($this->organisasi_m->from_form(NULL, array('slug' => $this->slug->create_uri($data)))->insert()) {
				$this->go('kelurahan');
			} else {
				die('terjadi kesalahan saat insert');
			}
		}else{
			die('terjadi kesalahan saat insert');
		}
	}

	public function ubah()
	{
		$data = $this->input->post();
		if ($this->organisasi_m->get($data['id'])) {
			if ($this->organisasi_m->from_form(NULL, array('slug' => $this->slug->create_uri($data)), array('id' => $data['id']))->update())
			{
				$this->go('kelurahan');
			}else{
				die('terjadi kesalahan saat update');
			}
		}else{
			die('organisasi dengan id '.$data['id'].' tidak ditemukan');
		}
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

	public function aktifkan($id = NULL)
	{
		if ($id != NULL && !empty($id)) {
			if ($this->akun_m->where('id_organisasi', $id)->update(array('active' => '1'))) {
				$this->go('kelurahan');
			}else{
				die('Terjadi kesalahan saat menonaktifkan');
			}
		}else{
			die('Alamat tidak valid {id NULL atau kosong}');
		}
	}

	public function batal($slug = NULL)
	{
		if ($slug != NULL && !empty($slug)) {
			if ($this->organisasi_m->delete($slug)) {
				$this->go('kelurahan');
			}else{
				die('Terjadi kesalahan saat membatalkan pengajuan');
			}
		}
	}
}