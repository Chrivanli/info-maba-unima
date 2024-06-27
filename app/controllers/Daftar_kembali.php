<?php 

class Daftar_kembali extends Controller{
	public function index(){
		$data['judul'] 			= "Info Maba UNIMA - Daftar Kembali";
		$data['page'] 			= "mhs-reg";
		$data['lastYear']		= $this->model('Daftar_kembali_model')->getLastYear() ?? date('Y');
		$data['getJK']			= $this->model('Daftar_kembali_model')->getRowJenisKelamin($data['lastYear'], '', 'nama_fakultas','');
		$data['getMhs'] 		= $this->model('Daftar_kembali_model')->getMhs5y('','nama_fakultas','');
		$data['getDASulut']		= $this->model('Daftar_kembali_model')->getRowDaerahAsal5y('71', '','99');
		$data['getDANotSulut']	= $this->model('Daftar_kembali_model')->getRowDaerahAsal5y('', '71','99');
		$data['getMhsLast']		= $this->model('Daftar_kembali_model')->getMhsLast($data['lastYear']);
		$data['S01'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03']			= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('daftar-kembali/index', $data);
		$this->view('templates/footer');
	}
	public function maba_daftar_kembali(){
		$data['judul'] 		= "Daftar Kembali - Data Maba";
		$data['page'] 		= "mhs-reg";
		$data['getYear']	= $this->model('Daftar_kembali_model')->getYear();
		$lastYear			= $this->model('Daftar_kembali_model')->getLastYear() ?? date('Y');
		$data['y_post'] 	= isset($_POST['tahun']) ? $_POST['tahun'] : $lastYear;
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getRowS1'] 	= $this->model('Daftar_kembali_model')->getMhs($data['y_post'],'S1',$data['kolom'],$data['fakultas']);
		$data['getRowD3'] 	= $this->model('Daftar_kembali_model')->getMhs($data['y_post'],'D3',$data['kolom'],$data['fakultas']);
		$data['getRowFak']	= $this->model('Daftar_kembali_model')->getRowFak($data['y_post']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('daftar-kembali/maba-daftar-kembali', $data);
		$this->view('templates/footer');
	}
	public function maba_daftar_kembali_5y(){
		$data['judul'] 		= "Daftar Kembali - Data Maba 5 Tahun";
		$data['page'] 		= "mhs-reg";
		$data['y_last'] 	= isset($_POST['tahun']) ? $_POST['tahun'] : 5;
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getMhs5y'] 	= $this->model('Daftar_kembali_model')->getMhs5y('','nama_fakultas','');
		$data['getMhs5yS1'] = $this->model('Daftar_kembali_model')->getMhs5y('S1',$data['kolom'],$data['fakultas']);
		$data['getMhs5yD3'] = $this->model('Daftar_kembali_model')->getMhs5y('D3',$data['kolom'],$data['fakultas']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('daftar-kembali/maba-daftar-kembali-5y', $data);
		$this->view('templates/footer');
	}
	public function jenis_kelamin(){
		$data['judul'] 		= "Daftar Kembali - Data Maba Berdasarkan Jenis Kelamin";
		$data['page'] 		= "mhs-reg";
		$data['getYear']	= $this->model('Daftar_kembali_model')->getYear();
		$lastYear			= $this->model('Daftar_kembali_model')->getLastYear() ?? date('Y');
		$data['y_post'] 	= isset($_POST['tahun']) ? $_POST['tahun'] : $lastYear;
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getJKS1']	= $this->model('Daftar_kembali_model')->getRowJenisKelamin($data['y_post'], 'S1',$data['kolom'],$data['fakultas']);
		$data['getJKD3'] 	= $this->model('Daftar_kembali_model')->getRowJenisKelamin($data['y_post'], 'D3',$data['kolom'],$data['fakultas']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('daftar-kembali/jenis-kelamin-daftar-kembali', $data);
		$this->view('templates/footer');
	}
	public function jenis_kelamin_5y(){
		$data['judul'] 		= "Daftar Kembali - Data Maba Berdasarkan Jenis Kelamin 5 Tahun";
		$data['page'] 		= "mhs-reg";
		$data['y_last'] 	= isset($_POST['tahun']) ? $_POST['tahun'] : 5;
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['seleksi'] 	= isset($_POST['seleksi']) ? $_POST['seleksi'] : '';
		$data['getJK5yS1'] 	= $this->model('Daftar_kembali_model')->getRowJenisKelamin5y('S1',$data['kolom'],$data['fakultas'],$data['seleksi']);
		$data['getJK5yD3'] 	= $this->model('Daftar_kembali_model')->getRowJenisKelamin5y('D3',$data['kolom'],$data['fakultas'],$data['seleksi']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['getSeleksi']	= $this->model('Action_model')->getSeleksi();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('daftar-kembali/jenis-kelamin-daftar-kembali-5y', $data);
		$this->view('templates/footer');
	}
	public function daerah_asal(){
		$data['judul'] 			= "Daftar Kembali - Data Maba Berdasarkan Daerah Asal";
		$data['page'] 			= "mhs-reg";
		$data['getYear']		= $this->model('Daftar_kembali_model')->getYear();
		$lastYear				= $this->model('Daftar_kembali_model')->getLastYear() ?? date('Y');
		$data['y_post'] 		= isset($_POST['tahun']) ? $_POST['tahun'] : $lastYear;
		$data['getDASulut'] 	= $this->model('Daftar_kembali_model')->getRowDaerahAsal($data['y_post'], '71', '','99');
		$data['getDANotSulut'] 	= $this->model('Daftar_kembali_model')->getRowDaerahAsal($data['y_post'], '', '71','99');
		$data['getDA'] 			= $this->model('Daftar_kembali_model')->getRowDaerahAsal($data['y_post'], '','','');
		$data['S01'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('daftar-kembali/daerah-asal-daftar-kembali', $data);
		$this->view('templates/footer');
	}
	public function daerah_asal_5y(){
		$data['judul'] 			= "Daftar Kembali - Data Maba Berdasarkan Daerah Asal 5 Tahun";
		$data['page'] 			= "mhs-reg";
		$data['y_last'] 		= isset($_POST['tahun']) ? $_POST['tahun'] : 5;
		$data['getDASulut5y'] 	= $this->model('Daftar_kembali_model')->getRowDaerahAsal5y('71', '','99');
		$data['getDANotSulut5y']= $this->model('Daftar_kembali_model')->getRowDaerahAsal5y('', '71','99');
		$data['getDA5y'] 		= $this->model('Daftar_kembali_model')->getRowDaerahAsal5y('','','');
		$data['S01'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('daftar-kembali/daerah-asal-daftar-kembali-5y', $data);
		$this->view('templates/footer');
	}
	public function total(){
		$data['judul'] 		= "Daftar Kembali - Total Data Maba";
		$data['page'] 		= "mhs-reg";
		$data['y_last'] 	= isset($_POST['tahun']) ? $_POST['tahun'] : 7;
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getTotalS1'] = $this->model('Daftar_kembali_model')->getTotal('S1',$data['kolom'],$data['fakultas']);
		$data['getTotalD3'] = $this->model('Daftar_kembali_model')->getTotal('D3',$data['kolom'],$data['fakultas']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('daftar-kembali/total-daftar-kembali', $data);
		$this->view('templates/footer');
	}
}

