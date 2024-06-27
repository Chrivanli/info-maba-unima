<!-- Rekap Maba Jalur Pendaftaran S1 5 Tahun Terakhir -->
<!-- NIM -->
<table  id="MabaS1" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="3">No.</th>
        <th class="text-center" rowspan="3"><?=$kolom?></th>
        <th class="text-center" colspan="15">Jalur Masuk</th>
        <th class="text-center" rowspan="3">Total</th>
    </tr>
    <tr>
        <th class="text-center" colspan="5"><?=$data['S01']?></th>
        <th class="text-center" colspan="5"><?=$data['S02']?></th>
        <th class="text-center" colspan="5"><?=$data['S03']?></th>
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
    $jumlahS1S01Tahun1 = 0;
    $jumlahS1S01Tahun2 = 0;
    $jumlahS1S01Tahun3 = 0;
    $jumlahS1S01Tahun4 = 0;
    $jumlahS1S01Tahun5  = 0;
    $jumlahS1TotalS01 = 0;

    $jumlahS1S02Tahun1 = 0;
    $jumlahS1S02Tahun2 = 0;
    $jumlahS1S02Tahun3 = 0;
    $jumlahS1S02Tahun4 = 0;
    $jumlahS1S02Tahun5  = 0;
    $jumlahS1TotalS02 = 0;

    $jumlahS1S03Tahun1 = 0;
    $jumlahS1S03Tahun2 = 0;
    $jumlahS1S03Tahun3 = 0;
    $jumlahS1S03Tahun4 = 0;
    $jumlahS1S03Tahun5  = 0;
    $jumlahS1TotalS03 = 0;

    $nilai = $data['y_last'];
    foreach($data['getMhs5yS1'] as $row):
        switch ($nilai) {
            case 2:
                $hidden = '2,3,4,7,8,9,12,13,14';
                $export = '5,6,10,11,15,16';
                $totalS1S01 = $row['tahun1_S01'] + $row['tahun2_S01'];
                $totalS1S02 = $row['tahun1_S02'] + $row['tahun2_S02'];
                $totalS1S03 = $row['tahun1_S03'] + $row['tahun2_S03'];     
                break;
            case 3:
                $hidden = '2,3,7,8,12,13';
                $export = '4,5,6,9,10,11,14,15,16';
                $totalS1S01 = $row['tahun1_S01'] + $row['tahun2_S01'] + $row['tahun3_S01'];
                $totalS1S02 = $row['tahun1_S02'] + $row['tahun2_S02'] + $row['tahun3_S02'];
                $totalS1S03 = $row['tahun1_S03'] + $row['tahun2_S03'] + $row['tahun3_S03'];     
                break;
            case 4:
                $hidden = '2,7,12';
                $export = '3,4,5,6,8,9,10,11,13,14,15,16';
                $totalS1S01 = $row['tahun1_S01'] + $row['tahun2_S01'] + $row['tahun3_S01'] + $row['tahun4_S01'];
                $totalS1S02 = $row['tahun1_S02'] + $row['tahun2_S02'] + $row['tahun3_S02'] + $row['tahun4_S02'];
                $totalS1S03 = $row['tahun1_S03'] + $row['tahun2_S03'] + $row['tahun3_S03'] + $row['tahun4_S03'];     
                break;
            case 5:
                $hidden = '';
                $export = '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16';
                $totalS1S01 = $row['tahun1_S01'] + $row['tahun2_S01'] + $row['tahun3_S01'] + $row['tahun4_S01'] + $row['tahun5_S01'];
                $totalS1S02 = $row['tahun1_S02'] + $row['tahun2_S02'] + $row['tahun3_S02'] + $row['tahun4_S02'] + $row['tahun5_S02'];
                $totalS1S03 = $row['tahun1_S03'] + $row['tahun2_S03'] + $row['tahun3_S03'] + $row['tahun4_S03'] + $row['tahun5_S03'];     
                break;
            default:
                $hidden = '';
                $export = '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16';
                $totalS1S01 = $row['tahun1_S01'] + $row['tahun2_S01'] + $row['tahun3_S01'] + $row['tahun4_S01'] + $row['tahun5_S01'];
                $totalS1S02 = $row['tahun1_S02'] + $row['tahun2_S02'] + $row['tahun3_S02'] + $row['tahun4_S02'] + $row['tahun5_S02'];
                $totalS1S03 = $row['tahun1_S03'] + $row['tahun2_S03'] + $row['tahun3_S03'] + $row['tahun4_S03'] + $row['tahun5_S03'];     
        }
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td class="text-start"><?=$row['kolom']?></td>

            <!-- Data S01 -->
        <?php      
               $jumlahS1S01Tahun5 += $row['tahun5_S01'];
               $jumlahS1S01Tahun4 += $row['tahun4_S01'];
               $jumlahS1S01Tahun3 += $row['tahun3_S01'];
               $jumlahS1S01Tahun2 += $row['tahun2_S01'];
               $jumlahS1S01Tahun1 += $row['tahun1_S01'];
               $jumlahS1TotalS01 += $totalS1S01;
        ?>
        <td><?= $row['tahun5_S01'] ?></td>
        <td><?= $row['tahun4_S01'] ?></td>
        <td><?= $row['tahun3_S01'] ?></td>
        <td><?= $row['tahun2_S01'] ?></td>
        <td><?= $row['tahun1_S01'] ?></td>

            <!-- Data S02 -->
        <?php      
                $jumlahS1S02Tahun5 += $row['tahun5_S02'];
                $jumlahS1S02Tahun4 += $row['tahun4_S02'];
                $jumlahS1S02Tahun3 += $row['tahun3_S02'];
                $jumlahS1S02Tahun2 += $row['tahun2_S02'];
                $jumlahS1S02Tahun1 += $row['tahun1_S02'];
                $jumlahS1TotalS02 += $totalS1S02;
                ?>
        <td><?= $row['tahun5_S02'] ?></td>
        <td><?= $row['tahun4_S02'] ?></td>
        <td><?= $row['tahun3_S02'] ?></td>
        <td><?= $row['tahun2_S02'] ?></td>
        <td><?= $row['tahun1_S02'] ?></td>

            <!-- Data S03 -->
        <?php      
                $jumlahS1S03Tahun5 += $row['tahun5_S03'];
                $jumlahS1S03Tahun4 += $row['tahun4_S03'];
                $jumlahS1S03Tahun3 += $row['tahun3_S03'];
                $jumlahS1S03Tahun2 += $row['tahun2_S03'];
                $jumlahS1S03Tahun1 += $row['tahun1_S03'];
                $jumlahS1TotalS03 += $totalS1S03;
                ?>
        <td><?= $row['tahun5_S03'] ?></td>
        <td><?= $row['tahun4_S03'] ?></td>
        <td><?= $row['tahun3_S03'] ?></td>
        <td><?= $row['tahun2_S03'] ?></td>
        <td><?= $row['tahun1_S03'] ?></td>

        <td><?php echo $totalS1S01+$totalS1S02+$totalS1S03;  ?></td>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>

        <th colspan="2">Jumlah</th>
        
        <!-- Jumlah S01 per Program Studi -->
        <td><?= $jumlahS1S01Tahun5 ?></td>
        <td><?= $jumlahS1S01Tahun4 ?></td>
        <td><?= $jumlahS1S01Tahun3 ?></td>
        <td><?= $jumlahS1S01Tahun2 ?></td>
        <td><?= $jumlahS1S01Tahun1 ?></td>
        
         <!-- Jumlah S02 per Program Studi -->
        <td><?= $jumlahS1S02Tahun5 ?></td>
        <td><?= $jumlahS1S02Tahun4 ?></td>
        <td><?= $jumlahS1S02Tahun3 ?></td>
        <td><?= $jumlahS1S02Tahun2 ?></td>
        <td><?= $jumlahS1S02Tahun1 ?></td>

         <!-- Jumlah S03 per Program Studi -->
        <td><?= $jumlahS1S03Tahun5 ?></td>
        <td><?= $jumlahS1S03Tahun4 ?></td>
        <td><?= $jumlahS1S03Tahun3 ?></td>
        <td><?= $jumlahS1S03Tahun2 ?></td>
        <td><?= $jumlahS1S03Tahun1 ?></td>

        <th><?php echo $jumlahS1TotalS01+$jumlahS1TotalS02+$jumlahS1TotalS03;  ?></th>
        
    </tr>
</tfoot>
</table>

<script>
//DataTables
$(document).ready(function () {
$('#MabaS1').DataTable({
    scrollX: true,
    searching: false,
    dom: "Bfrtip",
    buttons: [
        {
            extend: 'excel',
            title: 'Rekap NIM Berdasarkan Jalur Pendaftaran <?=$data['y_last']?> Tahun Terakhir Jenjang S1',
            filename: 'Rekap NIM Berdasarkan Jalur Pendaftaran <?=$data['y_last']?> Tahun Terakhir Jenjang S1',
            footer: true,
            exportOptions: {
                                columns: [0,1,<?=$export?>,17]
                            }
        },
        ],
    columnDefs: [
        {
        targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17],
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