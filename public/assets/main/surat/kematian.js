$(document).ready(function () {
    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 800);

    $('#back').click(function () {
        $('#createSurat, #buttonSurat, #loading').hide();
        $('#searchNIKMeninggal, #contentFoundMeninggal').show();
    });

    $('#back2').click(function () {
        $('#title-navbar').html("Kematian");
        $('.body-switch').load('./main/suratKematian');
    });

    $('#loading-button, #loading-button2, .table-responsive, #notfound, #notFoundMeninggal, #loading, #loadingMeninggal, .headtable-detail, #createSurat, #buttonSurat, #buttonBack, #searchNIKMeninggal, #contentFoundMeninggal').hide();
});

// Load Data Pelapor

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
    $('.nokkPelapor').html(data[1].nokk);
    $('.kepalakkPelapor').html(data[1].kepalakk);
    html += `</tbody>`;

    $('.tablePelapor').html(html);
};

$('form[id=formCheckerPelapor]').submit(function () {
    $('#loading-button').show();
    $('#loading').show();
    $('#notfound, .table-responsive, #finding').hide();

    var nik = $('#formCheckerPelapor').serialize();

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

// Pilih Pelapor

function choosePeople(id) {
    $('#searchNIKMeninggal, #contentFoundMeninggal').show();
    $('#searchNIK, #contentFoundPelapor, .headTableMeninggal').hide();

    $('#idPelapor').val(id);

    $.ajax({
        type: "POST",
        url: "./main/getDataAnggota",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function (data) {
            $('#loading').hide();
            $('#idPelapor').val(data.id)
            $('#namaPelapor').val(data.nama)
        }
    });
}

// load Data Meninggal

function loadTableMeninggal(data) {
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
            html += `<button class="btn btn-info btn-sm" onclick="chooseMeninggal(` + data[i].id + `)">Pilih</button>`;
        } else {
            html += `<button class="btn btn-danger btn-sm">` + data[i].status + `</button>`;
        }
        html += `</td>
                </tr>`;
        $('.nokkMeninggal').html(data[1].nokk);
        $('.kepalakkMeninggal').html(data[1].kepalakk);
    }
    html += `</tbody>`;

    $('.tableMeninggal').html(html);
};

$('form[id=formCheckerMeninggal]').submit(function () {
    $('#loading-button2').show();
    $('#loadingMeninggal').show();
    $('#notfound, .table-responsive, #findingMeninggal').hide();

    var nik = $('#formCheckerMeninggal').serialize();

    $.ajax({
        type: "POST",
        url: "./main/getDataNik",
        data: nik,
        dataType: "JSON",
        success: function (data) {
            if (data != "") {
                $('#loadingMeninggal, #loading-button2, #notFoundMeninggal').hide();
                $('.table-responsive, .headTableMeninggal, #buttonBack').show();
                loadTableMeninggal(data);
            } else {
                $('#loading-button2, .table-responsive, #loadingMeninggal, .headTableMeninggal').hide();
                $('#notFoundMeninggal').show();
            }
        }
    });
});

function chooseMeninggal(id) {
    $('#createSurat, #buttonSurat').show();
    $('#contentFoundMeninggal, #searchNIKMeninggal').hide();

    $('#idMeninggal').val(id);

    $.ajax({
        type: "POST",
        url: "./main/getDataAnggota",
        data: {
            id: id
        },
        dataType: "JSON",
        success: function (data) {
            $('#loadingMeninggal').hide();
            $('#idMeninggal').val(data.id)
            $('#namaMeninggal').val(data.nama)
        }
    });

}

$("form[id='formKematian']").submit(function () {
    var dataSurat = $('#formKematian').serialize();
    $.ajax({
        type: "POST",
        url: './main/prosesKematian',
        data: dataSurat,
        success: function (data) {
            if (data == 'success') {
                window.open('./main/printKematian');
            }
        }
    });
});