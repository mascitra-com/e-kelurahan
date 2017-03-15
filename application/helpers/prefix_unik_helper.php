<?php
/**
 * 
 * @package CodeIgniter
 * @category Helpers
 * @author Andre Hardika (andrehardika@gmail.com)
 */
if (!function_exists('prefix_unik')) {
	/**
     * Prefix Generator sepanjang 20 karakter
     *
     * @param int $prefix
     * 1 - NWS | Default - OTH
     *
     * @return string
     * @internal param string $prefix
     */
	function prefix_unik($prefix){
        $ci =& get_instance();
        $ci->load->helper('string');

		switch ($prefix) {
            case 1: //GAMBAR BERITA
            $pre = 'NWS';
            break;
            case 2: //DOKUMEN REGULASI
            $pre = 'REG';
            break;
            case 3: //FOTO GALERI
            $pre = 'IMG';
            break;
            default: //FILE FORMAT LAINNYA
            $pre = 'OTH';
            break;
        }
        return $pre.strtoupper(random_string('alnum', 3)).date('Ymdhis');
    }
}
?>