<!-- Rekap Maba Jalur Pendaftaran D3 5 Tahun Terakhir -->
<!-- Lulus Seleksi -->
<table  id="MabaD3" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
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
    $jumlahD3S01Tahun1 = 0;
    $jumlahD3S01Tahun2 = 0;
    $jumlahD3S01Tahun3 = 0;
    $jumlahD3S01Tahun4 = 0;
    $jumlahD3S01Tahun5  = 0;
    $jumlahD3TotalS01 = 0;

    $jumlahD3S02Tahun1 = 0;
    $jumlahD3S02Tahun2 = 0;
    $jumlahD3S02Tahun3 = 0;
    $jumlahD3S02Tahun4 = 0;
    $jumlahD3S02Tahun5  = 0;
    $jumlahD3TotalS02 = 0;

    $jumlahD3S03Tahun1 = 0;
    $jumlahD3S03Tahun2 = 0;
    $jumlahD3S03Tahun3 = 0;
    $jumlahD3S03Tahun4 = 0;
    $jumlahD3S03Tahun5  = 0;
    $jumlahD3TotalS03 = 0;

    $nilai = $data['y_last'];
    foreach($data['getMhs5yD3'] as $row):
        switch ($nilai) {
            case 2:
                $hidden = '2,3,4,7,8,9,12,13,14';
                $export = '5,6,10,11,15,16';
                $totalD3S01 = $row['tahun1_S01'] + $row['tahun2_S01'];
                $totalD3S02 = $row['tahun1_S02'] + $row['tahun2_S02'];
                $totalD3S03 = $row['tahun1_S03'] + $row['tahun2_S03'];     
                break;
            case 3:
                $hidden = '2,3,7,8,12,13';
                $export = '4,5,6,9,10,11,14,15,16';
                $totalD3S01 = $row['tahun1_S01'] + $row['tahun2_S01'] + $row['tahun3_S01'];
                $totalD3S02 = $row['tahun1_S02'] + $row['tahun2_S02'] + $row['tahun3_S02'];
                $totalD3S03 = $row['tahun1_S03'] + $row['tahun2_S03'] + $row['tahun3_S03'];     
                break;
            case 4:
                $hidden = '2,7,12';
                $export = '3,4,5,6,8,9,10,11,13,14,15,16';
                $totalD3S01 = $row['tahun1_S01'] + $row['tahun2_S01'] + $row['tahun3_S01'] + $row['tahun4_S01'];
                $totalD3S02 = $row['tahun1_S02'] + $row['tahun2_S02'] + $row['tahun3_S02'] + $row['tahun4_S02'];
                $totalD3S03 = $row['tahun1_S03'] + $row['tahun2_S03'] + $row['tahun3_S03'] + $row['tahun4_S03'];     
                break;
            case 5:
                $hidden = '';
                $export = '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16';
                $totalD3S01 = $row['tahun1_S01'] + $row['tahun2_S01'] + $row['tahun3_S01'] + $row['tahun4_S01'] + $row['tahun5_S01'];
                $totalD3S02 = $row['tahun1_S02'] + $row['tahun2_S02'] + $row['tahun3_S02'] + $row['tahun4_S02'] + $row['tahun5_S02'];
                $totalD3S03 = $row['tahun1_S03'] + $row['tahun2_S03'] + $row['tahun3_S03'] + $row['tahun4_S03'] + $row['tahun5_S03'];     
                break;
            default:
                $hidden = '';
                $export = '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16';
                $totalD3S01 = $row['tahun1_S01'] + $row['tahun2_S01'] + $row['tahun3_S01'] + $row['tahun4_S01'] + $row['tahun5_S01'];
                $totalD3S02 = $row['tahun1_S02'] + $row['tahun2_S02'] + $row['tahun3_S02'] + $row['tahun4_S02'] + $row['tahun5_S02'];
                $totalD3S03 = $row['tahun1_S03'] + $row['tahun2_S03'] + $row['tahun3_S03'] + $row['tahun4_S03'] + $row['tahun5_S03'];     
        }
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td class="text-start"><?=$row['kolom']?></td>

            <!-- Data S01 -->
        <?php      
               $jumlahD3S01Tahun5 += $row['tahun5_S01'];
               $jumlahD3S01Tahun4 += $row['tahun4_S01'];
               $jumlahD3S01Tahun3 += $row['tahun3_S01'];
               $jumlahD3S01Tahun2 += $row['tahun2_S01'];
               $jumlahD3S01Tahun1 += $row['tahun1_S01'];
               $jumlahD3TotalS01 += $totalD3S01;
        ?>
        <td><?= $row['tahun5_S01'] ?></td>
        <td><?= $row['tahun4_S01'] ?></td>
        <td><?= $row['tahun3_S01'] ?></td>
        <td><?= $row['tahun2_S01'] ?></td>
        <td><?= $row['tahun1_S01'] ?></td>

            <!-- Data S02 -->
        <?php      
                $jumlahD3S02Tahun5 += $row['tahun5_S02'];
                $jumlahD3S02Tahun4 += $row['tahun4_S02'];
                $jumlahD3S02Tahun3 += $row['tahun3_S02'];
                $jumlahD3S02Tahun2 += $row['tahun2_S02'];
                $jumlahD3S02Tahun1 += $row['tahun1_S02'];
                $jumlahD3TotalS02 += $totalD3S02;
                ?>
        <td><?= $row['tahun5_S02'] ?></td>
        <td><?= $row['tahun4_S02'] ?></td>
        <td><?= $row['tahun3_S02'] ?></td>
        <td><?= $row['tahun2_S02'] ?></td>
        <td><?= $row['tahun1_S02'] ?></td>

            <!-- Data S03 -->
        <?php      
                $jumlahD3S03Tahun5 += $row['tahun5_S03'];
                $jumlahD3S03Tahun4 += $row['tahun4_S03'];
                $jumlahD3S03Tahun3 += $row['tahun3_S03'];
                $jumlahD3S03Tahun2 += $row['tahun2_S03'];
                $jumlahD3S03Tahun1 += $row['tahun1_S03'];
                $jumlahD3TotalS03 += $totalD3S03;
                ?>
        <td><?= $row['tahun5_S03'] ?></td>
        <td><?= $row['tahun4_S03'] ?></td>
        <td><?= $row['tahun3_S03'] ?></td>
        <td><?= $row['tahun2_S03'] ?></td>
        <td><?= $row['tahun1_S03'] ?></td>

        <td><?php echo $totalD3S01+$totalD3S02+$totalD3S03;  ?></td>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>

        <th colspan="2">Jumlah</th>
        
        <!-- Jumlah S01  -->
        <td><?= $jumlahD3S01Tahun5 ?></td>
        <td><?= $jumlahD3S01Tahun4 ?></td>
        <td><?= $jumlahD3S01Tahun3 ?></td>
        <td><?= $jumlahD3S01Tahun2 ?></td>
        <td><?= $jumlahD3S01Tahun1 ?></td>
        
         <!-- Jumlah S02  -->
        <td><?= $jumlahD3S02Tahun5 ?></td>
        <td><?= $jumlahD3S02Tahun4 ?></td>
        <td><?= $jumlahD3S02Tahun3 ?></td>
        <td><?= $jumlahD3S02Tahun2 ?></td>
        <td><?= $jumlahD3S02Tahun1 ?></td>

         <!-- Jumlah S03  -->
        <td><?= $jumlahD3S03Tahun5 ?></td>
        <td><?= $jumlahD3S03Tahun4 ?></td>
        <td><?= $jumlahD3S03Tahun3 ?></td>
        <td><?= $jumlahD3S03Tahun2 ?></td>
        <td><?= $jumlahD3S03Tahun1 ?></td>

        <th><?php echo $jumlahD3TotalS01+$jumlahD3TotalS02+$jumlahD3TotalS03;  ?></th>
        
    </tr>
</tfoot>
</table>
<script>
//DataTables
$(document).ready(function () {
$('#MabaD3').DataTable({
    scrollX: true,
    searching: false,
    dom: "Bfrtip",
    buttons: [
        {
            extend: 'excel',
            title: 'Rekap Lulus Seleksi Berdasarkan Jalur Pendaftaran <?=$data['y_last']?> Tahun Terakhir Jenjang D3',
            filename: 'Rekap Lulus Seleksi Berdasarkan Jalur Pendaftaran <?=$data['y_last']?> Tahun Terakhir Jenjang D3',
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