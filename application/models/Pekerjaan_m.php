<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan_m extends MY_Model
{

    public function __construct()
    {
        $this->table = 'jenis_pekerjaan';
        $this->primary_key = 'id_jenispekerjaan';
        $this->fillable = array('pekerjaan');
        $this->has_many['penduduks'] = array('penduduk_m', 'nik', 'nik');
        parent::__construct();
    }

}
