<?php 

class Lulus_Seleksi extends Controller{
	public function index(){
		$data['judul'] 			= "Info Maba UNIMA - Lulus Seleksi";
		$data['page'] 			= "mhs-pass";
		$data['lastYear']		= $this->model('Lulus_seleksi_model')->getLastYear() ?? date('Y');
		$data['getJK']			= $this->model('Lulus_seleksi_model')->getRowJenisKelamin($data['lastYear'], '', 'nama_fakultas','');
		$data['getMhs'] 		= $this->model('Lulus_seleksi_model')->getMhs5y('','nama_fakultas','');
		$data['getDASulut'] 	= $this->model('Lulus_seleksi_model')->getRowDaerahAsal5y('71', '','99');
		$data['getDANotSulut']	= $this->model('Lulus_seleksi_model')->getRowDaerahAsal5y('', '71','99');
		$data['getMhsLast']		= $this->model('Lulus_seleksi_model')->getMhsLast($data['lastYear']);
		$data['S01'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03']			= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('lulus-seleksi/index', $data);
		$this->view('templates/footer');
	}
	public function maba_lulus_seleksi(){
		$data['judul'] 		= "Lulus Seleksi - Data Maba";
		$data['page'] 		= "mhs-pass";
		$data['getYear']	= $this->model('Lulus_seleksi_model')->getYear();
		$lastYear			= $this->model('Lulus_seleksi_model')->getLastYear() ?? date('Y');
		$data['y_post'] 	= isset($_POST['tahun']) ? $_POST['tahun'] : $lastYear;
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getRowS1'] 	= $this->model('Lulus_seleksi_model')->getMhs($data['y_post'],'S1',$data['kolom'],$data['fakultas']);
		$data['getRowD3'] 	= $this->model('Lulus_seleksi_model')->getMhs($data['y_post'],'D3',$data['kolom'],$data['fakultas']);
		$data['getRowFak']	= $this->model('Lulus_seleksi_model')->getRowFak($data['y_post']);
		$data['getFakultas']=  $this->model('Action_model')->getFakultas();
		$data['S01'] 		=  $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		=  $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		=  $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('lulus-seleksi/maba-lulus-seleksi', $data);
		$this->view('templates/footer');
	}
	public function maba_lulus_seleksi_5y(){
		$data['judul'] 		= "Lulus Seleksi - Data Maba 5 Tahun";
		$data['page'] 		= "mhs-pass";
		$data['y_last'] 	= isset($_POST['tahun']) ? $_POST['tahun'] : 5;
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getMhs5y'] 	=  $this->model('Lulus_seleksi_model')->getMhs5y('','nama_fakultas','');
		$data['getMhs5yS1'] =  $this->model('Lulus_seleksi_model')->getMhs5y('S1',$data['kolom'],$data['fakultas']);
		$data['getMhs5yD3'] =  $this->model('Lulus_seleksi_model')->getMhs5y('D3',$data['kolom'],$data['fakultas']);
		$data['getFakultas']=  $this->model('Action_model')->getFakultas();
		$data['S01'] 		=  $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		=  $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		=  $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('lulus-seleksi/maba-lulus-seleksi-5y', $data);
		$this->view('templates/footer');
	}

	public function jenis_kelamin(){
		$data['judul'] 		= "Lulus Seleksi - Data Maba Berdasarkan Jenis Kelamin";
		$data['page'] 		= "mhs-pass";
		$data['getYear']	= $this->model('Lulus_seleksi_model')->getYear();
		$lastYear			= $this->model('Lulus_seleksi_model')->getLastYear() ?? date('Y');
		$data['y_post'] 	= isset($_POST['tahun']) ? $_POST['tahun'] : $lastYear;
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getJKS1'] 	= $this->model('Lulus_seleksi_model')->getRowJenisKelamin($data['y_post'],'S1',$data['kolom'],$data['fakultas']);
		$data['getJKD3'] 	= $this->model('Lulus_seleksi_model')->getRowJenisKelamin($data['y_post'],'D3',$data['kolom'],$data['fakultas']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('lulus-seleksi/jenis-kelamin-lulus-seleksi', $data);
		$this->view('templates/footer');
	}

	public function jenis_kelamin_5y(){
		$data['judul'] 		= "Lulus Seleksi - Data Maba Berdasarkan Jenis Kelamin 5 Tahun";
		$data['page'] 		= "mhs-pass";
		$data['y_last'] 	= isset($_POST['tahun']) ? $_POST['tahun'] : 5;
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['seleksi'] 	= isset($_POST['seleksi']) ? $_POST['seleksi'] : '';
		$data['getJK5yS1'] 	= $this->model('Lulus_seleksi_model')->getRowJenisKelamin5y('S1',$data['kolom'],$data['fakultas'],$data['seleksi']);
		$data['getJK5yD3']	= $this->model('Lulus_seleksi_model')->getRowJenisKelamin5y('D3',$data['kolom'],$data['fakultas'],$data['seleksi']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['getSeleksi']	= $this->model('Action_model')->getSeleksi();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('lulus-seleksi/jenis-kelamin-lulus-seleksi-5y', $data);
		$this->view('templates/footer');
	}
	public function daerah_asal(){
		$data['judul'] 			= "Lulus Seleksi - Data Maba Berdasarkan Daerah Asal";
		$data['page'] 			= "mhs-pass";
		$data['getYear']		= $this->model('Lulus_seleksi_model')->getYear();
		$lastYear				= $this->model('Lulus_seleksi_model')->getLastYear() ?? date('Y');
		$data['y_post'] 		= isset($_POST['tahun']) ? $_POST['tahun'] : $lastYear;
		$data['getDASulut'] 	= $this->model('Lulus_seleksi_model')->getRowDaerahAsal($data['y_post'], '71', '','99');
		$data['getDANotSulut']	= $this->model('Lulus_seleksi_model')->getRowDaerahAsal($data['y_post'], '', '71','99');
		$data['getDA'] 			= $this->model('Lulus_seleksi_model')->getRowDaerahAsal($data['y_post'], '','','');
		$data['S01'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('lulus-seleksi/daerah-asal-lulus-seleksi', $data);
		$this->view('templates/footer');
	}
	public function daerah_asal_5y(){
		$data['judul'] 			= "Lulus Seleksi - Data Maba Berdasarkan Daerah Asal 5 Tahun";
		$data['page'] 			= "mhs-pass";
		$data['y_last'] 		= isset($_POST['tahun']) ? $_POST['tahun'] : 5;
		$data['getDASulut5y'] 	= $this->model('Lulus_seleksi_model')->getRowDaerahAsal5y('71','','99');
		$data['getDANotSulut5y']= $this->model('Lulus_seleksi_model')->getRowDaerahAsal5y('','71','99');
		$data['getDA5y'] 		= $this->model('Lulus_seleksi_model')->getRowDaerahAsal5y('','','');
		$data['S01'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 			= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('lulus-seleksi/daerah-asal-lulus-seleksi-5y', $data);
		$this->view('templates/footer');
	}
	public function total(){
		$data['judul'] 		= "Lulus Seleksi - Total Data Maba";
		$data['page'] 		= "mhs-pass";
		$data['y_last'] 	= isset($_POST['tahun']) ? $_POST['tahun'] : 7;
		$data['kolom'] 		= isset($_POST['kolom']) ? $_POST['kolom'] : 'nama_jurusan';
		$data['fakultas'] 	= isset($_POST['fakultas']) ? $_POST['fakultas'] : '';
		$data['getTotalS1'] = $this->model('Lulus_seleksi_model')->getTotal('S1',$data['kolom'],$data['fakultas']);
		$data['getTotalD3'] = $this->model('Lulus_seleksi_model')->getTotal('D3',$data['kolom'],$data['fakultas']);
		$data['getFakultas']= $this->model('Action_model')->getFakultas();
		$data['S01'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S01');
		$data['S02'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S02');
		$data['S03'] 		= $this->model('Seleksi_kode')->getKodeSeleksi('S03');
		$this->view('templates/header', $data);
		$this->view('lulus-seleksi/total-lulus-seleksi', $data);
		$this->view('templates/footer');
	}

}