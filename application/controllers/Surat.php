<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends MY_Controller
{
	
	public function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->helper(array('dump', 'form'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('surat_m', 'organisasi_m', 'penduduk_m', 'surat_m'));
	}

	public function blankoktp($optionalData = NULL, $optStatus = FALSE)
	{
		$data['blankos'] = $this->surat_m
		->with_penduduk('fields:nama')
		->where('jenis', '0')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('status', array('0', '1'))
		->fields('id ,no_surat, jenis, tanggal_verif, status, tanggal_ambil,nama_pengambil, created_at, updated_at, updated_by')
		->get_all();

		$data['unconfirmeds'] = $this->surat_m
		->where('status', '0')
		->where('jenis', '0')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->as_array()
		->count_rows();

		if ($optStatus) {
			$data['prev_input'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);	
		}
		$this->generateCsrf();
		$this->render('surat/blanko_ktp', $data);
	}

	public function skck($optionalData = NULL, $optStatus = FALSE)
	{
		$data['skcks'] = $this->surat_m
		->with_penduduk('fields:nama')
		->where('jenis', '1')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('status', array('0', '1'))
		->fields('id ,no_surat, jenis, tanggal_verif, status, created_at, updated_at, updated_by')
		->get_all();

		$data['unconfirmeds'] = $this->surat_m
		->where('status', '0')
		->where('jenis', '1')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->as_array()
		->count_rows();

		if ($optStatus) {
			$data['prev_input'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);	
		}

		$this->generateCsrf();
		$this->render('surat/skck', $data);
	}

	public function keterangan_miskin($optionalData = NULL, $optStatus = FALSE)
	{
		$data['miskins'] = $this->surat_m
		->with_penduduk('fields:nama')
		->where('jenis', '2')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('status', array('0', '1'))
		->fields('id ,no_surat, jenis, tanggal_verif, status, created_at, updated_at, updated_by')
		->get_all();

		$data['unconfirmeds'] = $this->surat_m
		->where('status', '0')
		->where('jenis', '2')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->as_array()
		->count_rows();

		if ($optStatus) {
			$data['prev_input'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);	
		}

		$this->generateCsrf();
		$this->render('surat/keterangan_miskin', $data);
	}

	public function keterangan_miskin_rt($optionalData = NULL, $optStatus = FALSE)
	{
		$data['miskins'] = $this->surat_m
		->with_penduduk('fields:nama')
		->where('jenis', '3')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->where('status', array('0', '1'))
		->fields('id ,no_surat, jenis, tanggal_verif, status, created_at, updated_at, updated_by')
		->get_all();

		$data['unconfirmeds'] = $this->surat_m
		->where('status', '0')
		->where('jenis', '3')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->as_array()
		->count_rows();

		if ($optStatus) {
			$data['prev_input'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);	
		}

		$this->generateCsrf();
		$this->render('surat/keterangan_miskin_rt', $data);
	}

	public function simpan($jenis = NULL)
	{
	    $where = array(
            'nik' => $this->input->post('nik'),
            'jenis' => $jenis,
            'status' => '0'
        );
	    $query = $this->surat_m->get($where);
		if ($jenis !== NULL && $query === FALSE) {
			$input = $this->input->post();
			//cek input kosong
			if (empty($input['no_surat']) || empty($input['nik'])) {
				$this->message('Terjadi kesalahan saat memasukkan data surat | Data ada yang kosong', 'warning');
				$this->redirectJenis($jenis);
			}
			if ($jenis === '0') {
				$input['no_surat'] = '23/'. $input['no_surat'] .'/02.002/'.date('Y');
			}elseif ($jenis === '1') {
				$input['no_surat'] = '24/'. $input['no_surat'] .'/02.002/'.date('Y');
			}elseif ($jenis === '2') {
				$input['no_surat'] = '25/'. $input['no_surat'] .'/02.002/'.date('Y');
			}elseif ($jenis === '3') {
				$input['no_surat'] = '26/'. $input['no_surat'] .'/02.002/'.date('Y');
			}else{
				$this->message('Terjadi kesalahan sistem saat memasukkan no surat', 'danger');
				$this->redirectJenis($jenis);
			}

			//CEK DUPLIKASI NO SURAT
			$exist_surat = $this->surat_m->where('no_surat', $input['no_surat'])->get();
			if ($exist_surat) {
				$this->message('Surat dengan nomor: <strong>'. $input['no_surat'] .'</strong> sudah ada', 'warning');
				$this->redirectJenis($jenis);	
			}

			$input['nik'] = str_replace(' ', '', substr($input['nik'], 0, strpos($input['nik'], "|")));
			$add_input = array(
				'id_organisasi' => $this->ion_auth->get_current_id_org(),
				'jenis' => $jenis,
				'status' => '1',
				'tanggal_verif' => date('Y-m-d h:i:s'),
				);
			$insert = array_merge($input, $add_input);
			if ($jenis === '0' || $jenis === '1' || $jenis === '2' || $jenis === '3') {
				$query = $this->surat_m->insert($insert); 
				if ($query === FALSE) {
					$data['msg'] = 'Terjadi kesalahan saat membuat data surat';
					$data['msg_type'] = 'warning';
					$data['prev_input'] = $input;
					if ($jenis === '0') {
						$this->blankoktp($data, TRUE);
					}elseif ($jenis === '1') {
						$this->skck($data, TRUE);
					}elseif ($jenis === '2') {
						//TODO 2
					}elseif ($jenis === '3') {
						//TODO 3
					}else{
						$this->message('Terjadi kesalahan sistem saat kondisi memasukkan data FALSE', 'danger');
						$this->redirectJenis($jenis);
					}
				}else{
					$this->message('Data Surat berhasil masuk', 'success');
					$this->redirectJenis($jenis);
				}
			}else{
				$this->message('Terjadi kesalahan saat mengunjungi halaman', 'danger');
			}
		} else if($query){
            $this->message('Penduduk masih memilik surat yang harus disetujui sebelum melakukan pengajuan surat baru', 'warning');
        } else {
			$this->message('Terjadi kesalahan saat mengunjungi halaman', 'warning');
		}
		$this->redirectJenis($jenis);
	}

	public function konfirmasi()
	{
		$data = $this->input->post();
		if (!is_null($data['jenis']) && !is_null($data['id'])) {
			if ($data['jenis'] === '0' || $data['jenis'] === '1' || $data['jenis'] === '2' || $data['jenis'] === '3') {
				if ($data['status'] === '1') {
				# SETUJUI
				//AMBIL NO SURAT DENGAN JENIS YANG BERSANGKUTAN PALING TERAKHIR
					$no_surat = $this->surat_m
					->where(array(
						'id_organisasi' => $this->ion_auth->get_current_id_org(),
						'jenis' => $data['jenis'],
						))
					->order_by('no_surat', 'desc')
					->fields('no_surat')
					->get()->no_surat;


					$no_surat = explode('/', $no_surat);
					$no_surat = (int)$no_surat[1]+1;

					if ($data['jenis'] === '0') {
						$update_no = '23/'. $no_surat .'/02.002/'.date('Y');
					}elseif ($data['jenis'] === '1') {
						$update_no = '24/'. $no_surat .'/02.002/'.date('Y');
					}elseif ($data['jenis'] === '2') {
						$update_no = '25/'. $no_surat .'/02.002/'.date('Y');
					}elseif ($data['jenis'] === '3') {
						$update_no = '26/'. $no_surat .'/02.002/'.date('Y');
					}else{
						$this->message('Terjadi kesalahan sistem saat memasukkan no surat', 'danger');
						$this->redirectdataJenis($data['jenis']);
					}
					$update_data = array(
						'no_surat' => $update_no,
						'tanggal_verif' => date('Y-m-d h:i:s'),
						'status' => '1'
						);
				}elseif ($data['status'] === '2') {
				# TOLAK
					$update_data = array(
						'tanggal_verif' => date('Y-m-d h:i:s'),
						'status' => '2'
						);
				}else{
					$this->message('Terjadi kesalahan sistem saat membaca status surat. Coba lagi nanti.', 'danger');
					$this->redirectJenis($data['jenis']);
				}
				$query = $this->surat_m->update($update_data, $data['id']); 
				if ($query === FALSE) {
					$this->message('Terjadi kesalahan sistem saat memverifikasi surat', 'danger');
					$this->redirectJenis($data['jenis']);
				}else{
					$this->message('Data Surat berhasil diverifikasi', 'success');
					$this->redirectJenis($data['jenis']);
				}
			}else{
				$this->message('Terjadi kesalahan sistem. Coba lagi nanti.', 'danger');
			}
		}else{
			$this->message('Terjadi kesalahan sistem. Coba lagi nanti.', 'danger');
		}
		$this->redirectJenis($data['jenis']);
	}

	public function ambil()
	{
		$data = $this->input->post();
		if (!is_null($data['id_surat']) && !is_null($data['jenis_surat'])) {
			$query = $this->surat_m->update(array(
				'nama_pengambil' => $data['nama_pengambil'],
				'keterangan' => $data['keterangan'],
				'tanggal_ambil' => date('Y-m-d h:i:s')
			), $data['id_surat']);
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem. Coba lagi nanti.', 'danger');
			}else{
				$this->message('Data surat telah disunting.', 'success');
			}
		}else{
			$this->message('Surat tidak ditemukan.', 'warning');
		}
		$this->redirectJenis($data['jenis_surat']);
	}

	public function arsip($jenis = NULL)
	{
		if (is_null($jenis) || empty($jenis)) {
			$this->message('Arsip surat tidak ditemukan');
			$this->redirectJenis($jenis);
		}else{
			switch ($jenis) {
				case 'blankoktp':
				$jenis = '0';
				break;

				case 'skck':
				$jenis = '1';
				break;

				case 'keterangan_miskin':
				$jenis = '2';
				break;

				case 'keterangan_miskin_rt':
				$jenis = '3';
				break;
				
				default:
				$jenis= '4';
				break;
			}

			$data['surats'] = $this->surat_m
			->with_penduduk('fields:nama')
			->only_trashed()
			->fields('id ,no_surat, jenis, tanggal_verif, status, created_at, updated_at, updated_by')
			->get_all(array(
				'jenis' => $jenis,
				'id_organisasi' => $this->ion_auth->get_current_id_org()
				));

			$this->render('surat/arsip_surat', $data);
		}
	}

	public function arsipkan($jenis = NULL, $id= NULL)
	{
		if ((is_null($jenis) || empty($jenis) ) && (is_null($id) || empty($id)) ) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->surat_m->delete($id);
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat mengarsipkan surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil diarsipkan', 'success');
			}
		}
		$this->redirectJenis($jenis);
	}

	public function kembalikan($jenis = NULL, $id= NULL)
	{
		if ((is_null($jenis) || empty($jenis) ) && (is_null($id) || empty($id)) ) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->surat_m->restore($id);
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat mengembalikan surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dikembalikan', 'success');
			}
		}
		$this->redirectJenis($jenis);
	}


	public function hapus($jenis = NULL, $id= NULL)
	{
		if ((is_null($jenis) || empty($jenis) ) && (is_null($id) || empty($id)) ) {
			$this->message('Surat tidak ditemukan', 'danger');
		}else{
			$query = $this->surat_m->force_delete($id);
			if ($query === FALSE) {
				$this->message('Terjadi kesalahan sistem saat menghapus surat. Coba lagi nanti', 'danger');
			}else{
				$this->message('Surat berhasil dihapus', 'success');
			}
		}
		$this->redirectJenis($jenis);
	}

	public function detail($jenis = NULL ,$id = NULL)
	{
		if (is_null($id) || empty($id)) {
			$this->message('Data surat tidak ditemukan', 'warning');
			$this->redirectJenis($jenis);
		}else{
			switch ($jenis) {
				case 'blankoktp':
				$jenis = '0';
				break;

				case 'skck':
				$jenis = '1';
				break;

				case 'keterangan_miskin':
				$jenis = '2';
				break;

				case 'keterangan_miskin_rt':
				$jenis = '3';
				break;
				
				default:
				$jenis= '4';
				break;
			}
			$id_organisasi = $this->ion_auth->get_current_id_org();

			$this->load->model('profil_m');

			//ambil data kelurahan
			$kelurahan = $this->profil_m
			->fields('nip, nama_lurah, alamat')
			->get(array(
				'id_organisasi' => $id_organisasi
				));

			//ambil data surat
			$surat = $this->surat_m
			->fields('id,no_surat')
			->with_organisasi('fields:nama')
			->with_penduduk(array(
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
				$this->redirectJenis($jenis);
			}else{
				$data['kelurahan'] = $kelurahan;
				$data['surat'] = $surat;
				$this->render('surat/keterangan_miskin_detail', $data);
			}

		}
	}

	public function cetak($jenis = NULL ,$id = NULL)
	{
		if (is_null($id) || empty($id)) {
			$this->message('Data surat tidak ditemukan', 'warning');
			$this->redirectJenis($jenis);
		}else{
			$namafile = $jenis;

			switch ($jenis) {
				case 'blankoktp':
				$jenis = '0';
				break;

				case 'skck':
				$jenis = '1';
				break;

				case 'keterangan_miskin':
				$jenis = '2';
				break;

				case 'keterangan_miskin_rt':
				$jenis = '3';
				break;
				
				default:
				$jenis= '4';
				break;
			}
			$id_organisasi = $this->ion_auth->get_current_id_org();

			$this->load->model('profil_m');

			//ambil data kelurahan
			$kelurahan = $this->profil_m
			->fields('nip, nama_lurah, alamat')
			->get(array(
				'id_organisasi' => $id_organisasi
				));

			//ambil data surat
			$surat = $this->surat_m
			->fields('id,no_surat')
			->with_organisasi('fields:nama')
			->with_penduduk(array(
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
				$this->redirectJenis($jenis);
			}else{
				$data['kelurahan'] = $kelurahan;
				$data['surat'] = $surat;
				$this->render('surat/cetak/keterangan_miskin_cetak', $data);
			}
		}
	}

	private function redirectJenis($jenis){
		if ($jenis === '0') {
			$this->go('surat/blankoktp');
		}elseif ($jenis === '1') {
			$this->go('surat/skck');
		}elseif ($jenis === '2') {
			$this->go('surat/keterangan_miskin');
		}elseif ($jenis === '3') {
			$this->go('surat/keterangan_miskin_rt');
		}
		else{
			show_404();
		}
	}

}