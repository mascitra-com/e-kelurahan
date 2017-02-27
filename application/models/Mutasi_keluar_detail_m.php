<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Mutasi_keluar_detail_m extends MY_Model
{
	public $table = 'mutasi_keluar_detail';
	public $primary_key = 'id';
    public $protected = array('id');

	public function __construct()
	{
		$this->has_one['penduduk'] = array('penduduk_m', 'nik', 'nik');
		$this->has_one['mutasi_keluar'] = array('mutasi_keluar_m', 'nik', 'nik');
		parent::__construct();
	}
}