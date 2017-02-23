<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan_m extends MY_Model
{

    public function __construct()
    {
        $this->table = 'kecamatan';
        $this->primary_key = 'id';
        $this->has_many['kelurahan'] = array('kelurahan_m', 'id_kecamatan', 'id');
        $this->has_many['mutasi_keluars'] = array('mutasi_keluar_m', 'id', 'id');
        parent::__construct();
    }

}
