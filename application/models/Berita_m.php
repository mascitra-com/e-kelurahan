<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Berita_m extends MY_Model
{
	public $table = 'berita';
	public $primary_key = 'id';
    public $protected = array('id');

	public function __construct()
	{
		$this->has_one['organisasi'] = array('Organisasi_m', 'id', 'id_organisasi');
		$this->has_one['akun'] = array('Akun_m', 'id', 'created_by');
		$this->soft_deletes = TRUE;
		parent::__construct();
	}
}