<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'slug'));
        $this->load->model(array('provinsi_m', 'kabupaten_m', 'kecamatan_m', 'kelurahan_m', 'mutasi_keluar_m', 'mutasi_keluar_detail_m', 'penduduk_m'));
        $this->_accessable = TRUE;
    }

    public function index()
    {
        $data['keluargas'] = $this->keluarga_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->fields('no, alamat, rt, rw, updated_at')->with_penduduk('fields:nama')->get_all();

        $this->render('kelurahan/pindah');
    }

    public function tambah()
    {
        $data['provinsi'] = $this->provinsi_m->get_all();
        $data['penduduk'] = $this->penduduk_m->get_all();
        $this->render('kelurahan/pindah_pengajuan', $data);
    }
    
    public function simpan()
    {
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
    
    public function detail($id = NULL)
    {
        
    }
        
    public function edit($id = NULL)
    {
        
    }
    
    public function ubah($id = NULL)
    {
        
    }
    
    public function hapus($id = NULL)
    {
        
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
