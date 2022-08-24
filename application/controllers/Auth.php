<?php
	defined('BASEPATH') OR die('No direct script access allowed');
	class Auth extends CI_Controller {
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
			if($this->session->userdata('is_login')){
				redirect('/dashboard', 'refresh');
			}
			$data["pic"] = $this->ModelPic->getData([])->result();
			$data["active"] = "dashboard";
			$data["content"] = "dashboard/main";
			$data["js"] = "dashboard/js-main";
			$this->load->view('auth/login', $data);
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect('/', 'refresh');

		}

		public function verify(){
			$message = [
				"message" => "Kombinasi username & password tidak sesuai.",
				"data" => null,
				"success" => false,
			];
			$status = 400;
			try{
				$u = $this->input->post("username");
				$p = $this->input->post("password");
				
				if($u == "admin" && $p == "admin123"){
					$status = 200;
					$message["message"] = "Ok";
					$profil = $this->ModelProfile->getProfil()->result();
					$this->session->set_userdata('is_login', true);
					$this->session->set_userdata('profil', strval($profil[0]->nama));
				}
			}
			catch (\Exception $e) {
	            log_message('error', $e->getMessage());
	            $message["message"] = "Server sedang sibuk, silahkan coba lagi";
	            $message["success"] = false;
	            $status = 400;
	        }
	        return $this->output->set_status_header($status)
	        ->set_content_type('application/json')
	        ->set_output(json_encode($message));
		}
	}
?>
