<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Sktm_sekolah extends MY_Controller
{
	
	public function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->helper(array('dump', 'form'));
		$this->load->library(array('form_validation'));
		$this->load->model('surat_ktm_sekolah_m', 'surat');
		$this->load->model(array('organisasi_m', 'penduduk_m'));
	}

	public function index($optionalData = NULL, $optStatus = FALSE)
	{
		$data['surats'] = $this->surat
		->with_penduduk('fields:nama')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('status', array('0', '1'))
		->fields('id ,no_surat, jurusan, asal_sekolah, tanggal_verif, status, tanggal_ambil,nama_pengambil, created_at, updated_at, updated_by')
		->get_all();

		$data['unconfirmeds'] = $this->surat
		->where('status', '0')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->as_array()
		->count_rows();

		if ($optStatus) {
			$data['prev_input'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);	
		}
		$this->generateCsrf();

		$this->render('surat/sktm', $data);
	}

	public function arsip()
	{
		$data['surats'] = $this->surat
		->with_penduduk('fields:nama')
		->only_trashed()
		->fields('id ,no_surat, jurusan, asal_sekolah, tanggal_verif, status, created_at, updated_at, updated_by')
		->get_all(array(
			'id_organisasi' => $this->ion_auth->get_current_id_org()
			));

		$this->render('surat/arsip_sktm', $data);
	}

	public function simpan()
	{
		$where = array(
			'nik' => $this->input->post('nik'),
			'status' => '0'
			);
		$query = $this->surat->get($where);
		if ($query === FALSE) {
			$input = $this->input->post();
			//cek input kosong
			if (empty($input['nik'])) {
				$this->message('Terjadi kesalahan saat memasukkan data surat | NIK kosong', 'warning');
				$this->go('sktm_sekolah');
			}

			$input['nik'] = str_replace(' ', '', substr($input['nik'], 0, strpos($input['nik'], "|")));
			$add_input = array(
				'id' => $this->surat->get_last_id("STS", 10),
				'id_organisasi' => $this->ion_auth->get_current_id_org(),
				'status' => '1',
				'tanggal_verif' => date('Y-m-d h:i:s'),
				);
			$insert = array_merge($input, $add_input);
			$query = $this->surat->insert($insert); 
			if ($query === FALSE) {
				$data['msg'] = 'Terjadi kesalahan saat membuat data surat';
				$data['msg_type'] = 'warning';
				$data['prev_input'] = $input;
				$this->index($data, TRUE);
			}else{
				$this->message('Data Surat berhasil masuk', 'success');
				$this->go('sktm_sekolah');
			}
		}elseif($query){
			$this->message('Penduduk masih memilik surat yang harus disetujui sebelum melakukan pengajuan surat baru', 'warning');
		} else {
			$this->message('Terjadi kesalahan saat mengunjungi halaman', 'warning');
		}
		$this->go('sktm_sekolah');
	}

	public function konfirmasi()
	{
		$data = $this->input->post();
		if (!is_null($data['id'])) {
			$query = $this->surat->update(array(
				'tanggal_verif' => date('Y-m-d h:i:s'),
				'status' => $data['status'],
				'keterangan' => $data['keterangan']
				), array('id' => $data['id'])); 
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat memverifikasi surat', 'danger');
			}else{
				$this->message('Data Surat berhasil diverifikasi', 'success');
				$this->cache->delete('notifikasi');
			}
		}else{
			$this->message('Terjadi kesalahan sistem. Coba lagi nanti.', 'danger');
		}
		$this->go('sktm_sekolah');
	}

	public function ambil()
	{
		$data = $this->input->post();
		if (!is_null($data['id_surat'])) {
			//generate no surat
			$no_surat = $this->surat->generateNoSurat($data['no_surat']);

			//cek duplikasi surat
			if ($this->surat->cekDuplikasiSurat($no_surat)) {
				$this->message('Surat dengan nomor: <strong>'. $no_surat .'</strong> sudah ada', 'warning');
				$this->go('sktm_sekolah');
			}

			$query = $this->surat->update(array(
				'no_surat' => $no_surat,
				'nama_pengambil' => $data['nama_pengambil'],
				'keterangan' => $data['keterangan'],
				'tanggal_ambil' => date('Y-m-d h:i:s')
				), array('id' => $data['id_surat']));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem. Coba lagi nanti.', 'danger');
			}else{
				$this->message('Data surat telah disunting.', 'success');
			}
		}else{
			$this->message('Surat tidak ditemukan.', 'warning');
		}
		$this->go('sktm_sekolah');
	}

	public function arsipkan($id= NULL)
	{
		if (is_null($id) || empty($id)) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->surat->delete(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat mengarsipkan surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil diarsipkan', 'success');
			}
		}
		$this->go('sktm_sekolah');
	}

	public function kembalikan($id= NULL)
	{
		if (is_null($id) || empty($id)) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->surat->restore(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat mengembalikan surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dikembalikan', 'success');
			}
		}
		$this->go('sktm_sekolah');
	}

	public function hapus($id= NULL)
	{
		if (is_null($id) || empty($id)) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->surat->force_delete(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat menghapus surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dihapus', 'success');
			}
		}
		$this->go('sktm_sekolah');
	}
}