<!-- Rekap Maba Jalur Pendaftaran S1-->
<!-- Total -->
<table  id="MabaS1Rekap" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="3">No.</th>
        <th class="text-center" rowspan="3"><?=$kolom?></th>
        <th class="text-center" colspan="9">Jalur Masuk</th>
    </tr>
    <tr>
        <th class="text-center" colspan="3"><?=$data['S01']?></th>
        <th class="text-center" colspan="3"><?=$data['S02']?></th>
        <th class="text-center" colspan="3"><?=$data['S03']?></th>
    </tr>
    <tr>
        <th class="text-center">Lulus</th>
        <th class="text-center">Daftar</th>
        <th class="text-center">NIM</th>
        <th class="text-center">Lulus</th>
        <th class="text-center">Daftar</th>
        <th class="text-center">NIM</th>
        <th class="text-center">Lulus</th>
        <th class="text-center">Daftar</th>
        <th class="text-center">NIM</th>
    </tr>
</thead>
<tbody>
    <?php  
    $no = 1;
    $jumlahS1S01  = 0;
    $jumlahS1S02  = 0;
    $jumlahS1S03  = 0;

    $jumlahS1RegS01  = 0;
    $jumlahS1RegS02  = 0;
    $jumlahS1RegS03  = 0;

    $jumlahS1NimS01  = 0;
    $jumlahS1NimS02  = 0;
    $jumlahS1NimS03  = 0;
    foreach ($data['getRekapS1'] as $row) :
        $jumlahS1S01  += $row['total_S01'];
        $jumlahS1S02  += $row['total_S02'];
        $jumlahS1S03  += $row['total_S03'];

        $jumlahS1RegS01  += $row['total_reg_S01'];
        $jumlahS1RegS02  += $row['total_reg_S02'];
        $jumlahS1RegS03  += $row['total_reg_S03'];

        $jumlahS1NimS01  += $row['total_nim_S01'];
        $jumlahS1NimS02  += $row['total_nim_S02'];
        $jumlahS1NimS03  += $row['total_nim_S03'];
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td class="text-start"><?= $row['kolom'];?></td>
        <td><?= $row['total_S01'] ?></td>
        <td><?= $row['total_reg_S01'] ?></td>
        <td><?= $row['total_nim_S01'] ?></td>

        <td><?= $row['total_S02'] ?></td>
        <td><?= $row['total_reg_S02'] ?></td>
        <td><?= $row['total_nim_S02'] ?></td>

        <td><?= $row['total_S03'] ?></td>
        <td><?= $row['total_reg_S03'] ?></td>
        <td><?= $row['total_nim_S03'] ?></td>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>
        <th colspan="2">Jumlah</th>
        <td><?php echo $jumlahS1S01     ?></td>
        <td><?php echo $jumlahS1RegS01  ?></td>
        <td><?php echo $jumlahS1NimS01  ?></td>

        <td><?php echo $jumlahS1S02     ?></td>
        <td><?php echo $jumlahS1RegS02  ?></td>
        <td><?php echo $jumlahS1NimS02  ?></td>

        <td><?php echo $jumlahS1S03     ?></td>
        <td><?php echo $jumlahS1RegS03  ?></td>
        <td><?php echo $jumlahS1NimS03  ?></td>

        
    </tr>
</tfoot>
</table>
<script>
    new DataTable('#MabaS1Rekap', {
        processing: true,
        scrollX: true,
        searching: false,
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                title: 'Rekap Total Berdasarkan Jalur Pendaftaran Jenjang S1',
                filename: 'Rekap Total Berdasarkan Jalur Pendaftaran Jenjang S1',
                footer: true
            },
            ],
        columnDefs: [
            {
            targets: [0,1,2,3,4,5,6,7,8,9,10],
            className: 'dt-center'
            },
            ],
        paging: false,
        ordering: false,
        info: false,
    });
</script>