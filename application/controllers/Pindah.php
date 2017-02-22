<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'slug'));
        $this->load->model(array('provinsi_m', 'kabupaten_m', 'kecamatan_m', 'kelurahan_m', 'mutasi_keluar_m', 'mutasi_keluar_detail_m', 'penduduk_m'));
    }

    public function index()
    {

    }

    public function tambah()
    {
        $data['provinsi'] = $this->provinsi_m->get_all();
        $this->render('kelurahan/pindah_pengajuan', $data);
    }
    
    public function simpan()
    {
        
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
        return json_encode($data);
    }

    /**
     * Get All Districts by City ID
     */
    public function getDistrictByCity()
    {
        $idCity = $this->input->post('idCity');
        $districts = $this->kecamatan_m->get_all(array('id_kabupaten', $idCity));
        $data = array('<option value="">Pilih Kecamatan Tujuan</option>');

        // Store all districts to array as combo box attribute
        foreach ($districts as $list) {
            $data[] = "<option value='$list->id'>$list->nama</option>";
        }
        return json_encode($data);
    }

    /**
     * Get All Districts by City ID
     */
    public function getVillageByDistrict()
    {
        $idDistrict = $this->input->post('idDistrict');
        $villages = $this->kecamatan_m->get_all(array('id_kecamatan', $idDistrict));
        $data = array('<option value="">Pilih Kelurahan/Desa Tujuan</option>');

        // Store all districts to array as combo box attribute
        foreach ($villages as $list) {
            $data[] = "<option value='$list->id'>$list->nama</option>";
        }
        return json_encode($data);
    }
}
