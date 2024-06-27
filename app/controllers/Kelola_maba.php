<?php 
class Kelola_maba extends Controller{
	public function index(){
		$data['judul'] 		= "Admin - Kelola Maba";
        $data['page']   	= "Kelola";
		$data['kolom'] 		= isset($_POST['submit']) ? $_POST['submit'] : 'S';
		$data['getAll']		= $this->model('Kelola_model')->getAll($data['kolom']);
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03']		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
        $data['S']   		= $data['S01'].', '.$data['S02'].', dan '.$data['S03'];
		$this->admin('templates/admin-header', $data);
		$this->admin('kelola-maba/index', $data);
		$this->admin('templates/footer');
	}
	public function hapusData(){
		$data 		= $this->model('Seleksi_kode')->getKodeSeleksi($_POST['seleksi']);
		if($_POST['seleksi']=='S'){$data = 'Seluruh Seleksi';}
		if ($this->model('Kelola_model')->hapusDataMhs($_POST['id'], $_POST['seleksi']) > 0) {
			Flasher::setFlash('Data Maba '.$data.' Berhasil Dihapus', 'Sukses', 'check-circle', 'success');
			header('Location: ' . BASEURL . '/kelola_maba/index');
			exit;
		} else {
			Flasher::setFlash('Data Maba Gagal Dihapus', 'Gagal', 'alert-triangle', 'danger');
			header('Location: ' . BASEURL . '/kelola_maba/index');
			exit;
		}
	}
}
