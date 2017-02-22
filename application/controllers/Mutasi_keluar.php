<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi_keluar extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'slug'));
    }

    public function index()
    {

    }

    public function tambah()
    {
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
