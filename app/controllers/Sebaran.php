<?php 

class Sebaran extends Controller{
	public function index(){
		$data['judul'] 	= "Info Maba UNIMA - Sebaran Mahasiswa Baru";
        $data['page']   = "sebaran";
		$data['prov'] 	= $this->model('Sebaran_model')->getAllProvinsi();
		$this->view('templates/header', $data);
		$this->view('sebaran/index', $data);
		$this->view('templates/footer');
	}

}
