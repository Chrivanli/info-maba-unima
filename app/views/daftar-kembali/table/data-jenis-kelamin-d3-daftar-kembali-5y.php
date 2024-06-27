<!-- Rekap Maba Jenis Kelamin D3 5 Tahun Terakhir -->
<!-- Daftar Kembali -->
<table  id="MabaJKD3" class="display table table-bordered table-striped" style="width: 100%; font-size: smaller; border: 1px">
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

    $jumlahD3Tahun5L = 0;
    $jumlahD3Tahun4L = 0;
    $jumlahD3Tahun3L = 0;
    $jumlahD3Tahun2L = 0;
    $jumlahD3Tahun1L = 0;

    $jumlahD3Tahun5P = 0;
    $jumlahD3Tahun4P = 0;
    $jumlahD3Tahun3P = 0;
    $jumlahD3Tahun2P = 0;
    $jumlahD3Tahun1P = 0;

    $jumlahD3Tahun5LP = 0;
    $jumlahD3Tahun4LP = 0;
    $jumlahD3Tahun3LP = 0;
    $jumlahD3Tahun2LP = 0;
    $jumlahD3Tahun1LP = 0;

    $jumlahD3L        = 0;
    $jumlahD3P        = 0;
    $jumlahD3LP       = 0;

    
$nilai = $data['y_last'];
foreach($data['getJK5yD3'] as $row):
    switch ($nilai) {
        case 2:
            $hidden = '2,3,4,5,6,7,8,9,10';
            $export = '11,12,13,14,15,16';
            $totalD3L = $row['total2_L']+$row['total1_L'];
            $totalD3P = $row['total2_P']+$row['total1_P'];    
            break;
        case 3:
            $hidden = '2,3,4,5,6,7';
            $export = '8,9,10,11,12,13,14,15,16';
            $totalD3L = $row['total3_L']+$row['total2_L']+$row['total1_L'];
            $totalD3P = $row['total3_P']+$row['total2_P']+$row['total1_P'];   
            break;
        case 4:
            $hidden = '2,3,4';
            $export = '5,6,7,8,9,10,11,12,13,14,15,16';
            $totalD3L = $row['total4_L']+$row['total3_L']+$row['total2_L']+$row['total1_L'];
            $totalD3P = $row['total4_P']+$row['total3_P']+$row['total2_P']+$row['total1_P'];    
            break;
        case 5:
            $hidden = '';
            $export = '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16';
            $totalD3L = $row['total5_L']+$row['total4_L']+$row['total3_L']+$row['total2_L']+$row['total1_L'];
            $totalD3P = $row['total5_P']+$row['total4_P']+$row['total3_P']+$row['total2_P']+$row['total1_P'];  
            break;
        default:
            $hidden = '';
            $export = '2,3,4,5,6,7,8,9,10,11,12,13,14,15,16';
            $totalD3L = $row['total5_L']+$row['total4_L']+$row['total3_L']+$row['total2_L']+$row['total1_L'];
            $totalD3P = $row['total5_P']+$row['total4_P']+$row['total3_P']+$row['total2_P']+$row['total1_P'];    
    }
?>
    <tr>
        <td><?= $no++ ?></td>
        <td class="text-start"><?=$row['kolom']?></td>

                <!-- Tahun 5 -->
            <?php      
                    $totalD3LP = $totalD3L + $totalD3P;

                    $jumlahD3Tahun5L        += ($row['total5_L']); 
                    $jumlahD3Tahun5P        += ($row['total5_P']); 
                    $jumlahD3Tahun5LP       += ($row['total5_L']+$row['total5_P']);
            ?>
        <td><?=$row['total5_L']?></td>
        <td><?=$row['total5_P']?></td>
        <td><?=$row['total5_L']+$row['total5_P']?></td>           
               
                <!-- Tahun 4 -->
            <?php      
            $jumlahD3Tahun4L        += ($row['total4_L']);
            $jumlahD3Tahun4P        += ($row['total4_P']);
            $jumlahD3Tahun4LP       += ($row['total4_L']+$row['total4_P']);
            ?>
        <td><?=$row['total4_L']?></td>
        <td><?=$row['total4_P']?></td>
        <td><?=$row['total4_L']+$row['total4_P']?></td>   
       
            <!-- Tahun 3 -->
            <?php      
            $jumlahD3Tahun3L        += ($row['total3_L']); 
            $jumlahD3Tahun3P        += ($row['total3_P']); 
            $jumlahD3Tahun3LP       += ($row['total3_L']+$row['total3_P']);
            ?>
        <td><?=$row['total3_L']?></td>
        <td><?=$row['total3_P']?></td>
        <td><?=$row['total3_L']+$row['total3_P']?></td>   

            <!-- Tahun 2 -->
            <?php      
            $jumlahD3Tahun2L        += ($row['total2_L']);
            $jumlahD3Tahun2P        += ($row['total2_P']);
            $jumlahD3Tahun2LP       += ($row['total2_L']+$row['total2_P']);
            ?>
        <td><?=$row['total2_L']?></td>
        <td><?=$row['total2_P']?></td>
        <td><?=$row['total2_L']+$row['total2_P']?></td>   
            
            <!-- Tahun 1 -->
            <?php      
            $jumlahD3Tahun1L        += ($row['total1_L']);
            $jumlahD3Tahun1P        += ($row['total1_P']);
            $jumlahD3Tahun1LP       += ($row['total1_L']+$row['total1_P']);
            ?>
        <td><?=$row['total1_L']?></td>
        <td><?=$row['total1_P']?></td>
        <td><?=$row['total1_L']+$row['total1_P']?></td>   


            <!-- Total -->
        <td><?=$totalD3L?></td>
        <td><?=$totalD3P?></td>
        <td><?=$totalD3LP?></td>

        <?php      
            $jumlahD3L        += $totalD3L;
            $jumlahD3P        += $totalD3P;
            $jumlahD3LP       += $totalD3LP;
            ?>
    </tr>
    <?php endforeach ?>
</tbody>
<tfoot>
    <tr>

        <th colspan="2">Jumlah</th>
        
        <td><?= $jumlahD3Tahun5L ?></td>
        <td><?= $jumlahD3Tahun5P ?></td>
        <td><?= $jumlahD3Tahun5LP ?></td>
        
        <td><?= $jumlahD3Tahun4L ?></td>
        <td><?= $jumlahD3Tahun4P ?></td>
        <td><?= $jumlahD3Tahun4LP ?></td>

        <td><?= $jumlahD3Tahun3L ?></td>
        <td><?= $jumlahD3Tahun3P ?></td>
        <td><?= $jumlahD3Tahun3LP ?></td>

        <td><?= $jumlahD3Tahun2L ?></td>
        <td><?= $jumlahD3Tahun2P ?></td>
        <td><?= $jumlahD3Tahun2LP ?></td>

        <td><?= $jumlahD3Tahun1L ?></td>
        <td><?= $jumlahD3Tahun1P ?></td>
        <td><?= $jumlahD3Tahun1LP ?></td>
        
        <th><?= $jumlahD3L  ?></th>
        <th><?= $jumlahD3P  ?></th>
        <th><?= $jumlahD3LP ?></th>
    </tr>
</tfoot>
</table>

<script>
//DataTables
$(document).ready(function () {
$('#MabaJKD3').DataTable({
    scrollX: true,
    searching: false,
    dom: "Bfrtip",
    buttons: [
        {
            extend: 'excel',
            title: 'Rekap Daftar Kembali Berdasarkan Jenis Kelamin <?=$data['y_last']?> Tahun Terakhir Jenjang D3',
            filename: 'Rekap Daftar Kembali Berdasarkan Jenis Kelamin <?=$data['y_last']?> Tahun Terakhir Jenjang D3',
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