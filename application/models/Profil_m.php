<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Profil_m extends MY_Model
{
	public $table = 'profil_organisasi';
	public $primary_key = 'no';
    public $protected = array('no');

	public function __construct()
	{
		$this->soft_deletes = TRUE;
		$this->has_one['golongan'] = array('golongan_m', 'id', 'id_golongan');
		parent::__construct();
	}
}