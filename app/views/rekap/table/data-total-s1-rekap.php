<!-- Rekap Maba TOTAL S1-->
<!-- Total -->
<table  id="MabaS1Rekap" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="2">No.</th>
        <th class="text-center" rowspan="2"><?=$kolom?></th>
        <th class="text-center" colspan="3">Total</th>
    </tr>
    <tr>
        <th class="text-center">Lulus</th>
        <th class="text-center">Daftar</th>
        <th class="text-center">NIM</th>
    </tr>
</thead>
<tbody>
    <?php  
    $no = 1;
    $jumlahS1  = 0;
    $jumlahS1Reg  = 0;
    $jumlahS1Nim  = 0;
    foreach ($data['getTotalS1'] as $row) :
        $jumlahS1     += $row['total'];
        $jumlahS1Reg  += $row['total_reg'];
        $jumlahS1Nim  += $row['total_nim'];
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td class="text-start"><?= $row['kolom'];?></td>
        <td><?= $row['total'] ?></td>
        <td><?= $row['total_reg'] ?></td>
        <td><?= $row['total_nim'] ?></td>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>
        <th colspan="2">Jumlah</th>
        <td><?php echo $jumlahS1     ?></td>
        <td><?php echo $jumlahS1Reg  ?></td>
        <td><?php echo $jumlahS1Nim  ?></td>

        
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
                title: 'Rekap Total Penerimaan Mahasiswa Baru Jenjang S1',
                filename: 'Rekap Total Penerimaan Mahasiswa Baru Jenjang S1',
                footer: true
            },
            ],
        columnDefs: [
            {
            targets: [0,1,2,3,4],
            className: 'dt-center'
            },
            ],
        paging: false,
        ordering: false,
        info: false,
    });
</script>