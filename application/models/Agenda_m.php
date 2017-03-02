<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Agenda_m extends MY_Model
{
	public $table = 'agenda';
	public $primary_key = 'id';
    public $protected = array('id');

	public function __construct()
	{
		$this->has_one['organisasi'] = array('Organisasi_m', 'id', 'id_organisasi');
		$this->soft_deletes = TRUE;
		parent::__construct();
	}
}