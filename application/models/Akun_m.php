<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Akun_m extends MY_Model
{
	public $table = 'akun';
	public $primary_key = 'id';
    public $protected = array('id');

	public function __construct()
	{
		$this->has_one['organisasi'] = array('Organisasi_m', 'id', 'id_organisasi');
		$this->has_many['surats'] = array('surat_m', 'created_by', 'id');
		$this->has_many['beritas'] = array('berita_m', 'created_by', 'id');
		parent::__construct();
	}
}