<!-- Rekap Maba Jenis Kelamin S1-->
<!-- Daftar Kembali -->
<table  id="MabaJKS1" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="3">No.</th>
        <th class="text-center" rowspan="3"><?=$kolom?></th>
        <th class="text-center" colspan="9">Jalur Masuk</th>
        <th class="text-center" rowspan="2" colspan="3">Total</th>
    </tr>
    <tr>
        <th class="text-center" colspan="3"><?=$data['S01'];?></th>
        <th class="text-center" colspan="3"><?=$data['S02'];?></th>
        <th class="text-center" colspan="3"><?=$data['S03'];?></th>
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

        <th class="text-center">L</th>
        <th class="text-center">P</th>
        <th class="text-center">L+P</th>
    </tr>
</thead>
<tbody>
    <?php  
    $no = 1;

    $jumlahS1S01L = 0;
    $jumlahS1S01P = 0;
    $jumlahS1S01LP = 0;

    $jumlahS1S02L = 0;
    $jumlahS1S02P = 0;
    $jumlahS1S02LP = 0;

    $jumlahS1S03L = 0;
    $jumlahS1S03P = 0;
    $jumlahS1S03LP = 0;

    $jumlahS1TotalL = 0;
    $jumlahS1TotalP = 0;

foreach($data['getJKS1'] as $row):
        
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td class="text-start"><?=$row['kolom']?></td>
            <?php      
                    $jumlahS1S01L     += $row['total_S01L'];
                    $jumlahS1S01P     += $row['total_S01P'];
                    $jumlahS1S01LP    += ($row['total_S01L']+$row['total_S01P']);
            ?>
        <td><?=$row['total_S01L']?></td>
        <td><?=$row['total_S01P']?></td>
        <td><?=($row['total_S01L']+$row['total_S01P'])?></td>
            <?php                    
                    $jumlahS1S02L     += $row['total_S02L'];
                    $jumlahS1S02P     += $row['total_S02P'];
                    $jumlahS1S02LP    += ($row['total_S02L']+$row['total_S02P']);
            ?>
        <td><?=$row['total_S02L']?></td>
        <td><?=$row['total_S02P']?></td>
        <td><?=($row['total_S02L']+$row['total_S02P'])?></td>

            <?php                  
                    $jumlahS1S03L     += $row['total_S03L'];
                    $jumlahS1S03P     += $row['total_S03P'];
                    $jumlahS1S03LP    += ($row['total_S03L']+$row['total_S03P']);
            ?>
        <td><?=$row['total_S03L']?></td>
        <td><?=$row['total_S03P']?></td>
        <td><?=($row['total_S03L']+$row['total_S03P'])?></td>

        <!-- TOTAL -->
        <td><?=$totalS1L=($row['total_S01L']+$row['total_S02L']+$row['total_S03L'])?></td>
        <td><?=$totalS1P=($row['total_S01P']+$row['total_S02P']+$row['total_S03P'])?></td>
        <td><?=$totalS1L+$totalS1P?></td>
        <?php 
            $jumlahS1TotalL += $totalS1L;
            $jumlahS1TotalP += $totalS1P;
        ?>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>

        <th colspan="2">Jumlah</th>
        
        
        <td><?=$jumlahS1S01L  ?></td> 
        <td><?=$jumlahS1S01P  ?></td>
        <td><?=$jumlahS1S01LP  ?></td>


        <td><?=$jumlahS1S02L  ?></td> 
        <td><?=$jumlahS1S02P  ?></td>
        <td><?=$jumlahS1S02LP  ?></td>

        <td><?=$jumlahS1S03L  ?></td> 
        <td><?=$jumlahS1S03P  ?></td>
        <td><?=$jumlahS1S03LP  ?></td>

        <td><?php echo $jumlahS1TotalL  ?></td>
        <td><?php echo $jumlahS1TotalP  ?></td>

        <!-- Jumlah per Program Studi -->
        <th><?php echo $jumlahS1TotalL+$jumlahS1TotalP;  ?></th>
        
    </tr>
</tfoot>
</table>
<script>
    $(document).ready(function () {
    $('#MabaJKS1').DataTable({
        scrollX: true,
        searching: false,
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                title: 'Rekap Daftar Kembali Berdasarkan Jenis Kelamin Tahun <?=$data['y_post']?> Jenjang S1',
                filename: 'Rekap Daftar Kembali Berdasarkan Jenis Kelamin Tahun <?=$data['y_post']?> Jenjang S1',
                footer: true
            },
            ],
        columnDefs: [
            {
            targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13],
            className: 'dt-center'
            },
            ],
        paging: false,
        ordering: false,
        info: false,
    });
    });
</script>