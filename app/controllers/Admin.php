<?php 

class Admin extends Controller{
	public function index(){
		$data['judul'] = "Admin - Dashboard";
		$data['page'] = "Home";
		$data['lastYear']		= $this->model('Lulus_seleksi_model')->getLastYear() ?? date('Y');
		$data['getPassed']		= $this->model('Lulus_seleksi_model')->getMhsLast($data['lastYear']);
		$data['getRegist']		= $this->model('Daftar_kembali_model')->getMhsLast($data['lastYear']);
		$data['getNimLast']			= $this->model('Rekap_nim_model')->getMhsLast($data['lastYear']);
        $data['getAllPassed']    = $this->model('Admin_model')->getAllPassedNow($data['lastYear']);
        $data['getAllRegist']    = $this->model('Admin_model')->getAllRegistNow($data['lastYear']);
        $data['pmb']    = $this->model('Admin_model')->getPMB($data['lastYear']);
		$data['getVerif']    = $this->model('Admin_model')->getVerif($data['lastYear']);
        $data['getNim']    = $this->model('Admin_model')->getNim($data['lastYear']);
        $data['getBayar']    = $this->model('Admin_model')->getBayar($data['lastYear']);
        $data['getKipk']    = $this->model('Admin_model')->getKipk($data['lastYear']);
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->admin('templates/admin-header', $data);
		$this->admin('admin/index', $data);
		$this->admin('templates/footer');
	}
}
