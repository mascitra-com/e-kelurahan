<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Kelahiran_m extends MY_Model
{
	public $table = 'kelahiran';
	public $primary_key = 'id';

    public $rules = array(
        'insert' => array(
            'nik' => array(
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'trim|required|min_length[16]|max_length[16]'),
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
        $this->has_one['ibu'] = array('Penduduk_m', 'nik', 'nik_ibu');
        $this->has_one['ayah'] = array('Penduduk_m', 'nik', 'nik_ayah');
		$this->has_one['pelapor'] = array('Penduduk_m', 'nik', 'nik_pelapor');
        $this->soft_deletes = TRUE;
		parent::__construct();
	}

    public function generateNoSurat($no_surat)
    {
        $no = $no_surat. '/SKK/LMJG/02.2002/'. date('Y');
        return $no;
    }

    /*
    * Cek Duplikasi surat
    * string $no_surat
    * return TRUE -- SURAT DUPLIKAT, FALSE -- SURAT TIDAK DUPLIKAT
    */
    public function cekDuplikasiSurat($no_surat)
    {
        $exist_surat = $this->where('no_surat', $no_surat)->get();

        if ($exist_surat) {
            return TRUE;  
        }
        return FALSE;
    }
}