$(document).ready(function () {
    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 800);

    $('#back').click(function () {
        $('#createSurat, #buttonSurat, #loading').hide();
        $('#searchNIK, #contentFound').show();
    });

    $('.createSurat').click(function () {
        window.open('./main/printPindah');
    });

    $('#loading-button, .table-responsive, #notfound, #loading, .headtable-detail, #createSurat, #buttonSurat, #pilihAnggota').hide();
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
                    <td class="text-center">`;
        if (data[i].status == '-') {
            html += `<button class="btn btn-info btn-sm" onclick="choosePeople(` + data[i].id + `)">Pilih</button>`;
        } else {
            html += `<button class="btn btn-danger btn-sm">` + data[i].status + `</button>`;
        }
        html += `</td>
                </tr>`;
    }
    $('.nokk').html(data[1].nokk);
    $('.kepalakk').html(data[1].kepalakk);
    html += `</tbody>`;

    $('.tablef').html(html);
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
    $('#createSurat, #buttonSurat, #loading').show();
    $('#searchNIK, #contentFound').hide();

    $('#idAnggota').val(id);

    $.ajax({
        url: "./main/noSuratPerusahaan",
        dataType: "html",
        success: function (data) {
            $('#noSurat').val(data)
        }
    });

    $.ajax({
        type: "POST",
        url: "./main/getDataAnggota",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function (data) {
            $('#loading').hide();
            $('#nik').val(data.nik)
            $('#id').val(data.id)
            $('#nama').val(data.nama)
        }
    });
}

function loadTableChoose(data) {
    var html = '';
    html += `        
        <thead>
            <tr>
                <th>#</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>HDK</th>
                <th>Pilih</th>
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
                    <td class="text-center">`;
        if (data[i].status == '-') {
            html += `<label class="new-control new-checkbox new-checkbox-rounded checkbox-primary">
                        <input type="checkbox" class="new-control-input checkAnggota" data-anggota="` + data[i].id + `">
                        </label>`;
        } else {
            html += `<button class="btn btn-danger btn-sm">` + data[i].status + `</button>`;
        }
        html += `</td>                        
                </tr>`;
    }
    $('.nokk').html(data[1].nokk);
    $('.kepalakk').html(data[1].kepalakk);
    html += `</tbody>`;

    $('.tablec').html(html);

    $('.checkAnggota').on('click', function () {
        var idAg = $(this).data('anggota');
        var idPindah = $('#idPindah').val();

        $.ajax({
            type: "POST",
            url: "./main/insertPindahAnggota",
            data: {
                idAg: idAg,
                idPindah: idPindah
            }
        });
    });
};

$("form[id='formPindah']").submit(function () {
    $('#buttonSurat').hide();
    var dataSurat = $('#formPindah').serialize();
    var nik = $('#nik').val();

    $.ajax({
        type: "POST",
        url: './main/prosesPindah',
        data: dataSurat,
        success: function (data) {
            if (data) {
                $('#pilihAnggota').show();
                $('#createSurat').hide();

                $('#idPindah').val(data);
            }
        }
    });

    $.ajax({
        type: "POST",
        url: "./main/getDataNik",
        data: {
            nik: nik
        },
        dataType: "JSON",
        success: function (data) {
            loadTableChoose(data);
        }
    });
});