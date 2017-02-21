<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));
		// $this->load->helper(array(''));
		// $this->load->model(array(''));
	}

	public function index()
	{
		$this->render('dashboard/index');
	}
}