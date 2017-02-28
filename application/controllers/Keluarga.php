<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends MY_Controller
{
	
	function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->library(array('form_validation'));
		$this->load->helper(array('dump_helper', 'string'));
		$this->load->model(array('organisasi_m'));
		$this->load->model(array('keluarga_m', 'penduduk_m', 'detail_kk_m'));
	}

	public function index()
	{
		$data['keluargas'] = $this->keluarga_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->fields('no, alamat, rt, rw, updated_at')->with_penduduk('fields:nama')->get_all();
		
		$this->render('keluarga/index', $data);
	}

	public function detail($no)
	{
		$data['keluarga'] = $this->keluarga_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->fields('no, alamat, rt, rw, kode_pos')->with_penduduk('fields:nik,nama')->get($no);

		$this->render('keluarga/detail', $data);
	}

	public function simpan()
	{
		$current_id_org = $this->ion_auth->get_current_id_org();

		$data= $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], "|")));
		$data['rt'] = ltrim($data['rt'], '0');
		$data['rw'] = ltrim($data['rw'], '0');
		$id_org = array('id_organisasi' => $current_id_org);
		$insert= array_merge($data, $id_org);
		if (!empty($data['nik'])) {
			$this->keluarga_m->insert($insert);	
			//insert ke detail_kk
			$insert_detail = array(
				'no_kk' => $data['no'],
				'nik' => $data['nik'],
				);
			if ($this->detail_kk_m->insert($insert_detail)) {
				$this->go('keluarga/detail/'.$data['no']);
			}else{
				die('terjadi kesalahan saat insert tabel detail keluarga');
			}
		}else{
			die('terjadi kesalahan saat insert | nik kosong');
		}
	}

	public function sunting($no)
	{
		$current_id_org = $this->ion_auth->get_current_id_org();

		$data= $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], "|")));
		$data['rt'] = ltrim($data['rt'], '0');
		$data['rw'] = ltrim($data['rw'], '0');
		$id_org = array('id_organisasi' => $current_id_org);
		$update= array_merge($data, $id_org);
		if (!empty($data['nik'])) {
			$this->keluarga_m->where('no',$no)->update($update);	
			//update ke detail_kk
			$update_detail = array(
				'no_kk' => $data['no'],
				'nik' => $data['nik'],
				);
			if ($this->detail_kk_m->where('no_kk',$no)->update($update_detail)) {
				$this->go('keluarga');
			}else{
				die('terjadi kesalahan saat update tabel detail keluarga');
			}
		}else{
			die('terjadi kesalahan saat update | nik kosong');
		}

		dump($update);
	}

	public function ambil_kep_nik()
	{
		$current_id_org = $this->ion_auth->get_current_id_org();
		$penduduk_hidup =$this->penduduk_m->ambilPendudukHidup($current_id_org);

		if ($penduduk_hidup) {
			if ( $penduduk_hidup !== 'Penduduk tidak ditemukan') {
				echo json_encode($penduduk_hidup);
			}else{
				echo(json_encode(FALSE));
			}
		}else{
			die('Kesalahan query saat mengambil penduduk hidup');
		}
	}
}