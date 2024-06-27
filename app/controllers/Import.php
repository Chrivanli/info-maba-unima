<?php 

class Import extends Controller{
	public function index(){
		$data['judul'] = "Admin - Import Data";
		$data['page'] = "Import";
		$data['lastUpPassed'] 		= $this->model('Import_model')->lastUpdatePassed();
		$data['lastUpRegist'] 		= $this->model('Import_model')->lastUpdateRegist();
		$this->admin('templates/admin-header', $data);
		$this->admin('import/index', $data);
		$this->admin('templates/footer');
	}

	public function uploadDataPassed(){
		// Tipe MIME yang diizinkan
		$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
		// Validasi apakah file yang dipilih adalah file CSV
		if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
			// Jika file diunggah
			if(is_uploaded_file($_FILES['file']['tmp_name'])){
				//validasi data
				$csvFile = fopen($_FILES['file']['tmp_name'], 'r'); 
				fgetcsv($csvFile);
				$flash	= false;
				$valid 	= false;
				$S01 	= false;
				$S02 	= false;
				$S03 	= false;
				while(($line = fgetcsv($csvFile)) !== FALSE){ 
					$jumlah_kolom = count($line);
					if($jumlah_kolom !== 10){
						$valid 	= false;
						$flash = 'gagal';
						break;
						}elseif($this->model('Import_model')->cekMabaPassed($line[0], $_POST['tahun']) > 0 ||
								$this->model('Import_model')->cekMabaPassed2($line[0], $_POST['tahun'], $line[1]) > 0){
							$valid 	= false;
							$flash = 'warning'; 
							break;
							}elseif($line[1] == 'S01'){
								$S01 = true;
								$valid = true;
								}elseif($line[1] == 'S02'){
									$S02 = true;
									$valid = true;
									}elseif($line[1] == 'S03'){
										$S03 = true;
										$valid = true;
										}else{
											$valid 	= false;
											$flash = 'gagal';
											break;
					}
				}
				fclose($csvFile);

				//jika validasi benar
				if($valid===true){
					// Hapus Data Sebelum Insert
					if($S01===true){
						$this->model('Import_model')->hapusDataPassed('S01', $_POST['tahun']);
					}
					if($S02===true){
						$this->model('Import_model')->hapusDataPassed('S02', $_POST['tahun']);
					}
					if($S03===true){
						$this->model('Import_model')->hapusDataPassed('S03', $_POST['tahun']);
					}
					//insert data
					$jumlahData =  0;
					$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
					fgetcsv($csvFile);
					while(($line = fgetcsv($csvFile)) !== FALSE){
						foreach ($line as $key => $value) {
							$line[$key] = !empty($value) ? $value : null;
						}
						$jumlahData += $this->model('Import_model')->importDataPassed($line, $_POST['tahun']);
					}
					fclose($csvFile);
					$flash = 'sukses';
				}
					switch ($flash) {
						  case 'gagal':
							Flasher::setFlash('File tidak sesuai! Silahkan ikuti intruksi dalam menggunggah', 'Gagal', 'alert-triangle', 'danger');
							header('Location: ' . BASEURL . '/import');
							exit;
						  break;
						  case 'warning':
							Flasher::setFlash('Terdapat data yang sama dengan data sebelumnya!', 'Gagal', 'alert-triangle', 'warning');
							header('Location: ' . BASEURL . '/import');
							exit;
						  break;
						  case 'sukses':
							Flasher::setFlash(number_format($jumlahData).' Data Mahasiswa Baru Lulus Seleksi Tahun '.$_POST['tahun'].' Berhasil Ditambahkan', 'Sukses', 'check-circle', 'success');
							header('Location: ' . BASEURL . '/import');
							exit;
						  break;
						default:
						Flasher::setFlash('Gagal mengimpor data!', 'Gagal', 'alert-triangle', 'danger');
						header('Location: ' . BASEURL . '/import');
						exit;
					}
			}else{
				Flasher::setFlash('Terjadi masalah, silakan coba lagi!', 'Sukses', 'alert-triangle', 'danger');
				header('Location: ' . BASEURL . '/import');
				exit;
			}
		}else{
			Flasher::setFlash('Tolong Unggah Berkas CVS!', 'Gagal', 'alert-triangle', 'danger');
			header('Location: ' . BASEURL . '/import');
			exit;
		}
	}

	public function uploadDataRegist(){
		// Tipe MIME yang diizinkan
		$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
		// Validasi apakah file yang dipilih adalah file CSV
		if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
			// Jika file diunggah
			if(is_uploaded_file($_FILES['file']['tmp_name'])){
				//validasi data
				$csvFile = fopen($_FILES['file']['tmp_name'], 'r'); 
				fgetcsv($csvFile);
				$flash	= false;
				$valid 	= false;
				$S01 	= false;
				$S02 	= false;
				$S03 	= false;
				while(($line = fgetcsv($csvFile)) !== FALSE){ 
					$jumlah_kolom = count($line);
					if($jumlah_kolom !== 13){
						$valid 	= false;
						$flash = 'gagal';
						break;
						}elseif($this->model('Import_model')->cekRelasi($line[0], $_POST['tahun']) == 0){
								$valid 	= false;
								$flash = 'relasi';
								break;
							}elseif($this->model('Import_model')->cekMabaRegist($line[0], $_POST['tahun']) > 0 ||
									$this->model('Import_model')->cekMabaRegist2($line[0], $_POST['tahun'], $line[1]) > 0){
									$valid 	= false;
									$flash = 'warning'; 
									break;
								}elseif($line[1] == 'S01'){
										$S01 = true;
										$valid = true;
									}elseif($line[1] == 'S02'){
											$S02 = true;
											$valid = true;
										}elseif($line[1] == 'S03'){
												$S03 = true;
												$valid = true;
											}else{
												$valid 	= false;
												$flash = 'gagal';
												break;
					}
				}
				fclose($csvFile);

				//jika validasi benar
				if($valid===true){
					// Hapus Data Sebelum Insert
					if($S01===true){
						$this->model('Import_model')->hapusDataRegist('S01', $_POST['tahun']);
					}
					if($S02===true){
						$this->model('Import_model')->hapusDataRegist('S02', $_POST['tahun']);
					}
					if($S03===true){
						$this->model('Import_model')->hapusDataRegist('S03', $_POST['tahun']);
					}
					//insert data
					$jumlahData =  0;
					$csvFile = fopen($_FILES['file']['tmp_name'], 'r');
					fgetcsv($csvFile);
					while(($line = fgetcsv($csvFile)) !== FALSE){
						foreach ($line as $key => $value) {
							$line[$key] = !empty($value) ? $value : null;
						}
						$jumlahData += $this->model('Import_model')->importDataRegist($line, $_POST['tahun']);
					}
					fclose($csvFile);
					$flash = 'sukses';
				}
					switch ($flash) {
						  case 'gagal':
							Flasher::setFlash('File tidak sesuai! Silahkan ikuti intruksi dalam menggunggah', 'Gagal', 'alert-triangle', 'danger');
							header('Location: ' . BASEURL . '/import');
							exit;
						  break;
						  case 'warning':
							Flasher::setFlash('Terdapat data yang sama dengan data sebelumnya!', 'Gagal', 'alert-triangle', 'warning');
							header('Location: ' . BASEURL . '/import');
							exit;
						  break;
						  case 'relasi':
							Flasher::setFlash('Data tidak sesuai dengan data Lulus Seleksi Tahun '.$_POST['tahun'].'!', 'Gagal', 'alert-triangle', 'warning');
							header('Location: ' . BASEURL . '/import');
							exit;
						  break;
						  case 'sukses':
							Flasher::setFlash(number_format($jumlahData).' Data Mahasiswa Baru Daftar Kembali Tahun '.$_POST['tahun'].' Berhasil Ditambahkan', 'Sukses', 'check-circle', 'success');
							header('Location: ' . BASEURL . '/import');
							exit;
						  break;
						default:
						Flasher::setFlash('Gagal mengimpor data!', 'Gagal', 'alert-triangle', 'danger');
						header('Location: ' . BASEURL . '/import');
						exit;
					}
			}else{
				Flasher::setFlash('Terjadi masalah, silakan coba lagi!', 'Sukses', 'alert-triangle', 'danger');
				header('Location: ' . BASEURL . '/import');
				exit;
			}
		}else{
			Flasher::setFlash('Tolong Unggah Berkas CVS!', 'Gagal', 'alert-triangle', 'danger');
			header('Location: ' . BASEURL . '/import');
			exit;
		}
	}
}