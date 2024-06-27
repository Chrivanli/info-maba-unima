<?php 

class Home extends Controller{
	public function index(){
		$data['judul'] = "Info Maba UNIMA - Beranda";
		$data['page'] = "Home";
		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}
