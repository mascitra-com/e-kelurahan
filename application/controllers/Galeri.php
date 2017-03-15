<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_Controller
{

    public function __construct()
    {
        $this->_accessable = TRUE;
        parent::__construct();
        $this->load->helper('prefix_unik');
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
        $this->generateCsrf();
        $data['album'] = $this->galeri_kategori_m->get($id);
        $data['foto'] = $this->galeri_m->order_by('id', 'desc')->get_all(array('id_kategori' => $id));
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

    public function simpanFoto()
    {
        $data = $this->input->post();
        if (!empty($_FILES['link']['name'])) {
            $data['link'] = $this->do_upload('link', $data['id_kategori']);
        } else {
            $data['link'] = prefix_unik(3);
        }
        $data['id_organisasi'] = $this->ion_auth->get_current_id_org();
        if($this->galeri_m->insert($data)){
            $this->message('Berhasil Menyimpan Foto Baru');
        } else {
            $this->message('Gagal Menyimpan Foto Baru');
        }
        $this->go('galeri/detail/' . $data['id_kategori']);
    }

    private function do_upload($input_name, $id_kategori)
    {
        $config['file_name'] = prefix_unik(3). '.' .pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION);
        $config['upload_path'] = './assets/galeri/';
        $config['allowed_types'] = 'jpg|jpeg|bmp|png';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($input_name)) {
            $this->message($this->upload->display_errors(), 'danger');
            $this->go('galeri/detail/' . $id_kategori);
        }else{
            $file_date = $this->upload->data();
            $link = $file_date['file_name'];
            return $link;
        }
    }
}
