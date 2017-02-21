<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $_accessable;
    protected $_privileges;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');

        $this->_privileges = $this->ion_auth->get_allowed_links();
        if (empty($this->_privileges)) {
          $this->_privileges = array();
        }

    }

    public function _remap($method, $param=array())
    {
        if (method_exists($this, $method)) {
            if ($this->ion_auth->logged_in() || $this->_accessable) {
                if ($this->check_privileges(get_class($this), $method) || $this->_accessable || $this->ion_auth->is_admin()) {
                    return call_user_func_array(array($this, $method), $param);
                }else{
                    die('anda tidak mempunyai hak akses untuk menu ini');
                }
            }else{
                $this->go('auth');
            }
        }else{
            show_404();
        }
    }

    protected function check_privileges($class, $method)
    {
        foreach ($this->_privileges as $privilege) {
            if (strtolower($class.'/'.$method) == strtolower($privilege)) {
                return TRUE;
            }
        }
        return FALSE;
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