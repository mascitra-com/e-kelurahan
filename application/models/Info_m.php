<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Info_m extends MY_Model
{
	public $table = 'info_organisasi';
	public $primary_key = 'id';
	public $protected = array('id');

	public $rules = array(
		'insert' => array(
			'judul' => array(
				'field' => 'judul',
				'label' => 'Judul',
				'rules' => 'trim|required|min_length[3]|max_length[30]'),
			'isi' => array(
				'field' => 'isi',
				'label' => 'Isi',
				'rules' => 'trim|required')
			),
		'update' => array(
			'judul' => array(
				'field' => 'judul',
				'label' => 'Judul',
				'rules' => 'trim|required|min_length[3]|max_length[30]'),
			'isi' => array(
				'field' => 'isi',
				'label' => 'Isi',
				'rules' => 'trim|required')
			)
		);

	public function __construct()
	{
		$this->soft_deletes = TRUE;
		$this->has_one['organisasi'] = array('Organisasi_m', 'id', 'id_organisasi');
		$this->has_one['akun'] = array('Akun_m', 'id', 'created_by');
		parent::__construct();
	}

    public function change_menu_pos($id, $arrow)
    {
        if ($arrow === "0") {
            return $this->db->query("UPDATE info_organisasi SET pos = pos -1 WHERE id != '$id'");
        }else{
            return $this->db->query("UPDATE info_organisasi SET pos = pos +1 WHERE id != '$id'");
        }
    }
}