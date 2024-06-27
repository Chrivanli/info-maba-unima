<!-- Rekap Total D3 7 Tahun Terakhir -->
<!-- Daftar Kembali -->
<table  id="MabaD3Total" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
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
    $jumlahD3Tahun1 = 0;
    $jumlahD3Tahun2 = 0;
    $jumlahD3Tahun3 = 0;
    $jumlahD3Tahun4 = 0;
    $jumlahD3Tahun5 = 0;
    $jumlahD3Tahun6 = 0;
    $jumlahD3Tahun7 = 0;
    $jumlahD3Total = 0;

    $nilai = $data['y_last'];
foreach($data['getTotalD3'] as $row):
    switch ($nilai) {
        case 2:
            $hidden = '2,3,4,5,6';
            $export = '7,8';
            $totalD3 = $row['tahun2'] + $row['tahun1'];   
            break;
        case 3:
            $hidden = '2,3,4,5';
            $export = '6,7,8';   
            $totalD3 = $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
            break;
        case 4:
            $hidden = '2,3,4';
            $export = '5,6,7,8';  
            $totalD3 = $row['tahun4'] + $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
            break;
        case 5:
            $hidden = '2,3';
            $export = '4,5,6,7,8';  
            $totalD3 = $row['tahun5'] + $row['tahun4'] + $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
            break;
        case 6:
            $hidden = '2';
            $export = '3,4,5,6,7,8';  
            $totalD3 = $row['tahun6'] + $row['tahun5'] + $row['tahun4'] + $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
            break;
        case 7:
            $hidden = '';
            $export = '2,3,4,5,6,7,8';  
            $totalD3 = $row['tahun7'] + $row['tahun6'] + $row['tahun5'] + $row['tahun4'] + $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
            break;
        default:
            $hidden = '';
            $export = '2,3,4,5,6,7,8';
            $totalD3 = $row['tahun7'] + $row['tahun6'] + $row['tahun5'] + $row['tahun4'] + $row['tahun3'] + $row['tahun2'] + $row['tahun1'];   
    }
        $jumlahD3Tahun7 += $D3_tahun7 = ($row['tahun7']);
        $jumlahD3Tahun6 += $D3_tahun6 = ($row['tahun6']);
        $jumlahD3Tahun5 += $D3_tahun5 = ($row['tahun5']);
        $jumlahD3Tahun4 += $D3_tahun4 = ($row['tahun4']);
        $jumlahD3Tahun3 += $D3_tahun3 = ($row['tahun3']);
        $jumlahD3Tahun2 += $D3_tahun2 = ($row['tahun2']);
        $jumlahD3Tahun1 += $D3_tahun1 = ($row['tahun1']);
        $jumlahD3Total  += $totalD3;
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td class="text-start"><?= $row['kolom'] ?></td>
        <td><?= $D3_tahun7 ?></td>
        <td><?= $D3_tahun6 ?></td>
        <td><?= $D3_tahun5 ?></td>
        <td><?= $D3_tahun4 ?></td>
        <td><?= $D3_tahun3 ?></td>
        <td><?= $D3_tahun2 ?></td>
        <td><?= $D3_tahun1 ?></td>

        <td><?= $totalD3 ?></td>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>
        <th colspan="2">Jumlah</th>
        <td><?= $jumlahD3Tahun7 ?></td>
        <td><?= $jumlahD3Tahun6 ?></td>
        <td><?= $jumlahD3Tahun5 ?></td>
        <td><?= $jumlahD3Tahun4 ?></td>
        <td><?= $jumlahD3Tahun3 ?></td>
        <td><?= $jumlahD3Tahun2 ?></td>
        <td><?= $jumlahD3Tahun1 ?></td>

        <th><?= $jumlahD3Total ?></th>
    </tr>
</tfoot>
</table>

<script>
//DataTables
$(document).ready(function () {
$('#MabaD3Total').DataTable({
    scrollX: true,
    searching: false,
    dom: "Bfrtip",
    buttons: [
        {
            extend: 'excel',
            title: 'Rekap Daftar Kembali Berdasarkan Total <?=$data['y_last']?> Tahun Terakhir Jenjang D3',
            filename: 'Rekap Daftar Kembali Berdasarkan Total <?=$data['y_last']?> Tahun Terakhir Jenjang D3',
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