<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('penduduk_m', 'penduduk');
        $this->load->model('organisasi_m', 'organisasi');
        $this->load->model('pekerjaan_m', 'pekerjaan');
        $this->load->model('pendidikan_m', 'pendidikan');
    }

    public function index($page = NULL)
    {
        if(!$page){
            $this->go('penduduk/page/1');
        }
        if ($filter = $this->input->get())
        {
            $filter = array_filter($filter);
            $data['penduduk'] = $this->penduduk->where($filter, 'like', '%')->get_all();
        } else {
            $this->load->library('pagination');
            $total_data = $this->penduduk->count_rows();
            $data['penduduk'] = $this->penduduk->paginate(10, $total_data, $page);
            $data['pagination'] = $this->penduduk->all_pages;
        }
        $data['pekerjaan'] = $this->pekerjaan->get_all();
        $this->render('kependudukan/kependudukan', $data);
    }

    public function page($page = 1)
    {
        $this->index($page);
    }

    public function tambah()
    {
        $current_id_org = $this->ion_auth->get_current_id_org();
        $data['kelurahan'] = $this->organisasi->get(array('id' => $current_id_org))->nama;
        $data['pekerjaan'] = $this->pekerjaan->get_all();
        $this->render('kependudukan/create', $data);
    }

    public function simpan()
    {
        $this->load->library('form_validation');
        $this->input->post(NULL, TRUE);
        if ( ! $this->penduduk->from_form(NULL, array('id_organisasi' => $this->ion_auth->get_current_id_org()))->insert())
        {
            $current_id_org = $this->ion_auth->get_current_id_org();
            $data['kelurahan'] = $this->organisasi->get(array('id' => $current_id_org))->nama;
            $data['pekerjaan'] = $this->pekerjaan->get_all();
            $this->render('kependudukan/create', $data);
        }
        $this->message('Data Penduduk Berhasil Ditambahkan', 'success');
        $this->go('penduduk');
    }

    public function detail($nik = NULL)
    {
        $current_id_org = $this->ion_auth->get_current_id_org();
        $data['kelurahan'] = $this->organisasi->get(array('id' => $current_id_org))->nama;
        $data['pekerjaan'] = $this->pekerjaan->get_all();
        $data['penduduk'] = $this->penduduk->get(array('nik' => $nik));
        $this->render('kependudukan/detail', $data);
    }

    public function ubah($nik = NULL)
    {
        $this->load->library('form_validation');
        $data = $this->input->post(NULL, TRUE);
        if ( ! $this->penduduk->from_form()->update($data, $nik))
        {
            $current_id_org = $this->ion_auth->get_current_id_org();
            $data['kelurahan'] = $this->organisasi->get(array('id' => $current_id_org))->nama;
            $data['pekerjaan'] = $this->pekerjaan->get_all();
            // TODO View untuk Tanggal Lahir belum benar
            $data['penduduk'] = $this->penduduk->get(array('nik' => $nik));
        }
        $this->message('Data Penduduk Berhasil Diubah', 'success');
        $this->go('penduduk');
    }

    public function hapus($nik = NULL)
    {
        if($this->penduduk->delete($nik)){
            $this->message('Data Penduduk Berhasil Diubah', 'success');
        } else {
            $this->message('Data Penduduk Gagal Diubah', 'danger');
        }
        $this->go('penduduk');
    }
}
