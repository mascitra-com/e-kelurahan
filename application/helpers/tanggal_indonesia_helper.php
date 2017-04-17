<?php
/**
 * 
 * @package CodeIgniter
 * @category Helpers
 * @author Andre Hardika (andrehardika@gmail.com)
 */
if (!function_exists('hari_indonesia')) {
	/**
     * Mencetak hari dengan bahasa Indonesia
     *
     * @param string $nama_hari (non-Indonesia)
     *
     * @return string
     */
	function hari_indonesia($nama_hari){
		switch ($nama_hari) {
			case 'Monday':
			$hari = 'Senin';
			break;
			case 'Tuesday':
			$hari = 'Selasa';
			break;
			case 'Wednesday':
			$hari = 'Rabu';
			break;
			case 'Thursday':
			$hari = 'Kamis';
			break;
			case 'Friday':
			$hari = "Jum'at";
			break;
			case 'Saturday':
			$hari = 'Sabtu';
			break;
			case 'Sunday':
			$hari = 'Minggu';
			break;
			default:
			$hari = 'Tidak ada data hari';
			break;
		}
		return $hari;
	}
}

if ( ! function_exists('bulan_indonesia')) {
	/**
     * Mencetak bulan dengan bahasa Indonesia
     *
     * @param string $bln (non-Indonesia)
     *
     * @return string
     */
	function bulan_indonesia($bln){
		switch ($bln)
		{
			case 1:
			return "Januari";
			break;
			case 2:
			return "Februari";
			break;
			case 3:
			return "Maret";
			break;
			case 4:
			return "April";
			break;
			case 5:
			return "Mei";
			break;
			case 6:
			return "Juni";
			break;
			case 7:
			return "Juli";
			break;
			case 8:
			return "Agustus";
			break;
			case 9:
			return "September";
			break;
			case 10:
			return "Oktober";
			break;
			case 11:
			return "November";
			break;
			case 12:
			return "Desember";
			break;
		}
	}
}

if ( ! function_exists('tgl_indo'))
{
	/**
     * Mencetak tanggal dengan format bahasa Indonesia
     *
     * @param string $tgl (Y-m-d) / (Y-m-d h:i:s)
     *
     * @return string
     */
	function tgl_indo($tgl){
		$ubah = date('d m Y', strtotime($tgl));
        $pecah = explode(" ",$ubah);
        $tanggal = $pecah[0];
        $bulan = bulan_indonesia($pecah[1]);
        $tahun = $pecah[2];
        return $tanggal.' '.$bulan.' '.$tahun; //hasil akhir
    }
}

?>