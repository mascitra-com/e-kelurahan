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
		$this->has_many['mutasi_keluar_details'] = array('mutasi_keluar_detail_m', 'id_mutasi', 'id');
		$this->has_one['provinsi'] = array('provinsi_m', 'id', 'id_prov_tujuan');
		$this->has_one['kabupaten'] = array('kabupaten_m', 'id', 'id_kab_tujuan');
		$this->has_one['kecamatan'] = array('kecamatan_m', 'id', 'id_kec_tujuan');
		$this->has_one['kelurahan'] = array('kelurahan_m', 'id', 'id_kel_tujuan');
		$this->soft_deletes = TRUE;
		parent::__construct();
	}
}