<!-- Rekap Maba Jalur Pendaftaran S1-->
<!-- Daftar Kembali -->
<table  id="MabaS1Reg" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="2">No</th>
        <th class="text-center" rowspan="2"><?= $kolom ?></th>
        <th class="text-center" colspan="3">Jalur Masuk</th>
        <th class="text-center" rowspan="2">Total</th>
    </tr>
    <tr>
        <th class="text-center"><?=$data['S01']?></th>
        <th class="text-center"><?=$data['S02']?></th>
        <th class="text-center"><?=$data['S03']?></th>
    </tr>
</thead>
<tbody>
    <?php  
    $no = 1;
    $jumlahS1S01  = 0;
    $jumlahS1S02  = 0;
    $jumlahS1S03  = 0;
    foreach ($data['getRowS1'] as $row) :
        $jumlahS1S01  += $row['total_S01'];
        $jumlahS1S02  += $row['total_S02'];
        $jumlahS1S03  += $row['total_S03'];
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td class="text-start"><?= $row['kolom'];?></td>
        <td><?= $row['total_S01'] ?></td>
        <td><?= $row['total_S02'] ?></td>
        <td><?= $row['total_S03'] ?></td>
        <td><?php echo $total = $row['total_S01'] + $row['total_S02'] + $row['total_S03'];  ?></td>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>
        <th colspan="2">Jumlah</th>
        <td><?php echo $jumlahS1S01  ?></td>
        <td><?php echo $jumlahS1S02  ?></td>
        <td><?php echo $jumlahS1S03  ?></td>
        <th><?php echo $jumlahS1S01+$jumlahS1S02+$jumlahS1S03;  ?></th>
        
    </tr>
</tfoot>
</table>
<script>
    new DataTable('#MabaS1Reg', {
        processing: true,
        scrollX: true,
        searching: false,
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                title: 'Rekap Daftar Kembali Berdasarkan Jalur Pendaftaran Tahun <?=$data['y_post']?> Jenjang S1',
                filename: 'Rekap Daftar Kembali Berdasarkan Jalur Pendaftaran Tahun <?=$data['y_post']?> Jenjang S1',
                footer: true
            },
            ],
        columnDefs: [
            {
            targets: [0,1,2,3,4,5],
            className: 'dt-center'
            },
            ],
        paging: false,
        ordering: false,
        info: false,
    });
</script>