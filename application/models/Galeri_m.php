<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Galeri_m extends MY_Model
{
	public $table = 'galeri';
	public $primary_key = 'id';
    public $protected = array('id');

	public function __construct()
	{
		$this->soft_deletes = TRUE;
        $this->pagination_delimiters = array('<li>','</li>');
        $this->pagination_arrows = array('&lt;','&gt;');
		parent::__construct();
	}
}