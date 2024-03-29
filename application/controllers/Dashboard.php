<?php
	defined('BASEPATH') OR die('No direct script access allowed');
	class Dashboard extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model("Pic/ModelPic");
			$this->load->model("Profil/ModelProfile");
			$this->load->model("Pengaduan/ModelPengaduan");
		}

		public function index() {
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$data["pic"] = $this->ModelPic->getData([])->result();
			$data["active"] = "dashboard";
			$data["content"] = "dashboard/main";
			$data["js"] = "dashboard/js-main";
			$profilData = $this->ModelProfile->getProfil()->result();
			$this->session->set_userdata('profil', strval($profilData[0]->nama));
			$this->session->set_userdata('avatar', strval($profilData[0]->profil_gambar));
			$this->load->view('templates/content', $data);
		}

		public function chartdata(){
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$message = [
				"message" => "Data - data pengaduan berhasil didapatkan.",
				"data" => null,
				"success" => true,
			];
			$status = 200;
			try{
				$month = $this->input->post("bulan");
				$year = $this->input->post("tahun");
				$filterPic = $this->input->post("pic") == 0 ? "<>" : "=";
				$filter = [
					"EXTRACT(YEAR FROM trans_aduan.aduan_tanggal) =" => $year,
					"trans_aduan.pic_id {$filterPic}" => $this->input->post("pic"),
				];

				if($this->input->post("periode") == "Bulan"){
					$filter["EXTRACT(MONTH FROM trans_aduan.aduan_tanggal) ="] = $month;
				}

				$result = [];
				$result["jumlah_pengaduan"] = $this->ModelPengaduan->getData($filter)->num_rows();
				$result["aduan_terbanyak"] = $this->handleAduanTerbanyak($filter);
				$result["aduan_ditanggapi"] = $this->handleAduanDitanggapi($filter);
				$result["media_terbanyak"] = $this->handleMediaTerbanyak($filter);
				$result["jumlah_hari"] = cal_days_in_month(CAL_GREGORIAN, $month, $year);
				$result["chart"] = $this->handleChartPeriod($filter, $this->input->post("periode"), $month, $year);

				$message["data"] = $result;
			}
			catch (\Exception $e) {
	            log_message('error', $e->getMessage());
	            $message["message"] = "Terjadi merubah status data pengaduan, silahkan coba lagi".strval($e->getMessage());
	            $message["success"] = false;
	            $status = 400;
	        }
	        return $this->output->set_status_header($status)
	        ->set_content_type('application/json')
	        ->set_output(json_encode($message));
		}

		private function handleMediaTerbanyak($filter){
			return $this->ModelPengaduan->getData(
				$filter, 
				["jumlah" => "DESC"],
				"COUNT(*) AS jumlah, master_media.media_nama, master_media.media_icon",
				"trans_aduan.media_id, master_media.media_nama, master_media.media_icon"
			)->row();
		}

		private function handleAduanTerbanyak($filter){
			return $this->ModelPengaduan->getData(
				$filter, 
				["jumlah" => "DESC"],
				"COUNT(*) AS jumlah, master_pic.pic_nama",
				"trans_aduan.pic_id, master_media.media_nama, master_pic.pic_nama"
			)->row();
		}

		private function handleAduanDitanggapi($filter){
			$filter["trans_aduan.aduan_status"] = DITANGGAPI;
			return $this->ModelPengaduan->getData(
				$filter
			)->num_rows();
		}

		private function handleChartPeriod($filter, $period, $m, $y){
			$bulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"];

			$limitPeriod = $period == "Bulan" ? cal_days_in_month(CAL_GREGORIAN, $m, $y) : 12;

			$result = [];
			for($i = 1; $i <= $limitPeriod; $i++){
				if($period == "Bulan"){
					$filter["trans_aduan.aduan_tanggal"] = "{$y}-{$m}-{$i}";
					$result["labels"][] = "{$i}";
				}else{
					$limitTanggal = cal_days_in_month(CAL_GREGORIAN, $i, $y);
					$filter["trans_aduan.aduan_tanggal >="] = "{$y}-{$i}-01";
					$filter["trans_aduan.aduan_tanggal <="] = "{$y}-{$i}-{$limitTanggal}";
					$result["labels"][] = $bulan[$i-1];
				}

				$active = $filter;
				$nonActive = $filter;

				$active["aduan_status"] = DITANGGAPI;
				$nonActive["aduan_status"] = BLM_DITANGGAPI;
				
				$result["active"][] = $this->ModelPengaduan->getData($active)->num_rows();
				$result["non_active"][] = $this->ModelPengaduan->getData($nonActive)->num_rows();
			}
			return $result;
		}

		public function update_profile() {
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$message = [
				"message" => "Status data pengaduan berhasil dirubah.",
				"data" => null,
				"success" => true,
			];
			$status = 200;

			$findData = $this->ModelProfile->getProfil()->result();
			if (count($findData) > 0) {
				$path = "./uploads/profil/".$findData[0]->profil_gambar;
				if(file_exists($path)){
					unlink($path);
				}
			} else {
				$message["message"] = "Data tidak ditemukan";
				$message["success"] = false;
				$status = 400;
				return $this->output->set_status_header($status)
					->set_content_type('application/json')
					->set_output(json_encode($message));
			}

			// Upload Gambar
			$config['upload_path'] = './uploads/profil/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size'] = 5120;
			$config['overwrite'] = true;
			
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('profil_gambar'))
			{
				$status = 400;
				$message["message"] = "Pastikan ukuran gambar dibawah 2MB dengan format .jpg";
				$message["success"] = false;
				
				return $this->output->set_status_header($status)
				->set_content_type('application/json')
				->set_output(json_encode($message));
			}

			$upload_data = $this->upload->data();
			try{
				$this->ModelProfile->updateProfil(
					1, ['nama' => $this->input->post('profil_nama'), 'profil_gambar' => $upload_data['file_name']]
				);
				$this->session->set_userdata('profil', $this->input->post('profil_nama'));
				$this->session->set_userdata('avatar', $upload_data['file_name']);

			}
			catch (\Exception $e) {
						log_message('error', $e->getMessage());
						$message["message"] = "Terjadi kesalahan merubah status data pengaduan, silahkan coba lagi";
						$message["success"] = false;
						$status = 400;
				}
			
			return $this->output->set_status_header($status)
				->set_content_type('application/json')
				->set_output(json_encode($message));
		}
	}
?>
