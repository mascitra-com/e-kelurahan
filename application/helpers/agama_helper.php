<?php
/**
 * 
 * @package CodeIgniter
 * @category Helpers
 * @author Andre Hardika (andrehardika@gmail.com)
 */
if (!function_exists('cetak_agama')) {
	/**
     * Mencetak agama sesuai status_agama
     *
     * @param string $status_agama 0: Islam, 1: Kristen Protestan, 2: Kristen Katolik, 3: Hindu, 4: Buddha, 5:Kong Hu Cu
     *
     * @return boolean
     */
	function cetak_agama($status_agama){
		switch ($status_agama) {
			case '0':
				$agama = 'Islam';
				break;
			case '1':
				$agama = 'Kristen Protestan';
				break;
			case '2':
				$agama = 'Kristen Katolik';
				break;
			case '3':
				$agama = 'Hindu';
				break;
			case '4':
				$agama = 'Buddha';
				break;
			case '5':
				$agama = 'Kong Hu Cu';
				break;
			default:
				$agama = 'Tidak ada data';
				break;
		}
		return $agama;
	}
}
?>