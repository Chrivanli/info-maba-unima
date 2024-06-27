<?php 

class Rekap extends Controller{
	public function index(){
		$data['judul'] = "Info Maba UNIMA - Rekap Total";
		$data['page'] 	= "rekap";
		$data['S01'] 	= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 	= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03']	= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('rekap/index', $data);
		$this->view('templates/footer');
	}
    public function maba_rekap(){
		$data['judul'] 		= "Rekap Total - Data Maba Berdasarkan Jalur Pendaftaran";
		$data['page'] 		= "rekap";
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getRekapS1']	= $this->model('Rekap_model')->getRekap('S1',$data['kolom'],$data['fakultas']);
		$data['getRekapD3']	= $this->model('Rekap_model')->getRekap('D3',$data['kolom'],$data['fakultas']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03']		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('rekap/maba-rekap', $data);
		$this->view('templates/footer');
	}
	public function rekap_jk(){
		$data['judul']		= "Rekap Total - Data Maba Berdasarkan Jenis Kelamin";
		$data['page'] 		= "rekap";
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getJKS1']	= $this->model('Rekap_model')->getJenisKelamin('S1',$data['kolom'],$data['fakultas']);
		$data['getJKD3']	= $this->model('Rekap_model')->getJenisKelamin('D3',$data['kolom'],$data['fakultas']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03']		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('rekap/jenis-kelamin-rekap', $data);
		$this->view('templates/footer');
	}
	public function total(){
		$data['judul']		= "Rekap Total - Data Total Penerimaan Mahasiswa Baru";
		$data['page'] 		= "rekap";
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getTotalS1']	= $this->model('Rekap_model')->getTotal('S1',$data['kolom'],$data['fakultas']);
		$data['getTotalD3']	= $this->model('Rekap_model')->getTotal('D3',$data['kolom'],$data['fakultas']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03']		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('rekap/total-rekap', $data);
		$this->view('templates/footer');
	}
}

