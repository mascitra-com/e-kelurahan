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
		$this->load->model(array('surat_m', 'organisasi_m', 'penduduk_m'));
	}

	public function blankoktp($optionalData = NULL, $optStatus = FALSE)
	{
		$data['blankos'] = $this->surat_m
		->with_penduduk('fields:nama')
		->where('jenis', '0')
		->where('status', '1')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->fields('no_surat, jenis, tanggal_verif, created_at, updated_at, updated_by')
		->get_all();

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
		->where('status', '1')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->fields('no_surat, jenis, tanggal_verif, created_at, updated_at, updated_by')
		->get_all();

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
		->where('status', '1')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->fields('no_surat, jenis, tanggal_verif, created_at, updated_at, updated_by')
		->get_all();

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
		->where('status', '1')
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->fields('no_surat, jenis, tanggal_verif, created_at, updated_at, updated_by')
		->get_all();

		if ($optStatus) {
			$data['prev_input'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);	
		}

		$this->generateCsrf();
		$this->render('surat/keterangan_miskin_rt', $data);
	}

	public function simpan($jenis = NULL)
	{
		if ($jenis !== NULL) {
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
		}else{
			$this->message('Terjadi kesalahan saat mengunjungi halaman', 'warning');
		}
		$this->redirectJenis($jenis);
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