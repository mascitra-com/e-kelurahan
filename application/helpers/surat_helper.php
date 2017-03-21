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
	function get_tipe_surat($tipe){
		switch ($tipe) {
			case '0':
				return 'BlankoKTP';
			case '1':
				return 'SKCK';
			case '2':
				return 'Keterangan Miskin';
			case '3':
				return 'Keterangan Miskin RT';
			case '4':
				return 'SKTM';
			default:
				return 'Tidak ada data';
		}
	}
}
?>