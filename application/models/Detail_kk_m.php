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
		$this->has_one['status'] = array('Status_keluarga_m', 'id_statuskeluarga', 'status_keluarga');
		$this->has_one['pendidikan'] = array('Pendidikan_m', 'id_jenispendidikan', 'id_pendidikan');
		$this->soft_deletes = TRUE;
		parent::__construct();
	}
}