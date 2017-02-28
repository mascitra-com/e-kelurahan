<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Surat_m extends MY_Model
{
	public $table = 'surat';
	public $primary_key = 'no_surat';
	public $fillable = array('no_surat', 'id_organisasi', 'nik', 'tanggal_verif', 'status', 'created_by', 'created_at');

    public $rules = array(
        'insert' => array(
            'nik' => array(
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'trim|required|max_length[16]|max_length[16]'),
            'no_surat' => array(
                'field' => 'no_surat',
                'label' => 'Nomor Surat',
                'rules' => 'trim|required|max_length[50]'),
        ),
    );

	public function __construct()
	{
		$this->has_one['organisasi'] = array('Organisasi_m', 'id', 'id_organisasi');
		$this->has_one['akun'] = array('akun_m', 'id', 'created_by');
		$this->has_one['penduduk'] = array('Penduduk_m', 'nik', 'nik');
		parent::__construct();
	}


}