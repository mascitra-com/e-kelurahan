<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_accessable = TRUE;
        $this->load->model(array('organisasi_m', 'profil_m'));
    }

    public function index()
    {
        $this->load->helper('cek_file');
        $data['banner'] = $this->organisasi_m->fields('banner_atas, banner_samping, banner_bawah')
            ->get($this->ion_auth->get_current_id_org());
        $data['sosmed'] = $this->profil_m->fields('facebook, twitter, instagram')
            ->get(array('id_organisasi' => $this->ion_auth->get_current_id_org()));
        $this->generateCsrf();
        $this->render('pengaturan/pengaturan', $data);
    }

    public function simpan_banner($tipe = 1)
    {
        $data = $this->input->post();
        if (!empty($_FILES['banner']['name'])) {
            if($banner = $this->do_upload('banner')){
                switch ($tipe){
                    case 1:
                        $data['banner_atas'] = $banner;
                        break;
                    case 2:
                        $data['banner_samping'] = $banner;
                        break;
                    case 3:
                        $data['banner_bawah'] = $banner;
                        break;
                }
                if($this->organisasi_m->update($data, $this->ion_auth->get_current_id_org())){
                    $this->message('Berhasil Menyimpan Banner Baru');
                } else {
                    $this->message('Gagal Menyimpan Banner Baru');
                }
            }
        } else {
            $this->message('Gagal! Belum memilih File Banner yang ingin di Upload', 'danger');
        }
        $this->go('pengaturan');
    }

    public function simpan_sosmed()
    {
        $data = $this->input->post();
        if($this->profil_m->update($data, array('id_organisasi' => $this->ion_auth->get_current_id_org()))){
            $this->message('Berhasil Menyimpan Data Sosial Media Kelurahan', 'success');
        } else {
            $this->message('Terjadi Kesalahan Saat Menyimpan Data Sosial Media Kelurahan', 'danger');
        }
        $this->go('pengaturan');
    }

    private function do_upload($input_name)
    {
        $this->load->helper('prefix_unik');
        $config['file_name'] = prefix_unik(2). '.' .pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION);
        $config['upload_path'] = './assets/images/banner/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($input_name)) {
            $this->message($this->upload->display_errors(), 'danger');
            $this->go('pengaturan');
        }else{
            $file_date = $this->upload->data();
            $link = $file_date['file_name'];
            return $link;
        }
    }
}
