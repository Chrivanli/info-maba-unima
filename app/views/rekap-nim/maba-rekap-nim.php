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
                <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/rekap_nim/maba_rekap_nim" class="link">Jalur Pendaftaran - Tahun <?= $data['y_post']; ?></a></li>
            </ol>
    </div>

    <div class="container-fluid">
        <div class="col mt-3">
            <div class="card mb-1 animate__animated animate__fadeIn">
                <div class="card-header text-light ">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col">
                            <h5 class="card-title text-center mb-0">JALUR PENDAFTARAN - TAHUN <?=$data['y_post']?></h5>
                        </div>
                        <div class="col-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-light px-5 py-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-1 mb-3">
                <div class="col-12 col-md-6">
                    <div class="card animate__animated animate__fadeInLeft">
                        <div class="card-body pt-0" style="height: 265px;">
                            <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadPolarAreaPmb" 
                                download="PolarAreaChart Maba Daftar Kembali Tahun <?=$data['y_post']?>.png" href="">
                                <i data-feather="download" style="width: 80%;"></i>
                            </a> 
                            <canvas id="PolarAreaPmb"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card animate__animated animate__fadeInRight">
                        <div class="card-body pt-0" style="height: 265px;">
                            <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadBarPmb" 
                                download="BarChart Maba Daftar Kembali Berdasarkan Fakultas Tahun <?=$data['y_post']?>.png" href="">
                                <i data-feather="download" style="width: 80%;"></i>
                            </a> 
                            <canvas id="BarPmb"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 animate__animated animate__fadeIn">
                <div class="card-header text-light">
                    <h5 class="card-title"><i data-feather="file-text"></i> Rekap <?=$kolom?> Strata 1</h5>
                </div>
                <div class="card-body">
                    <?php require_once 'table/data-maba-s1-rekap-nim.php' ?>
                </div>
            </div>
            <div class="card mb-2 animate__animated animate__fadeIn">
                <div class="card-header text-light">
                    <h5 class="card-title"><i data-feather="file-text"></i> Rekap <?=$kolom?> Diploma 3</h5>
                </div>
                <div class="card-body">
                    <?php require_once 'table/data-maba-d3-rekap-nim.php' ?>
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
      <form id="myForm" method="POST" action="<?= BASEURL; ?>/rekap_nim/maba_rekap_nim">
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
    const ctx = document.getElementById('PolarAreaPmb');
        new Chart(ctx, {
        type: 'polarArea',
        data : {
            labels: [   '<?=$data['S01']?>', 
                        '<?=$data['S02']?>', 
                        '<?=$data['S03']?>'],
            datasets: [{
            label: 'Total',
            data: [   
                        '<?=$jumlahS1S01+$jumlahD3S01?>',
                        '<?=$jumlahS1S02+$jumlahD3S02?>',
                        '<?=$jumlahS1S03+$jumlahD3S03?>',
                    ],
            backgroundColor: ['rgba(41, 128, 185, 0.5)',
                            'rgba(241, 196, 15, 0.5)',
                            'rgba(192, 57, 43, 0.5)'],
            borderColor: ['rgb(41, 128, 185)',
                            'rgb(241, 196, 15)',
                            'rgb(192, 57, 43)' ],
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
                    text: 'Jalur Pendaftaran'
                }
                }
        }
        });

    const ctx_2 = document.getElementById('BarPmb');
    new Chart(ctx_2, {
            type: 'bar',
            data: {
            labels: [<?php
                        foreach($data['getRowFak'] as $row):
                        echo "'".$row['fakultas']."',";
                            endforeach;
                    ?>
                    ],
            datasets: [{
                label: '<?=$data['S01']?>',
                data: [
                        <?php
                        foreach($data['getRowFak'] as $row):
                            echo "'".$row['total_S01']."',";
                        endforeach;
                        ?>
                    ],
                backgroundColor: [  'rgba(41, 128, 185, 0.5)',
                                    'rgba(41, 128, 185, 0.5)',
                                    'rgba(41, 128, 185, 0.5)',
                                    'rgba(41, 128, 185, 0.5)',
                                    'rgba(41, 128, 185, 0.5)',
                                    'rgba(41, 128, 185, 0.5)',
                                    'rgba(41, 128, 185, 0.5)'],
                borderColor: [  'rgb(41, 128, 185)',
                                'rgb(41, 128, 185)',
                                'rgb(41, 128, 185)',
                                'rgb(41, 128, 185)',
                                'rgb(41, 128, 185)',
                                'rgb(41, 128, 185)',
                                'rgb(41, 128, 185)',],
                borderWidth: 1
                },
                {
                label: '<?=$data['S02']?>',
                data: [
                    <?php
                        foreach($data['getRowFak'] as $row):
                            echo "'".$row['total_S02']."',";
                        endforeach;
                        ?>
                    ],
                backgroundColor: [  'rgba(241, 196, 15, 0.5)',
                                    'rgba(241, 196, 15, 0.5)',
                                    'rgba(241, 196, 15, 0.5)',
                                    'rgba(241, 196, 15, 0.5)',
                                    'rgba(241, 196, 15, 0.5)',
                                    'rgba(241, 196, 15, 0.5)',
                                    'rgba(241, 196, 15, 0.5)'],
                borderColor: [  'rgb(241, 196, 15)',
                                'rgb(241, 196, 15)',
                                'rgb(241, 196, 15)',
                                'rgb(241, 196, 15)',
                                'rgb(241, 196, 15)',
                                'rgb(241, 196, 15)',
                                'rgb(241, 196, 15)'],
                borderWidth: 1
                },
                {
                label: '<?=$data['S03']?>',
                data: [
                    <?php
                        foreach($data['getRowFak'] as $row):
                            echo "'".$row['total_S03']."',";
                        endforeach;
                        ?>
                    ],
                backgroundColor: [  'rgba(192, 57, 43, 0.5)',
                                    'rgba(192, 57, 43, 0.5)',
                                    'rgba(192, 57, 43, 0.5)',
                                    'rgba(192, 57, 43, 0.5)',
                                    'rgba(192, 57, 43, 0.5)',
                                    'rgba(192, 57, 43, 0.5)',
                                    'rgba(192, 57, 43, 0.5)'],
                borderColor: [  'rgb(192, 57, 43)',
                                'rgb(192, 57, 43)',
                                'rgb(192, 57, 43)',
                                'rgb(192, 57, 43)',
                                'rgb(192, 57, 43)',
                                'rgb(192, 57, 43)',
                                'rgb(192, 57, 43)'],
                borderWidth: 1
                }]
                },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Berdasarkan Fakultas'
                    }
                },
                scales: {
                    y: {
                    beginAtZero: true
                    },
                }
            }
        });
        //Download Chart Image
        document.getElementById("downloadPolarAreaPmb").addEventListener('click', function(){
        var url_base64jp = document.getElementById("PolarAreaPmb").toDataURL("image/png");
        var a =  document.getElementById("downloadPolarAreaPmb");
        a.href = url_base64jp;
        });

        document.getElementById("downloadBarPmb").addEventListener('click', function(){
        var url_base64jp = document.getElementById("BarPmb").toDataURL("image/png");
        var a =  document.getElementById("downloadBarPmb");
        a.href = url_base64jp;
        });
</script>