<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->_accessable = TRUE;
        $this->load->model(array('organisasi_m', 'profil_m', 'akun_m', 'golongan_m'));
    }

    public function index()
    {
        $data['kelurahan'] = $this->organisasi_m->fields('id, nama')->get($this->ion_auth->get_current_id_org());
        $data['profil'] = $this->profil_m->with_golongan()->get(array('id_organisasi' => $this->ion_auth->get_current_id_org()));
        $data['akun'] = $this->akun_m->get(array('id_organisasi' => $this->ion_auth->get_current_id_org()));
        $data['golongan'] = $this->golongan_m->get_all();
        $this->render('profil/index', $data);
    }

    public function simpan()
    {
        $data = $this->input->post();
        $data['id_golongan'] = str_replace(' ', '', substr($data['id_golongan'], 0, strpos($data['id_golongan'], '.')));
        if($this->profil_m->insert($data)){
            $this->message('Berhasil Menyimpan Profil Kelurahan', 'success');
        } else {
            $this->message('Terjadi Kesalahan Saat Menyimpan Profil Kelurahan', 'danger');
        }
        $this->go('profil');
    }

    public function ubah($id)
    {
        $data = $this->input->post();
        $data['id_golongan'] = str_replace(' ', '', substr($data['id_golongan'], 0, strpos($data['id_golongan'], '.')));
        if($this->profil_m->update($data, array('id_organisasi' => $id))){
            $this->message('Berhasil Menyimpan Profil Kelurahan', 'success');
        } else {
            $this->message('Terjadi Kesalahan Saat Menyimpan Profil Kelurahan', 'danger');
        }
        $this->go('profil');
    }

    public function ganti_password()
    {
        $data = $this->input->post();
        if($this->ion_auth->change_password($data['username'], $data['old_password'], $data['new_password'])){
            $this->message('Berhasil Mengubah Password', 'success');
        } else {
            $this->message('Terjadi Kesalahan Saat Mengubah Password', 'danger');
        }
        $this->go('profil');
    }
}
