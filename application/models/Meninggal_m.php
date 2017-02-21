<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meninggal_m extends MY_Model
{
    public function __construct()
    {
        $this->table = 'meninggal';
        $this->primary_key = 'id';

        $this->has_one['penduduk'] = array('penduduk', 'id', 'nik');
        
        $this->soft_deletes = TRUE;
        parent::__construct();
    }

}
