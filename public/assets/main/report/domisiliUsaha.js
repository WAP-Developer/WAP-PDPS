$(document).ready(function () {
    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 800);

    $.ajax({
        url: "./get-domisili-usaha",
        dataType: "JSON",
        success: function (data) {
            loadData(data)
        }
    })

    $('#loading').hide();
    $('#table-report').show();
})

function loadData(data) {
    var html = '';
    html += `
            <table table table id = "data-table"
            class = "table table-striped dt-responsive nowrap"
            style = "width:100%" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat Usaha</th>
                        <th>Jenis Usaha</th>
                        <th>Mulai Usaha</th>
                        <th>Masa Berlaku</th>
                        <th>Tanggal Surat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>`;
    for (var i = 0; i < data.length; i++) {
        var no = i + 1;
        html += `<tr>
                    <td></td>
                    <td>` + no + `</td>
                    <td>` + data[i].no_surat + `</td>
                    <td>` + data[i].nik_umum + `</td>
                    <td>` + data[i].nama + `</td>
                    <td>` + data[i].alamat_usaha + `</td>
                    <td>` + data[i].jenis_usaha + `</td>
                    <td>` + data[i].mulai_usaha + `</td>
                    <td>` + data[i].masa_berlaku + `</td>
                    <td>` + data[i].tanggal_surat + `</td>
                    <td>                        
                        <button type="button" class="btn btn-warning btn-sm" data-id="">Cetak Surat</button>
                    </td>
                </tr>`;
    }
    html += `</tbody>
            </table>`;
    $('#table-report').html(html);

    $('#data-table').DataTable({
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [{
                extend: 'excel',
                title: 'Data Laporan Surat Domisili Usaha',
                className: 'btn'
            }]
        },
        "info": false,
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
}

$('form[id=formFilter]').submit(function () {
    $('#loading').show();
    $('#table-report').hide();

    var date = $('#formFilter').serialize();

    $.ajax({
        type: "POST",
        url: "./get-domisili-usaha",
        data: date,
        dataType: "JSON",
        success: function (data) {
            $('#loading').hide();
            $('#table-report').show();
            loadData(data);
        }
    });
});