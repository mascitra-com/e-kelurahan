<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penduduk_m extends MY_Model
{
    public $rules = array(
        'insert' => array(
            'nik' => array(
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'trim|required|max_length[40]'),
            'nama' => array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required|max_length[255]'),
            'tempat_lahir' => array(
                'field' => 'tempat_lahir',
                'label' => 'Tempat Lahir',
                'rules' => 'trim|required|max_length[100]'),
            'golongan_darah' => array(
                'field' => 'golongan_darah',
                'label' => 'Golongan Darah',
                'rules' => 'trim|required|max_length[2]'),
            'status_nikah' => array(
                'field' => 'status_nikah',
                'label' => 'Status Nikah',
                'rules' => 'trim|required|max_length[1]'),
            'jenis_kelamin' => array(
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required|max_length[100]'),
            'tanggal_lahir' => array(
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'trim|required'),
            'agama' => array(
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'trim|required|max_length[1]'),
            'pekerjaan' => array(
                'field' => 'pekerjaan',
                'label' => 'Pekerjaan',
                'rules' => 'trim|required|max_length[4]'),
            'rt' => array(
                'field' => 'rt',
                'label' => 'RT',
                'rules' => 'trim|required|max_length[3]'),
            'rw' => array(
                'field' => 'rw',
                'label' => 'RW Lahir',
                'rules' => 'trim|required|max_length[3]'),
            'kewarganegaraan' => array(
                'field' => 'kewarganegaraan',
                'label' => 'Kewarganegaraan',
                'rules' => 'trim|required|max_length[1]'),
        ),
        'update' => array(
            'nama' => array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required|max_length[255]'),
            'tempat_lahir' => array(
                'field' => 'tempat_lahir',
                'label' => 'Tempat Lahir',
                'rules' => 'trim|required|max_length[100]'),
            'golongan_darah' => array(
                'field' => 'golongan_darah',
                'label' => 'Golongan Darah',
                'rules' => 'trim|required|max_length[2]'),
            'status_nikah' => array(
                'field' => 'status_nikah',
                'label' => 'Status Nikah',
                'rules' => 'trim|required|max_length[1]'),
            'jenis_kelamin' => array(
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required|max_length[100]'),
            'tanggal_lahir' => array(
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'trim|required'),
            'agama' => array(
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'trim|required|max_length[1]'),
            'pekerjaan' => array(
                'field' => 'pekerjaan',
                'label' => 'Pekerjaan',
                'rules' => 'trim|required|max_length[4]'),
            'rt' => array(
                'field' => 'rt',
                'label' => 'RT',
                'rules' => 'trim|required|max_length[3]'),
            'rw' => array(
                'field' => 'rw',
                'label' => 'RW Lahir',
                'rules' => 'trim|required|max_length[3]'),
            'kewarganegaraan' => array(
                'field' => 'kewarganegaraan',
                'label' => 'Kewarganegaraan',
                'rules' => 'trim|required|max_length[1]'),
        )
    );

    public function __construct()
    {
        $this->table = 'penduduk';
        $this->primary_key = 'nik';

        $this->has_many['meninggals'] = array('meninggal_m', 'nik', 'nik');
        $this->has_many['keluargas'] = array('keluarga_m', 'nik', 'nik');
        
        $this->soft_deletes = TRUE;
        $this->fillable = array('nik', 'id_organisasi', 'nama', 'tempat_lahir', 'golongan_darah', 'status_nikah', 'pendidikan', 'jenis_kelamin', 'tanggal_lahir', 'agama', 'pekerjaan', 'rt', 'rw', 'kewarganegaraan');
        $this->pagination_delimiters = array('<li>','</li>');
        $this->pagination_arrows = array('&lt;','&gt;');
        parent::__construct();
    }

    public function ambilPendudukHidup($id_organisasi = NULL)
    {
        if ($id_organisasi != NULL && !empty($id_organisasi)) {
            $query= $this->db->select('p.nik, p.nama')
            ->from('penduduk as p')
            ->where('id_organisasi', $id_organisasi)
            ->where('p.nik NOT IN (select nik from meninggal)',NULL,FALSE)
            ->where('p.nik NOT IN (select nik from keluarga)',NULL,FALSE)
            ->get();

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $penduduk_hidup[]= $row;
                }
                return $penduduk_hidup;
            }
            return 'Penduduk tidak ditemukan';
        }else{
            return 'Penduduk tidak ditemukan';
        }
    }

}
