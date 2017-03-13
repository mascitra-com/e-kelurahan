<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ui extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->_accessable = TRUE;
	}

	public function index()
	{
		$this->render('_UI/index');
	}

	public function signin()
	{
		$this->render('_UI/auth/signin');
	}

	public function kelurahan()
	{
		$this->render('_UI/kelurahan/kelurahan');
	}

	public function kependudukan()
	{
		$this->render('_UI/kependudukan/kependudukan');
	}

	public function kependudukan_create()
	{
		$this->render('_UI/kependudukan/create');
	}

	public function kependudukan_detail()
	{
		$this->render('_UI/kependudukan/detail');
	}

	public function keluarga()
	{
		$this->render('_UI/keluarga/keluarga');
	}

	public function keluarga_detail()
	{
		$this->render('_UI/keluarga/detail');
	}
  
	public function pindah()
	{
		$this->render('_UI/kelurahan/pindah');
	}

	public function pindah_detail()
	{
		$this->render('_UI/kelurahan/pindah_detail');
	}

	public function pindah_pengajuan()
	{
		$this->render('_UI/kelurahan/pindah_pengajuan');
	}

	public function pindah_arsip()
	{
		$this->render('_UI/kelurahan/pindah_arsip');
	}

	public function pindah_pengajuan_cetak()
	{
		$this->render('_UI/kelurahan/pindah_pengajuan_cetak');
	}

	public function konfirmasi_kelurahan()
	{
		$this->render('_UI/kelurahan/konfirmasi');
	}

	public function cetak()
	{
		$this->render('_UI/kelurahan/format_cetak');
	}

	public function profil()
	{
		$this->render('_UI/auth/profil');
	}

	public function surat_blanko_ktp()
	{
		$this->render('_UI/surat/blanko_ktp');
	}

	public function surat_skck()
	{
		$this->render('_UI/surat/skck');
	}

	public function surat_keterangan_miskin()
	{
		$this->render('_UI/surat/keterangan_miskin');
	}

	public function surat_sktm()
	{
		$this->render('_UI/surat/sktm');
	}

	public function pengajuan_blanko()
	{
		$this->render('_UI/homepage/dashboard-user/pengajuan_ktp');
	}

	public function status_pengajuan()
	{
		$this->render('_UI/homepage/dashboard-user/status_pengajuan');
	}

	public function berita()
	{
		$this->render('_UI/berita/berita');
	}

	public function berita_arsip()
	{
		$this->render('_UI/berita/arsip');
	}

	public function berita_draf()
	{
		$this->render('_UI/berita/draf');
	}

	public function berita_tulis()
	{
		$this->render('_UI/berita/tulis');
	}

	public function berita_detail()
	{
		$this->render('_UI/berita/detail');
	}

	public function info()
	{
		$this->render('_UI/info/info');
	}

	public function info_tambah()
	{
		$this->render('_UI/info/create');
	}

	public function info_detail()
	{
		$this->render('_UI/info/detail');
	}

	public function agenda()
	{
		$this->render('_UI/agenda/agenda');
	}

	public function regulasi()
	{
		$this->render('_UI/regulasi/regulasi');
	}

	public function pengumuman()
	{
		$this->render('_UI/pengumuman/pengumuman');
	}
}
