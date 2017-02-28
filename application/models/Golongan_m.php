<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan_m extends MY_Model
{

    public function __construct()
    {
        $this->table = 'golongan_pegawai';
        $this->primary_key = 'id';
        parent::__construct();
    }

}
