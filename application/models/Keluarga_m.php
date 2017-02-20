<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Keluarga_m extends MY_Model
{
	public $table = 'keluarga';
	public $primary_key = 'no';
    public $fillable = array('no' ,'nik', 'id_organisasi', 'alamat', 'kode_pos', 'rt', 'rw');

     public $rules = array(
        'insert' => array(
            'no' => array(
                'field' => 'no',
                'label' => 'Nomor KK',
                'rules' => 'trim|required|max_length[40]'),
            'nik' => array(
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'trim|required|max_length[40]'),
            'alamat' => array(
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required'),
            'rt' => array(
                'field' => 'rt',
                'label' => 'RT',
                'rules' => 'trim|required|max_length[3]'),
            'rw' => array(
                'field' => 'rw',
                'label' => 'RW Lahir',
                'rules' => 'trim|required|max_length[3]'),
            'kode_pos' => array(
                'field' => 'kode_pos',
                'label' => 'Kode Pos',
                'rules' => 'trim|required|max_length[5]'),
        ),
        'update' => array(
            'nama' => array(
                'field' => 'nama',
                'label' => 'Nama Kelurahan',
                'rules' => 'trim|required|min_length[3]|max_length[100]')
            )
        );

	public function __construct()
	{
		$this->has_one['organisasi'] = array('Organisasi_m', 'no', 'id_organisasi');
		$this->soft_deletes = TRUE;
		parent::__construct();
	}
}