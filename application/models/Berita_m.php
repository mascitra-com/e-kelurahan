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

	public $rules = array(
		'insert' => array(
			'name' => array(
				'field' => 'judul',
				'label' => 'Judul',
				'rules' => 'trim|required|min_length[3]|max_length[50]'),
			),
		'update' => array(
			'name' => array(
				'field' => 'judul',
				'label' => 'Judul',
				'rules' => 'trim|required|min_length[3]|max_length[50]'),
			)
		);

	public function __construct()
	{
		$this->soft_deletes = TRUE;
		$this->has_one['organisasi'] = array('Organisasi_m', 'id', 'id_organisasi');
		$this->has_one['akun'] = array('Akun_m', 'id', 'created_by');
        $this->pagination_delimiters = array('<li>','</li>');
        $this->pagination_arrows = array('&lt;','&gt;');
		parent::__construct();
	}
}