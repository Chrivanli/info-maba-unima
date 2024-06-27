<!-- Rekap Total S1 7 Tahun Terakhir -->
<!-- Lulus Seleksi -->
<table  id="MabaS1Total" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="2">No.</th>
        <th class="text-center" rowspan="2"><?=$kolom?></th>
        <th class="text-center" colspan="7">Tahun Masuk</th>
        <th class="text-center" rowspan="2">Total</th>
    </tr>
    <tr>
        <th class="text-center"><?=date('Y')-6?></th>
        <th class="text-center"><?=date('Y')-5?></th>
        <th class="text-center"><?=date('Y')-4?></th>
        <th class="text-center"><?=date('Y')-3?></th>
        <th class="text-center"><?=date('Y')-2?></th>
        <th class="text-center"><?=date('Y')-1?></th>
        <th class="text-center"><?=date('Y')?></th>
    </tr>
</thead>
<tbody>
    <?php  
    $no = 1;
    $jumlahS1Tahun1 = 0;
    $jumlahS1Tahun2 = 0;
    $jumlahS1Tahun3 = 0;
    $jumlahS1Tahun4 = 0;
    $jumlahS1Tahun5 = 0;
    $jumlahS1Tahun6 = 0;
    $jumlahS1Tahun7 = 0;
    $jumlahS1Total = 0;

    $nilai = $data['y_last'];
foreach($data['getTotalS1'] as $row):
    switch ($nilai) {
        case 2:
            $hidden = '2,3,4,5,6';
            $export = '7,8';
            $totalS1 = $row['tahun2'] + $row['tahun1'];   
            break;
        case 3:
            $hidden = '2,3,4,5';
            $export = '6,7,8';   
            $totalS1 = $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
            break;
        case 4:
            $hidden = '2,3,4';
            $export = '5,6,7,8';  
            $totalS1 = $row['tahun4'] + $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
            break;
        case 5:
            $hidden = '2,3';
            $export = '4,5,6,7,8';  
            $totalS1 = $row['tahun5'] + $row['tahun4'] + $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
            break;
        case 6:
            $hidden = '2';
            $export = '3,4,5,6,7,8';  
            $totalS1 = $row['tahun6'] + $row['tahun5'] + $row['tahun4'] + $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
            break;
        case 7:
            $hidden = '';
            $export = '2,3,4,5,6,7,8';  
            $totalS1 = $row['tahun7'] + $row['tahun6'] + $row['tahun5'] + $row['tahun4'] + $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
            break;
        default:
            $hidden = '';
            $export = '2,3,4,5,6,7,8';
            $totalS1 = $row['tahun7'] + $row['tahun6'] + $row['tahun5'] + $row['tahun4'] + $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
    }
        $jumlahS1Tahun7 += $S1_tahun7 = ($row['tahun7']);
        $jumlahS1Tahun6 += $S1_tahun6 = ($row['tahun6']);
        $jumlahS1Tahun5 += $S1_tahun5 = ($row['tahun5']);
        $jumlahS1Tahun4 += $S1_tahun4 = ($row['tahun4']);
        $jumlahS1Tahun3 += $S1_tahun3 = ($row['tahun3']);
        $jumlahS1Tahun2 += $S1_tahun2 = ($row['tahun2']);
        $jumlahS1Tahun1 += $S1_tahun1 = ($row['tahun1']);
        $jumlahS1Total  += $totalS1;
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td class="text-start"><?= $row['kolom'] ?></td>
        <td><?= $S1_tahun7 ?></td>
        <td><?= $S1_tahun6 ?></td>
        <td><?= $S1_tahun5 ?></td>
        <td><?= $S1_tahun4 ?></td>
        <td><?= $S1_tahun3 ?></td>
        <td><?= $S1_tahun2 ?></td>
        <td><?= $S1_tahun1 ?></td>

        <td><?= $totalS1 ?></td>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>
        <th colspan="2">Jumlah</th>
        <td><?= $jumlahS1Tahun7 ?></td>
        <td><?= $jumlahS1Tahun6 ?></td>
        <td><?= $jumlahS1Tahun5 ?></td>
        <td><?= $jumlahS1Tahun4 ?></td>
        <td><?= $jumlahS1Tahun3 ?></td>
        <td><?= $jumlahS1Tahun2 ?></td>
        <td><?= $jumlahS1Tahun1 ?></td>

        <th><?= $jumlahS1Total ?></th>
    </tr>
</tfoot>
</table>

<script>
//DataTables
$(document).ready(function () {
$('#MabaS1Total').DataTable({
    scrollX: true,
    searching: false,
    dom: "Bfrtip",
    buttons: [
        {
            extend: 'excel',
            title: 'Rekap Lulus Seleksi Berdasarkan Total <?=$data['y_last']?> Tahun Terakhir Jenjang S1',
            filename: 'Rekap Lulus Seleksi Berdasarkan Total <?=$data['y_last']?> Tahun Terakhir Jenjang S1',
            footer: true,
            exportOptions: 
            {
                columns: [0,1,<?=$export?>,9]
            }
        },
        ],
    columnDefs: [
        {
        targets: [0,1,2,3,4,5,6,7,8,9],
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