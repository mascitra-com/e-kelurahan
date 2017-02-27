<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan_m extends MY_Model
{

    public function __construct()
    {
        $this->table = 'kelurahan';
        $this->primary_key = 'id';
        $this->has_many['mutasi_keluars'] = array('mutasi_keluar_m', 'id', 'id');
        parent::__construct();
    }

}
