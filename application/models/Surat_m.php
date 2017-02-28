<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Surat_m extends MY_Model
{
	public $table = 'surat';
	public $primary_key = 'no_surat';
    public $protected = array('no_surat');

	public function __construct()
	{
		$this->has_one['organisasi'] = array('Organisasi_m', 'id', 'id_organisasi');
		$this->has_many['penduduks'] = array('Penduduk_m', 'nik', 'nik');
		parent::__construct();
	}
}