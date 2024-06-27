<!-- Rekap Maba Jenis Kelamin D3-->
<!-- Total -->
<table  id="JKD3Rekap" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
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
    $jumlahD3L  = 0;
    $jumlahD3P  = 0;
    $jumlahD3LP  = 0;

    $jumlahD3RegL  = 0;
    $jumlahD3RegP  = 0;
    $jumlahD3RegLP  = 0;

    $jumlahD3NimL  = 0;
    $jumlahD3NimP  = 0;
    $jumlahD3NimLP  = 0;
    foreach ($data['getJKD3'] as $row) :
        $jumlahD3L  += $row['total_L'];
        $jumlahD3P  += $row['total_P'];
        $jumlahD3LP  += ($row['total_L']+$row['total_P']);

        $jumlahD3RegL  += $row['total_reg_L'];
        $jumlahD3RegP  += $row['total_reg_P'];
        $jumlahD3RegLP  += ($row['total_reg_L']+$row['total_reg_P']);

        $jumlahD3NimL  += $row['total_nim_L'];
        $jumlahD3NimP  += $row['total_nim_P'];
        $jumlahD3NimLP  += ($row['total_nim_L']+$row['total_nim_P']);
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
        <td><?php echo $jumlahD3L  ?></td>
        <td><?php echo $jumlahD3P  ?></td>
        <td><?php echo $jumlahD3LP ?></td>

        <td><?php echo $jumlahD3RegL  ?></td>
        <td><?php echo $jumlahD3RegP  ?></td>
        <td><?php echo $jumlahD3RegLP ?></td>

        <td><?php echo $jumlahD3NimL  ?></td>
        <td><?php echo $jumlahD3NimP  ?></td>
        <td><?php echo $jumlahD3NimLP ?></td>

        
    </tr>
</tfoot>
</table>
<script>
    new DataTable('#JKD3Rekap', {
        processing: true,
        scrollX: true,
        searching: false,
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                title: 'Rekap Total Berdasarkan Jenis Kelamin Jenjang D3',
                filename: 'Rekap Total Berdasarkan Jenis Kelamin Jenjang D3',
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