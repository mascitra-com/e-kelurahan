<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Berita extends MY_Controller
{
	
	public function __construct()
	{
		$this->_accessable = TRUE;
		parent::__construct();

		$this->load->helper(array('dump', 'form', 'potong_teks', 'cek_file'));
		$this->load->library(array('form_validation', 'slug'));
		$this->load->model(array('berita_m'));

		$this->slug_config($this->berita_m->table, 'judul');
	}

	public function index()
	{
		//BERITA
		$data['beritas'] = $this->berita_m
		->where('status',array('0', '1'))
		->where('id_organisasi', $this->ion_auth->get_current_id_org())
		->order_by('tanggal_publish','desc')
		->limit(5)
		->fields('judul, isi, slug, gambar, tanggal_publish, status')
		->with_akun('fields:username')
		->get_all();

		$this->render('berita/berita', $data);
	}

	public function tulis($optionalData = NULL, $optStatus = FALSE)
	{
		$this->generateCsrf();

		if ($optStatus) {
			$data['berita'] = $optionalData['prev_input'];
			$this->message($optionalData['msg'], $optionalData['msg_type']);
			$this->render('berita/tulis', $data);
		}else{
			$this->render('berita/tulis');
		}
	}

	public function simpan()
	{
		$today = date('Y-m-d');
		$data = $this->input->post();

		if(empty($data['status'])){
			if (!(empty($data['tanggal_publish'])) && $data['tanggal_publish'] > $today) {
				$data['status'] = '1';
			}elseif (!(empty($data['tanggal_publish'])) && $data['tanggal_publish'] == $today) {
				$data['status'] = '0';
			}
			else{
				$data['msg'] = 'Pilih tanggal sama atau lebih dari tanggal sekarang';
				$data['msg_type'] = 'warning';
				$data['prev_input'] = $data;
				$this->tulis($data, TRUE);
			}
		}

		$data['slug'] = $this->slug->create_uri($data);

		if (!empty($_FILES['gambar']['name'])) {
			$data['img_link']= $this->do_upload('gambar');
		} else {
			$data['img_link'] = NULL;
		}
	}

	private function do_upload($input_name)
	{
		$this->load->helper('prefix_unik');
		$config['file_name'] = prefix_unik(1).pathinfo($_FILES[$input_name]['name'], PATHINFO_EXTENSION);
		dump($config['file_name']);
		$config['upload_path'] = './assets/images/berita/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($input_name)) {
			$this->message($this->upload->display_errors(), 'danger');
			$this->news_check_redirect_previous($input_name);
		}else{
			$file_date = $this->upload->data();
			$link = $file_date['file_name'];
			return $link;
		}
	}
}