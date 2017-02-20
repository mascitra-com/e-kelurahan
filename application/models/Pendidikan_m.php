<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan_m extends MY_Model
{

    public function __construct()
    {
        $this->table = 'jenis_pendidikan';
        $this->primary_key = 'id_jenispendidikan';
        $this->fillable = array('pendidikan');
        parent::__construct();
    }

}
