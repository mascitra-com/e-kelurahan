<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('dump', 'form'));
		$this->load->library(array('form_validation'));
		$this->load->model(array('provinsi_m', 'kabupaten_m', 'kecamatan_m', 'kelurahan_m', 'surat_m', 'organisasi_m', 'penduduk_m', 'keluarga_m', 'surat_ijin_usaha_m'));
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

	public function ijin_usaha()
	{
		$this->generateCsrf();
		$data['warga'] = $this->penduduk_m->get(array('nik' => $this->ion_auth->get_current_nik()));
		$this->render('warga/pengajuan/ijin_usaha', $data);
	}

	public function ijin_usaha_simpan()
	{
		$data = $this->input->post();
		if($data['pengambilan'] === NULL){
			$this->message('Gagal mengajukan Surat Keterangan Ijin Usaha. Silahkan Pilih Mekanisme Pengambilan Surat', 'danger');
			$this->go('warga/pengajuan/ijin_usaha');
		}
		$data['nik'] = $this->ion_auth->get_current_nik();
		$data_insert = array(
			'id' => $this->surat_ijin_usaha_m->get_last_id('SIU', 10),
			'id_organisasi' => $this->ion_auth->get_current_id_org(),
			'status' => '0',
			);
		$insert = $this->surat_ijin_usaha_m->insert(array_merge($data, $data_insert));

		if($insert === FALSE){
			$this->message('Berhasil mengajukan Surat Keterangan Ijin Usaha', 'success');
		}else{
			$this->message('Gagal mengajukan Surat Keterangan Ijin Usaha', 'danger');
		}
		$this->go('warga/surat');
	}

	public function sktm_sekolah()
	{
		$this->generateCsrf();
		$data = $this->get_data_anggota_keluarga();
		$this->render('warga/pengajuan/sktm_sekolah', $data);
	}

	public function sktm_sekolah_simpan()
	{
		$this->load->model('surat_ktm_sekolah_m', 'sktm_sekolah_m');
		$data = $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], '|')));
		$data_insert = array(
			"id" => $this->sktm_sekolah_m->get_last_id("STS", 10),
			"id_organisasi" => $this->ion_auth->get_current_id_org(),
			);

		$insert = $this->sktm_sekolah_m->insert(array_merge($data, $data_insert));

		if($insert === FALSE){
			$this->message('Berhasil mengajukan SKTM Sekolah', 'success');
		}else{
			$this->message('Gagal mengajukan SKTM Sekolah', 'danger');
		}
		$this->go('warga/surat');
	}

	public function keterangan_kelahiran()
	{
		$this->generateCsrf();
		$data['penduduks'] = $this->penduduk_m->ambilSemuaPendudukHidup($this->ion_auth->get_current_id_org());
		$this->render('warga/pengajuan/keterangan_kelahiran', $data);
	}

	public function keterangan_kelahiran_simpan()
	{
		$this->load->model('kelahiran_m');
		$input = $this->input->post();
		$input['id'] = $this->kelahiran_m->get_last_id("SKL", 10);
		$input['id_organisasi'] = $this->ion_auth->get_current_id_org();
		$input['nik_ibu'] = str_replace(' ', '', substr($input['nik_ibu'], 0, strpos($input['nik_ibu'], "|")));
		$input['nik_ayah'] = str_replace(' ', '', substr($input['nik_ayah'], 0, strpos($input['nik_ayah'], "|")));
		$input['nik_pelapor'] = str_replace(' ', '', substr($input['nik_pelapor'], 0, strpos($input['nik_pelapor'], "|")));

		$query = $this->kelahiran_m->insert($input);
		if ($query === FALSE) {
			$this->message('Terjadi kesalahan saat membuat data surat keterangan kelahiran!', 'warning');
		}else{
			$this->message('Pengajuan surat keterangan kelahiran berhasil dibuat', 'success');
		}
		$this->go('warga/surat');
	}

	public function keterangan_kematian()
	{
		$this->generateCsrf();
		$data['penduduks'] = $this->penduduk_m->ambilSemuaPendudukHidup($this->ion_auth->get_current_id_org());
		$this->render('warga/pengajuan/keterangan_kematian', $data);
	}

	public function keterangan_kematian_simpan()
	{
		$this->load->model('kematian_m');

		$input = $this->input->post();
		$input['id'] = $this->kematian_m->get_last_id("SMT", 10);
		$input['id_organisasi'] = $this->ion_auth->get_current_id_org();
		$input['nik_meninggal'] = str_replace(' ', '', substr($input['nik_meninggal'], 0, strpos($input['nik_meninggal'], "|")));
		$input['nik_pelapor'] = str_replace(' ', '', substr($input['nik_pelapor'], 0, strpos($input['nik_pelapor'], "|")));
		$input['rt_meninggal'] = ltrim($input['rt_meninggal'], '0');
		$input['rw_meninggal'] = ltrim($input['rw_meninggal'], '0');

		$query = $this->kematian_m->insert($input);
		if ($query === FALSE) {
			$this->message('Terjadi kesalahan saat membuat data surat keterangan kematian!', 'warning');
		}else{
			$this->message('Pengajuan surat keterangan kematian berhasil dibuat', 'success');
		}
		$this->go('warga/surat');
	}

	public function pindah()
	{
		$data['provinsi'] = $this->provinsi_m->get_all();
		$data['penduduk'] = $this->penduduk_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->get_all();

		$this->generateCsrf();
		$this->render('warga/pengajuan/pindah', $data);
	}

	public function pindah_simpan()
	{
		$this->load->model('mutasi_keluar_m');
		$data = $this->input->post();
		$data['nik'] = str_replace(' ', '', substr($data['nik'], 0, strpos($data['nik'], '|')));
		$data['id_organisasi'] = $this->ion_auth->get_current_id_org();
		$pengikut = $data['pengikut'];
		unset($data['pengikut']);
		if($id_mutasi = $this->mutasi_keluar_m->insert($data)){
			$this->message('Berhasil menyimpan data Pindah');
			foreach ($pengikut as $item){
				$temp = array('id_mutasi' => $id_mutasi, 'nik' => $item);
				$this->mutasi_keluar_detail_m->insert($temp);
			}
		}
		$this->go('pindah');
	}

    /**
     * Mendapatkan Daftar Anggota Keluarga dari Pengguna Yang Sedang Login
     * 
     * @return mixed - Anggota Keluarga 
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

    /**
     * Ambil penduduk yang masih hidup
     *
     * @param $nik
     * @return $penduduk_hidup(JSON)
     */
    public function ambil_penduduk($nik)
    {
    	$current_id_org = $this->ion_auth->get_current_id_org();
    	$penduduk_hidup = $this->penduduk_m->ambilSatuPendudukHidup($current_id_org, $nik);

    	if ($penduduk_hidup)
    	{
    		if ($penduduk_hidup !== 'Penduduk tidak ditemukan')
    		{
    			echo json_encode($penduduk_hidup);
    		} else
    		{
    			echo(json_encode(FALSE));
    		}
    	} else
    	{
    		die('Kesalahan query saat mengambil penduduk hidup');
    	}
    }

    /**
     * Ambil semua penduduk yang masih hidup dalam organisasi yang bersangkutan
     *
     * @return $penduduk_hidup(JSON)
     */
    public function ambil_nama_nik()
    {
    	$current_id_org = $this->ion_auth->get_current_id_org();
    	$penduduk_hidup = $this->penduduk_m->ambilSemuaPendudukHidup($current_id_org);

    	if ($penduduk_hidup)
    	{
    		if ($penduduk_hidup !== 'Penduduk tidak ditemukan')
    		{
    			echo json_encode($penduduk_hidup);
    		} else
    		{
    			echo(json_encode(FALSE));
    		}
    	} else
    	{
    		die('Kesalahan query saat mengambil penduduk hidup');
    	}
    }

    /**
     * Get All Cities by Province ID
     */
    public function getCitiesByProvince()
    {
    	$idProvince = $this->input->post('idProvince');
    	$cities = $this->kabupaten_m->where('id_provinsi', $idProvince)->get_all();
    	$data = array('<option value="">Pilih Kabupaten / Kota</option>');

        // Store all cities to array as combo box attribute
    	foreach ($cities as $list) {
    		$data[] = "<option value='$list->id'>$list->nama</option>";
    	}
    	echo json_encode($data);
    }

    /**
     * Get All Districts by City ID
     */
    public function getDistrictByCity()
    {
    	$idCity = $this->input->post('idCity');
    	$districts = $this->kecamatan_m->where('id_kabupaten', $idCity)->get_all();
    	$data = array('<option value="">Pilih Kecamatan Tujuan</option>');

        // Store all districts to array as combo box attribute
    	foreach ($districts as $list) {
    		$data[] = "<option value='$list->id'>$list->nama</option>";
    	}
    	echo json_encode($data);
    }

    /**
     * Get All Districts by City ID
     */
    public function getVillageByDistrict()
    {
    	$idDistrict = $this->input->post('idDistrict');
    	$villages = $this->kelurahan_m->where('id_kecamatan', $idDistrict)->get_all();
    	$data = array('<option value="">Pilih Kelurahan/Desa Tujuan</option>');

        // Store all districts to array as combo box attribute
    	foreach ($villages as $list) {
    		$data[] = "<option value='$list->id'>$list->nama</option>";
    	}
    	echo json_encode($data);
    }
}