<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Detail_kk_m extends MY_Model
{
	public $table = 'detail_kartu_keluarga';
	public $primary_key = 'id';
    public $protected = array('id');

	public function __construct()
	{
		$this->has_one['keluarga'] = array('Keluarga_m', 'id', 'no_kk');
		$this->has_one['penduduk'] = array('Penduduk_m', 'nik', 'nik');
		parent::__construct();
	}
}