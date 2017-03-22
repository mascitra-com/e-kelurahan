<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Surat_ijin_usaha_m extends MY_Model
{
	public $table = 'surat_ijin_usaha';
	public $primary_key = 'id';
    public $protected = array('id');

	public function __construct()
	{
		$this->has_one['organisasi'] = array('Organisasi_m', 'id', 'id_organisasi');
		$this->has_one['akun'] = array('akun_m', 'id', 'created_by');
		$this->has_one['penduduk'] = array('Penduduk_m', 'nik', 'nik');
        $this->soft_deletes = TRUE;
		parent::__construct();
	}


}