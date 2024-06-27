<main>
    <div class="col py-3 d-none d-sm-block sub-nav-bg">
            <ol class="breadcrumb mb-1 px-3 fs-6 fw-semibold">
                <li class="breadcrumb-item "><a href="<?=BASEURL;?>" class="link">Beranda</a></li>
                <li class="breadcrumb-item "><a href="<?=BASEURL;?>/lulus_seleksi" class="link">Lulus Seleksi</a></li>
                <li class="breadcrumb-item"><a href="<?=BASEURL;?>/lulus_seleksi/daerah_asal_5y" class="link">Daerah Asal - <?=$data['y_last']?> Tahun Terakhir</a></li>
            </ol>
    </div>
    <div class="container-fluid px-4">
        <div class="col mt-3">
            <div class="card mb-1 animate__animated animate__fadeIn">
                <div class="card-header text-light">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col">
                            <h5 class="card-title text-center mb-0">DAERAH ASAL - <?=$data['y_last']?> TAHUN TERAKHIR</h5>
                        </div>
                        <div class="col-2">
                            <form id="myForm" method="POST" action="<?= BASEURL; ?>/lulus_seleksi/daerah_asal_5y">
                                <select name="tahun" class="pilih text-center form-select form-select-sm" aria-label="Default select example">
                                    <option value="5" <?php if($data['y_last']==5){echo 'selected';} ?>>5 Tahun Terakhir</option>
                                    <option value="4" <?php if($data['y_last']==4){echo 'selected';} ?>>4 Tahun Terakhir</option>
                                    <option value="3" <?php if($data['y_last']==3){echo 'selected';} ?>>3 Tahun Terakhir</option>
                                    <option value="2" <?php if($data['y_last']==2){echo 'selected';} ?>>2 Tahun Terakhir</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-1 mb-3">
                <div class="col-12">
                    <div class="card animate__animated animate__fadeInLeft">
                        <div class="card-body pt-0" style="height: 265px;">
                            <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadLineChart" 
                                download="PolarAreaChart Perbandingan Maba Diluar Sulut Lulus Seleksi 5 Tahun Terakhir.png" href="">
                                <i data-feather="download" style="width: 80%;"></i>
                            </a>
                            <canvas id="LineChart" height="70"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 animate__animated animate__fadeIn">
                <div class="card-header text-light">
                    <h5 class="card-title"><i data-feather="file-text"></i> Rekap Provinsi Indonesia</h5>
                </div>
                <div class="card-body">
                    <?php require 'table/data-daerah-asal-lulus-seleksi-5y.php' ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    $sulutS01Tahun1  = 0;
    $sulutS01Tahun2 = 0;
    $sulutS01Tahun3 = 0;
    $sulutS01Tahun4 = 0;
    $sulutS01Tahun5 = 0;
    $sulutTotalS01 = 0;

    $sulutS02Tahun1  = 0;
    $sulutS02Tahun2 = 0;
    $sulutS02Tahun3 = 0;
    $sulutS02Tahun4 = 0;
    $sulutS02Tahun5 = 0;
    $sulutTotalS02 = 0;

    $sulutS03Tahun1  = 0;
    $sulutS03Tahun2 = 0;
    $sulutS03Tahun3 = 0;
    $sulutS03Tahun4 = 0;
    $sulutS03Tahun5 = 0;
    $sulutTotalS03 = 0;

    $notSulutS01Tahun1  = 0;
    $notSulutS01Tahun2 = 0;
    $notSulutS01Tahun3 = 0;
    $notSulutS01Tahun4 = 0;
    $notSulutS01Tahun5 = 0;
    $notSulutTotalS01 = 0;

    $notSulutS02Tahun1  = 0;
    $notSulutS02Tahun2 = 0;
    $notSulutS02Tahun3 = 0;
    $notSulutS02Tahun4 = 0;
    $notSulutS02Tahun5 = 0;
    $notSulutTotalS02 = 0;
    
    $notSulutS03Tahun1  = 0;
    $notSulutS03Tahun2 = 0;
    $notSulutS03Tahun3 = 0;
    $notSulutS03Tahun4 = 0;
    $notSulutS03Tahun5 = 0;
    $notSulutTotalS03 = 0;

foreach($data['getDASulut5y'] as $row):
    $sulutS01Tahun5 += $row['tahun5_S01'] ;
    $sulutS01Tahun4 += $row['tahun4_S01'] ;
    $sulutS01Tahun3 += $row['tahun3_S01'] ;
    $sulutS01Tahun2 += $row['tahun2_S01'] ;
    $sulutS01Tahun1 += $row['tahun1_S01'] ;
    $sulutTotalS01  += ($row['tahun5_S01'] + $row['tahun4_S01'] + $row['tahun3_S01'] + $row['tahun2_S01'] + $row['tahun1_S01']);
    $sulutS02Tahun5 += $row['tahun5_S02'] ;
    $sulutS02Tahun4 += $row['tahun4_S02'] ;
    $sulutS02Tahun3 += $row['tahun3_S02'] ;
    $sulutS02Tahun2 += $row['tahun2_S02'] ;
    $sulutS02Tahun1 += $row['tahun1_S02'] ;
    $sulutTotalS02  += ($row['tahun5_S02'] + $row['tahun4_S02'] + $row['tahun3_S02'] + $row['tahun2_S02'] + $row['tahun1_S02']);
    $sulutS03Tahun5 += $row['tahun5_S03'] ;
    $sulutS03Tahun4 += $row['tahun4_S03'] ;
    $sulutS03Tahun3 += $row['tahun3_S03'] ;
    $sulutS03Tahun2 += $row['tahun2_S03'] ;
    $sulutS03Tahun1 += $row['tahun1_S03'] ;
    $sulutTotalS03  += ($row['tahun5_S03'] + $row['tahun4_S03'] + $row['tahun3_S03'] + $row['tahun2_S03'] + $row['tahun1_S03']);
endforeach;
foreach($data['getDANotSulut5y'] as $row):
    $notSulutS01Tahun5 += $row['tahun5_S01'] ;
    $notSulutS01Tahun4 += $row['tahun4_S01'] ;
    $notSulutS01Tahun3 += $row['tahun3_S01'] ;
    $notSulutS01Tahun2 += $row['tahun2_S01'] ;
    $notSulutS01Tahun1 += $row['tahun1_S01'] ;
    $notSulutTotalS01  += ($row['tahun5_S01'] + $row['tahun4_S01'] + $row['tahun3_S01'] + $row['tahun2_S01'] + $row['tahun1_S01']);
    $notSulutS02Tahun5 += $row['tahun5_S02'] ;
    $notSulutS02Tahun4 += $row['tahun4_S02'] ;
    $notSulutS02Tahun3 += $row['tahun3_S02'] ;
    $notSulutS02Tahun2 += $row['tahun2_S02'] ;
    $notSulutS02Tahun1 += $row['tahun1_S02'] ;
    $notSulutTotalS02  += ($row['tahun5_S02'] + $row['tahun4_S02'] + $row['tahun3_S02'] + $row['tahun2_S02'] + $row['tahun1_S02']);
    $notSulutS03Tahun5 += $row['tahun5_S03'] ;
    $notSulutS03Tahun4 += $row['tahun4_S03'] ;
    $notSulutS03Tahun3 += $row['tahun3_S03'] ;
    $notSulutS03Tahun2 += $row['tahun2_S03'] ;
    $notSulutS03Tahun1 += $row['tahun1_S03'] ;
    $notSulutTotalS03  += ($row['tahun5_S03'] + $row['tahun4_S03'] + $row['tahun3_S03'] + $row['tahun2_S03'] + $row['tahun1_S03']);
endforeach
?>
<script>
    //Chart
    const ctx = document.getElementById('LineChart');
    new Chart(ctx, {
        type: 'line',
        data : {
            labels: [   
                    '<?=date('Y')-4?>',
                    '<?=date('Y')-3?>',
                    '<?=date('Y')-2?>',
                    '<?=date('Y')-1?>',
                    '<?=date('Y')  ?>'
                    ],
            datasets: [{
            label: 'Sulawesi Utara',
            data: [   
                        '<?= $sulutS01Tahun5 + $sulutS02Tahun5 + $sulutS03Tahun5; ?>',
                        '<?= $sulutS01Tahun4 + $sulutS02Tahun4 + $sulutS03Tahun4; ?>',
                        '<?= $sulutS01Tahun3 + $sulutS02Tahun3 + $sulutS03Tahun3; ?>',
                        '<?= $sulutS01Tahun2 + $sulutS02Tahun2 + $sulutS03Tahun2; ?>',
                        '<?= $sulutS01Tahun1 + $sulutS02Tahun1 + $sulutS03Tahun1; ?>'
                    ],
            backgroundColor: ['rgba(41, 128, 185, 0.5)'],
            borderColor: ['rgb(41, 128, 185)'],
            fill: false,
            tension: 0.2
            },
            {
            label: 'Provinsi Lainnya',
            data: [   
                        '<?= $notSulutS01Tahun5 + $notSulutS02Tahun5 + $notSulutS03Tahun5; ?>',
                        '<?= $notSulutS01Tahun4 + $notSulutS02Tahun4 + $notSulutS03Tahun4; ?>',
                        '<?= $notSulutS01Tahun3 + $notSulutS02Tahun3 + $notSulutS03Tahun3; ?>',
                        '<?= $notSulutS01Tahun2 + $notSulutS02Tahun2 + $notSulutS03Tahun2; ?>',
                        '<?= $notSulutS01Tahun1 + $notSulutS02Tahun1 + $notSulutS03Tahun1; ?>'
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
                        text: 'Berdasarkan 5 Tahun Terakhir'
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