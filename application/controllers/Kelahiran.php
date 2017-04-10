<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelahiran extends MY_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation'));
        $this->load->helper(array('dump'));
        $this->load->model(array('organisasi_m', 'penduduk_m'));
        $this->_accessable = TRUE;
    }

    public function index()
    {
    	$this->generateCsrf();
        $this->render('kelahiran/kelahiran');
    }
}