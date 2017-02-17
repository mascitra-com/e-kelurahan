<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    # Inisialisasi atribut
    protected $_data; # atribut data
    protected $_view; # atribut view
    protected $_accessable; # atribut view
    protected $_privileges;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Berfungsi untuk melakukan redirect
     * @param $link = alamat tujuan
     */
    protected function go($link)
    {
        redirect(site_url($link));
    }

    /**
     * Berfungsi untuk mengeksekusi view
     */
    protected function init()
    {
        $this->_data['_view'] = $this->_view;
        $this->load->view($this->_view['template'], $this->_data);
    }

    /**
     * Berfungsi untuk menampilkan pesan
     *
     * @param string $msg = isi pesan
     * @param string $typ = tipe pesan (default, primary, success, warning, danger)
     */
    protected function message($msg = 'pesan', $typ = 'info')
    {
        $this->session->set_flashdata('message', array($msg, $typ));
    }

}