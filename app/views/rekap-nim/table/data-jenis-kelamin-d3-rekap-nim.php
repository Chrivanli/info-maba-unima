<!-- Rekap Maba Jenis Kelamin D3-->
<!-- NIM -->
<table  id="MabaJKD3" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
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

    $jumlahD3S01L = 0;
    $jumlahD3S01P = 0;
    $jumlahD3S01LP = 0;

    $jumlahD3S02L = 0;
    $jumlahD3S02P = 0;
    $jumlahD3S02LP = 0;

    $jumlahD3S03L = 0;
    $jumlahD3S03P = 0;
    $jumlahD3S03LP = 0;

    $jumlahD3TotalL = 0;
    $jumlahD3TotalP = 0;

foreach($data['getJKD3'] as $row):
        
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td class="text-start"><?=$row['kolom']?></td>
            <?php      
                    $jumlahD3S01L     += $row['total_S01L'];
                    $jumlahD3S01P     += $row['total_S01P'];
                    $jumlahD3S01LP    += ($row['total_S01L']+$row['total_S01P']);
            ?>
        <td><?=$row['total_S01L']?></td>
        <td><?=$row['total_S01P']?></td>
        <td><?=($row['total_S01L']+$row['total_S01P'])?></td>
            <?php                    
                    $jumlahD3S02L     += $row['total_S02L'];
                    $jumlahD3S02P     += $row['total_S02P'];
                    $jumlahD3S02LP    += ($row['total_S02L']+$row['total_S02P']);
            ?>
        <td><?=$row['total_S02L']?></td>
        <td><?=$row['total_S02P']?></td>
        <td><?=($row['total_S02L']+$row['total_S02P'])?></td>

            <?php                  
                    $jumlahD3S03L     += $row['total_S03L'];
                    $jumlahD3S03P     += $row['total_S03P'];
                    $jumlahD3S03LP    += ($row['total_S03L']+$row['total_S03P']);
            ?>
        <td><?=$row['total_S03L']?></td>
        <td><?=$row['total_S03P']?></td>
        <td><?=($row['total_S03L']+$row['total_S03P'])?></td>

        <!-- TOTAL -->
        <td><?=$totalD3L=($row['total_S01L']+$row['total_S02L']+$row['total_S03L'])?></td>
        <td><?=$totalD3P=($row['total_S01P']+$row['total_S02P']+$row['total_S03P'])?></td>
        <td><?=$totalD3L+$totalD3P?></td>
        <?php 
            $jumlahD3TotalL += $totalD3L;
            $jumlahD3TotalP += $totalD3P;
        ?>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>

        <th colspan="2">Jumlah</th>
        
        
        <td><?=$jumlahD3S01L  ?></td> 
        <td><?=$jumlahD3S01P  ?></td>
        <td><?=$jumlahD3S01LP  ?></td>


        <td><?=$jumlahD3S02L  ?></td> 
        <td><?=$jumlahD3S02P  ?></td>
        <td><?=$jumlahD3S02LP  ?></td>

        <td><?=$jumlahD3S03L  ?></td> 
        <td><?=$jumlahD3S03P  ?></td>
        <td><?=$jumlahD3S03LP  ?></td>

        <td><?php echo $jumlahD3TotalL  ?></td>
        <td><?php echo $jumlahD3TotalP  ?></td>

        <!-- Jumlah per Program Studi -->
        <th><?php echo $jumlahD3TotalL+$jumlahD3TotalP;  ?></th>
        
    </tr>
</tfoot>
</table>
<script>
    $(document).ready(function () {
    $('#MabaJKD3').DataTable({
        scrollX: true,
        searching: false,
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                title: 'Rekap NIM Berdasarkan Jenis Kelamin Tahun <?=$data['y_post']?> Jenjang D3',
                filename: 'Rekap NIM Berdasarkan Jenis Kelamin Tahun <?=$data['y_post']?> Jenjang D3',
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