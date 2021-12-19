<?php
defined('BASEPATH') OR die('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Laporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model("Pic/ModelPic");
		$this->load->model("Pengaduan/ModelPengaduan");
	}

	public function index(){
		try{
			$m = date("m");
			$bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"];
			$data = $this->ModelPengaduan->getData([])->result();

			$spreadsheet = new Spreadsheet;
			$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, $bulan[$m-1]);

			$spreadsheet->addSheet($myWorkSheet, 0);
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'Tanggal')
			->setCellValue('C1', 'Pemohon')
			->setCellValue('D1', 'Media')
			->setCellValue('E1', 'Perihal')
			->setCellValue('F1', 'PIC')
			->setCellValue('G1', 'Status')
			->setCellValue('H1', 'Keterangan');

			$baris = 2;
			foreach($data as $val) {
				$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $baris, $baris-1)
				->setCellValue('B' . $baris, date('j F Y', strtotime($val->aduan_tanggal)))
				->setCellValue('C' . $baris, $val->aduan_pemohon)
				->setCellValue('D' . $baris, $val->media_nama . " ({$val->aduan_fitur})")
				->setCellValue('E' . $baris, $val->aduan_perihal)
				->setCellValue('F' . $baris, $val->pic_nama)
				->setCellValue('G' . $baris, $val->aduan_status)
				->setCellValue('H' . $baris, $val->aduan_keterangan);

				$baris++;
			}

			$writer = new Xlsx($spreadsheet);

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="Laporan.xlsx"');
			header('Cache-Control: max-age=0');

			$writer->save('php://output'); 
		}
		catch (\Exception $e) {
	    	log_message('error', $e->getMessage());
	    }
		
	}
}
?>