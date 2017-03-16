<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("./vendor/dompdf/dompdf/autoload.inc.php");
use Dompdf\Dompdf;

class PdfGenerator
{
	public function generate($html,$filename)
	{
		define('DOMPDF_ENABLE_AUTOLOAD', false);

		$dompdf = new DOMPDF();
		$dompdf->set_paper('A4', 'portrait');
		$dompdf->set_base_path(realpath(APPPATH . '/../assets/'));
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream($filename.'.pdf',array("Attachment"=>0));
	}
}