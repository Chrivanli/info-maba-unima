<main>
    <div class="col py-3 d-none d-sm-block sub-nav-bg">
            <ol class="breadcrumb mb-1 px-3 fs-6 fw-semibold">
                <li class="breadcrumb-item "><a href="<?=BASEURL;?>" class="link">Beranda</a></li>
                <li class="breadcrumb-item "><a href="<?=BASEURL;?>/rekap_nim" class="link">Rekap NIM</a></li>
                <li class="breadcrumb-item"><a href="<?=BASEURL;?>/rekap_nim/daerah_asal" class="link">Daerah Asal - Tahun <?= $data['y_post'] ?></a></li>
            </ol>
    </div>
    <div class="container-fluid px-4">
        <div class="col mt-3">
            <div class="card mb-1 animate__animated animate__fadeIn">
                <div class="card-header text-light ">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col">
                            <h5 class="card-title text-center mb-0">DAERAH ASAL - TAHUN <?= $data['y_post'] ?></h5>
                        </div>
                        <div class="col-2">
                            <form id="myForm" method="POST" action="<?= BASEURL; ?>/rekap_nim/daerah_asal">
                                <select name="tahun" class="pilih text-center form-select form-select-sm" aria-label="Default select example">
                                    <option hidden value=""><?=$data['y_post']?></option>
                                    <?php foreach ($data['getYear'] as $row):?>
                                    <option value="<?=  $row['tahun'] ?>" <?php if($data['y_post']==$row['tahun']){echo 'selected';} ?>>Tahun <?=  $row['tahun'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-1 mb-3 h-50">
                <div class="col-md-6 col-12">
                    <div class="card animate__animated animate__fadeInLeft">
                        <div class="card-body pt-0" style="height: 265px;">
                            <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadpolarAreaChart" 
                                download="PolarAreaChart Perbandingan Maba Diluar Sulut Rekap NIM Tahun <?= $data['y_post'] ?>.png" href="">
                                <i data-feather="download" style="width: 80%;"></i>
                            </a> 
                            <canvas id="polarAreaChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card animate__animated animate__fadeInRight">
                        <div class="card-body pt-0" style="height: 265px;">
                            <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadbarChart" 
                                download="BarChart Daerah Asal Maba Rekap NIM Berdasarkan Jalur Pendaftaran Tahun <?= $data['y_post'] ?>.png" href="">
                                <i data-feather="download" style="width: 80%;"></i>
                            </a> 
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 animate__animated animate__fadeIn">
                <div class="card-header text-light">
                    <h5 class="card-title"><i data-feather="file-text"></i> Rekap Provinsi Indonesia</h5>
                </div>
                <div class="card-body">
                    <?php require 'table/data-daerah-asal-rekap-nim.php' ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php 
$jumlahSulut          = 0;
$jumlahSulutS01       = 0;
$jumlahSulutS02       = 0;
$jumlahSulutS03       = 0;
$jumlahNotSulut       = 0;
$jumlahNotSulutS01    = 0;
$jumlahNotSulutS02    = 0;
$jumlahNotSulutS03    = 0;
foreach($data['getDASulut'] as $row):
    $jumlahSulut    += ($row['total_S01']+$row['total_S02']+$row['total_S03']);
    $jumlahSulutS01 += $row['total_S01'];
    $jumlahSulutS02 += $row['total_S02'];
    $jumlahSulutS03 += $row['total_S03'];
endforeach;
foreach($data['getDANotSulut'] as $row):
    $jumlahNotSulut    += ($row['total_S01']+$row['total_S02']+$row['total_S03']);
    $jumlahNotSulutS01 += $row['total_S01'];
    $jumlahNotSulutS02 += $row['total_S02'];
    $jumlahNotSulutS03 += $row['total_S03'];
endforeach;
?>
<script>
    //Chart
    const ctx = document.getElementById('polarAreaChart');
        new Chart(ctx, {
        type: 'pie',
        data : {
            labels: ['Sulawesi Utara', 'Provinsi Lainnya'],
            datasets: [{
            label: 'Total',
            data: [   
                        '<?= $jumlahSulut ?>',
                        '<?= $jumlahNotSulut ?>'
                    ],
            backgroundColor: ['rgba(41, 128, 185, 0.5)',
                            'rgba(192, 57, 43, 0.5)'],
            borderColor: ['rgb(41, 128, 185)',
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
                    text: 'Perbandingan Mahasiswa Baru Diluar Sulut'
                }
                }
        }
        });

    const ctx_2 = document.getElementById('barChart');
    new Chart(ctx_2, {
            type: 'bar',
            data: {
            labels: ['<?= $data['S01'] ?>', '<?= $data['S02'] ?>', '<?= $data['S03'] ?>'],
            datasets: [{
                label: 'Sulawesi Utara',
                data: [
                    '<?= $jumlahSulutS01 ; ?>',
                    '<?= $jumlahSulutS02 ; ?>',
                    '<?= $jumlahSulutS03 ; ?>'
                    ],
                backgroundColor: [  'rgba(41, 128, 185, 0.5)',
                                    'rgba(41, 128, 185, 0.5)',
                                    'rgba(41, 128, 185, 0.5)'],
                borderColor: [  'rgb(41, 128, 185)',
                                'rgb(41, 128, 185)',
                                'rgb(41, 128, 185)'],
                borderWidth: 1
                },
                {
                label: 'Provinsi Lainnya',
                data: [
                    '<?= $jumlahNotSulutS01 ; ?>',
                    '<?= $jumlahNotSulutS02 ; ?>',
                    '<?= $jumlahNotSulutS03 ; ?>'
                    ],
                backgroundColor: [  'rgba(192, 57, 43, 0.5)',
                                    'rgba(192, 57, 43, 0.5)',
                                    'rgba(192, 57, 43, 0.5)'],
                borderColor: [  'rgb(192, 57, 43)',
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
                        text: 'Berdasarkan Jalur Pendaftaran'
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
        document.getElementById("downloadpolarAreaChart").addEventListener('click', function(){
        var url_base64jp = document.getElementById("polarAreaChart").toDataURL("image/png");
        var a =  document.getElementById("downloadpolarAreaChart");
        a.href = url_base64jp;
        });

        document.getElementById("downloadbarChart").addEventListener('click', function(){
        var url_base64jp = document.getElementById("barChart").toDataURL("image/png");
        var a =  document.getElementById("downloadbarChart");
        a.href = url_base64jp;
        });
</script>