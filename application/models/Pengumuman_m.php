<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Pengumuman_m extends MY_Model
{
	public $table = 'pengumuman';
	public $primary_key = 'id';
	public $protected = array('id');

	public $rules = array(
		'insert' => array(
			'nama' => array(
				'field' => 'nama',
				'label' => 'Judul',
				'rules' => 'trim|required|min_length[3]|max_length[100]'),
			'isi' => array(
				'field' => 'isi',
				'label' => 'Isi',
				'rules' => 'trim|required|min_length[3]|max_length[160]')
			),
		'update' => array(
			'nama' => array(
				'field' => 'nama',
				'label' => 'Judul',
				'rules' => 'trim|required|min_length[3]|max_length[100]'),
			'isi' => array(
				'field' => 'isi',
				'label' => 'Isi',
				'rules' => 'trim|required|min_length[3]|max_length[160]')
			)
		);

	public function __construct()
	{
		$this->has_one['organisasi'] = array('Organisasi_m', 'id', 'id_organisasi');
		$this->has_one['akun'] = array('Akun_m', 'id', 'created_by');
		parent::__construct();
	}
}