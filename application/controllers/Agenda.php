<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends MY_Controller
{

    public function __construct()
    {
        // TODO Privileges untuk fitur Agenda & Regulasi Belum di set
        $this->_accessable = TRUE;
        parent::__construct();
        $this->load->model(array('agenda_m'));
    }

    public function index()
    {
        $this->generateCsrf();
        $data['agenda'] = $this->agenda_m->get_all();
        $this->render('agenda/index', $data);
    }

    public function simpan()
    {
        $data = $this->input->post();
        $data['id_organisasi'] = $this->ion_auth->get_current_id_org();
        if($this->agenda_m->insert($data)){
            $this->message('Berhasil Menyimpan Data Agenda', 'success');
        } else {
            $this->message('Gagal Menyimpan Data Agenda', 'danger');
        }
        $this->go('agenda');
    }

    public function ubah($id = NULL)
    {
        $data = $this->input->post();
        if($this->agenda_m->update($data, $id)){
            $this->message('Berhasil Mengubah Data Agenda', 'success');
        } else {
            $this->message('Gagal Mengubah Data Agenda', 'danger');
        }
        $this->go('agenda');
    }

    public function hapus($id)
    {
        if($this->agenda_m->delete($id)){
            $this->message('Berhasil Menghapus Data Agenda', 'success');
        } else {
            $this->message('Gagal Menghapus Data Agenda', 'danger');
        }
        $this->go('agenda');
    }
}
