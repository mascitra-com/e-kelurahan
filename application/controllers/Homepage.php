<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_accessable = TRUE;
		// $this->load->library(array('form_validation'));
		$this->load->helper(array('dump'));
		// $this->load->model(array('organisasi_m'));

		if (is_null($this->session->userdata('visitor'))) {
			$this->session->set_userdata('visitor', array('ip' => $this->input->ip_address(), 'visited_articles' => array()));
		}else{
			if ($this->session->userdata('visitor')['ip'] !== $this->input->ip_address()) {
				$this->session->sess_destroy();
				$this->session->set_userdata('visitor', array('ip' => $this->input->ip_address(), 'visited_articles' => array()));
			}
		}
	}

	public function index($a = NULL)
	{
		if (is_null($a)) {
			dump('homepage kecamatan');
		}else{
			$this->load->model(array('berita_m'));
			$this->load->helper(array('potong_teks', 'cek_file'));

			$data['berita_terbarus'] = $this->berita_m
			->where('status','0')
			->where('id_organisasi', $this->getCurrentOrg())
			->order_by('tanggal_publish','desc')
			->limit(4)
			->fields('judul, isi, slug, gambar, tanggal_publish')
			->get_all();

			$data['berita_populers'] = $this->berita_m
			->where('status','0')
			->where('id_organisasi', $this->getCurrentOrg())
			->order_by(array(
				'count' => 'desc',
				'tanggal_publish' => 'desc'
			))
			->limit(4)
			->fields('judul, isi, slug, gambar, tanggal_publish')
			->get_all();

			$data['headline'] = $this->berita_m
			->where('tipe','1')
			->where('id_organisasi', $this->getCurrentOrg())
			->order_by(array(
				'tanggal_publish' => 'desc'
			))
			->fields('judul, isi, slug, gambar, tanggal_publish')
			->get();
			
			$this->render('homepage/index', $data);
		}
	}
	
	private function getCurrentOrg(){
		return $this->ion_auth->get_current_id_org();
	}
}
