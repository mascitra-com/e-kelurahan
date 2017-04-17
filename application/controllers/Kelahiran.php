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

	public function arsip()
	{
		$data['kelahirans'] = $this->kelahiran_m
		->with_pelapor('fields:nama')
		->only_trashed()
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('status', array('0', '1'))
		->fields('id ,no_surat, tanggal_verif, created_at')
		->get_all();

		$this->render('kelahiran/arsip', $data);
	}

	public function konfirmasi()
	{
		$data = $this->input->post();
		if (!is_null($data['id'])) {
			$query = $this->kelahiran_m->update(array(
				'tanggal_verif' => date('Y-m-d h:i:s'),
				'status' => $data['status'],
				'keterangan' => $data['keterangan']
				), array('id' => $data['id'])); 
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat memverifikasi surat', 'danger');
				$this->redirectJenis($data['jenis']);
			}else{
				$this->message('Data Surat berhasil diverifikasi', 'success');
				$this->cache->delete('notifikasi');
				$this->go('kelahiran');
			}
		}else{
			$this->message('Terjadi kesalahan sistem. Coba lagi nanti.', 'danger');
		}
		$this->go('kelahiran');
	}

	public function simpan()
	{
		$input = $this->input->post();
		// $query = $this->kelahiran_m
		// ->from_form(NULL, array(
		// 	'id' => $this->kelahiran_m->get_last_id("SKL", 10),
		// 	'id_organisasi' => $this->ion_auth->get_current_id_org(),
		// 	'nik_ibu' => str_replace(' ', '', substr($input['nik_ibu'], 0, strpos($input['nik_ibu'], "|"))),
		// 	'nik_ayah' => str_replace(' ', '', substr($input['nik_ayah'], 0, strpos($input['nik_ayah'], "|"))),
		// 	'nik_pelapor' => str_replace(' ', '', substr($input['nik_pelapor'], 0, strpos($input['nik_pelapor'], "|"))),
		// 	'status' => '1',
		// 	'tanggal_verif' => date('Y-m-d h:i:s'),
		// ))
		// ->insert();
		$input['id'] = $this->kelahiran_m->get_last_id("SKL", 10);
		$input['id_organisasi'] = $this->ion_auth->get_current_id_org();
		$input['nik_ibu'] = str_replace(' ', '', substr($input['nik_ibu'], 0, strpos($input['nik_ibu'], "|")));
		$input['nik_ayah'] = str_replace(' ', '', substr($input['nik_ayah'], 0, strpos($input['nik_ayah'], "|")));
		$input['nik_pelapor'] = str_replace(' ', '', substr($input['nik_pelapor'], 0, strpos($input['nik_pelapor'], "|")));
		$input['status'] = '1';
		$input['tanggal_verif'] = date('Y-m-d h:i:s');

		$query = $this->kelahiran_m->insert($input);
		if ($query === FALSE) {
			$this->message('Terjadi kesalahan saat membuat data surat keterangan kelahiran!', 'warning');
			dump(form_error());
		}else{
			$this->message('Pengajuan surat keterangan kelahiran berhasil dibuat', 'success');
		}
		$this->go('kelahiran');
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
			->fields('id,no_surat,tanggal_kelahiran,tempat_kelahiran,nama_anak,hubungan_pelapor, nama_pengambil, tanggal_ambil, status')
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

	public function cetak($id = NULL)
	{
		$query = $this->kelahiran_m
		->as_object()
		->get(array(
			'id' => $id,
			'id_organisasi' => $this->ion_auth->get_current_id_org(),
			));

		if ($query->status !== '1' && (is_null($query->nama_pengambil) && is_null($query->tanggal_ambil))) { //tidak boleh cetak
			$this->message('Surat masih belum boleh dicetak!', 'warning');
			$this->go('kelahiran');
		}else{
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
					$this->render('kelahiran/cetak', $data);
				}
			}
		}
	}

	public function arsipkan($id= NULL)
	{
		if (is_null($id) || empty($id)) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->kelahiran_m->delete(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat mengarsipkan surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil diarsipkan', 'success');
			}
		}
		$this->go('kelahiran');
	}
	public function kembalikan($id= NULL)
	{
		if (is_null($id) || empty($id)) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->kelahiran_m->restore(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat mengembalikan surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dikembalikan', 'success');
			}
		}
		$this->go('kelahiran');
	}

	public function hapus($id= NULL)
	{
		if (is_null($id) || empty($id)) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->kelahiran_m->force_delete(array('id' => $id));
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat menghapus surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dihapus', 'success');
			}
		}
		$this->go('kelahiran');
	}
}