<main>
    <div class="container-fluid px-4 mt-3">
        <div class="card mb-3 shadow-sm animate__animated animate__fadeIn">
            <div class="card-header text-light text-center">
                <h5 class="card-title ps-3 m-0">REKAP PENERIMAAN MAHASISWA BARU TAHUN <?=$data['lastYear']?></h5>
            </div>
            <div class="card-body p-2">
                <div class="row mt-2 gx-3">
                    <div class="col">
                        <div class="row gx-2">
                            <h5 class="text-center">--- Lulus Seleksi ---</h5>
                            <?php foreach($data['getPassed'] as $row): ?>
                            <div class="col-12 col-md-4 mb-2 text-center">
                                <div class="card text-light passed-bg shadow-sm animate__animated animate__bounceInLeft">
                                    <div class="card-body m-0">
                                        <h1 class="m-0" style="font-size: 46px;"><?= number_format($row['total'])?></h1>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0 p-0" style="font-size: 15px;"><?=$row['singkatan']?> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <h5 class="text-center">--- Daftar Kembali ---</h5>
                            <?php foreach($data['getRegist'] as $row): ?>
                            <div class="col-12 col-md-4 mb-2 text-center">
                                <div class="card text-light regist-bg shadow-sm animate__animated animate__bounceInLeft animate__fast">
                                    <div class="card-body m-0">
                                        <h1 class="m-0" style="font-size: 46px;"><?= number_format($row['total'])?></h1>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0 p-0" style="font-size: 15px;"><?=$row['singkatan']?> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <h5 class="text-center">--- NIM ---</h5>
                            <?php foreach($data['getNimLast'] as $row): ?>
                            <div class="col-12 col-md-4 mb-2 text-center">
                                <div class="card text-light nim-bg shadow-sm animate__animated animate__bounceInLeft animate__faster">
                                    <div class="card-body m-0">
                                        <h1 class="m-0" style="font-size: 46px;"><?= number_format($row['total'])?></h1>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0 p-0" style="font-size: 15px;"><?=$row['singkatan']?> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 mb-2">
                        <div class="card animate__animated animate__fadeInRight">
                            <div class="card-body" >
                                <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadBarPmb" 
                                    download="Perbandingan Mendaftar Kembali Tahun <?=$data['lastYear']?>.png" href="">
                                    <i data-feather="download" style="width: 80%;"></i>
                                </a> 
                                <canvas id="BarPmb" height="350"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 shadow-sm animate__animated animate__fadeIn">
            <div class="card-header text-light text-center">
                <h5 class="card-title ps-3 m-0">REKAP DAFTAR KEMBALI DAN NIM TAHUN <?=$data['lastYear']?></h5>
            </div>
            <div class="card-body p-2">
                <div class="row mt-2 gx-3">
                    <div class="col-12 col-md-5 mb-2">
                        <div class="card animate__animated animate__fadeInLeft">
                            <div class="card-body" style="height: 265px;">
                                <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadPieChart" 
                                    download="Perbandingan Mendaftar Kembali Tahun <?=$data['lastYear']?>.png" href="">
                                    <i data-feather="download" style="width: 80%;"></i>
                                </a> 
                                <canvas id="PieChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row gx-2">
                            <div class="col-12 col-md-4 mb-2 text-center">
                                <div class="card text-light susc-bg shadow-sm animate__animated animate__bounceInRight animate__faster">
                                    <div class="card-body m-0">
                                        <h1 class="m-0" style="font-size: 46px;"><?= number_format($data['getVerif'])?></h1>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0 p-0" style="font-size: 15px;">Verifikasi
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-2  text-center">
                                <div class="card text-light susc-bg shadow-sm animate__animated animate__bounceInRight animate__fast">
                                    <div class="card-body m-0">
                                        <h1 class="m-0" style="font-size: 46px;"><?= number_format($data['getBayar'])?></h1>
                                    </div>
                                    <div class="card-footer" style="font-size: 15px;">Telah Bayar / Beasiswa
                                        <p class="m-0 p-0">
                                        </p>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-12 col-md-4 mb-2  text-center">
                                <div class="card text-light susc-bg shadow-sm animate__animated animate__bounceInRight">
                                    <div class="card-body m-0">
                                        <h1 class="m-0" style="font-size: 46px;"><?= number_format($data['getNim'])?></h1>
                                    </div>
                                    <div class="card-footer" style="font-size: 15px;">Mendapat NIM
                                        <p class="m-0 p-0">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-2 text-center">
                                <div class="card text-light warning-bg shadow-sm animate__animated animate__bounceInRight animate__faster">
                                    <div class="card-body m-0">
                                        <h1 class="m-0" style="font-size: 46px;"><?= number_format($data['getAllRegist']-$data['getVerif'])?></h1>
                                    </div>
                                    <div class="card-footer">
                                        <p class="m-0 p-0" style="font-size: 15px;">Belum Verifikasi
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-2  text-center">
                                <div class="card text-light warning-bg shadow-sm animate__animated animate__bounceInRight animate__fast">
                                    <div class="card-body m-0">
                                        <h1 class="m-0" style="font-size: 46px;"><?= number_format($data['getVerif']-$data['getBayar'])?></h1>
                                    </div>
                                    <div class="card-footer" style="font-size: 15px;">Belum Bayar
                                        <p class="m-0 p-0">
                                        </p>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-12 col-md-4 mb-2  text-center">
                                <div class="card text-light warning-bg shadow-sm animate__animated animate__bounceInRight">
                                    <div class="card-body m-0">
                                        <h1 class="m-0" style="font-size: 46px;"><?= number_format($data['getBayar']-$data['getNim'])?></h1>
                                    </div>
                                    <div class="card-footer" style="font-size: 15px;">Belum Ada NIM
                                        <p class="m-0 p-0">
                                        </p>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</main>
<script>
    const ctx = document.getElementById('BarPmb');
    new Chart(ctx, {
            type: 'bar',
            data: {
            labels: [
                    '<?=$data['S01']?>',
                    '<?=$data['S02']?>',
                    '<?=$data['S03']?>'
                    ],
            datasets: [{
                label: 'Lulus',
                data: [
                    '<?=$data['pmb']['total_S01']?>',
                    '<?=$data['pmb']['total_S02']?>',
                    '<?=$data['pmb']['total_S03']?>'
                    ],
                backgroundColor: [  'rgba(255, 176, 0, 0.7)'],
                borderColor: [  'rgb(255, 176, 0)'],
                borderWidth: 1
                },
                {
                label: 'Daftar',
                data: [
                    '<?=$data['pmb']['total_reg_S01']?>',
                    '<?=$data['pmb']['total_reg_S02']?>',
                    '<?=$data['pmb']['total_reg_S03']?>'
                    ],
                    backgroundColor: [ 'rgba(83, 203, 197, 0.7)'],
                borderColor: [  'rgb(83, 203, 197)'],
                borderWidth: 1
                },
                {
                label: 'NIM',
                data: [
                    '<?=$data['pmb']['total_nim_S01']?>',
                    '<?=$data['pmb']['total_nim_S02']?>',
                    '<?=$data['pmb']['total_nim_S03']?>'
                    ],
                    backgroundColor: [  'rgba(97, 176, 255, 0.7)'],
                borderColor: [  'rgb(97, 176, 255)'],
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
 
     //Chart
     const ctx_2 = document.getElementById('PieChart');
    new Chart(ctx_2, {
    type: 'pie',
    data : {
        labels: ['Daftar Kembali', 'Undur Diri'],
        datasets: [{
        label: 'Total',
        data: [   
            '<?=$data['getAllRegist']?>',
                    '<?=($data['getAllPassed']-$data['getAllRegist'])?>'
                ],
        backgroundColor: ['rgba(41, 128, 185, 0.5)',
                        'rgba(192, 57, 43, 0.5)'],
        borderColor: ['rgb(41, 128, 185)',
                        'rgb(192, 57, 43)'],
        fill: false,
        tension: 0.2
        }]
    },
    options: {
        maintainAspectRatio : false,
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Perbandingan Mendaftar Kembali'
            }
            }
    }
    });
     //Download Chart Image
     document.getElementById("downloadPieChart").addEventListener('click', function(){
        var url_base64jp = document.getElementById("PieChart").toDataURL("image/png");
        var a =  document.getElementById("downloadPieChart");
        a.href = url_base64jp;
        });
</script>
