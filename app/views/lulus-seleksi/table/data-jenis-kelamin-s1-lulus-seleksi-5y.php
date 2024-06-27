<!-- Rekap Maba Jenis Kelamin S1 5 Tahun Terakhir -->
<!-- Lulus Seleksi -->
<table  id="MabaJKS1" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
<thead class="align-middle">
    <tr>
        <th class="text-center" rowspan="3">No.</th>
        <th class="text-center" rowspan="3"><?= $kolom ?></th>
        <th class="text-center" colspan="15"><?php if($data['seleksi']==''){echo 'Tahun';}else{echo $data['seleksi'];}?></th>
        <th class="text-center" rowspan="2" colspan="3">Total</th>
    </tr>
    <tr>
        <th class="text-center" colspan="3"><?=date('Y')-4?></th>
        <th class="text-center" colspan="3"><?=date('Y')-3?></th>
        <th class="text-center" colspan="3"><?=date('Y')-2?></th>
        <th class="text-center" colspan="3"><?=date('Y')-1?></th>
        <th class="text-center" colspan="3"><?=date('Y')  ?></th>
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

    $jumlahS1Tahun5L = 0;
    $jumlahS1Tahun4L = 0;
    $jumlahS1Tahun3L = 0;
    $jumlahS1Tahun2L = 0;
    $jumlahS1Tahun1L = 0;

    $jumlahS1Tahun5P = 0;
    $jumlahS1Tahun4P = 0;
    $jumlahS1Tahun3P = 0;
    $jumlahS1Tahun2P = 0;
    $jumlahS1Tahun1P = 0;

    $jumlahS1Tahun5LP = 0;
    $jumlahS1Tahun4LP = 0;
    $jumlahS1Tahun3LP = 0;
    $jumlahS1Tahun2LP = 0;
    $jumlahS1Tahun1LP = 0;

    $jumlahS1L        = 0;
    $jumlahS1P        = 0;
    $jumlahS1LP       = 0;

    
$nilai = $data['y_last'];
foreach($data['getJK5yS1'] as $row):
    switch ($nilai) {
        case 2:
            $hidden = '2,3,4,5,6,7,8,9,10';
            $export = '11,12,13,14,15,16';
            $totalS1L = $row['total2_L']+$row['total1_L'];
            $totalS1P = $row['total2_P']+$row['total1_P'];    
            break;
        case 3:
            $hidden = '2,3,4,5,6,7';
            $export = '8,9,10,11,12,13,14,15,16';
            $totalS1L = $row['total3_L']+$row['total2_L']+$row['total1_L'];
            $totalS1P = $row['total3_P']+$row['total2_P']+$row['total1_P'];   
            break;
        case 4:
            $hidden = '2,3,4';
            $export = '5,6,7,8,9,10,11,12,13,14,15,16';
            $totalS1L = $row['total4_L']+$row['total3_L']+$row['total2_L']+$row['total1_L'];
            $totalS1P = $row['total4_P']+$row['total3_P']+$row['total2_P']+$row['total1_P'];    
            break;
        case 5:
            $hidden = '';
            $export = '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16';
            $totalS1L = $row['total5_L']+$row['total4_L']+$row['total3_L']+$row['total2_L']+$row['total1_L'];
            $totalS1P = $row['total5_P']+$row['total4_P']+$row['total3_P']+$row['total2_P']+$row['total1_P'];  
            break;
        default:
            $hidden = '';
            $export = '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16';
            $totalS1L = $row['total5_L']+$row['total4_L']+$row['total3_L']+$row['total2_L']+$row['total1_L'];
            $totalS1P = $row['total5_P']+$row['total4_P']+$row['total3_P']+$row['total2_P']+$row['total1_P'];    
    }
?>
    <tr>
        <td><?= $no++ ?></td>
        <td class="text-start"><?=$row['kolom']?></td>

                <!-- Tahun 5 -->
            <?php      
                    $totalS1LP = $totalS1L + $totalS1P;

                    $jumlahS1Tahun5L        += ($row['total5_L']); 
                    $jumlahS1Tahun5P        += ($row['total5_P']); 
                    $jumlahS1Tahun5LP       += ($row['total5_L']+$row['total5_P']);
            ?>
        <td><?=$row['total5_L']?></td>
        <td><?=$row['total5_P']?></td>
        <td><?=$row['total5_L']+$row['total5_P']?></td>           
               
                <!-- Tahun 4 -->
            <?php      
            $jumlahS1Tahun4L        += ($row['total4_L']);
            $jumlahS1Tahun4P        += ($row['total4_P']);
            $jumlahS1Tahun4LP       += ($row['total4_L']+$row['total4_P']);
            ?>
        <td><?=$row['total4_L']?></td>
        <td><?=$row['total4_P']?></td>
        <td><?=$row['total4_L']+$row['total4_P']?></td>   
       
            <!-- Tahun 3 -->
            <?php      
            $jumlahS1Tahun3L        += ($row['total3_L']); 
            $jumlahS1Tahun3P        += ($row['total3_P']); 
            $jumlahS1Tahun3LP       += ($row['total3_L']+$row['total3_P']);
            ?>
        <td><?=$row['total3_L']?></td>
        <td><?=$row['total3_P']?></td>
        <td><?=$row['total3_L']+$row['total3_P']?></td>   

            <!-- Tahun 2 -->
            <?php      
            $jumlahS1Tahun2L        += ($row['total2_L']);
            $jumlahS1Tahun2P        += ($row['total2_P']);
            $jumlahS1Tahun2LP       += ($row['total2_L']+$row['total2_P']);
            ?>
        <td><?=$row['total2_L']?></td>
        <td><?=$row['total2_P']?></td>
        <td><?=$row['total2_L']+$row['total2_P']?></td>   
            
            <!-- Tahun 1 -->
            <?php      
            $jumlahS1Tahun1L        += ($row['total1_L']);
            $jumlahS1Tahun1P        += ($row['total1_P']);
            $jumlahS1Tahun1LP       += ($row['total1_L']+$row['total1_P']);
            ?>
        <td><?=$row['total1_L']?></td>
        <td><?=$row['total1_P']?></td>
        <td><?=$row['total1_L']+$row['total1_P']?></td>   


            <!-- Total -->
        <td><?=$totalS1L?></td>
        <td><?=$totalS1P?></td>
        <td><?=$totalS1LP?></td>

        <?php      
            $jumlahS1L        += $totalS1L;
            $jumlahS1P        += $totalS1P;
            $jumlahS1LP       += $totalS1LP;
            ?>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>

        <th colspan="2">Jumlah</th>
        
        <td><?= $jumlahS1Tahun5L ?></td>
        <td><?= $jumlahS1Tahun5P ?></td>
        <td><?= $jumlahS1Tahun5LP ?></td>
        
        <td><?= $jumlahS1Tahun4L ?></td>
        <td><?= $jumlahS1Tahun4P ?></td>
        <td><?= $jumlahS1Tahun4LP ?></td>

        <td><?= $jumlahS1Tahun3L ?></td>
        <td><?= $jumlahS1Tahun3P ?></td>
        <td><?= $jumlahS1Tahun3LP ?></td>

        <td><?= $jumlahS1Tahun2L ?></td>
        <td><?= $jumlahS1Tahun2P ?></td>
        <td><?= $jumlahS1Tahun2LP ?></td>

        <td><?= $jumlahS1Tahun1L ?></td>
        <td><?= $jumlahS1Tahun1P ?></td>
        <td><?= $jumlahS1Tahun1LP ?></td>
        
        <th><?= $jumlahS1L  ?></th>
        <th><?= $jumlahS1P  ?></th>
        <th><?= $jumlahS1LP ?></th>
    </tr>
</tfoot>
</table>

<script>
//DataTables
$(document).ready(function () {
$('#MabaJKS1').DataTable({
    scrollX: true,
    searching: false,
    dom: "Bfrtip",
    buttons: [
        {
            extend: 'excel',
            title: 'Rekap Lulus Seleksi Berdasarkan Jenis Kelamin <?=$data['y_last']?> Tahun Terakhir Jenjang S1',
            filename: 'Rekap Lulus Seleksi Berdasarkan Jenis Kelamin <?=$data['y_last']?> Tahun Terakhir Jenjang S1',
            footer: true,
            exportOptions: {
                                columns: [0,1,<?=$export?>,17,18,19]
                            }
        },
        ],
    columnDefs: [
        {
        targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19],
        className: 'dt-center'
        },
        {
        targets: [<?=$hidden?>],
        visible:false
        }
        ],
    paging: false,
    ordering: false,
    info: false,
});
});
</script>