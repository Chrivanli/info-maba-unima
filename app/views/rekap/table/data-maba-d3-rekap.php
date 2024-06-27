<!-- Rekap Maba Jalur Pendaftaran D3-->
<!-- Total -->
<table  id="MabaD3Rekap" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="3">No.</th>
        <th class="text-center" rowspan="3"><?= $kolom ?></th>
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
    $jumlahD3S01  = 0;
    $jumlahD3S02  = 0;
    $jumlahD3S03  = 0;

    $jumlahD3RegS01  = 0;
    $jumlahD3RegS02  = 0;
    $jumlahD3RegS03  = 0;

    $jumlahD3NimS01  = 0;
    $jumlahD3NimS02  = 0;
    $jumlahD3NimS03  = 0;
    foreach ($data['getRekapD3'] as $row) :
        $jumlahD3S01  += $row['total_S01'];
        $jumlahD3S02  += $row['total_S02'];
        $jumlahD3S03  += $row['total_S03'];

        $jumlahD3RegS01  += $row['total_reg_S01'];
        $jumlahD3RegS02  += $row['total_reg_S02'];
        $jumlahD3RegS03  += $row['total_reg_S03'];

        $jumlahD3NimS01  += $row['total_nim_S01'];
        $jumlahD3NimS02  += $row['total_nim_S02'];
        $jumlahD3NimS03  += $row['total_nim_S03'];
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
        <td><?php echo $jumlahD3S01     ?></td>
        <td><?php echo $jumlahD3RegS01  ?></td>
        <td><?php echo $jumlahD3NimS01  ?></td>

        <td><?php echo $jumlahD3S02     ?></td>
        <td><?php echo $jumlahD3RegS02  ?></td>
        <td><?php echo $jumlahD3NimS02  ?></td>

        <td><?php echo $jumlahD3S03     ?></td>
        <td><?php echo $jumlahD3RegS03  ?></td>
        <td><?php echo $jumlahD3NimS03  ?></td>

        
    </tr>
</tfoot>
</table>
<script>
    new DataTable('#MabaD3Rekap', {
        processing: true,
        scrollX: true,
        searching: false,
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                title: 'Rekap Total Berdasarkan Jalur Pendaftaran Jenjang D3',
                filename: 'Rekap Total Berdasarkan Jalur Pendaftaran Jenjang D3',
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