<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->_accessable = TRUE;

        $this->load->library(array('form_validation', 'slug'));
    }

    public function index()
    {
        $data['keluargas'] = $this->keluarga_m->where('id_organisasi', $this->ion_auth->get_current_id_org())->fields('no, alamat, rt, rw, updated_at')->with_penduduk('fields:nama')->get_all();

        $this->render('kelurahan/pindah');
    }

    public function tambah()
    {
//        $this->data['provinsi'] =
        $this->render('kelurahan/pindah_pengajuan');
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
}
