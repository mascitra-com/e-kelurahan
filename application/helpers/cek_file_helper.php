<?php
/**
 * 
 * @package CodeIgniter
 * @category Helpers
 * @author Andre Hardika (andrehardika@gmail.com)
 */
if (!function_exists('cek_file')) {
	/**
     * Cek keberadaan file di dalam direktori yang bersangkutan
     *
     * @param string $filename, string $path, $default
     *
     * @return string $filename
     */
	function cek_file($filename, $path, $default = 'default.png'){
		if (!file_exists($path.$filename) || empty($filename)) {
			return $default;
		}
		return $filename;
	}
}
?>