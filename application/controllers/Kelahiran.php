<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->helper(array('dump'));
		$this->load->model(array('organisasi_m', 'penduduk_m', 'kelahiran_m'));
		$this->_accessable = TRUE;
	}

	public function index()
	{
		$data['kelahirans'] = $this->kelahiran_m
		->with_pelapor('fields:nama')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('status', array('0', '1'))
		->fields('id ,no_surat, tanggal_verif, status, tanggal_ambil,nama_pengambil, created_at, updated_at, updated_by')
		->get_all();

		$data['unconfirmeds'] = $this->kelahiran_m
		->where('status', '0')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->as_array()
		->count_rows();

		$this->generateCsrf();
		$this->render('kelahiran/kelahiran', $data);
	}

	public function ambil()
	{
		$data = $this->input->post();
		if (!is_null($data['id_surat'])) {
			//generate no surat
			$no_surat = $this->kelahiran_m->generateNoSurat($data['no_surat']);

			//cek duplikasi surat
			if ($this->kelahiran_m->cekDuplikasiSurat($no_surat)) {
				$this->message('Surat dengan nomor: <strong>'. $no_surat .'</strong> sudah ada', 'warning');
				$this->go('kelahiran');
			}

			$query = $this->kelahiran_m->update(array(
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
		$this->go('kelahiran');
	}

	public function detail($id = NULL)
	{
		if (is_null($id) || empty($id)) {
			$this->message('Data surat tidak ditemukan', 'warning');
			$this->go('kelahiran');
		}else{
			$id_organisasi = $this->ion_auth->get_current_id_org();

			$this->load->model('profil_m');

			//ambil data kelurahan
			$kelurahan = $this->profil_m
			->fields('nip, nama_lurah, alamat')
			->get(array(
				'id_organisasi' => $id_organisasi
				));

			//ambil data surat
			$surat = $this->kelahiran_m
			->fields('id,no_surat,tanggal_kelahiran,tempat_kelahiran,nama_anak,hubungan_pelapor')
			->with_organisasi('fields:nama')
			->with_ibu(array(
				'fields' => 'nama, tempat_lahir, tanggal_lahir, rt, rw',
				'with' => array(
					'relation' => 'pekerjaan',
					'fields' => 'pekerjaan'
					)
				))
			->with_ayah(array(
				'fields' => 'nama, tempat_lahir, tanggal_lahir, rt, rw',
				'with' => array(
					'relation' => 'pekerjaan',
					'fields' => 'pekerjaan'
					)
				))
			->with_pelapor(array(
				'fields' => 'nama, tempat_lahir, tanggal_lahir, rt, rw',
				'with' => array(
					'relation' => 'pekerjaan',
					'fields' => 'pekerjaan'
					)
				))
			->get(array(
				'id' => $id,
				'id_organisasi' => $id_organisasi
				));

			if ($surat === FALSE || $kelurahan === FALSE) {
				$this->message('Data surat tidak ditemukan');
				$this->go('kelahiran');
			}else{
				$data['kelurahan'] = $kelurahan;
				$data['surat'] = $surat;

				$this->load->helper('tanggal_indonesia');
				$this->render('kelahiran/detail', $data);
			}
		}
	}
}