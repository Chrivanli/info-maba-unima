<table  id="passed" class="display table table-bordered" style="width: 100%; font-size: smaller; border: 1px">
    <thead class="align-middle">
        <tr>
            <th class="text-center">no_pendaftaran</th>
            <th class="text-center">kd_seleksi</th>
            <th class="text-center">nisn</th>
            <th class="text-center">nama</th>
            <th class="text-center">jenis_kelamin</th>
            <th class="text-center">tanggal_lahir</th>
            <th class="text-center">npsn</th>
            <th class="text-center">nik</th>
            <th class="text-center">kd_jurusan</th>
            <th class="text-center">kip_k</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>423001192</td>
            <td>S01</td>
            <td>0058893537</td>
            <td>AVERINA CHERIL MOMONGAN</td>
            <td>P</td>
            <td>2005-05-14</td>
            <td>60300625</td>
            <td>9101015405050007</td>
            <td>73201</td>
            <td>1123603006251674104</td>
        </tr>
        <tr>
            <td>423003574</td>
            <td>S02</td>
            <td>0046099316</td>
            <td>IZKANTI NURCHAYANI MOKODOMPIT</td>
            <td>P</td>
            <td>2003-02-04</td>
            <td>40100323</td>
            <td>7101194402040301</td>
            <td>63201</td>
            <td></td>
        </tr>
        <tr>
            <td>423011323</td>
            <td>S03</td>
            <td>0051901856</td>
            <td>Teofilus Arki Aseng</td>
            <td>L</td>
            <td>2005-11-14</td>
            <td>69726037</td>
            <td>7101091411050213</td>
            <td>87205</td>
            <td>1123697260371650684</td>
        </tr>
    </tbody>
</table>

<script>

//DataTables
$(document).ready(function () {
    $('#exampleTemplatePassed').on( 'shown.bs.modal', function (e) {
    console.log('modal')
         $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
     } );
   $('#exampleTemplatePassed').modal({
   keyboard: false
    })
    $('#passed').DataTable({
        scrollX: true,
        // scrollY: "50vh",
        searching: false,
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                title: '',
                filename: 'Contoh unggah file lulus seleksi di info-maba-unima'
            },
            {
                extend: 'csv',
                title: '',
                filename: 'Contoh unggah file lulus seleksi di info-maba-unima'
            },
            ],
        // columnDefs: [
        //     {
        //     targets: [0,1,2,3,4,5,6,7,8,9],
        //     className: 'dt-center'
        //     },
        //     ],
        paging: false,
        ordering: false,
        info: false,
    });
});
</script>