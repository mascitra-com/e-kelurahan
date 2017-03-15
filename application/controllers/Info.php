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
		->with_trashed()
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->order_by('pos', 'ASC')
		->fields('id ,judul, isi, pos, slug, created_at, deleted_at')
		->limit(4)
		->with_akun('fields:username')
		->get_all();

		$this->generateCsrf();
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
				$data['msg'] = 'Terjadi kesalahan saat mengubah info';
				$data['msg_type'] = 'warning';
				$data['prev_input'] = $data;
				$this->sunting($slug, $data, TRUE);
			}else{
				$this->message('<strong>Berhasil!</strong> Mengubah info', 'success');
				$this->go('info');
			}
		}
	}

	public function aktifkan($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Info tidak ditemukan', 'danger');
		}else{
			//cek keberadaan Info
			$q = $this->info_m->with_trashed()->get(array(
				'id_organisasi' => $this->ion_auth->get_current_id_org(),
				'slug' => $slug
				));
			if ($q === FALSE) {
				$this->message('Info tidak ditemukan', 'danger');
			}else{
				//hapus
				$query = $this->info_m->restore(array(
					'id_organisasi' => $this->ion_auth->get_current_id_org(),
					'slug' => $slug
					));
				if ($query === FALSE) {
					$this->message('Terjadi kesalahan sistem saat menonaktifkan info! Coba lagi nanti.', 'danger');
				}else{
					$this->message('Info berhasil dinonaktifkan', 'success');
				}
			}
		}
		$this->go('info');
	}

	public function nonaktifkan($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Info tidak ditemukan', 'danger');
		}else{
			//cek keberadaan Info
			$q = $this->info_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->get(array('slug' => $slug));
			if ($q === FALSE) {
				$this->message('Info tidak ditemukan', 'danger');
			}else{
				//hapus
				$query = $this->info_m->delete(array(
					'id_organisasi' => $this->ion_auth->get_current_id_org(),
					'slug' => $slug
					));
				if ($query === FALSE) {
					$this->message('Terjadi kesalahan sistem saat menonaktifkan info! Coba lagi nanti.', 'danger');
				}else{
					$this->message('Info berhasil dinonaktifkan', 'success');
				}
			}
		}
		$this->go('info');
	}

	public function hapus($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Info tidak ditemukan', 'danger');
		}else{
			//cek keberadaan Info
			$q = $this->info_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->get(array('slug' => $slug));
			if ($q === FALSE) {
				$this->message('Info tidak ditemukan', 'danger');
			}else{
				//hapus
				$query = $this->info_m->force_delete(array(
					'id_organisasi' => $this->ion_auth->get_current_id_org(),
					'slug' => $slug
					));
				if ($query === FALSE) {
					$this->message('Terjadi kesalahan sistem saat menghapus info! Coba lagi nanti.', 'danger');
				}else{
					$this->message('Info berhasil dihapus', 'success');
				}
			}
		}
		$this->go('info');
	}

	public function update_pos()
	{
		//id par pertama, arrow par 2, pos par 3
		$datas = $this->input->post();
		$data = explode(":", $datas['pos']);
		$last_number = $this->info_m->count_rows();
		$id_org = $this->ion_auth->get_current_id_org();

		if ($data[1] === '0') {
			if ($data[2] != 0) {
				$already_exist_pos =  $this->info_m->fields('id')->where(array('pos' => $data[2]-1, 'id_organisasi' => $id_org ))->as_object()->get();
				$this->info_m->where(array('id' => $already_exist_pos->id, 'id_organisasi' => $id_org))->update(array('pos'=>$data[2]));
				$this->info_m->where(array('id' => $data[0], 'id_organisasi' => $id_org))->update(array('pos'=>$data[2]-1));
			}else{
				$this->info_m->where(array('id' => $data[0], 'id_organisasi' => $id_org))->update(array('pos'=>$last_number-1));
				@$this->info_m->change_menu_pos($data[0], $data[1]);
			}
		}else{
			if ($data[2] != $last_number-1) {
				$already_exist_pos =  $this->info_m->fields('id')->where(array('pos' => $data[2]+1, 'id_organisasi' => $id_org))->as_object()->get();
				$this->info_m->where(array('id' => $already_exist_pos->id, 'id_organisasi'=> $id_org))->update(array('pos'=>$data[2]));
				$this->info_m->where(array('id' => $data[0], 'id_organisasi' => $id_org))->update(array('pos'=>$data[2]+1));
			}else{
				$this->info_m->where(array('id' => $data[0], 'id_organisasi' => $id_org))->update(array('pos'=>0));
				@$this->info_m->change_menu_pos($data[0], $data[1]);
			}
		}
		$this->message('Sukses! Berhasil merubah posisi menu info', 'success');
		$this->go('info');
	}
}