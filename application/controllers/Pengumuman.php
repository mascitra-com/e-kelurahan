<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Pengumuman extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('dump', 'form', 'potong_teks', 'cek_file'));
		$this->load->library(array('form_validation', 'slug'));
		$this->load->model(array('pengumuman_m'));

		$this->slug_config($this->pengumuman_m->table, 'nama');

		//nonaktifkan pengumuman jika melewati tanggal kadaluarsa
		$query = $this->pengumuman_m
		->where(array(
			'tanggal_kadaluarsa <' => date('Y-m-d')
			))
		->update(array('status' => '1'));
		if ($query === FALSE) {
			$this->message('Terjadi kesalahan sistem saat memeriksa batas tanggal pengumuman! Hubungi bagian teknis!', 'danger');
			$this->go('index');
		}
	}

	public function index($optionalData = NULL, $optStatus = FALSE)
	{
		$data['pengumumans'] = $this->pengumuman_m
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->order_by('status','asc')
		->order_by('tanggal_kadaluarsa','asc')
		->limit(4)
		->fields('nama, isi, slug, tanggal_kadaluarsa, status')
		->with_akun('fields:username')
		->get_all();


		if ($optStatus) {
			$data['peng'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);
		}

		$this->generateCsrf();
		$this->render('pengumuman/pengumuman', $data);
	}

	public function simpan()
	{
		$data = $this->input->post();
		if (!empty($data['tanggal_kadaluarsa']) && $data['tanggal_kadaluarsa'] < date('Y-m-d')) {
			$data['msg'] = 'Pilih tanggal sama atau lebih dari tanggal hari ini';
			$data['msg_type'] = 'warning';
			$data['prev_input'] = $data;
			$this->index($data, TRUE);
		}else{
			$data['id_organisasi'] = $this->ion_auth->get_current_id_org();
			$data['slug'] = $this->slug->create_uri($data);

			if (empty($data['tanggal_kadaluarsa'])) {
				$data['tanggal_kadaluarsa'] = NULL;
			}

			$query = $this->pengumuman_m->from_form(NULL, array(
				'id_organisasi' => $data['id_organisasi'],
				'slug' => $data['slug'],
				'tanggal_kadaluarsa' => $data['tanggal_kadaluarsa']
				))->insert();

			if ($query === FALSE) {
				$data['msg'] = 'Terjadi kesalahan saat membuat pengumuman baru.';
				$data['msg_type'] = 'warning';
				$data['prev_input'] = $data;
				$this->index($data, TRUE);
			}else{
				$this->message('Berhasil membuat pengumuman', 'success');
				$this->go('pengumuman');
			}
		}		
	}

	public function ubah($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Pengumuman tidak ditemukan', 'warning');
			$this->go('pengumuman');
		}else{
			$data = $this->input->post();
			if (!empty($data['tanggal_kadaluarsa']) && $data['tanggal_kadaluarsa'] < date('Y-m-d')) {
				$this->message('Pilih tanggal sama atau lebih dari tanggal hari ini', 'warning');
				$this->go('pengumuman');
			}else{
				$data['slug'] = $this->slug->create_uri($data);

				if (empty($data['tanggal_kadaluarsa'])) {
					$data['tanggal_kadaluarsa'] = NULL;
				}

				$query = $this->pengumuman_m->from_form(NULL, array(
					'slug' => $data['slug'],
					'tanggal_kadaluarsa' => $data['tanggal_kadaluarsa']
					), array(
					'slug' => $slug,
					'id_organisasi' => $this->ion_auth->get_current_id_org()
					))->update();

				if ($query === FALSE) {
					$this->message('Terjadi kesalahan saat mengubah pengumuman', 'warning');
					$this->go('pengumuman');
				}else{
					$this->message('Berhasil mengubah pengumuman', 'success');
					$this->go('pengumuman');
				}
			}		
		}

	}

	public function nonaktifkan($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Pengumuman tidak ditemukan', 'danger');
		}else{
			//nonaktifkan
			$query = $this->pengumuman_m
			->where('slug', $slug)
			->update(array(
				'status' => '1'
				));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan pada sistem saat menonaktifkan pengumuman! Coba lagi nanti.', 'danger');
			}else{
				$this->message('Pengumuman berhasil dinonaktifkan', 'success');
			}
		}
		$this->go('pengumuman');
	}

	public function aktifkan($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Pengumuman tidak ditemukan', 'danger');
		}else{
			//tidak boleh aktif jika tanggal kadaluarsa kurang dari hari ini
			//ambil tanggal sesuai slug
			$tanggal_kadaluarsa = $this->pengumuman_m->fields('tanggal_kadaluarsa')->get(array('slug' => $slug));
			if ($tanggal_kadaluarsa === FALSE) {
				$this->message('Terjadi kesalahan pada sistem saat mengaktifkan pengumuman! Coba lagi nanti(0).', 'danger');
			}else{
				if (!is_null($tanggal_kadaluarsa->tanggal_kadaluarsa) && $tanggal_kadaluarsa->tanggal_kadaluarsa < date('Y-m-d')) {
					$this->message('Tidak dapat mengaktifkan pengumuman! Sunting terlebih dahulu batas tampil.', 'warning');
				}else{
					//aktifkan
					$query = $this->pengumuman_m
					->where('slug', $slug)
					->update(array(
						'status' => '0'
						));
					if ($query === FALSE) {
						$this->message('Terjadi kesalahan pada sistem saat mengaktifkan pengumuman! Coba lagi nanti.', 'danger');
					}else{
						$this->message('Pengumuman berhasil diaktifkan', 'success');
					}
				}
			}
		}
		$this->go('pengumuman');
	}

	public function hapus($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			$this->message('Pengumuman tidak ditemukan', 'danger');
		}else{
			//cek keberadaan pengumuman
			$q = $this->pengumuman_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->get(array('slug' => $slug));
			if ($q === FALSE) {
				$this->message('Pengumuman tidak ditemukan', 'danger');
			}else{
				//hapus
				$query = $this->pengumuman_m->delete(array('slug' => $slug));
				if ($query === FALSE) {
					$this->message('Terjadi kesalahan sistem saat menghapus pengumuman! Coba lagi nanti.', 'danger');
				}else{
					$this->message('Pengumuman berhasil dihapus', 'success');
				}
			}
		}
		$this->go('pengumuman');
	}
}