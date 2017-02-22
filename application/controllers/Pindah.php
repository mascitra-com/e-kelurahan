<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah extends MY_Controller
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
