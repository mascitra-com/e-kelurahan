<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_accessable = TRUE;
		// $this->load->library(array('form_validation'));
		$this->load->helper(array('dump'));
		$this->load->model(array('organisasi_m', 'agenda_m'));
		if (is_null($this->session->userdata('visitor'))) {
			$this->session->set_userdata('visitor', array('ip' => $this->input->ip_address(), 'visited_articles' => array()));
		}else{
			if ($this->session->userdata('visitor')['ip'] !== $this->input->ip_address()) {
				$this->session->sess_destroy();
				$this->session->set_userdata('visitor', array('ip' => $this->input->ip_address(), 'visited_articles' => array()));
			}
		}
	}

	public function index($slug = NULL)
	{
		if (is_null($slug)) {
			$slug = 'kecamatan-lumajang';
			$judul = 'Kecamatan ';
		}else{
			$judul = 'Kelurahan ';
		}

		//AMBIL ID ORG BERDASARKAN SLUG
		$id_organisasi = $this->organisasi_m->where('slug', $slug)->get()->id;
		// dump($id_organisasi);

		//JUDUL HALAMAN
		$data['judul'] = $judul.$this->organisasi_m->get($id_organisasi)->nama;

		$this->load->model(array('berita_m', 'agenda_m', 'regulasi_m'));
		$this->load->helper(array('potong_teks', 'cek_file'));

		//BERITA
		$data['berita_terbarus'] = $this->berita_m
		->where('status','0')
		->where('id_organisasi', $id_organisasi)
		->order_by('tanggal_publish','desc')
		->limit(4)
		->fields('judul, isi, slug, gambar, tanggal_publish')
		->get_all();

		$data['berita_populers'] = $this->berita_m
		->where('status','0')
		->where('id_organisasi', $id_organisasi)
		->order_by(array(
			'count' => 'desc',
			'tanggal_publish' => 'desc'
			))
		->limit(4)
		->fields('judul, isi, slug, gambar, tanggal_publish')
		->get_all();

		$data['headline'] = $this->berita_m
		->where('tipe','1')
		->where('id_organisasi', $id_organisasi)
		->order_by(array(
			'tanggal_publish' => 'desc'
			))
		->fields('judul, isi, slug, gambar, tanggal_publish')
		->get();

		//AGENDA
		$data['agendas'] = $this->agenda_m
		->order_by('tanggal_agenda', 'desc')
		->limit(4)
		->fields('perihal, tanggal_agenda')
		->get_all(array(
			'id_organisasi' => $id_organisasi
			));

		//REGULASI
		$data['regulations'] = $this->regulasi_m
		->order_by('tgl_dikeluarkan')
		->fields('id, judul, tgl_dikeluarkan')
		->limit(4)
		->get_all('id_organisasi', $id_organisasi);

		$this->render('homepage/homepage', $data);
	}

	public function berita()
	{
		if ($id_organisasi = $this->checkSlug($this->_slug)) {
			//todo
		}else{
			$this->message('Kelurahan tidak ditemukan', 'danger');
			$this->go('homepage');
		}
	}

    public function agenda()
    {
        if ($id_organisasi = $this->checkSlug($this->_slug)) {
            $data['agenda'] = $this->agenda_m->get_all(array('id_organisasi' => $id_organisasi));
            $this->render('homepage/agenda', $data);
        }else{
            $this->message('Kelurahan tidak ditemukan', 'danger');
            $this->go('homepage');
        }
	}

	private function checkSlug($slug = NULL)
	{
		if (is_null($slug) || empty($slug)) {
			return FALSE;
		}else{
			//cek slug apakah ada di tabel organisasi
			$query = $this->organisasi_m
			->fields('id, slug')
			->get(array('slug'=> $slug));
			if ($query === FALSE) {
				return FALSE;
			}else{
				return $query->id;
			}
		}
	}
}
