<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Info extends MY_Controller
{
	
	public function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->helper(array('dump', 'form', 'potong_teks'));
		$this->load->library(array('form_validation', 'slug'));
		$this->load->model(array('info_m'));

		$this->slug_config($this->info_m->table, 'judul');
	}

	public function index()
	{
		$data['infos'] = $this->info_m
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->order_by('pos', 'ASC')
		->fields('judul, isi, pos, slug, created_at, deleted_at')
		->limit(4)
		->with_akun('fields:username')
		->with_trashed()
		->get_all();

		$this->render('info/info', $data);
	}

	public function tambah($optionalData = NULL, $optStatus = FALSE)
	{
		$this->generateCsrf();
		
		if ($optStatus) {
			$data['info'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);
			$this->render('info/create', $data);
		}else{
			$this->render('info/create');
		}
	}

	public function selengkapnya($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Info kelurahan tidak ditemukan', 'danger');
			$this->go('info');
		}else{
			$query = $this->info_m
			->fields('judul, isi, slug')
			->get(array(
				'id_organisasi' => $this->ion_auth->get_current_id_org(),
				'slug' => $slug
				));
			if ($query === FALSE) {
				$this->message('Info kelurahan tidak ditemukan', 'danger');
				$this->go('info');
			}else{
				$data['info'] = $query;
				$this->render('info/detail', $data);
			}
		}
	}

	public function sunting($slug ,$optionalData = NULL, $optStatus = FALSE)
	{
		$this->generateCsrf();
		
		if ($optStatus) {
			$data['info'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);
		}else{
			$query = $this->info_m
			->fields('judul, isi, slug')
			->as_array()
			->get(array(
				'id_organisasi' => $this->ion_auth->get_current_id_org(),
				'slug' => $slug
				));
			if ($query === FALSE) {
				$this->message('Info kelurahan tidak ditemukan', 'danger');
				$this->go('info');
			}else{
				$data['info'] = $query;
			}
		}
		$this->render('info/sunting', $data);
	}

	public function simpan()
	{
		$data = $this->input->post();
		$data['id_organisasi'] = $this->ion_auth->get_current_id_org();
		$data['slug'] = $this->slug->create_uri($data);

		//ambil posisi paling terakhir
		$data['pos'] = $this->info_m
		->count_rows(array(
			'id_organisasi' => $data['id_organisasi'],
			));

		if ($data['pos'] === FALSE) {
			$data['msg'] = '<strong>Gagal!</strong> Terjadi kesalahan sistem saat membuat info baru. Coba lagi nanti,';
			$data['msg_type'] = 'danger';
			$data['prev_input'] = $data;
			$this->tambah($data, TRUE);
		}else{
			$query = $this->info_m->from_form(NULL, array(
				'id_organisasi' => $data['id_organisasi'],
				'slug' => $data['slug'],
				'pos' => $data['pos']
				))->insert();

			if ($query === FALSE) {
				$data['msg'] = 'Terjadi kesalahan saat membuat info baru.';
				$data['msg_type'] = 'warning';
				$data['prev_input'] = $data;
				$this->tambah($data, TRUE);
			}else{
				$this->message('<strong>Berhasil!</strong> Membuat info baru.', 'success');
				$this->go('info');
			}
		}
	}

	public function ubah($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Info tidak ditemukan', 'danger');
			$this->go('info');
		}else{
			$data = $this->input->post();
			$data['slug'] = $this->slug->create_uri($data);

			$query = $this->info_m->from_form(NULL, array(
				'slug' => $data['slug'],
				), array(
					'slug' => $slug,
					'id_organisasi' => $this->ion_auth->get_current_id_org()
				))->update();

			if ($query === FALSE) {
				$data['msg'] = 'Terjadi kesalahan saat mengubah info baru.';
				$data['msg_type'] = 'warning';
				$data['prev_input'] = $data;
				$this->sunting($slug, $data, TRUE);
			}else{
				$this->message('<strong>Berhasil!</strong> Mengubah info baru.', 'success');
				$this->go('info');
			}
		}
	}
}