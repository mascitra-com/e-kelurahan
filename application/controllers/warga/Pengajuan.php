<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends MY_Controller
{
	function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->helper(array('dump', 'form'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('surat_m', 'organisasi_m', 'penduduk_m', 'keluarga_m'));
	}

	public function index()
	{
		$this->go('warga/pengajuan/blankoktp');
	}

	public function blankoktp()
	{
        $data = $this->get_data_anggota_keluarga();

		$this->generateCsrf();
		$this->render('warga/pengajuan/pengajuan_ktp', $data);
	}

	public function blankoktp_simpan()
	{
		$data = $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], '|')));
		$data_insert = array(
			"id" => $this->surat_m->get_last_id("SRU", 10),
			"id_organisasi" => $this->ion_auth->get_current_id_org(),
			"jenis" => "0",
			);

		$insert = $this->surat_m->insert(array_merge($data, $data_insert));

		if($insert === FALSE){
			$this->message('Berhasil mengajukan surat blanko ktp', 'success');
		}else{
			$this->message('Gagal mengajukan surat blanko ktp', 'danger');
		}
		$this->go('warga/surat');
	}

	public function keterangan_miskin()
	{
        $data = $this->get_data_anggota_keluarga();

		$this->generateCsrf();
		$this->render('warga/pengajuan/pengajuan_keterangan_miskin', $data);
	}

	public function keterangan_miskin_simpan()
	{
		$data = $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], '|')));
		$data_insert = array(
			"id" => $this->surat_m->get_last_id("SRU", 10),
			"id_organisasi" => $this->ion_auth->get_current_id_org(),
			"jenis" => "2",
			);

		$insert = $this->surat_m->insert(array_merge($data, $data_insert));

		if($insert === FALSE){
			$this->message('Berhasil mengajukan surat blanko ktp', 'success');
		}else{
			$this->message('Gagal mengajukan surat blanko ktp', 'danger');
		}
		$this->go('warga/surat');
	}

	public function skck()
	{
        $data = $this->get_data_anggota_keluarga();

		$this->generateCsrf();
		$this->render('warga/pengajuan/skck', $data);
	}

	public function skck_simpan()
	{
		$data = $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], '|')));
		$data_insert = array(
			"id" => $this->surat_m->get_last_id("SRU", 10),
			"id_organisasi" => $this->ion_auth->get_current_id_org(),
			"jenis" => "1",
			);

		$insert = $this->surat_m->insert(array_merge($data, $data_insert));

		if($insert === FALSE){
			$this->message('Berhasil mengajukan SKCK', 'success');
		}else{
			$this->message('Gagal mengajukan SKCK', 'danger');
		}
		$this->go('warga/surat');
	}

	public function blankokk()
	{
        $data = $this->get_data_anggota_keluarga();

        $this->generateCsrf();
		$this->render('warga/pengajuan/pengajuan_kk', $data);
	}

	public function blankokk_simpan()
	{
		$data = $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], '|')));
		$data_insert = array(
			"id" => $this->surat_m->get_last_id("SRU", 10),
			"id_organisasi" => $this->ion_auth->get_current_id_org(),
			"jenis" => "4",
			);

		$insert = $this->surat_m->insert(array_merge($data, $data_insert));

		if($insert === FALSE){
			$this->message('Berhasil mengajukan SKCK', 'success');
		}else{
			$this->message('Gagal mengajukan SKCK', 'danger');
		}
		$this->go('warga/surat');
	}

    /**
     * @return mixed - Anggota Keluarga dari Pengguna Yang Sedang Login
     */
    private function get_data_anggota_keluarga()
    {
        $data['anggotas'] = $this->keluarga_m
            ->with_penduduk('fields:nama')
            ->with_detailKK(array(
                'fields' => 'nik',
                'with' => array(
                    'relation' => 'penduduk',
                    'fields' => 'nama'
                )
            ))
            ->where(array(
                'nik' => $this->ion_auth->get_current_nik(),
                'id_organisasi' => $this->ion_auth->get_current_id_org()
            ))
            ->fields('nik')
            ->get();
        return $data;
    }
}