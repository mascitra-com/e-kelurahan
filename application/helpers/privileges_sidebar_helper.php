<?php
/**
 * 
 * @package CodeIgniter
 * @category Helpers
 * @author Andre Hardika (andrehardika@gmail.com)
 */
if (!function_exists('show_sidebar_menu')) {
	/**
     * Menampilkan menu sidebar berdasarkan hak akses
     *
     * @param string $link, $allowed_menus
     *
     * @return boolean
     */
	function show_sidebar_menu($link, $allowed_menus = NULL){
		if ($allowed_menus !== NULL && in_array($link, $allowed_menus)) {
			return TRUE;
		}
		return FALSE;
	}
}
?>