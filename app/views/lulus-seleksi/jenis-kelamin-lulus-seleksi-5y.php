<?php 
$kolom = 'Program Studi';
if($data['kolom']=='nama_jurusan'){
    $kolom = 'Program Studi';
}elseif($data['kolom']=='nama_fakultas'){
    $kolom = 'Fakultas';
}
?>
<main>
    <div class="col py-3 d-none d-sm-block sub-nav-bg">
            <ol class="breadcrumb mb-1 px-3 fs-6 fw-semibold">
                <li class="breadcrumb-item "><a href="<?= BASEURL; ?>" class="link">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/lulus_seleksi" class="link">Lulus Seleksi</a></li>
                <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/lulus_seleksi/jenis_kelamin_5y" class="link">Jenis Kelamin - <?=$data['y_last']?> Tahun Terakhir</a></li>
            </ol>
    </div>
    <div class="container-fluid px-4">
        <div class="col mt-3">
            <div class="card mb-1 animate__animated animate__fadeIn">
                <div class="card-header text-light ">
                    <div class="row">
                        <div class="col-0 col-sm-2"></div>
                        <div class="col">
                            <h5 class="card-title text-center mb-0">JENIS KELAMIN - <?=$data['y_last']?> TAHUN TERAKHIR</h5>
                        </div>
                        <div class="col-12 col-sm-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-light px-5 py-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-1 mb-3">
                <div class="col">
                    <div class="card animate__animated animate__fadeInLeft">
                        <div class="card-body pt-0"  style="height: 265px;">
                            <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadLineChart" 
                                download="LineChart Maba Jenis Kelamin 5 Tahun Terakhir.png" href="">
                                <i data-feather="download" style="width: 80%;"></i>
                            </a>
                            <canvas id="LineChart" height="70"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 animate__animated animate__fadeIn">
                <div class="card-header text-light">
                    <h5 class="card-title"><i data-feather="file-text"></i> Rekap <?= $kolom ?> Strata 1</h5>
                </div>
                <div class="card-body">
                    <?php require 'table/data-jenis-kelamin-s1-lulus-seleksi-5y.php' ?>
                </div>
            </div>
            <div class="card mb-3 animate__animated animate__fadeIn">
                <div class="card-header text-light">
                    <h5 class="card-title"><i data-feather="file-text"></i> Rekap <?= $kolom ?> Diploma 3</h5>
                </div>
                <div class="card-body">
                    <?php require 'table/data-jenis-kelamin-d3-lulus-seleksi-5y.php' ?>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Filter</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="myForm" method="POST" action="<?= BASEURL; ?>/lulus_seleksi/jenis_kelamin_5y">
        <div class="modal-body">
            <div class="row col mb-2">
                <div class="col-7 mb-2">
                    <label for="exampleFormControlInput1" class="form-label">Berdasarkan Data</label>
                    <select id="kolom" name="kolom" class="form-select form-select" aria-label="Default select example">
                        <option value="nama_jurusan">Program Studi</option>
                        <option value="nama_fakultas" >Fakultas</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="exampleFormControlInput1" class="form-label">Tahun</label>
                    <select name="tahun" class="text-center form-select form-select" aria-label="Default select example">
                        <option value="5" <?php if($data['y_last']==5){echo 'selected';} ?>>5 Tahun Terakhir</option>
                        <option value="4" <?php if($data['y_last']==4){echo 'selected';} ?>>4 Tahun Terakhir</option>
                        <option value="3" <?php if($data['y_last']==3){echo 'selected';} ?>>3 Tahun Terakhir</option>
                        <option value="2" <?php if($data['y_last']==2){echo 'selected';} ?>>2 Tahun Terakhir</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="exampleFormControlInput1" class="form-label">Seleksi</label>
                    <select id="seleksi" name="seleksi" class="form-select form-select" aria-label="Default select example" >
                        <option value="">-Semua Seleksi-</option>
                        <?php foreach ($data['getSeleksi'] as $row):?>
                        <option value="<?=  $row['singkatan'] ?>" <?php if($data['seleksi']==$row['singkatan']){echo 'selected';} ?>><?=$row['nama_seleksi']?> (<?=$row['singkatan']?>)</option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <label for="exampleFormControlInput1" class="form-label">Fakultas</label>
            <div class="col">
                <select id="fakultas" name="fakultas" class="form-select form-select-sm" aria-label="Default select example" >
                    <option value="">-Tampilkan Semua-</option>
                    <?php foreach ($data['getFakultas'] as $row):?>
                    <option value="<?=  $row['fakultas'] ?>" <?php if($data['fakultas']==$row['fakultas']){echo 'selected';} ?>> FAKULTAS <?=  $row['nama_fakultas'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            <button type="submit" name="submit" class="btn btn-primary">Terapkan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</main>
<script>
    //Chart
    const ctx = document.getElementById('LineChart');
    new Chart(ctx, {
        type: 'line',
        data : {
            labels: [   '<?=date('Y')-4?>',
                        '<?=date('Y')-3?>',
                        '<?=date('Y')-2?>',
                        '<?=date('Y')-1?>',
                        '<?=date('Y')  ?>'
                    ],
            datasets: [{
            label: 'Laki-Laki',
            data: [   
                        '<?= $jumlahS1Tahun5L + $jumlahD3Tahun5L; ?>',
                        '<?= $jumlahS1Tahun4L + $jumlahD3Tahun4L; ?>',
                        '<?= $jumlahS1Tahun3L + $jumlahD3Tahun3L; ?>',
                        '<?= $jumlahS1Tahun2L + $jumlahD3Tahun2L; ?>',
                        '<?= $jumlahS1Tahun1L + $jumlahD3Tahun1L; ?>'
                    ],
            backgroundColor: ['rgba(41, 128, 185, 0.5)'],
            borderColor: ['rgb(41, 128, 185)'],
            fill: false,
            tension: 0.2
            },
            {
            label: 'Perempuan',
            data: [   
                        '<?= $jumlahS1Tahun5P + $jumlahD3Tahun5P; ?>',
                        '<?= $jumlahS1Tahun4P + $jumlahD3Tahun4P; ?>',
                        '<?= $jumlahS1Tahun3P + $jumlahD3Tahun3P; ?>',
                        '<?= $jumlahS1Tahun2P + $jumlahD3Tahun2P; ?>',
                        '<?= $jumlahS1Tahun1P + $jumlahD3Tahun1P; ?>'
                    ],
            backgroundColor: ['rgba(252, 105, 214, 0.5)'],
            borderColor: ['rgb(252, 105, 214)'],
            fill: false,
            tension: 0.2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                    title: {
                        display: true,
                        text: 'Jenis Kelamin 5 Tahun terakhir'
                    }
            },
            }
    });
        //Download Chart Image
        document.getElementById("downloadLineChart").addEventListener('click', function(){
        var url_base64jp = document.getElementById("LineChart").toDataURL("image/png");
        var a =  document.getElementById("downloadLineChart");
        a.href = url_base64jp;
        });
</script>