<!-- Rekap Maba TOTAL D3-->
<!-- Total -->
<table  id="MabaD3Rekap" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
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
    $jumlahD3  = 0;
    $jumlahD3Reg  = 0;
    $jumlahD3Nim  = 0;
    foreach ($data['getTotalD3'] as $row) :
        $jumlahD3     += $row['total'];
        $jumlahD3Reg  += $row['total_reg'];
        $jumlahD3Nim  += $row['total_nim'];
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
        <td><?php echo $jumlahD3     ?></td>
        <td><?php echo $jumlahD3Reg  ?></td>
        <td><?php echo $jumlahD3Nim  ?></td>

        
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
                title: 'Rekap Total Penerimaan Mahasiswa Baru Jenjang D3',
                filename: 'Rekap Total Penerimaan Mahasiswa Baru Jenjang D3',
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