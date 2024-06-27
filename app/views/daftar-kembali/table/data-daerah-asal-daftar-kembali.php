<!-- Rekap Daerah Asal -->
<!-- Daftar Kembali -->
<table  id="MabaDA" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="2">No.</th>
        <th class="text-center" rowspan="2">Kode</th>
        <th class="text-center" rowspan="2">Provinsi</th>
        <th class="text-center" colspan="3">Jalur Masuk</th>
        <th class="text-center" rowspan="2">Total</th>
    </tr>
    <tr>
        
        <th class="text-center"><?= $data['S01'] ?></th>
        <th class="text-center"><?= $data['S02'] ?></th>
        <th class="text-center"><?= $data['S03'] ?></th>
    </tr>
</thead>
<tbody>
    <?php  
    $no = 1;
    $jumlahS01  = 0;
    $jumlahTotalS01 = 0;
    $jumlahS02  = 0;
    $jumlahTotalS02 = 0;
    $jumlahS03  = 0;
    $jumlahTotalS03 = 0;

    foreach($data['getDA'] as $row):
        $jumlahS01          += $row['total_S01'];
        $jumlahS02          += $row['total_S02'];
        $jumlahS03          += $row['total_S03'];
        ?>
    <tr>
        <td><?= $no++; ?></td>
        <td class="text-center"><?= $row['kd_provinsi'] ?></td>
        <td class="text-start"><?= $row['nama_provinsi'] ?></td>
        <td><?= $row['total_S01'] ?></td>
        <td><?= $row['total_S02'] ?></td>
        <td><?= $row['total_S03'] ?></td>
        <td><?= ($row['total_S01']+$row['total_S02']+$row['total_S03']); ?></td>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>
        <th colspan="3">Total</th>
        <td><?= $jumlahS01  ?></td>
        <td><?= $jumlahS02  ?></td>
        <td><?= $jumlahS03  ?></td>
        <th><?= $jumlahS01+$jumlahS02+$jumlahS03;  ?></th>
        
    </tr>
</tfoot>
</table>

<script>
//DataTables
    $(document).ready(function () {
    $('#MabaDA').DataTable({
        scrollX: true,
        searching: false,
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                title: 'Rekap Daftar Kembali Berdasarkan Daerah Asal Tahun <?= $data['y_post'] ?>',
                filename: 'Rekap Daftar Kembali Berdasarkan Daerah Asal Tahun <?= $data['y_post'] ?>',
                footer: true
            },
            ],
        columnDefs: [
            {
            targets: [0,1,2,3,4,5,6],
            className: 'dt-center'
            },
            ],
        paging: false,
        ordering: false,
        info: false,
    });
    });
</script>