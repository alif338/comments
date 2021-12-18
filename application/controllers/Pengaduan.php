<?php
	class Pengaduan extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model("Pic/ModelPic");
			$this->load->model("Media/ModelMedia");
			$this->load->model("Pengaduan/ModelPengaduan");
		}

		public function index() {
			$data["pic"] = $this->ModelPic->getData([]);
			$data["media"] = $this->ModelMedia->getData([]);
			$data["active"] = "pengaduan";
			$data["js"] = "pengaduan/js";
			$data["content"] = "pengaduan/form";
			$this->load->view('templates/content', $data);
		}

		public function store(){
			$message = [
				"message" => "Data pengaduan berhasil disimpan.",
				"data" => null,
				"success" => true,
			];
			$status = 200;

			try{
				$this->ModelMedia->insertData([
					"aduan_perihal" => $this->input->post("aduan_perihal"),
					"aduan_tanggal" => $this->input->post("aduan_tanggal"),
					"aduan_pemohon" => $this->input->post("aduan_pemohon"),
					"aduan_fitur" => $this->input->post("aduan_fitur"),
					"media_id" => $this->input->post("media_id"),
					"pic_id" => $this->input->post("pic_id"),
				]);
			}
			catch (\Exception $e) {
	            error_log($e->getMessage());

	            $message["message"] = "Terjadi masalah saat memproses data, silahkan coba lagi";
	            $message["success"] = false;
	            $status = 400;
	        }

			return $this->output->set_status_header($status)
	        ->set_content_type('application/json')
	        ->set_output(json_encode($message));
		}
	}
?>
