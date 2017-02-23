<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten_m extends MY_Model
{

    public function __construct()
    {
        $this->table = 'kabupaten';
        $this->primary_key = 'id';
        $this->has_many['kecamatan'] = array('kecamatan_m', 'id_kabupaten', 'id');
        $this->has_many['mutasi_keluars'] = array('mutasi_keluar_m', 'id', 'id');
        parent::__construct();
    }

}
