<!-- Rekap Maba Jenis Kelamin S1-->
<!-- Total -->
<table  id="JKS1Rekap" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="3">No.</th>
        <th class="text-center" rowspan="3"><?=$kolom?></th>
        <th class="text-center" colspan="9">Total</th>
    </tr>
    <tr>
        <th class="text-center" colspan="3">Lulus</th>
        <th class="text-center" colspan="3">Daftar</th>
        <th class="text-center" colspan="3">NIM</th>
    </tr>
    <tr>
        <th class="text-center">L</th>
        <th class="text-center">P</th>
        <th class="text-center">L+P</th>
        <th class="text-center">L</th>
        <th class="text-center">P</th>
        <th class="text-center">L+P</th>
        <th class="text-center">L</th>
        <th class="text-center">P</th>
        <th class="text-center">L+P</th>
    </tr>
</thead>
<tbody>
    <?php  
    $no = 1;
    $jumlahS1L  = 0;
    $jumlahS1P  = 0;
    $jumlahS1LP  = 0;

    $jumlahS1RegL  = 0;
    $jumlahS1RegP  = 0;
    $jumlahS1RegLP  = 0;

    $jumlahS1NimL  = 0;
    $jumlahS1NimP  = 0;
    $jumlahS1NimLP  = 0;
    foreach ($data['getJKS1'] as $row) :
        $jumlahS1L  += $row['total_L'];
        $jumlahS1P  += $row['total_P'];
        $jumlahS1LP  += ($row['total_L']+$row['total_P']);

        $jumlahS1RegL  += $row['total_reg_L'];
        $jumlahS1RegP  += $row['total_reg_P'];
        $jumlahS1RegLP  += ($row['total_reg_L']+$row['total_reg_P']);

        $jumlahS1NimL  += $row['total_nim_L'];
        $jumlahS1NimP  += $row['total_nim_P'];
        $jumlahS1NimLP  += ($row['total_nim_L']+$row['total_nim_P']);
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td class="text-start"><?= $row['kolom'];?></td>

        <td><?= $row['total_L'] ?></td>
        <td><?= $row['total_P'] ?></td>
        <td><?= ($row['total_L']+$row['total_P'])?></td>

        <td><?= $row['total_reg_L'] ?></td>
        <td><?= $row['total_reg_P'] ?></td>
        <td><?= ($row['total_reg_L']+$row['total_reg_P'])?></td>

        <td><?= $row['total_nim_L'] ?></td>
        <td><?= $row['total_nim_P'] ?></td>
        <td><?= ($row['total_nim_L']+$row['total_nim_P'])?></td>

    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>
        <th colspan="2">Jumlah</th>
        <td><?php echo $jumlahS1L  ?></td>
        <td><?php echo $jumlahS1P  ?></td>
        <td><?php echo $jumlahS1LP ?></td>

        <td><?php echo $jumlahS1RegL  ?></td>
        <td><?php echo $jumlahS1RegP  ?></td>
        <td><?php echo $jumlahS1RegLP ?></td>

        <td><?php echo $jumlahS1NimL  ?></td>
        <td><?php echo $jumlahS1NimP  ?></td>
        <td><?php echo $jumlahS1NimLP ?></td>

        
    </tr>
</tfoot>
</table>
<script>
    new DataTable('#JKS1Rekap', {
        processing: true,
        scrollX: true,
        searching: false,
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                title: 'Rekap Total Berdasarkan Jenis Kelamin Jenjang S1',
                filename: 'Rekap Total Berdasarkan Jenis Kelamin Jenjang S1',
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