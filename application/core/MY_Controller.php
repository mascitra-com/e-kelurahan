<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
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
    protected function render($view, $data = array())
    {
        $data['id_organisasi'] = $this->ion_auth->get_current_id_org();
        $this->blade->render($view, $data);
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

     /**
     * @param $table - Table Name
     * @param $title - Field as reference for slug
     */
    protected function slug_config($table, $title){
      $config = array(
        'table' => $table,
        'id' => 'id',
        'field' => 'slug',
        'title' => $title,
            'replacement' => 'dash' // Either dash or underscore
            );
      $this->slug->set_config($config);
    }

}