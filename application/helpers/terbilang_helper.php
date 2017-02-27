<?php
/**
 * 
 * @package CodeIgniter
 * @category Helpers
 * @author Andre Hardika (andrehardika@gmail.com)
 */
if (!function_exists('terbilang')) {
	/**
     * Mengubah angka menjadi huruf
     *
     * @param string $angka
     *
     * @return string
     */
	function terbilang($x)
	{
		$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		if ($x < 12)
			return "" . $abil[$x];
		elseif ($x < 20)
			return Terbilang($x - 10) . "belas";
		elseif ($x < 100)
			return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
		elseif ($x < 200)
			return " seratus" . Terbilang($x - 100);
		elseif ($x < 1000)
			return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
		elseif ($x < 2000)
			return " seribu" . Terbilang($x - 1000);
		elseif ($x < 1000000)
			return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
		elseif ($x < 1000000000)
			return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
	}
}
?>