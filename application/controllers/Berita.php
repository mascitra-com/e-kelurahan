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
		$this->load->library(array('form_validation', 'slug'));
		$this->load->model(array('berita_m'));

		$this->slug_config($this->berita_m->table, 'judul');

		$q = $this->berita_m->where('status','1')->where('tanggal_publish <=', date('Y-m-d'))->update(array('status' => '0'));
	}

	public function index()
	{
		$data['beritas'] = $this->berita_m
		->where('status',array('0', '1'))
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->order_by('tanggal_publish','asc')
		->limit(5)
		->fields('judul, isi, slug, gambar, tanggal_publish, status')
		->with_akun('fields:username')
		->get_all();

		$this->render('berita/berita', $data);
	}

	public function draf()
	{
		$data['beritas'] = $this->berita_m
		->where('status', '2')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->order_by('tanggal_publish','asc')
		->limit(5)
		->fields('judul, isi, slug, gambar, tanggal_publish, status')
		->with_akun('fields:username')
		->get_all();

		$this->render('berita/draf', $data);
	}

	public function arsip()
	{
		$data['beritas'] = $this->berita_m
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->order_by('tanggal_publish','asc')
		->limit(5)
		->fields('judul, isi, slug, gambar, tanggal_publish, status')
		->with_akun('fields:username')
		->only_trashed()
		->get_all();

		$this->render('berita/arsip', $data);
	}

	public function selengkapnya($slug = NULL)
	{
		if (!is_null($slug) && !empty($slug)) {
			$query = $this->berita_m
			->fields('judul, isi, slug, gambar, tanggal_publish, status, deleted_at')
			->with_akun('fields:username')
			->get(array(
				'slug' => $slug,
				'id_organisasi' => $this->ion_auth->get_current_id_org()
				));

			if ($query === FALSE) {
				$this->message('Berita tidak ditemukan', 'warning');
				$this->go('berita');
			}else{
				$data['berita'] = $query;
				$this->render('berita/detail', $data);
			}
		}else{
			$this->message('Berita tidak ditemukan', 'warning');
			$this->go('berita');
		}
	}

	public function tulis($optionalData = NULL, $optStatus = FALSE)
	{
		$this->generateCsrf();

		if ($optStatus) {
			$data['berita'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);
			$this->render('berita/tulis', $data);
		}else{
			$this->render('berita/tulis');
		}
	}

	public function sunting($slug = NULL, $optionalData = NULL, $optStatus = FALSE)
	{
		if (!is_null($slug) && !empty($slug)) {
			$this->generateCsrf();

			if ($optStatus) {
				$data['berita'] = $optionalData['prev_input'];
				$this->message($optionalData['msg'], $optionalData['msg_type']);
				$this->render('berita/sunting', $data);
			}else{
				$query = $this->berita_m
				->fields('judul, isi, slug, gambar, tanggal_publish, status, deleted_at')
				->as_array()
				->get(array(
					'slug' => $slug,
					'id_organisasi' => $this->ion_auth->get_current_id_org()
					));

				if ($query === FALSE) {
					$this->message('Berita tidak ditemukan', 'warning');
					$this->go('berita');
				}else{
					$data['berita'] = $query;
					$this->render('berita/sunting', $data);
				}
			}
		}else{
			$this->message('Berita tidak ditemukan', 'warning');
			$this->go('berita');
		}
	}

	public function simpan()
	{
		$today = date('Y-m-d');
		$data = $this->input->post();

		if(empty($data['status'])){
			if (!(empty($data['tanggal_publish'])) && $data['tanggal_publish'] > $today) {
				$data['status'] = '1';
			}elseif (!(empty($data['tanggal_publish'])) && $data['tanggal_publish'] == $today) {
				$data['status'] = '0';
			}
			else{
				$data['msg'] = 'Pilih tanggal sama atau lebih dari tanggal sekarang';
				$data['msg_type'] = 'warning';
				$data['prev_input'] = $data;
				$this->tulis($data, TRUE);
			}
		}

		$data['slug'] = $this->slug->create_uri($data);

		if (!empty($_FILES['gambar']['name'])) {
			$data['gambar']= $this->do_upload('gambar');
		} else {
			$data['gambar'] = 'default.png';
		}

		$data['id_organisasi'] = $this->ion_auth->get_current_id_org();

		$query = $this->berita_m->from_form(NULL, array(
			'id_organisasi' => $data['id_organisasi'],
			'isi' => $data['isi'],
			'slug' => $data['slug'],
			'gambar' => $data['gambar'],
			'status' => $data['status'],
			'tanggal_publish' => $data['tanggal_publish']
			))->insert();

		if ($query === FALSE) {
			$data['msg'] = 'Terjadi kesalahan dalam membuat berita';
			$data['msg_type'] = 'warning';
			$data['prev_input'] = $data;
			$this->tulis($data, TRUE);
		}else{
			if ($data['status'] == '2') {
				$this->message('<strong>Berhasil</strong> Berita Disimpan di Draft', 'success');
				$this->go('berita/draf');
			}else{
				$this->message('<strong>Berhasil</strong> membuat Berita Baru', 'success');
				$this->go('berita');
			}
		}
	}

	public function ubah($slug = NULL)
	{
		//AMBIL DATA YG DIPERLUKAN
		$query = $this->berita_m
		->fields('gambar, status, deleted_at')
		->get(array(
			'slug' => $slug,
			'id_organisasi' => $this->ion_auth->get_current_id_org()
			));

		if ($query === FALSE) {
			$this->message('Terjadi kesalahan pada sistem', 'danger');
			$this->go('berita/sunting/'.$slug);
		}else{
			$data = $this->input->post();
			$data['status'] = $query->status;
			$data['deleted_at'] = $query->deleted_at;
			
			$today = date('Y-m-d');

			if($data['status'] != '2' || is_null($data['deleted_at'])){
				if (!(empty($data['tanggal_publish'])) && $data['tanggal_publish'] > $today) {
					$data['status'] = '1';
				}elseif (!(empty($data['tanggal_publish'])) && $data['tanggal_publish'] == $today) {
					$data['status'] = '0';
				}
				else{
					$data['msg'] = 'Pilih tanggal sama atau lebih dari tanggal sekarang';
					$data['msg_type'] = 'warning';
					$data['prev_input'] = $data;
					$this->sunting($slug, $data, TRUE);
				}
			}

			$data['slug'] = $this->slug->create_uri($data);

			if (!empty($_FILES['gambar']['name'])) {
				if ($this->delete_files($query->gambar)) {
					$data['gambar']= $this->do_upload('gambar');
				}else{
					$data['msg'] = 'Coba lagi nanti. Terjadi kesalahan pada saat mengunggah gambar.';
					$data['msg_type'] = 'warning';
					$data['prev_input'] = $data;
					$this->sunting($slug, $data, TRUE);
				}
			} else {
				$data['gambar'] = 'default.png';
			}

			$query = $this->berita_m->from_form(NULL, array(
				'isi' => $data['isi'],
				'slug' => $data['slug'],
				'gambar' => $data['gambar'],
				'status' => $data['status'],
				'tanggal_publish' => $data['tanggal_publish']
				), array('slug' => $slug))->update();

			if ($query === FALSE) {
				$data['msg'] = 'Terjadi kesalahan saat mengubah berita';
				$data['msg_type'] = 'warning';
				$data['prev_input'] = $data;
				$this->sunting($slug, $data, TRUE);
			}else{
				if ($data['status'] == '2') {
					$this->message('<strong>Berhasil</strong> Berita Disimpan di Draft', 'success');
					$this->go('berita/draf');
				}else{
					$this->message('<strong>Berhasil</strong> mengubah Berita', 'success');
					$this->go('berita');
				}
			}
		}
	}

	public function arsipkan($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Berita tidak ditemukan', 'danger');
			$this->go('berita');
		}else{
			//ambil status berita sesuai slug
			$q_status = $this->berita_m->fields('status')->as_array()->get(array('slug' => $slug));
			if ($q_status === FALSE) {
				$this->message('Berita tidak ditemukan', 'danger');
				$this->go('berita');
			}else{
				//arsipkan
				$query = $this->berita_m->delete(array('slug' => $slug));
				if ($query === FALSE) {
					$this->message('Terjadi kesalahan sistem saat mengarsipkan berita! Coba lagi nanti.', 'danger');
				}else{
					$this->message('Berita berhasil diarsipkan', 'success');
				}
				$this->redirectBerita($q_status);
			}
		}
	}

	public function publikasikan($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Draf tidak ditemukan', 'danger');
		}else{
			//publikasikan
			$query = $this->berita_m
			->where('slug', $slug)
			->update(array(
				'tanggal_publish' => date('Y-m-d'),
				'status' => '0'
				));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan pada sistem saat mempublikasikan draf! Coba lagi nanti.', 'danger');
			}else{
				$this->message('Draf berhasil dipublikasikan', 'success');
			}
		}
		$this->go('berita/draf');
	}

	public function kembalikan($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Arsip tidak ditemukan', 'danger');
		}else{
			//kembalikan
			$query = $this->berita_m->restore(array('slug' => $slug));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan pada sistem saat mengembalikan arsip! Coba lagi nanti.', 'danger');
			}else{
				$this->message('Arsip berhasil dikembalikan', 'success');
			}
		}
		$this->go('berita/arsip');
	}

	public function hapus($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Berita tidak ditemukan', 'danger');
			$this->go('berita');
		}else{
			//ambil atribut berita yg diperlukan sesuai slug
			$q = $this->berita_m->fields('status, deleted_at')->as_array()->get(array('slug' => $slug));
			if ($q === FALSE) {
				$this->message('Berita tidak ditemukan', 'danger');
				$this->go('berita');
			}else{
				//hapus
				$query = $this->berita_m->force_delete(array('slug' => $slug));
				if ($query === FALSE) {
					$this->message('Terjadi kesalahan sistem saat menghapus berita! Coba lagi nanti.', 'danger');
				}else{
					$this->message('Berita berhasil dihapus', 'success');
				}
				$this->redirectBerita($q);
			}
		}
	}

	private function redirectBerita($data)
	{
		if (!is_null($data['deleted_at'])) {
			$this->go('berita/arsip');
		}else{
			if ($data['status'] == '2') {
				$this->go("berita/draf");
			}else{
				$this->go('berita');
			}
		}
	}

	private function do_upload($input_name)
	{
		$this->load->helper('prefix_unik');
		$config['file_name'] = prefix_unik(1). '.' .pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION);
		$config['upload_path'] = './assets/images/berita/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($input_name)) {
			$this->message($this->upload->display_errors(), 'danger');
			$this->redirectBerita($input_name);
		}else{
			$file_date = $this->upload->data();
			$link = $file_date['file_name'];
			return $link;
		}
	}

	private function delete_files($filename){
		$path = $_SERVER['DOCUMENT_ROOT'].'assets/images/berita/';
		$get_file = $path.$filename;
		if(file_exists($get_file)){
			unlink($get_file);
			return TRUE;
		}
		return FALSE;
	}
}