<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regulasi extends MY_Controller
{

    public function __construct()
    {
        $this->_accessable = TRUE;
        parent::__construct();
        $this->load->helper('prefix_unik');
        $this->load->model(array('regulasi_m'));
    }

    public function index()
    {
        $this->generateCsrf();
        $data['regulasi'] = $this->regulasi_m->get_all();
        $this->render('regulasi/index', $data);
    }

    public function simpan()
    {
        $data = $this->input->post();
        if (!empty($_FILES['dokumen']['name'])) {
            $data['link']= $this->do_upload('dokumen');
        } else {
            $data['link'] = prefix_unik(2);
        }
        if($this->regulasi_m->insert($data)){
            $this->message('Berhasil Menyimpan Data Regulasi');
        } else {
            $this->message('Gagal Menyimpan Data Regulasi');
        }
        $this->go('regulasi');
    }

    private function do_upload($input_name)
    {
        $config['file_name'] = prefix_unik(2). '.' .pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION);
        $config['upload_path'] = './assets/regulasi/';
        $config['allowed_types'] = 'doc|docx|pdf';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($input_name)) {
            $this->message($this->upload->display_errors(), 'danger');
            $this->go('regulasi');
        }else{
            $file_date = $this->upload->data();
            $link = $file_date['file_name'];
            return $link;
        }
    }

    public function hapus($id)
    {
        if($this->regulasi_m->delete($id)){
            $this->message('Berhasil Menghapus Data Regulasi', 'success');
        } else {
            $this->message('Gagal Menghapus Data Regulasi', 'danger');
        }
    }
}
