<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends MY_Controller
{	
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('dump', 'form', 'tanggal_indonesia'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('surat_m', 'organisasi_m', 'penduduk_m', 'keluarga_m', 'detail_kk_m', 'surat_ijin_usaha_m', 'kelahiran_m', 'kematian_m'));
	}

	public function index($optionalData = NULL, $optStatus = FALSE)
	{
		$no_kk = $this->keluarga_m
		->where('nik', $this->ion_auth->get_current_nik())
		->fields('no')
		->get()->no;

		$niks = $this->detail_kk_m
		->where('no_kk', $no_kk)
		->fields('nik')
		->get_all();

		$arr_niks = array();

		foreach ($niks as $nik) {
			array_push($arr_niks, $nik->nik);
		}

		$data['surats'] = $this->surat_m
		->with_penduduk('fields:nama')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('nik', $arr_niks)
		->fields('id, jenis, status, tanggal_verif, keterangan, nama_pengambil, created_at, updated_at, updated_by')
		->get_all();

		$data['ijin_usaha'] = $this->surat_ijin_usaha_m
		->with_penduduk('fields:nama')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('nik', $this->ion_auth->get_current_nik())
		->where('status', array('0', '1'))
		->fields('id ,no_surat, jenis_usaha, tanggal_verif, alamat, status, tanggal_ambil,nama_pengambil, created_at, updated_at, updated_by')
		->get_all();

		$data['kelahirans'] = $this->kelahiran_m
		->with_pelapor('fields:nama')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('nik_pelapor', $this->ion_auth->get_current_nik())
		->where('status', array('0', '1', '2'))
		->fields('id, nama_anak, tanggal_verif, status, tanggal_ambil,nama_pengambil,keterangan, created_at, updated_at, updated_by')
		->get_all();

		$data['kematians'] = $this->kematian_m
		->with_meninggal('fields:nama')
		->with_pelapor('fields:nama')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('nik_pelapor', $this->ion_auth->get_current_nik())
		->where('status', array('0', '1', '2'))
		->fields('id, tanggal_verif, status, tanggal_ambil,nama_pengambil, keterangan, created_at, updated_at, updated_by')
		->get_all();

		if ($optStatus) {
			$data['prev_input'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);	
		}

		$this->render('warga/surat/status_pengajuan', $data);
	}

	public function batalkan($id= NULL)
	{
		if (is_null($id) || empty($id) ) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->surat_m->force_delete(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat membatalkan surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dibatalkan', 'success');
			}
		}
		$this->go('warga/surat');
	}

	public function batalkan_ijin_usaha($id= NULL)
	{
		if (is_null($id) || empty($id) ) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->surat_ijin_usaha_m->force_delete(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat membatalkan surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dibatalkan', 'success');
			}
		}
		$this->go('warga/surat');
	}

	public function hapus($id= NULL)
	{
		if (is_null($id) || empty($id) ) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->surat_m->force_delete(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat menghapus surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dihapus', 'success');
			}
		}
		$this->go('warga/surat');
	}

	public function hapus_kelahiran($id= NULL)
	{
		if (is_null($id) || empty($id) ) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->kelahiran_m->force_delete(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat menghapus surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dihapus', 'success');
			}
		}
		$this->go('warga/surat');
	}

	public function hapus_kematian($id= NULL)
	{
		if (is_null($id) || empty($id) ) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->kematian_m->force_delete(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat menghapus surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dihapus', 'success');
			}
		}
		$this->go('warga/surat');
	}
}