<?php
/**
 * 
 * @package CodeIgniter
 * @category Helpers
 * @author Andre Hardika (andrehardika@gmail.com)
 */
if (!function_exists('potong_teks')) {
	/**
     * Memotong isi teks sesuai panjang yang diinginkan. Jika teks lebih dari panjang, teks akan digantikan dengan "..."
     *
     * @param string $isi,  int $panjang
     *
     * @return string $isi
     */
	function potong_teks($isi, $panjang=160){
		if (strlen($isi)>$panjang) {
			$isi =substr($isi, 0, $panjang).'...';
		}
		return $isi;
	}
}
?>