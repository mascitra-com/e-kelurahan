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
		// $this->has_one['organisasi'] = array('Organisasi_m', 'id', 'id_organisasi');
		parent::__construct();
	}
}