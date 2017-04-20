<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  protected $_accessable;
  protected $_warga;
  protected $_wargaAuth;
  protected $_privileges;
  protected $_super;
  protected $_csrf;
  protected $_slug;

  public function __construct()
  {
    parent::__construct();

    $this->load->helper('privileges_sidebar');
    $this->load->library('ion_auth');

    $this->_super = $this->session->userdata('super');
    $this->_wargaAuth = $this->session->userdata('warga');
    $this->_privileges = $this->ion_auth->get_allowed_links();
    if (empty($this->_privileges)) {
      $this->_privileges = array();
    }

  }

  public function _remap($method, $param=array())
  {
    if (get_class($this) === 'Homepage' && $method !== 'index') {
      $this->_slug = $method;
      $method = array_shift($param);
    }
      if($method === 'index'){
          $method = array_shift($param);
          if (!method_exists($this, $method)){
              $this->_slug = $method;
              $method = 'index';
          }
    }

    if (method_exists($this, $method)) {
      if ($this->ion_auth->logged_in() || $this->_accessable || $this->_wargaAuth || $this->_super) {
        if ($this->check_privileges(get_class($this), $method) || $this->_accessable || $this->_wargaAuth) {
          return call_user_func_array(array($this, $method), $param);
        }else{
          die('anda tidak mempunyai hak akses untuk menu ini');
        }
      }else{
        if ($this->_warga) {
          $this->go('warga');
        }
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
        if(!$data['super'] = $this->_super){
        $data['link_privileges'] = $this->_privileges;
        } else {
        $data['link_privileges'] = NULL;
        }
        $data['slug'] = $this->_slug;
        $data['csrf'] = $this->_csrf;
        $this->blade->render($view, $data);
    }

    /**
     * Berfungsi untuk menampilkan membuat input csrf tipe hidden
     *
     * @return string
     */
    protected function generateCsrf()
    {
      return $this->_csrf = "<input type='hidden' name='". $this->security->get_csrf_token_name() ."' value='". $this->security->get_csrf_hash() ."'>";
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