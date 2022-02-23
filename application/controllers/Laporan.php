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

	public function export(){
		try{
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$month = $this->input->get("bulan");
			$year = $this->input->get("tahun");
			$bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"];
			$periode = $this->input->get("periode");
			$pic = $this->input->get("pic");

			$spreadsheet = new Spreadsheet;
			$bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"];
			$start = 1;
			$limit = 12;
			if($periode == "Bulan"){
				$start = $month;
				$limit = $month;
			}
			$index = 0;
			for($i = $start; $i <= $limit; $i++){
				$myWorkSheet = new \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet($spreadsheet, $bulan[$i-1]);
				$spreadsheet->addSheet($myWorkSheet, $index);
				$spreadsheet->setActiveSheetIndex($index)
				->setCellValue('A1', 'No')
				->setCellValue('B1', 'Tanggal')
				->setCellValue('C1', 'Pemohon')
				->setCellValue('D1', 'Media')
				->setCellValue('E1', 'Perihal')
				->setCellValue('F1', 'PIC')
				->setCellValue('G1', 'Status')
				->setCellValue('H1', 'Gambar')
				->setCellValue('I1', 'Keterangan');

				$filterPic = $pic == 0 ? "<>" : "=";
				$filter = [
					"YEAR(trans_aduan.aduan_tanggal) =" => $year,
					"trans_aduan.pic_id {$filterPic}" => $this->input->post("pic"),
				];

				if($periode == "Bulan"){
					$filter["MONTH(aduan_tanggal) ="] = $month;
				}else{
					$limitTanggal = cal_days_in_month(CAL_GREGORIAN, $i, $year);
					$filter["trans_aduan.aduan_tanggal >="] = "{$year}-{$i}-01";
					$filter["trans_aduan.aduan_tanggal <="] = "{$year}-{$i}-{$limitTanggal}";
				}

				$data = $this->ModelPengaduan->getData($filter, ["trans_aduan.aduan_tanggal" => "ASC"])->result();
				

				$baris = 2;
				foreach($data as $val) {
					$spreadsheet->setActiveSheetIndex($index)
					->setCellValue('A' . $baris, $baris-1)
					->setCellValue('B' . $baris, date('j F Y', strtotime($val->aduan_tanggal)))
					->setCellValue('C' . $baris, $val->aduan_pemohon)
					->setCellValue('D' . $baris, $val->media_nama . " ({$val->aduan_fitur})")
					->setCellValue('E' . $baris, $val->aduan_perihal)
					->setCellValue('F' . $baris, $val->pic_nama)
					->setCellValue('G' . $baris, $val->aduan_status)
					->setCellValue('H' . $baris, "Link Gambar")
					->setCellValue('I' . $baris, $val->aduan_keterangan);

					$spreadsheet->getActiveSheet()->getStyle('G' . $baris)->applyFromArray([
						'fill' => [
							'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
							'startColor' => ['rgb' => $val->aduan_status == DITANGGAPI ? '31CE36' : 'F25961']
						],
						"font" => [
							'bold' => true,
							'color' => ['rgb' => 'ffffff']
						]
					]);
					$spreadsheet->getActiveSheet()->getCell('H' . $baris)->getHyperlink()->setUrl(base_url('/uploads/'.$val->aduan_gambar));
					$spreadsheet->getActiveSheet()->getStyle('H' . $baris)->applyFromArray(["font" => ['underline' => true, 'color' => ['rgb' => '1572E8']]]);

					$baris++;
				}

				$index++;
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