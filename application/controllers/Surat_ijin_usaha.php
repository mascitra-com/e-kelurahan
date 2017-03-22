<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_ijin_usaha extends MY_Controller {

    public function __construct()
    {
        // TODO Fix This
        $this->_accessable = TRUE;
        parent::__construct();
        $this->load->model(array('surat_ijin_usaha_m'));
    }

    public function index()
    {
        $data['ijin'] = $this->surat_ijin_usaha_m
            ->with_penduduk('fields:nama')
            ->where('id_organisasi', $this->ion_auth->get_current_id_org())
            ->where('status', array('0', '1'))
            ->fields('id ,no_surat, jenis_usaha, tanggal_verif, alamat, status, tanggal_ambil,nama_pengambil, created_at, updated_at, updated_by')
            ->get_all();
        $data['unconfirmeds'] = $this->surat_ijin_usaha_m
            ->where('status', '0')
            ->where('id_organisasi', $this->ion_auth->get_current_id_org())
            ->as_array()
            ->count_rows();

        $this->generateCsrf();
        $this->render('surat/keterangan_ijin_usaha', $data);
    }

    public function simpan()
    {
        $where = array(
            'nik' => $this->input->post('nik'),
            'status' => '0'
        );
        $query = $this->surat_ijin_usaha_m->get($where);
        if ($query === FALSE)
        {
            $input = $this->input->post();
            //cek input kosong
            if (empty($input['no_surat']) || empty($input['nik']))
            {
                $this->message('Terjadi kesalahan saat memasukkan data surat | Data ada yang kosong', 'warning');
                $this->go('surat_ijin_usaha');
            }
            //CEK DUPLIKASI NO SURAT
            $exist_surat = $this->surat_ijin_usaha_m->where('no_surat', $input['no_surat'])->get();
            if ($exist_surat)
            {
                $this->message('Surat dengan nomor: <strong>' . $input['no_surat'] . '</strong> sudah ada', 'warning');
                $this->go('surat_ijin_usaha');
            }


            $input['nik'] = str_replace(' ', '', substr($input['nik'], 0, strpos($input['nik'], "|")));
            $input['no_surat'] = '27/'. $input['no_surat'] .'/02.002/'.date('Y');
            $add_input = array(
                'id_organisasi' => $this->ion_auth->get_current_id_org(),
                'status' => '1',
                'tanggal_verif' => date('Y-m-d h:i:s'),
            );
            $insert = array_merge($input, $add_input);
            $query = $this->surat_ijin_usaha_m->insert($insert);
            if ($query === FALSE)
            {
                $this->message('Terjadi kesalahan sistem saat kondisi memasukkan data FALSE', 'danger');
                $this->go('surat_ijin_usaha');

            } else
            {
                $this->message('Data Surat berhasil masuk', 'success');
                $this->go('surat_ijin_usaha');
            }
        } else if ($query)
        {
            $this->message('Penduduk masih memilik surat yang harus disetujui sebelum melakukan pengajuan surat baru', 'warning');
        } else
        {
            $this->message('Terjadi kesalahan saat mengunjungi halaman', 'warning');
        }
        $this->go('surat_ijin_usaha');
    }
}
