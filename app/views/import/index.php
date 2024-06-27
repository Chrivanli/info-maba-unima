<main>
	<div class="col mb-3 py-3 d-none d-sm-block sub-nav-bg">
		<ol class="breadcrumb mb-1 px-3 fs-6 fw-semibold">
			<li class="breadcrumb-item"><a href="<?= BASEURL ?>/admin" class="link">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/import" class="link">Import Data</a></li>
		</ol>
	</div>
	<div class="container-fluid px-4 mt-3">
	<?php Flasher::flash(); ?>
		<div class="card mb-1 shadow-sm animate__animated animate__fadeIn">
			<div class="card-header text-light">
				<h5 class="card-title text-center ps-3 m-0">IMPORT DATA PENERIMAAN MAHASISWA BARU</h5>
			</div>
		</div>
		<div class="col-12">
			<div class="card card-menu mb-1 col-12">
				<div class="card-body p-3 ">
					<div class="row">
						<div class="text-start col">
							<h4 class="text-center card-title mb-3 animate__animated animate__bounceInLeft animate__fast">-Lulus Seleksi-</h4>
							<div class="row">
								<?php foreach($data['lastUpPassed'] as $row): ?>
								<div class="col text-center">
									<div class="card text-light passed-bg animate__animated animate__bounceInLeft">
										<div class="card-body m-0">
											<P class="m-0"><?=$row['singkatan'].' '.$row['tahun']?></P>
											<h1 class="m-0"><?= number_format($row['total_mhs'])?></h1>
										</div>
										<div class="card-footer">
											<p class="m-0 p-0">
												<?=tgl_indo(date('Y-m-d', strtotime($row['last_update']))); ?>
											</p>
										</div>
									</div>
								</div>
								<?php endforeach ?>
								<div class="vr"></div>
								<div class="text-center col-3 align-self-center animate__animated animate__bounceInRight">
									<button type="button" class="col-12 btn btn-primary mb-1  modalUnggahPass" data-url="<?= BASEURL; ?>"
											data-bs-toggle="modal" data-bs-target="#importData" >Unggah Berkas Lulus Seleksi
									</button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="card card-menu mb-3 col-12">
				<div class="card-body p-3 ">
					<div class="row">
						<div class="text-start col">
							<h4 class="text-center card-title mb-3 animate__animated animate__bounceInLeft animate__fast">-Daftar Kembali-</h4>
							<div class="row">
								<?php foreach($data['lastUpRegist'] as $row): ?>
								<div class="col text-center">
									<div class="card text-light regist-bg animate__animated animate__bounceInLeft">
										<div class="card-body m-0">
											<P class="m-0"><?=$row['singkatan'].' '.$row['tahun']?></P>
											<h1 class="m-0"><?= number_format($row['total_mhs'])?></h1>
										</div>
										<div class="card-footer">
											<p class="m-0 p-0">
												<?=tgl_indo(date('Y-m-d', strtotime($row['last_update']))); ?>
											</p>
										</div>
									</div>
								</div>
								<?php endforeach ?>
								<div class="vr"></div>
								<div class="text-center col-3 align-self-center animate__animated animate__bounceInRight">
									<button type="button" class="col-12 btn btn-primary mb-1 modalUnggahReg" data-url="<?= BASEURL; ?>" 
									 		data-bs-toggle="modal" data-bs-target="#importData" >Unggah Berkas Daftar Kembali</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    <!-- MODAL-->
<div class="modal fade" id="importData" aria-hidden="true" aria-labelledby="importDataLabel" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">    
				<h1 class="modal-title fs-5" id="importDataLabel">Label Form</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="formModalAction" action="" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="p-3 mb-3 bg-warning-subtle text-warning-emphasis border-start border-5 border-warning">
						<p  class="fst-italic mb-0">
							Unggah file dalam bentuk <strong>CSV</strong><br>
							Ikuti format file template, sehingga dalam mengunggah data PMB bisa sukses.<br>
							File template  
							<a class="link-opacity-100 link-template fw-semibold" data-bs-target="#exampleTemplatePassed" data-bs-toggle="modal" href="#">Lulus Seleksi</a>
							dan 
							<a class="link-opacity-100 link-template fw-semibold" data-bs-target="#exampleTemplateRegist" data-bs-toggle="modal" href="#">Daftar Kembali</a>
							<br>
							Detail kolom "kd_seleksi" <a class="link-opacity-100 fw-semibold" href="<?= BASEURL; ?>/action"> klik disini!</a>
						</p>
					</div>
					<div class="mb-3">
						<div class="row">
							<div class="col-9">
								<input class="form-control" type="file" name="file" id="file" accept=".csv">
							</div>
							<div class="col">				
								<select required id="tahun" name="tahun" class=" text-center form-select" aria-label="Default select example">
								<?php
								for ($i = date('Y') + 1; $i >= date('Y') - 8; $i--) {
									$selected = ($i == date('Y')) ? 'selected' : '';
									echo "<option value='$i' $selected>$i</option>";
								}
								?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="importSubmit" name="importSubmit" class="btn btn-success" data-bs-target="#confirm-submit" data-bs-toggle="modal">Unggah</button>
				</div>
			</form>
		</div>
	</div>
</div>
	<div class="modal fade" id="exampleTemplatePassed" aria-hidden="true" aria-labelledby="exampleTemplatePassedLabel" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<div class="modal-content">
				<div class="modal-body">
					<div class="card mb-3 animate__animated animate__fadeIn">
						<div class="card-header text-light">
							<h5 class="card-title"><i data-feather="file-text"></i> File Template Lulus Seleksi</h5>
						</div>
						<div class="card-body">
							<?php require_once 'table/template-passed.php' ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-target="#importData" data-bs-toggle="modal">Kembali</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleTemplateRegist" aria-hidden="true" aria-labelledby="exampleTemplateRegistLabel" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<div class="modal-content">
				<div class="modal-body">
					
					<div class="card mb-3 animate__animated animate__fadeIn">
						<div class="card-header text-light">
							<h5 class="card-title"><i data-feather="file-text"></i> File Template Daftar Kembali</h5>
						</div>
						<div class="card-body">
							<?php require_once 'table/template-regist.php' ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-target="#importData" data-bs-toggle="modal">Kembali</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modals Alert -->
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                Konfirmasi
            </div>
            <div class="modal-body">
			<h5 id="modal_body"></h6> 
               Apakah anda yakin mengunggah file ini?
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-target="#importData" data-bs-toggle="modal">Tidak</button>
				<a href="#" id="submit" class="btn btn-success" data-bs-target="#loading" data-bs-toggle="modal">Iya</a>
			</div>
		</div>
	</div>
</div>
	<div class="modal fade" id="loading" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="d-flex justify-content-center">
					<div class="spinner-border mt-4" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					
				</div>
				<div class="modal-body text-center">
						Harap Tunggu, sedang mengunggah ...
				</div>
			</div>
		</div>
	</div>
</main>
<script type="text/javascript">
	$("#importSubmit").click(function () { 
		var file = $("#file").val(); 
		var nama = file.slice(12);
		var tahun = $("#tahun").val(); 
		var str = "File : " + nama  + "<br> Tahun : " + tahun; 
	$("#modal_body").html(str); 
	}); 
	$('#submit').click(function(){
	    $('#formModalAction').submit();
	});
</script>