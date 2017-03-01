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
		switch ($prefix) {
            case 1: //GAMBAR BERITA
            $pre = 'NWS';
            break;
            default: //FILE FORMAT LAINNYA
            $pre = 'OTH';
            break;
        }
        return $pre.strtoupper(str_random(3)).date('Ymdhis');
    }
}
?>