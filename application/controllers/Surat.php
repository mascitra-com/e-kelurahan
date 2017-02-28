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
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->fields('no_surat, jenis, tanggal_verif, created_at, updated_at, updated_by')
		->get_all();

		if ($optStatus) {
			$data['prev_input'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);	
		}
		$this->render('surat/blanko_ktp', $data);
	}

	public function simpan($jenis = NULL)
	{
		if ($jenis !== NULL) {
			$input = $this->input->post();
			//cek input kosong
			if (empty($input['no_surat']) || empty($input['nik'])) {
				$this->message('Terjadi kesalahan saat memasukkan data surat | Data ada yang kosong', 'warning');
				$this->go('surat/blankoktp');
			}
			$input['no_surat'] = '23/'. $input['no_surat'] .'/02.002/'.date('Y');
			$input['nik'] = str_replace(' ', '', substr($input['nik'], 0, strpos($input['nik'], "|")));
			$add_input = array(
				'id_organisasi' => $this->ion_auth->get_current_id_org(),
				'jenis' => $jenis,
				'status' => '1',
				'tanggal_verif' => date('Y-m-d h:i:s'),
			);
			$insert = array_merge($input, $add_input);
			if ($jenis === '0') {
				$query = $this->surat_m->insert($insert); 
				if ($query === FALSE) {
					$data['msg'] = 'Terjadi kesalahan saat membuat data surat';
					$data['msg_type'] = 'warning';
					$data['prev_input'] = $input;
					$this->blankoktp($data, TRUE);
				}else{
					$this->message('Data Surat berhasil masuk', 'success');
					$this->go('surat/blankoktp');
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
		}else{
			show_404();
		}
	}

}