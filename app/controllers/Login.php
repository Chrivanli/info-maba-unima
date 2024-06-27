<?php 

class Login extends Controller{


	public function index(){
		$data['judul'] = "Info Maba UNIMA - Login";
		$data['page'] = "Login";
		$this->admin('login/index', $data);
	}
	public function loginUser(){
		$username	= $_POST['username'];
		$password	= $_POST['password'];
		$data = $this->model('Login_model')->getUser($username);
		session_start();
		if($username==$data['username'] & password_verify($password, $data['password'])){
			$_SESSION['username'] = $data['username'];
			header("Location:". BASEURL . "/admin");
		}else{
			Flasher::setFlash('Username dan Password Salah!', 'Gagal', 'alert-triangle', 'danger');
			header('Location: ' . BASEURL . '/login');
			exit;
		}
	}
	public function logout() {

        session_destroy();
        
        // Redirect ke halaman login
        header("Location:". BASEURL . "/home");
        exit();
    }
}
