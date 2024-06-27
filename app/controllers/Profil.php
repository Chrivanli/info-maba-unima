<?php 

class Profil extends Controller{
	public function index(){
		$data['judul'] = "Admin - Profil";
        $data['page']   = "profil";
		$this->admin('templates/admin-header', $data);
		$this->admin('profil/index', $data);
		$this->admin('templates/footer');
	}
}
