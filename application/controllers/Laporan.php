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
			->setCellValue('B1', 'Nama')
			->setCellValue('C1', 'Jenis Kelamin')
			->setCellValue('D1', 'Tanggal Lahir')
			->setCellValue('E1', 'Umur');

			$kolom = 2;
			foreach($data as $val) {

				$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $val->aduan_perihal)
				->setCellValue('B' . $kolom, $val->aduan_perihal)
				->setCellValue('C' . $kolom, $val->aduan_perihal)
				->setCellValue('D' . $kolom, date('j F Y', strtotime($val->aduan_tanggal)))
				->setCellValue('E' . $kolom, $val->aduan_perihal);

				$kolom++;
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