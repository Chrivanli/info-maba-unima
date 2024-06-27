<?php 

class Register extends Controller{
	public function index(){
		$data['judul'] = "Info Maba UNIMA - Register";
		$data['page'] = "Register";
		$this->view('register/index', $data);
	}
	public function checkUser(){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$hashed = password_hash($password, PASSWORD_DEFAULT);
		if($this->model('Register_model')->check_user($username,$email) > 0){
			Flasher::setFlash('This User Already Exists', 'Gagal', 'fas fa-check-circle', 'danger');
			header('Location: ' . BASEURL . '/register');
			exit;
		}else{
			$this->model('Register_model')->insertUser($username,$email,$hashed);
			Flasher::setFlash('User Ditambahkan', 'Sukses', 'fas fa-check-circle', 'success');
			header('Location: ' . BASEURL . '/register');
			exit;
		}
	}
	public function tambahUsers(){
		if ($this->model('Register_model')->tambahDataUsers($_POST) > 0) {
			Flasher::setFlash('Data Mahasiswa Berhasil Ditambahkan', 'Sukses', 'fas fa-check-circle', 'success');
			header('Location: ' . BASEURL . '/register');
			exit;
		} else {
			Flasher::setFlash('Data Mahasiswa Gagal Ditambahkan', 'Gagal', 'fas fa-times-circle', 'danger');
			header('Location: ' . BASEURL . '/register');
			exit;
		}
	}
}
