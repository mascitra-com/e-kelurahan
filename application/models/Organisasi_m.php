<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Organisasi_m extends MY_Model
{
	public $table = 'organisasi';
	public $primary_key = 'id';
    public $protected = array('id');

	public function __construct()
	{
		$this->has_many['akun'] = array('akun_m', 'id', 'created_by');
		parent::__construct();
	}
}