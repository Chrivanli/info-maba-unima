<?php 
if($data['kolom'] != 'S01' OR 'S02' OR 'S03'){
    $kolom = 'all';
}else{
    $kolom = 'false';
}
?>
<main>
    <div class="col mb-3 py-3 d-none d-sm-block sub-nav-bg">
        <ol class="breadcrumb mb-1 px-3 fs-6 fw-semibold">
            <li class="breadcrumb-item "><a href="<?= BASEURL; ?>/admin" class="link">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/kelola_maba" class="link">Kelola Data Mahasiswa Baru</a></li>
        </ol>
    </div>
    <div class="container-fluid px-4 mt-3">
    <?php Flasher::flash(); ?>
        <div class="card mb-3 col-12 shadow-sm animate__animated animate__fadeIn">
            <div class="card-header">
                <form method="POST" action="<?= BASEURL; ?>/kelola_maba/index">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <button type="submit" name="submit" value="S"  class="<?php if($data['kolom']=='S'){echo 'active';} ?> nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" aria-current="true">Semua Seleksi</button>
                    </li>
                    <li class="nav-item">
                        <button type="submit" name="submit" value="S01" class="<?php if($data['kolom']=='S01'){echo 'active';} ?> nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= $data['S01']?></button>
                    </li>
                    <li class="nav-item">
                        <button type="submit" name="submit" value="S02" class="<?php if($data['kolom']=='S02'){echo 'active';} ?> nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= $data['S02']?></button>
                    </li>
                    <li class="nav-item">
                        <button type="submit" name="submit" value="S03" class="<?php if($data['kolom']=='S03'){echo 'active';} ?> nav-link link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><?= $data['S03']?></button>
                    </li>
                </ul>
                </form>
            </div>
            <div class="card-body p-3 ">
                <table  id="table" class="display table table-bordered" style="width: 100%; font-size: small; border: 1px">
                    <thead class="align-middle">
                        <tr>
                            <th class="text-center" rowspan="2">No.</th>
                            <th class="text-center" rowspan="2">Tahun</th>
                            <th class="text-center" colspan="3"><?php if($data['kolom']=='S'){echo 'Seluruh Seleksi';}else{echo $data[$data['kolom']];} ?></th>
                            <th class="text-center" rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th class="text-center">Lulus</th>
                            <th class="text-center">Daftar</th>
                            <th class="text-center">NIM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                          foreach($data['getAll'] as $row):
                            $tahun = $row['tahun'];
                            $passed      = $row['passed'];
                            $regist  = $row['regist'];
                            $nim    = $row['nim']
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $tahun ?></td>
                            <td class="text-center"><?= $passed ?></td>
                            <td class="text-center"><?= $regist ?></td>
                            <td class="text-center"><?= $nim ?></td>
                            <td class="text-center">
                                <a href="" type="button" class="btn btn-danger p-1 modalHapus" data-bs-toggle="modal" data-link="<?=$data['kolom']?>"
                                    data-id="<?= $tahun ?>" data-seleksi="<?= $data['kolom'] ?>" data-title="<?= $data[$data['kolom']];?>"  data-bs-target="#formHapus">
                                    <i data-feather="trash-2" style="width: 18px; height: 18px;"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="formHapus" aria-hidden="true" aria-labelledby="formHapusLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="formHapusLabel">Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formModalHapus" action="<?= BASEURL; ?>/kelola_maba/hapusData" method="post">
            <div class="modal-body">
                <div class="p-3 mb-3 bg-warning-subtle text-warning-emphasis border-start border-5 border-warning">
                    <p  class="fst-italic mb-0">
                        Peringatan!<br>
                        Seluruh data <strong>Lulus Seleksi, Daftar Kembali, dan Rekap NIM</strong> akan dihapus! <br>
                    </p>
                </div>
                    <p> Apakah anda yakin menghapus data ini?</p>
                <input type="hidden" name="id" id="id" class="form-control" value="" >
                <input type="hidden" name="seleksi" id="seleksi" class="form-control" value="" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 70px;">Tidak</button>
                <button type="button" class="btn btn-primary" id="importSubmit" name="importSubmit" style="width: 70px;" data-bs-target="#confirm-submit" data-bs-toggle="modal">Ya</button>
            </div>
        </div>
            </form>
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
                <div class="p-3 mb-3 bg-warning-subtle text-warning-emphasis border-start border-5 border-warning">
                    <p  class="fst-italic mb-0">
                        Peringatan!<br>
                        Seluruh data <strong>Lulus Seleksi, Daftar Kembali, dan Rekap NIM</strong> akan dihapus! <br>
                    </p>
                </div>
			    <h5 id="modal_body"></h6> 
               Apakah anda yakin ingin menghapus data ini?
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-target="#importData" data-bs-toggle="modal">Tidak</button>
				<a href="#" id="submit" class="btn btn-success" data-bs-target="#loading" data-bs-toggle="modal">Iya</a>
			</div>
		</div>
	</div>
</div>
</main>
<script>
$(document).ready(function () {
    $('#table').DataTable({
        scrollX: true,
        searching: false,
        paging: false,
        ordering: true,
        info: false,
    });

    $("#importSubmit").click(function () { 
		var id = $("#id").val(); 
		var seleksi = $("#seleksi").val(); 
        if (seleksi === 'S01'){
            seleksi = '<?=$data['S01']?>';
        }else if(seleksi === 'S02') {
            seleksi = '<?=$data['S02']?>';
        }else if(seleksi === 'S03') {
            seleksi = '<?=$data['S03']?>';
        }else{seleksi = 'Semua Seleksi'}
		var str = "Data : " + seleksi  + "<br> Tahun : " + id; 
	$("#modal_body").html(str); 
	}); 
	$('#submit').click(function(){
	    $('#formModalHapus').submit();
	});
});
</script>