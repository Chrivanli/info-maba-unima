<!-- Rekap Daerah Asal 5 Tahun Terakhir -->
<!-- Lulus Seleksi -->
<table  id="DA5tahun" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="3">No.</th>
        <th class="text-center" rowspan="3">Kode</th>
        <th class="text-center" rowspan="3">Provinsi</th>
        <th class="text-center" colspan="15">Jalur Masuk</th>
        <th class="text-center" rowspan="3">Total</th>
    </tr>
    <tr>
        <th class="text-center" colspan="5"><?= $data['S01'] ?></th>
        <th class="text-center" colspan="5"><?= $data['S02'] ?></th>
        <th class="text-center" colspan="5"><?= $data['S03'] ?></th>
    </tr>
    <tr>            
        <th><?=date('Y')-4?></th>
        <th><?=date('Y')-3?></th>
        <th><?=date('Y')-2?></th>
        <th><?=date('Y')-1?></th>
        <th><?=date('Y')?></th>
        <th><?=date('Y')-4?></th>
        <th><?=date('Y')-3?></th>
        <th><?=date('Y')-2?></th>
        <th><?=date('Y')-1?></th>
        <th><?=date('Y')?></th>
        <th><?=date('Y')-4?></th>
        <th><?=date('Y')-3?></th>
        <th><?=date('Y')-2?></th>
        <th><?=date('Y')-1?></th>
        <th><?=date('Y')?></th>
    </tr>
</thead>
<tbody>
    <?php  
    $no = 1;
    $jumlahS01Tahun1  = 0;
    $jumlahS01Tahun2 = 0;
    $jumlahS01Tahun3 = 0;
    $jumlahS01Tahun4 = 0;
    $jumlahS01Tahun5 = 0;
    $jumlahTotalS01 = 0;

    $jumlahS02Tahun1  = 0;
    $jumlahS02Tahun2 = 0;
    $jumlahS02Tahun3 = 0;
    $jumlahS02Tahun4 = 0;
    $jumlahS02Tahun5 = 0;
    $jumlahTotalS02 = 0;

    $jumlahS03Tahun1  = 0;
    $jumlahS03Tahun2 = 0;
    $jumlahS03Tahun3 = 0;
    $jumlahS03Tahun4 = 0;
    $jumlahS03Tahun5 = 0;
    $jumlahTotalS03 = 0;

    $nilai = $data['y_last'];
foreach($data['getDA5y'] as $row):
    switch ($nilai) {
        case 2:
            $hidden = '3,4,5,8,9,10,13,14,15';
            $export = '6,10,11,15,16,17';
            $totalS01 = ($row['tahun2_S01'] + $row['tahun1_S01']);
            $totalS02 = ($row['tahun2_S02'] + $row['tahun1_S02']);
            $totalS03 = ($row['tahun2_S03'] + $row['tahun1_S03']);   
            break;
        case 3:
            $hidden = '3,4,8,9,13,14';
            $export = '5,6,9,10,11,14,15,16,17';
            $totalS01 = ($row['tahun3_S01'] + $row['tahun2_S01'] + $row['tahun1_S01']);
            $totalS02 = ($row['tahun3_S02'] + $row['tahun2_S02'] + $row['tahun1_S02']);
            $totalS03 = ($row['tahun3_S03'] + $row['tahun2_S03'] + $row['tahun1_S03']);   
            break;
        case 4:
            $hidden = '3,8,13';
            $export = '4,5,6,8,9,10,11,13,14,15,16,17';
            $totalS01 = ($row['tahun4_S01'] + $row['tahun3_S01'] + $row['tahun2_S01'] + $row['tahun1_S01']);
            $totalS02 = ($row['tahun4_S02'] + $row['tahun3_S02'] + $row['tahun2_S02'] + $row['tahun1_S02']);
            $totalS03 = ($row['tahun4_S03'] + $row['tahun3_S03'] + $row['tahun2_S03'] + $row['tahun1_S03']); 
            break;
        case 5:
            $hidden = '';
            $export = '3,4,5,6,7,8,9,10,11,12,13,14,15,16,17';
            $totalS01 = ($row['tahun5_S01'] + $row['tahun4_S01'] + $row['tahun3_S01'] + $row['tahun2_S01'] + $row['tahun1_S01']);
            $totalS02 = ($row['tahun5_S02'] + $row['tahun4_S02'] + $row['tahun3_S02'] + $row['tahun2_S02'] + $row['tahun1_S02']);
            $totalS03 = ($row['tahun5_S03'] + $row['tahun4_S03'] + $row['tahun3_S03'] + $row['tahun2_S03'] + $row['tahun1_S03']);     
            break;
        default:
            $hidden = '';
            $export = '3,4,5,6,7,8,9,10,11,12,13,14,15,16,17';
            $totalS01 = ($row['tahun5_S01'] + $row['tahun4_S01'] + $row['tahun3_S01'] + $row['tahun2_S01'] + $row['tahun1_S01']);
            $totalS02 = ($row['tahun5_S02'] + $row['tahun4_S02'] + $row['tahun3_S02'] + $row['tahun2_S02'] + $row['tahun1_S02']);
            $totalS03 = ($row['tahun5_S03'] + $row['tahun4_S03'] + $row['tahun3_S03'] + $row['tahun2_S03'] + $row['tahun1_S03']);
    }

        $jumlahS01Tahun5 += $row['tahun5_S01'] ;
        $jumlahS01Tahun4 += $row['tahun4_S01'] ;
        $jumlahS01Tahun3 += $row['tahun3_S01'] ;
        $jumlahS01Tahun2 += $row['tahun2_S01'] ;
        $jumlahS01Tahun1 += $row['tahun1_S01'] ;
        $jumlahTotalS01  += $totalS01;
    
        $jumlahS02Tahun5 += $row['tahun5_S02'] ;
        $jumlahS02Tahun4 += $row['tahun4_S02'] ;
        $jumlahS02Tahun3 += $row['tahun3_S02'] ;
        $jumlahS02Tahun2 += $row['tahun2_S02'] ;
        $jumlahS02Tahun1 += $row['tahun1_S02'] ;
        $jumlahTotalS02  += $totalS02;
    
        $jumlahS03Tahun5 += $row['tahun5_S03'] ;
        $jumlahS03Tahun4 += $row['tahun4_S03'] ;
        $jumlahS03Tahun3 += $row['tahun3_S03'] ;
        $jumlahS03Tahun2 += $row['tahun2_S03'] ;
        $jumlahS03Tahun1 += $row['tahun1_S03'] ;
        $jumlahTotalS03  += $totalS03;


    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td class="text-center"><?= $row['kd_provinsi'] ?></td>
        <td class="text-start"><?= $row['nama_provinsi'] ?></td>

        <td><?= $row['tahun5_S01'] ?></td>
        <td><?= $row['tahun4_S01'] ?></td>
        <td><?= $row['tahun3_S01'] ?></td>
        <td><?= $row['tahun2_S01'] ?></td>
        <td><?= $row['tahun1_S01'] ?></td>

        <td><?= $row['tahun5_S02'] ?></td>
        <td><?= $row['tahun4_S02'] ?></td>
        <td><?= $row['tahun3_S02'] ?></td>
        <td><?= $row['tahun2_S02'] ?></td>
        <td><?= $row['tahun1_S02'] ?></td>

        <td><?= $row['tahun5_S03'] ?></td>
        <td><?= $row['tahun4_S03'] ?></td>
        <td><?= $row['tahun3_S03'] ?></td>
        <td><?= $row['tahun2_S03'] ?></td>
        <td><?= $row['tahun1_S03'] ?></td>

        <td><?= $totalS01+$totalS02+$totalS03;  ?></td>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>

        <th colspan="3">Jumlah</th>
        

        <td><?= $jumlahS01Tahun5 ?></td>
        <td><?= $jumlahS01Tahun4 ?></td>
        <td><?= $jumlahS01Tahun3 ?></td>
        <td><?= $jumlahS01Tahun2 ?></td>
        <td><?= $jumlahS01Tahun1  ?></td>

        <td><?= $jumlahS02Tahun5 ?></td>
        <td><?= $jumlahS02Tahun4 ?></td>
        <td><?= $jumlahS02Tahun3 ?></td>
        <td><?= $jumlahS02Tahun2 ?></td>
        <td><?= $jumlahS02Tahun1  ?></td>

        <td><?= $jumlahS03Tahun5 ?></td>
        <td><?= $jumlahS03Tahun4 ?></td>
        <td><?= $jumlahS03Tahun3 ?></td>
        <td><?= $jumlahS03Tahun2 ?></td>
        <td><?= $jumlahS03Tahun1  ?></td>

        <th><?= $jumlahTotalS01+$jumlahTotalS02+$jumlahTotalS03;  ?></th>
        
    </tr>
</tfoot>
</table>

<script>
//DataTables
$(document).ready(function () {
$('#DA5tahun').DataTable({
    scrollX: true,
    searching: false,
    dom: "Bfrtip",
    buttons: [
        {
            extend: 'excel',
            title: 'Rekap Lulus Seleksi Berdasarkan Daerah Asal <?=$data['y_last']?> Tahun Terakhir',
            filename: 'Rekap Lulus Seleksi Berdasarkan Daerah Asal <?=$data['y_last']?> Tahun Terakhir',
            footer: true,
            exportOptions: {
                columns: [0,1,2,<?=$export?>,18]
            }
        },
        ],
    columnDefs: [
        {
        targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18],
        className: 'dt-center'
        },
        {
        targets: [<?=$hidden?>],
        visible:false
        },
        ],
    paging: false,
    ordering: false,
    info: false,
});
});
</script>