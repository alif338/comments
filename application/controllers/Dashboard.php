<?php
	class Dashboard extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->model("Penduduk/ModelPenduduk");
			$this->load->model("Penduduk/ModelKeluarga");

			if (!AuthUser(array("admin", "operator"))) {
				redirect('login/denied', 'refresh');
			}
		}

		public function index() {
			$data["active"] = "dashboard";
			$data["content"] = "dashboard/main";
			$data["count_penduduk"] = $this->ModelPenduduk->JumlahPenduduk();
			$data["count_keluarga"] = $this->ModelKeluarga->JumlahKeluarga();
			$this->load->view('templates/content', $data);
		}
	}
?>
