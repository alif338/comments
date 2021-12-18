<?php
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
			$data["pic"] = $this->ModelPic->getData([]);
			$data["media"] = $this->ModelMedia->getData([]);
			$data["active"] = "pengaduan";
			$data["js"] = "pengaduan/js-form";
			$data["content"] = "pengaduan/form";
			$this->load->view('templates/content', $data);
		}

		public function show(){
			$data["pengaduan"] = $this->ModelPengaduan->getData([]);
			$data["pic"] = $this->ModelPic->getData([]);
			$data["media"] = $this->ModelMedia->getData([]);
			$data["active"] = "pengaduan-show";
			$data["js"] = "pengaduan/js-show";
			$data["content"] = "pengaduan/show";
			$this->load->view('templates/content', $data);
		}

		public function store(){
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

				$this->ModelPengaduan->insertData([
					"aduan_perihal" => $this->input->post("aduan_perihal"),
					"aduan_tanggal" => $this->input->post("aduan_tanggal"),
					"aduan_pemohon" => $this->input->post("aduan_pemohon"),
					"aduan_fitur" => $this->input->post("aduan_fitur"),
					"aduan_status" => $this->input->post("aduan_status"),
					"aduan_keterangan" => $this->input->post("aduan_keterangan"),
					"aduan_gambar" => $upload_data["file_name"],
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
