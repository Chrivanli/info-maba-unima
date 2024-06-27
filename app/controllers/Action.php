<?php 

class Action extends Controller{
	public function index(){
		$data['judul'] = "Admin - Kelola Seleksi";
        $data['page']   = "seleksi";
		$data['seleksi'] 	= $this->model('Action_model')->getSeleksi();
		$this->admin('templates/admin-header', $data);
		$this->admin('action/index', $data);
		$this->admin('templates/footer');
	}
    public function detail(){
		echo json_encode($this->model('Action_model')->getSeleksiID($_POST['id']));
	}
    public function ubah(){
		if($this->model('Action_model')->ubahDataSeleksi($_POST) > 0){
			Flasher::setFlash('Data Seleksi Berhasil Diubah', 'Sukses', 'check-circle', 'success');
			header('Location: ' . BASEURL . '/action');
			exit;
		} else {
			Flasher::setFlash('Data Seleksi Gagal Diubah', 'Gagal', 'alert-triangle', 'danger');
			header('Location: ' . BASEURL . '/action');
			exit;
		}
	}

}
