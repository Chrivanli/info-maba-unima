<table  id="regist" class="display table table-bordered" style="width: 100%; font-size: smaller; border: 1px">
    <thead class="align-middle">
        <tr>
            <th class="text-center">no_pendaftaran</th>
            <th class="text-center">kd_seleksi</th>
            <th class="text-center">nama</th>
            <th class="text-center">kd_jurusan</th>
            <th class="text-center">s_verifikasi</th>
            <th class="text-center">tgl_verifikasi</th>
            <th class="text-center">s_kipk</th>
            <th class="text-center">s_bayar</th>
            <th class="text-center">tgl_bayar</th>
            <th class="text-center">s_nim</th>
            <th class="text-center">tgl_nim</th>
            <th class="text-center">nim</th>
            <th class="text-center">reg</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>423001192</td>
            <td>S01</td>
            <td>AVERINA CHERIL MOMONGAN</td>
            <td>73201</td>
            <td>1</td>
            <td>2023-05-12</td>
            <td>KIPK</td>
            <td></td>
            <td></td>
            <td>1</td>
            <td>2023-08-04</td>
            <td>23101133</td>
            <td>1</td>
        </tr>
        <tr>
            <td>423003574</td>
            <td>S02</td>
            <td>IZKANTI NURCHAYANI MOKODOMPIT</td>
            <td>63201</td>
            <td>1</td>
            <td>2023-05-27</td>
            <td></td>
            <td>1</td>
            <td>2023-06-21</td>
            <td>1</td>
            <td>2023-06-23</td>
            <td>23603009</td>
            <td>1</td>
        </tr>
        <tr>
            <td>423011323</td>
            <td>S03</td>
            <td>TEOFILUS ARKI ASENG</td>
            <td>87205</td>
            <td>1</td>
            <td>2023-04-15</td>
            <td>KIPK</td>
            <td></td>
            <td></td>
            <td>1</td>
            <td>2023-08-04</td>
            <td>23607013</td>
            <td>1</td>
        </tr>
        
    </tbody>
</table>

<script>

//DataTables
$(document).ready(function () {
    $('#exampleTemplateRegist').on( 'shown.bs.modal', function (e) {
    console.log('modal')
         $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
     } );
   $('#exampleTemplateRegist').modal({
   keyboard: false
    })
    $('#regist').DataTable({
        scrollX: true,
        // scrollY: "50vh",
        searching: false,
        dom: "Bfrtip",
        buttons: [
            {
                extend: 'excel',
                title: '',
                filename: 'Contoh unggah file daftar kembali di info-maba-unima'
            },
            {
                extend: 'csv',
                title: '',
                filename: 'Contoh unggah file daftar kembali di info-maba-unima'
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