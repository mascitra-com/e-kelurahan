<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Mutasi_keluar_m extends MY_Model
{
	public $table = 'mutasi_keluar';
	public $primary_key = 'id';
    public $protected = array('id');

	public function __construct()
	{
		$this->has_one['penduduk'] = array('penduduk_m', 'nik', 'nik');
		$this->has_one['organisasi'] = array('penduduk_m', 'id', 'id_organisasi');
		$this->has_many['mutasi_keluar_detail'] = array('mutasi_keluar_detail_m', 'id_mutasi', 'id');
		parent::__construct();
	}
}