<main>
        <div class="col mb-3 py-3 d-none d-sm-block sub-nav-bg">
        <ol class="breadcrumb mb-1 px-3 fs-6 fw-semibold">
            <li class="breadcrumb-item "><a href="<?= BASEURL; ?>" class="link">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/lulus_seleksi" class="link">Mahasiswa Baru Lulus Seleksi</a></li>
        </ol>
    </div>
    <div class="container-fluid px-4 mt-3">
        <div class="card mb-1 shadow-sm animate__animated animate__fadeIn">
            <div class="card-header text-light text-center">
                <h5 class="card-title ps-3 m-0">MAHASISWA BARU LULUS SELEKSI</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-9 mb-2" >
                <div class="card shadow-sm animate__animated animate__fadeInLeft">
                    <div class="row align-items-center p-3 mb-3">
                        <div class="col-12 col-md-5" >
                            <div class="col mb-2">
                                <canvas id="PieJK"></canvas>
                            </div>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-12 col-md-6">
                            <div class="col mb-2">
                                <canvas id="LinePmb"></canvas>
                            </div>
                            <br>
                            <div class="col mb-2">
                                <canvas id="LineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-2">
                <?php foreach($data['getMhsLast'] as $row): ?>
                <div class="col-12 mb-2 text-center">
                    <div class="card text-light passed-bg shadow-sm animate__animated animate__bounceInRight">
                        <div class="card-body m-0">
                            <h1 class="m-0" style="font-size: 60px;"><?= number_format($row['total'])?></h1>
                        </div>
                        <div class="card-footer">
                            <p class="m-0 p-0"><?=$row['singkatan'].' Tahun '.$data['lastYear'];?> 
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-menu mb-3 col-12 shadow-sm animate__animated animate__slideInLeft">
                    <div class="card-body p-3 ">
                        <h3 class="card-title">Jalur Pendaftaran</h3>
                        <p class="card-text">Berisi data rekap lulus seleksi berdasarkan jalur pendaftaran. Dibagi menjadi data 5 tahun terakhir dan data setiap tahun</p>
                        <div class="text-end">
                            <a href="<?= BASEURL; ?>/lulus_seleksi/maba_lulus_seleksi_5y" class="btn btn-primary  shadow-sm" style="width: 200px;">5 Tahun Terakhir</a>
                            <a href="<?= BASEURL; ?>/lulus_seleksi/maba_lulus_seleksi" class="btn btn-primary  shadow-sm" style="width: 200px;">Tahun <?=$data['lastYear']?></a>
                        </div>
                    </div>
                </div>
                <div class="card card-menu mb-3 col-12 shadow-sm animate__animated animate__slideInRight">
                    <div class="card-body p-3 ">
                        <h3 class="card-title">Jenis Kelamin</h3>
                        <p class="card-text">Berisi data rekap lulus seleksi berdasarkan jenis kelamin dari pendaftar. Dibagi menjadi data 5 tahun terakhir dan data setiap tahun</p>
                        <div class="text-end">
                            <a href="<?= BASEURL; ?>/lulus_seleksi/jenis_kelamin_5y" class="btn btn-primary  shadow-sm" style="width: 200px;">5 Tahun Terakhir</a>
                            <a href="<?= BASEURL; ?>/lulus_seleksi/jenis_kelamin" class="btn btn-primary  shadow-sm" style="width: 200px;">Tahun <?=$data['lastYear']?></a>
                        </div>
                    </div>
                </div>
                <div class="card card-menu mb-3 col-12 shadow-sm animate__animated animate__slideInLeft">
                    <div class="card-body p-3 ">
                        <h3 class="card-title">Daerah Asal</h3>
                        <p class="card-text">Berisi data rekap lulus seleksi berdasarkan daerah asal dari pendaftar. Dibagi menjadi data 5 tahun terakhir dan data setiap tahun</p>
                        <div class="text-end">
                            <a href="<?= BASEURL; ?>/lulus_seleksi/daerah_asal_5y" class="btn btn-primary  shadow-sm" style="width: 200px;">5 Tahun Terakhir</a>
                            <a href="<?= BASEURL; ?>/lulus_seleksi/daerah_asal" class="btn btn-primary  shadow-sm" style="width: 200px;">Tahun <?=$data['lastYear']?></a>
                        </div>
                    </div>
                </div>
                <div class="card card-menu mb-3 col-12 shadow-sm animate__animated animate__slideInRight">
                    <div class="card-body p-3 ">
                        <h3 class="card-title">Total</h3>
                        <p class="card-text">Berisi total rekap lulus seleksi</p>
                        <div class="text-end">
                            <a href="<?= BASEURL; ?>/lulus_seleksi/total" class="btn btn-primary  shadow-sm" style="width: 200px;">Total</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
   $mhsS01Tahun1 = 0;
   $mhsS01Tahun2 = 0;
   $mhsS01Tahun3 = 0;
   $mhsS01Tahun4 = 0;
   $mhsS01Tahun5  = 0;
   $mhsS02Tahun1 = 0;
   $mhsS02Tahun2 = 0;
   $mhsS02Tahun3 = 0;
   $mhsS02Tahun4 = 0;
   $mhsS02Tahun5  = 0;
   $mhsS03Tahun1 = 0;
   $mhsS03Tahun2 = 0;
   $mhsS03Tahun3 = 0;
   $mhsS03Tahun4 = 0;
   $mhsS03Tahun5  = 0;
   foreach($data['getMhs'] as $row):
    $mhsS01Tahun5 += $row['tahun5_S01'];
    $mhsS01Tahun4 += $row['tahun4_S01'];
    $mhsS01Tahun3 += $row['tahun3_S01'];
    $mhsS01Tahun2 += $row['tahun2_S01'];
    $mhsS01Tahun1 += $row['tahun1_S01'];
    $mhsS02Tahun5 += $row['tahun5_S02'];
    $mhsS02Tahun4 += $row['tahun4_S02'];
    $mhsS02Tahun3 += $row['tahun3_S02'];
    $mhsS02Tahun2 += $row['tahun2_S02'];
    $mhsS02Tahun1 += $row['tahun1_S02'];
    $mhsS03Tahun5 += $row['tahun5_S03'];
    $mhsS03Tahun4 += $row['tahun4_S03'];
    $mhsS03Tahun3 += $row['tahun3_S03'];
    $mhsS03Tahun2 += $row['tahun2_S03'];
    $mhsS03Tahun1 += $row['tahun1_S03'];
   endforeach;
   $genderL = 0;
   $genderP = 0;
   foreach($data['getJK'] as $row):
    $genderL     += ($row['total_S01L']+$row['total_S02L']+$row['total_S03L']);
    $genderP     += ($row['total_S01P']+$row['total_S02P']+$row['total_S03P']);
   endforeach;
   $sulutTahun1 = 0;
   $sulutTahun2 = 0;
   $sulutTahun3 = 0;
   $sulutTahun4 = 0;
   $sulutTahun5 = 0;
   foreach($data['getDASulut'] as $row):
    $sulutTahun1 += ($row['tahun1_S01']+$row['tahun1_S02']+$row['tahun1_S03']);
    $sulutTahun2 += ($row['tahun2_S01']+$row['tahun2_S02']+$row['tahun2_S03']);
    $sulutTahun3 += ($row['tahun3_S01']+$row['tahun3_S02']+$row['tahun3_S03']);
    $sulutTahun4 += ($row['tahun4_S01']+$row['tahun4_S02']+$row['tahun4_S03']);
    $sulutTahun5 += ($row['tahun5_S01']+$row['tahun5_S02']+$row['tahun5_S03']);
   endforeach;
   $notSulutTahun1 = 0;
   $notSulutTahun2 = 0;
   $notSulutTahun3 = 0;
   $notSulutTahun4 = 0;
   $notSulutTahun5 = 0;
   foreach($data['getDANotSulut'] as $row):
    $notSulutTahun1 += ($row['tahun1_S01']+$row['tahun1_S02']+$row['tahun1_S03']);
    $notSulutTahun2 += ($row['tahun2_S01']+$row['tahun2_S02']+$row['tahun2_S03']);
    $notSulutTahun3 += ($row['tahun3_S01']+$row['tahun3_S02']+$row['tahun3_S03']);
    $notSulutTahun4 += ($row['tahun4_S01']+$row['tahun4_S02']+$row['tahun4_S03']);
    $notSulutTahun5 += ($row['tahun5_S01']+$row['tahun5_S02']+$row['tahun5_S03']);
   endforeach;
?>
<script>
    //Chart
    const ctx = document.getElementById('LinePmb');
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
            label: '<?= $data['S01'] ?>',
            data: [   
                        '<?= $mhsS01Tahun5; ?>',
                        '<?= $mhsS01Tahun4; ?>',
                        '<?= $mhsS01Tahun3; ?>',
                        '<?= $mhsS01Tahun2; ?>',
                        '<?= $mhsS01Tahun1 ; ?>'
                    ],
            backgroundColor: ['rgba(41, 128, 185, 0.5)'],
            borderColor: ['rgb(41, 128, 185)'],
            fill: false,
            tension: 0.2
            },
            {
            label: '<?= $data['S02'] ?>',
            data: [   
                        '<?= $mhsS02Tahun5; ?>',
                        '<?= $mhsS02Tahun4; ?>',
                        '<?= $mhsS02Tahun3; ?>',
                        '<?= $mhsS02Tahun2; ?>',
                        '<?= $mhsS02Tahun1 ; ?>'
                    ],
            backgroundColor: ['rgba(241, 196, 15, 0.5)'],
            borderColor: ['rgb(241, 196, 15)'],
            fill: false,
            tension: 0.2
            },
            {
            label: '<?=  $data['S03'] ?>',
            data: [   
                        '<?= $mhsS03Tahun5; ?>',
                        '<?= $mhsS03Tahun4; ?>',
                        '<?= $mhsS03Tahun3; ?>',
                        '<?= $mhsS03Tahun2; ?>',
                        '<?= $mhsS03Tahun1 ; ?>'
                    ],
            backgroundColor: ['rgba(192, 57, 43, 0.5)'],
            borderColor: ['rgb(192, 57, 43)'],
            fill: false,
            tension: 0.2
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
            }
    });

    //Chart
    const ctx_2 = document.getElementById('PieJK');
    new Chart(ctx_2, {
    type: 'pie',
    data : {
        labels: ['Laki-Laki', 'Perempuan'],
        datasets: [{
        label: 'Total',
        data: [   
                    '<?= $genderL; ?>',
                    '<?= $genderP; ?>'
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
                text: 'Jenis Kelamin Tahun <?=$data['lastYear']?>'
            }
            }
    }
    });
    const ctx_3 = document.getElementById('LineChart');
    new Chart(ctx_3, {
        type: 'line',
        data : {
            labels: [   '<?=date('Y')-4?>',
                        '<?=date('Y')-3?>',
                        '<?=date('Y')-2?>',
                        '<?=date('Y')-1?>',
                        '<?=date('Y')  ?>'
                    ],
            datasets: [{
            label: 'Sulawesi Utara',
            data: [   
                        '<?= $sulutTahun5 ?>',
                        '<?= $sulutTahun4 ?>',
                        '<?= $sulutTahun3 ?>',
                        '<?= $sulutTahun2 ?>',
                        '<?= $sulutTahun1 ?>'
                    ],
            backgroundColor: ['rgba(41, 128, 185, 0.5)'],
            borderColor: ['rgb(41, 128, 185)'],
            fill: false,
            tension: 0.2
            },
            {
            label: 'Provinsi Lainnya',
            data: [   
                        '<?= $notSulutTahun5 ?>',
                        '<?= $notSulutTahun4 ?>',
                        '<?= $notSulutTahun3 ?>',
                        '<?= $notSulutTahun2 ?>',
                        '<?= $notSulutTahun1 ?>'
                    ],
            backgroundColor: ['rgba(192, 57, 43, 0.5)'],
            borderColor: ['rgb(192, 57, 43)'],
            fill: false,
            tension: 0.2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                    title: {
                        display: true,
                        text: 'Berdasarkan Daerah Asal'
                    }
            },
            }
    });
</script>