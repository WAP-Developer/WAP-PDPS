$(document).ready(function () {
    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 800);

    $('#back').click(function () {
        $('#createSurat, #buttonSurat, #loading').hide();
        $('#searchNIK, #contentFound').show();
    });

    $('#loading-button, .table-responsive, #notfound, #loading, .headtable-detail, #createSurat, #buttonSurat').hide();
});

function loadTable(data) {
    var html = '';
    html += `        
        <thead>
            <tr>
                <th>#</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>HDK</th>
                <th></th>
            </tr>
        </thead>
        <tbody>`;
    for (var i = 0; i < data.length; i++) {
        var no = i + 1;
        html += `<tr>
                    <td>` + no + `</td>
                    <td>` + data[i].nik + `</td>
                    <td>` + data[i].nama + `</td>
                    <td>` + data[i].jk + `</td>
                    <td>` + data[i].hubungan + `</td>
                    <td class="text-center"><button class="btn btn-info btn-sm" onclick="choosePeople(` + data[i].id + `)">Pilih</button></td>
                </tr>`;
    }
    $('.nokk').html(data[1].nokk);
    $('.kepalakk').html(data[1].kepalakk);
    html += `</tbody>`;

    $('.table').html(html);
};

$('form[id=formChecker]').submit(function () {
    $('#loading-button').show();
    $('#loading').show();
    $('#notfound, .table-responsive, #finding').hide();

    var nik = $('#formChecker').serialize();

    $.ajax({
        type: "POST",
        url: "./main/getDataNik",
        data: nik,
        dataType: "JSON",
        success: function (data) {
            if (data != "") {
                $('#loading, #loading-button, #notfound').hide();
                $('.table-responsive, .headtable-detail').show();
                loadTable(data);
            } else {
                $('#loading-button, .table-responsive, #loading, .headtable-detail').hide();
                $('#notfound').show();
            }
        }
    });
});

function choosePeople(id) {

    $.ajax({
        type: "POST",
        url: "./main/prosesSktm",
        data: {
            id: id
        },
        success: function (data) {
            if (data == "success") {
                window.open('./main/printSktm');
            }
        }
    });
}