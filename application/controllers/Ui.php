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

	public function homepage()
	{
		$this->render('_UI/homepage/index');
	}
}
