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
                <li class="breadcrumb-item "><a href="<?= BASEURL; ?>/rekap_nim" class="link">Rekap NIM</a></li>
                <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/rekap_nim/jenis_kelamin" class="link">Jenis Kelamin - Tahun <?=$data['y_post']?></a></li>
            </ol>
    </div>
    <div class="container-fluid px-4">
        <div class="col mt-3">
            <div class="card mb-1 animate__animated animate__fadeIn">
                <div class="card-header text-light ">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col">
                            <h5 class="card-title text-center mb-0">JENIS KELAMIN - TAHUN <?=$data['y_post']?></h5>
                        </div>
                        <div class="col-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-light px-5 py-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-1 mb-3 h-50">
                <div class="col-12 col-md-6">
                    <div class="card animate__animated animate__fadeInLeft">
                        <div class="card-body pt-0" style="height: 265px;">
                            <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadpieChart" 
                                download="PieChart Jenis Kelamin Maba Rekap NIM Tahun <?=$data['y_post']?>.png" href="">
                                <i data-feather="download" style="width: 80%;"></i>
                            </a> 
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card animate__animated animate__fadeInRight">
                        <div class="card-body pt-0" style="height: 265px;">
                            <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadbarChart" 
                                download="BarChart jenis kelamin Maba Rekap NIM Tahun <?=$data['y_post']?>.png" href="">
                                <i data-feather="download" style="width: 80%;"></i>
                            </a> 
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 animate__animated animate__fadeIn">
                <div class="card-header text-light">
                    <h5 class="card-title"><i data-feather="file-text"></i> Rekap <?=$kolom?> Strata 1</h5>
                </div>
                <div class="card-body">
                    <?php require 'table/data-jenis-kelamin-s1-rekap-nim.php' ?>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header text-light">
                    <h5 class="card-title"><i data-feather="file-text"></i> Rekap <?=$kolom?> Diploma 3</h5>
                </div>
                <div class="card-body">
                    <?php require 'table/data-jenis-kelamin-d3-rekap-nim.php' ?>
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
      <form id="myForm" method="POST" action="<?= BASEURL; ?>/rekap_nim/jenis_kelamin">
        <div class="modal-body">
            <div class="row col mb-4">
                <div class="col-8">
                    <label for="exampleFormControlInput1" class="form-label">Berdasarkan Data</label>
                    <select id="kolom" name="kolom" class="form-select form-select" aria-label="Default select example">
                        <option value="nama_jurusan">Program Studi</option>
                        <option value="nama_fakultas" >Fakultas</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="exampleFormControlInput1" class="form-label">Tahun</label>
                    <select name="tahun" class="text-center form-select form-select" aria-label="Default select example">
                        <option hidden value=""><?=$data['y_post']?></option>
                        <?php foreach ($data['getYear'] as $row):?>
                        <option value="<?=  $row['tahun'] ?>" <?php if($data['y_post']==$row['tahun']){echo 'selected';} ?>> <?=  $row['tahun'] ?></option>
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
    const ctx = document.getElementById('pieChart');
        new Chart(ctx, {
        type: 'pie',
        data : {
            labels: ['Laki-Laki', 'Perempuan'],
            datasets: [{
            label: 'Total',
            data: [   
                        '<?=$jumlahS1TotalL+$jumlahD3TotalL?>',
                        '<?=$jumlahS1TotalP+$jumlahD3TotalP?>'
                    ],
            backgroundColor: ['rgba(41, 128, 185, 0.5)',
                            'rgba(252, 105, 214, 0.5)'],
            borderColor: ['rgb(41, 128, 185)',
                            'rgb(252, 105, 214)'],
            fill: false,
            tension: 0.2
            }]
        },
        options: {
            maintainAspectRatio : false,
            responsive: true,
            plugins: {
                legend: {
                    position: 'left',
                },
                title: {
                    display: true,
                    text: 'Total Jenis kelamin'
                }
                }
        }
        });

    const ctx_2 = document.getElementById('barChart');
    new Chart(ctx_2, {
            type: 'bar',
            data: {
            labels: ['<?=$data['S01']?>', 
                     '<?=$data['S02']?>', 
                     '<?=$data['S03']?>'],
            datasets: [{
                label: 'Laki - Laki',
                data: [
                    '<?=$jumlahS1S01L+$jumlahD3S01L?>',
                    '<?=$jumlahS1S02L+$jumlahD3S02L?>',
                    '<?=$jumlahS1S03L+$jumlahD3S03L?>'
                    ],
                backgroundColor: [  'rgba(41, 128, 185, 0.5)',
                                    'rgba(41, 128, 185, 0.5)',
                                    'rgba(41, 128, 185, 0.5)'],
                borderColor: [  'rgb(41, 128, 185)',
                                'rgb(41, 128, 185)',
                                'rgb(41, 128, 185)',],
                borderWidth: 1
                },
                {
                label: 'Perempuan',
                data: [  
                    '<?=$jumlahS1S01P+$jumlahD3S01P?>',
                    '<?=$jumlahS1S02P+$jumlahD3S02P?>',
                    '<?=$jumlahS1S03P+$jumlahD3S03P?>'
                        ],
                backgroundColor: [  'rgba(252, 105, 214, 0.5)',
                                    'rgba(252, 105, 214, 0.5)',
                                    'rgba(252, 105, 214, 0.5)'],
                borderColor: [  'rgb(252, 105, 214)',
                                'rgb(252, 105, 214)',
                                'rgb(252, 105, 214)'],
                borderWidth: 1
                }]
                },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Berdasarkan Jalur Masuk'
                    }
                },
                scales: {
                    y: {
                    beginAtZero: true
                    },
                }
            }
        });
</script>
<script>
        //Download Chart Image
        document.getElementById("downloadpieChart").addEventListener('click', function(){
        var url_base64jp = document.getElementById("pieChart").toDataURL("image/png");
        var a =  document.getElementById("downloadpieChart");
        a.href = url_base64jp;
        });

        document.getElementById("downloadbarChart").addEventListener('click', function(){
        var url_base64jp = document.getElementById("barChart").toDataURL("image/png");
        var a =  document.getElementById("downloadbarChart");
        a.href = url_base64jp;
        });
</script>