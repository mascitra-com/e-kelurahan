<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Galeri_kategori_m extends MY_Model
{
	public $table = 'galeri_kategori';
	public $primary_key = 'id';
    public $protected = array('id');

	public function __construct()
	{
		$this->has_one['galeri'] = array('galeri_m', 'id_kategori', 'id');
		$this->soft_deletes = TRUE;
        $this->pagination_delimiters = array('<li>','</li>');
        $this->pagination_arrows = array('&lt;','&gt;');
		parent::__construct();
	}
}