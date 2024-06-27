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
                <li class="breadcrumb-item "><a href="<?= BASEURL; ?>/lulus_seleksi" class="link">Lulus Seleksi</a></li>
                <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/lulus_seleksi/maba_lulus_seleksi_5y" class="link">Jalur Pendaftaran - <?=$data['y_last']?> Tahun Terakhir</a></li>
            </ol>
    </div>
    <div class="container-fluid px-4">
        <div class="col mt-3">
            <div class="card mb-1 animate__animated animate__fadeIn">
                <div class="card-header text-light ">
                    <div class="row">
                        <div class="col-0 col-sm-2"></div>
                        <div class="col">
                            <h5 class="card-title text-center mb-0">JALUR PENDAFTARAAN - <?=$data['y_last']?> TAHUN TERAKHIR</h5>
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
                <div class="col-12 col-md-6">
                    <div class="card animate__animated animate__fadeInLeft">
                        <div class="card-body pt-0" style="height: 265px;">
                            <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadlineChart" 
                                download="LineChart Maba Lulus Seleksi 5 Tahun Terakhir.png" href="">
                                <i data-feather="download" style="width: 80%;"></i>
                            </a>
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card animate__animated animate__fadeInRight">
                        <div class="card-body pt-0" style="height: 265px;">
                            <a class="pe-3 mt-1 btn z-0 position-absolute top-0 end-0" id="downloadbarChart" 
                                download="BarChart Maba Lulus Seleksi 5 Tahun Terakhir Berdasarkan Fakultas.png" href="">
                                <i data-feather="download" style="width: 80%;"></i>
                            </a> 
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3 animate__animated animate__fadeIn">
                <div class="card-header text-light">
                    <h5 class="card-title"><i data-feather="file-text"></i> Rekap <?= $kolom ?> Strata 1</h5>
                </div>
                <div class="card-body">
                    <?php require 'table/data-maba-s1-lulus-seleksi-5y.php' ?>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header text-light">
                    <h5 class="card-title"><i data-feather="file-text"></i> Rekap <?= $kolom ?> Diploma 3</h5>
                </div>
                <div class="card-body">
                    <?php require 'table/data-maba-d3-lulus-seleksi-5y.php' ?>
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
      <form id="myForm" method="POST" action="<?= BASEURL; ?>/lulus_seleksi/maba_lulus_seleksi_5y">
        <div class="modal-body">
            <div class="row col mb-4">
                <div class="col-7">
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
   foreach($data['getMhs5y'] as $row):
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
?>
<script>
//Chart
const ctx = document.getElementById('lineChart');
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
        label: '<?=$data['S01']?>',
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
        label: '<?=$data['S02']?>',
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
        label: '<?=$data['S03']?>',
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
                    text: 'Jalur Pendaftaran'
                }
        },
        }
});

const ctx_2 = document.getElementById('barChart');
new Chart(ctx_2, {
        type: 'bar',
        data: {
        labels: [<?php
                    foreach($data['getMhs5y'] as $row):
                    echo "'".$row['fakultas']."',";
                    endforeach;
                ?>],
        datasets: [{
            label: '<?=$data['S01']?>',
            data: [
                    <?php
                    foreach($data['getMhs5y'] as $row):
                        echo "'".($row['tahun1_S01'] + $row['tahun2_S01'] + $row['tahun3_S01'] + $row['tahun4_S01'] + $row['tahun5_S01'])."',";
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
                    foreach($data['getMhs5y'] as $row):
                        echo "'".($row['tahun1_S02'] + $row['tahun2_S02'] + $row['tahun3_S02'] + $row['tahun4_S02'] + $row['tahun5_S02'])."',";
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
                    foreach($data['getMhs5y'] as $row):
                        echo "'".($row['tahun1_S03'] + $row['tahun2_S03'] + $row['tahun3_S03'] + $row['tahun4_S03'] + $row['tahun5_S03'])."',";
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
    document.getElementById("downloadlineChart").addEventListener('click', function(){
    var url_base64jp = document.getElementById("lineChart").toDataURL("image/png");
    var a =  document.getElementById("downloadlineChart");
    a.href = url_base64jp;
    });

    document.getElementById("downloadbarChart").addEventListener('click', function(){
    var url_base64jp = document.getElementById("barChart").toDataURL("image/png");
    var a =  document.getElementById("downloadbarChart");
    a.href = url_base64jp;
    });
</script>