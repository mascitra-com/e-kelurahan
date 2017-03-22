<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Surat_m extends MY_Model
{
	public $table = 'surat';
	public $primary_key = 'id';

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
        $this->soft_deletes = TRUE;
		parent::__construct();
	}

    public function generateNoSurat($jenis, $no_surat)
    {
        $no = '';
        if ($jenis === '0') {
            $no = '23/'. $no_surat .'/02.002/'.date('Y');
        }elseif ($jenis === '1') {
            $no = '24/'. $no_surat .'/02.002/'.date('Y');
        }elseif ($jenis === '2') {
            $no = '25/'. $no_surat .'/02.002/'.date('Y');
        }elseif ($jenis === '3') {
            $no = '26/'. $no_surat .'/02.002/'.date('Y');
        }elseif ($jenis === '4') {
            $no = '27/'. $no_surat .'/02.002/'.date('Y');
        }else{
            return $no;
        }
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