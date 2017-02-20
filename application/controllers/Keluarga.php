<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));
		$this->load->helper(array('dump_helper', 'string'));
		$this->load->model(array('organisasi_m'));
		$this->load->model(array('keluarga_m', 'penduduk_m', 'detail_kk_m'));
	}

	public function index()
	{
		
		// $data['kelurahans'] = $this->organisasi_m->where('id >', '1')->fields('id, nama, slug, status, updated_at')->with_akuns('fields:id,id_organisasi,username,active', 'where:`id`>\'1\'')->get_all();

		// $data['kelurahan_verifs'] = $this->organisasi_m->where('id >', '1')->where('status', array('0','2'))->get_all();

		// $penduduk_hidup = $this->penduduk_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->fields('nik, id_organisasi')->with_meninggals('fields:id, id_organisasi')->get_all();
		
		$this->render('keluarga/index');
	}

	public function simpan()
	{
		$current_id_org = $this->ion_auth->get_current_id_org();

		$data= $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], "|")));
		$data['rt'] = ltrim($data['rt'], '0');
		$data['rw'] = ltrim($data['rw'], '0');
		if (!empty($data['nik'])) {
			dump($data['nik']);
			// dump($this->keluarga_m->from_form(NULL, array('id_organisasi' => $current_id_org))->insert());
			if ($this->keluarga_m->from_form(NULL, array('id_organisasi' => $current_id_org))->insert()) {
				
				//insert ke detail_kk
				$insert_detail = array(
					'no_kk' => $data['no'],
					'nik' => $data['nik'],
				);
				if ($this->detail_kk_m->insert($insert_detail)) {
					$this->go('keluarga');
				}else{
					die('terjadi kesalahan saat insert tabel detail keluarga');
				}
			} else {
				die('terjadi kesalahan saat insert tabel keluarga');
			}
		}else{
			die('terjadi kesalahan saat insert | nik kosong');
		}
	}

	public function ambil_kep_nik()
	{
		$current_id_org = $this->ion_auth->get_current_id_org();
		$penduduk_hidup =$this->penduduk_m->ambilPendudukHidup($current_id_org);

		if ($penduduk_hidup) {
			echo json_encode($penduduk_hidup);
		}else{
			die('Kesalahan query saat mengambil penduduk hidup');
		}
	}
}