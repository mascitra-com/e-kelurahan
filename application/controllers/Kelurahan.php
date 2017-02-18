<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelurahan extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));
		// $this->load->helper(array(''));
		$this->load->model(array('organisasi_m'));
	}

	public function index()
	{
		$data['kelurahans'] = $this->organisasi_m->get_all();
		$this->render('kelurahan/index', $data);
	}
}