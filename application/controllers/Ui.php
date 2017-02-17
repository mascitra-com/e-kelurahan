<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ui extends MY_Controller {

	public function index()
	{
		$this->render('_UI/index');
	}

	public function signin()
	{
		$this->render('_UI/auth/signin');
	}
}
