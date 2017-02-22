<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi_m extends MY_Model
{

    public function __construct()
    {
        $this->table = 'provinsi';
        $this->primary_key = 'id';
        $this->has_many['kabupaten'] = array('kabupaten_m', 'id_provinsi', 'id');
        parent::__construct();
    }

}
