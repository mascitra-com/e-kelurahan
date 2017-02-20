<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Keluarga_m extends MY_Model
{
	public $table = 'keluarga';
	public $primary_key = 'no';

     // public $rules = array(
     //    'insert' => array(
     //        'nama' => array(
     //            'field' => 'nama',
     //            'label' => 'Nama Kelurahan',
     //            'rules' => 'trim|required|min_length[3]|max_length[100]')
     //        ),
     //    'update' => array(
     //        'nama' => array(
     //            'field' => 'nama',
     //            'label' => 'Nama Kelurahan',
     //            'rules' => 'trim|required|min_length[3]|max_length[100]')
     //        )
     //    );

	public function __construct()
	{
		$this->has_one['organisasi'] = array('Organisasi_m', 'no', 'id_organisasi');
		$this->soft_deletes = TRUE;
		parent::__construct();
	}

    public function FunctionName($value='')
    {
        # code...
    }
}