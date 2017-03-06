<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_keluarga_m extends MY_Model
{

    public function __construct()
    {
        $this->table = 'status_keluarga';
        $this->primary_key = 'id_statuskeluarga';
        parent::__construct();
    }

}
