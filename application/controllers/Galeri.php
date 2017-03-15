<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_Controller
{

    public function __construct()
    {
        $this->_accessable = TRUE;
        parent::__construct();
        $this->load->model(array('galeri_m', 'galeri_kategori_m'));
    }

    public function index()
    {
        $data['album'] = $this->galeri_kategori_m->get_all(array('id_organisasi' => $this->ion_auth->get_current_id_org()));
        $this->generateCsrf();
        $this->render('galeri/index', $data);
    }

    public function detail($id)
    {
        $data['album'] = $this->galeri_kategori_m->get($id);
        $this->render('galeri/list', $data);
    }

    public function simpanAlbum()
    {
        $data = $this->input->post();
        $data['id_organisasi'] = $this->ion_auth->get_current_id_org();
        if($this->galeri_kategori_m->insert($data)){
            $this->message('Berhasil Menambahkan Album', 'success');
        } else {
            $this->message('Berhasil Menambahkan Album', 'danger');
        }
        $this->go('galeri');
    }
}
