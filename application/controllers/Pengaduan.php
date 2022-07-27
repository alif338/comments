<?php
	defined('BASEPATH') OR die('No direct script access allowed');
	class Pengaduan extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper(array('form', 'url'));
			$this->load->model("Pic/ModelPic");
			$this->load->model("Media/ModelMedia");
			$this->load->model("Pengaduan/ModelPengaduan");
		}

		public function index() {
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$data["pic"] = $this->ModelPic->getData([])->result();
			$data["media"] = $this->ModelMedia->getData([])->result();
			$data["autocomplete"] = json_encode(
				array_column(
					$this->ModelPic->getData([])->result_array(), 
					"pic_nama"
				),
				true
			);
			$data["active"] = "pengaduan";
			$data["css"] = "pengaduan/css-form";
			$data["js"] = "pengaduan/js-form";
			$data["content"] = "pengaduan/form";
			$this->load->view('templates/content', $data);
		}

		public function show(){
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$data["pengaduan"] = $this->ModelPengaduan->getData([], ["trans_aduan.aduan_tanggal" => "DESC"])->result();
			$data["pic"] = $this->ModelPic->getData([])->result();
			$data["media"] = $this->ModelMedia->getData([])->result();
			$data["active"] = "pengaduan-show";
			$data["js"] = "pengaduan/js-show";
			$data["css"] = "pengaduan/css-show";
			$data["content"] = "pengaduan/show";
			$this->load->view('templates/content', $data);
		}

		public function detail($id) {
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$data["pengaduan"] = $this->ModelPengaduan->getData(['aduan_id'=> $id])->result();
			$data["active"] = "";
			$data["css"] = "pengaduan/css-form";
			$data["js"] = "pengaduan/js-form";
			$data["content"] = "pengaduan/detail";
			$this->load->view('templates/content', $data);
		}

		public function edit($id) {
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$data["pengaduan"] = $this->ModelPengaduan->getData(['aduan_id'=> $id])->result();
			$data["pic"] = $this->ModelPic->getData([])->result();
			$data["media"] = $this->ModelMedia->getData([])->result();
			$data["autocomplete"] = json_encode(
				array_column(
					$this->ModelPic->getData([])->result_array(), 
					"pic_nama"
				),
				true
			);
			$data["active"] = "pengaduan";
			$data["css"] = "pengaduan/css-form";
			$data["js"] = "pengaduan/js-edit";
			$data["content"] = "pengaduan/edit";
			$this->load->view('templates/content', $data);
		}

		public function update(){
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$message = [
				"message" => "Status data pengaduan berhasil dirubah.",
				"data" => null,
				"success" => true,
			];
			$status = 200;

			// Upload Gambar
			$config['upload_path'] = './uploads/verifikasi/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size'] = 2048;
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('aduan_gambar'))
			{
				$status = 400;
					$message["message"] = "Pastikan ukuran gambar dibawah 2MB dengan format .jpg atau .png";
					$message["success"] = false;

					return $this->output->set_status_header($status)
			->set_content_type('application/json')
			->set_output(json_encode($message));
			}

			$upload_data = $this->upload->data();
			try{
				$this->ModelPengaduan->updateData(
					$this->input->post("aduan_id"), 
					[
						'aduan_status' => DITANGGAPI,
						'verifikasi_gambar' => $upload_data['file_name'],
					]
				);
			}
			catch (\Exception $e) {
	            log_message('error', $e->getMessage());
	            $message["message"] = "Terjadi merubah status data pengaduan, silahkan coba lagi";
	            $message["success"] = false;
	            $status = 400;
	        }
	        return $this->output->set_status_header($status)
	        ->set_content_type('application/json')
	        ->set_output(json_encode($message));
		}

		public function update_aduan() {
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$message = [
				"message" => "Status data pengaduan berhasil diupdate.",
				"data" => null,
				"success" => true,
			];
			$status = 200;

			try{
				$findData = $this->ModelPengaduan->getData([
					'aduan_id' => $this->input->post("aduan_id")
				])->result();
				if (count($findData) > 0) {
					$path = "./uploads/".$findData[0]->aduan_gambar;
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
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = 2048;
				$config['encrypt_name'] = true;
	
				$this->load->library('upload', $config);
	
				if (!$this->upload->do_upload('aduan_gambar'))
				{
					$status = 400;
						$message["message"] = "Pastikan ukuran gambar dibawah 2MB dengan format .jpg atau .png";
						$message["success"] = false;
	
						return $this->output->set_status_header($status)
				->set_content_type('application/json')
				->set_output(json_encode($message));
				}
	
				$upload_data = $this->upload->data();
				$pic = $this->handlePic($this->input->post("pic_id"));

				$this->ModelPengaduan->updateData(
					$this->input->post("aduan_id"), 
					[
						"aduan_perihal" => $this->input->post("aduan_perihal"),
						"aduan_tanggal" => $this->input->post("aduan_tanggal"),
						"aduan_pemohon" => $this->input->post("aduan_pemohon"),
						"aduan_fitur" => $this->input->post("aduan_fitur"),
						"aduan_keterangan" => $this->input->post("aduan_keterangan"),
						"aduan_gambar" => $upload_data["file_name"],
						"media_id" => $this->input->post("media_id"),
						"sosmed_link" => $this->input->post("sosmed_link"),
						"pic_id" => $pic,
					]
				);
			}
			catch (\Exception $e) {
							log_message('error', $e->getMessage());
							$message["message"] = "Terjadi merubah status data pengaduan, silahkan coba lagi";
							$message["success"] = false;
							$status = 400;
					}
					return $this->output->set_status_header($status)
					->set_content_type('application/json')
					->set_output(json_encode($message));
		}

		public function remove(){
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$message = [
				"message" => "Data pengaduan berhasil dihapus.",
				"data" => null,
				"success" => true,
			];
			$status = 200;
			try{
				$findData = $this->ModelPengaduan->getData([
					'aduan_id' => $this->input->post("aduan_id")
				])->result();
				if(count($findData) > 0){
					$path = "./uploads/".$findData[0]->aduan_gambar;
					$path_verifikasi = "./uploads/verifikasi/".$findData[0]->verifikasi_gambar;
					if(file_exists($path)){
						unlink($path);
					}
					if ($path_verifikasi != null && file_exists($path_verifikasi)) {
						unlink($path_verifikasi);
					}
				}

				$this->ModelPengaduan->removeData([
					'aduan_id' => $this->input->post("aduan_id")
				]);
			}
			catch (\Exception $e) {
	            log_message('error', $e->getMessage());
	            $message["message"] = "Terjadi masalah menghapus data, silahkan coba lagi";
	            $message["success"] = false;
	            $status = 400;
	        }
	        return $this->output->set_status_header($status)
	        ->set_content_type('application/json')
	        ->set_output(json_encode($message));
		}

		public function store(){
			if(!$this->session->userdata('is_login')){
				redirect('/', 'refresh');
			}
			$message = [
				"message" => "Data pengaduan telah berhasil disimpan.",
				"data" => null,
				"success" => true,
			];
			$status = 200;

			try{
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size'] = 2048;
				$config['encrypt_name'] = true;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('aduan_gambar'))
				{
					$status = 400;
						$message["message"] = "Pastikan ukuran gambar dibawah 2MB dengan format .jpg atau .png";
						$message["success"] = false;

						return $this->output->set_status_header($status)
				->set_content_type('application/json')
				->set_output(json_encode($message));
				}

				$upload_data = $this->upload->data();
				$pic = $this->handlePic($this->input->post("pic_id"));

				$this->ModelPengaduan->insertData([
					"aduan_perihal" => $this->input->post("aduan_perihal"),
					"aduan_tanggal" => $this->input->post("aduan_tanggal"),
					"aduan_pemohon" => $this->input->post("aduan_pemohon"),
					"aduan_fitur" => $this->input->post("aduan_fitur"),
					"aduan_status" => $this->input->post("aduan_status"),
					"aduan_keterangan" => $this->input->post("aduan_keterangan"),
					"aduan_gambar" => $upload_data["file_name"],
					"media_id" => $this->input->post("media_id"),
					"sosmed_link" => $this->input->post("sosmed_link"),
					"pic_id" => $pic,
				]);
			}
			catch (\Exception $e) {
	            log_message('error', $e->getMessage());
	            $message["message"] = "Terjadi masalah saat memproses data, silahkan coba lagi";
	            $message["success"] = false;
	            $status = 400;
	        }

			return $this->output->set_status_header($status)
	        ->set_content_type('application/json')
	        ->set_output(json_encode($message));
		}

		private function handlePic($name){
			$find = $this->ModelPic->getData([
				"pic_nama" => $name
			])->result();

			if(count($find) == 0){
				$this->ModelPic->insertData([
					"pic_nama" => $name
				]);

				$find = $this->ModelPic->getData([
					"pic_nama" => $name
				])->result();
			}
			return $find[0]->pic_id;
		}
	}
?>
