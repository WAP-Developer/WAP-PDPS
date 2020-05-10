$(document).ready(function () {
    $('#daftar-anggota').DataTable({
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

    // Update data KK

    $(document).on('blur', '#data-table', function () {
        var id = $('#idkk').val();
        var table = $(this).data('column');
        var value = $(this).text();
        $.ajax({
            url: "./update-penduduk",
            method: "POST",
            data: {
                id: id,
                table: table,
                value: value
            }
        })
    });

    // Load Data Anggota

    load_data();

    $('#selesai').click(function () {
        $('#title-navbar').html("Penduduk");
        $('.body-switch').load('./penduduk');
    });
});

function load_data() {
    var loaddata = {
        kkid: $('#idkk').val()
    };

    $.ajax({
        type: "POST",
        url: "./fetchanggota",
        data: loaddata,
        dataType: "JSON",
        success: function (data) {
            var html = '';
            for (var i = 0; i < data.length; i++) {
                var no = i + 1;
                html += '<tr>';
                html += '<td>' + no + '</td>';
                html += '<td>' + data[i].nik + '</td>';
                html += '<td>' + data[i].nama + '</td>';
                html += '<td>' + data[i].jk + '</td>';
                html += '<td>' + data[i].tempat_lahir + ', ' + data[i].tanggal_lahir + '</td>';
                html += '<td>' + data[i].hubungan + '</td>';
                html += '<td width="200px"><button class="btn btn-warning btn-sm mr-1" data-toggle="modal" data-target="#editAnggota" onclick="btnUpdate(' + data[i].id + ')">Edit</button><button type="button" class="btn btn-danger btn-sm mr-1 btn-delete" onclick="btnDelete(' + data[i].id + ')">Hapus</button></td>';
            }
            $('#tabel-anggota').html(html);
        }
    })
};

// add Anggota

$("form[id='formAddAnggota']").submit(function () {
    var dataanggota = $('#formAddAnggota').serialize();
    $.ajax({
        type: "POST",
        url: './add-anggota',
        data: dataanggota,
        success: function (aksi) {
            console.log(aksi)
            if (aksi == 'success') {
                Snackbar.show({
                    text: 'Data Berhasil Disimpan.',
                    pos: 'bottom-center'
                });
                $('#addAnggota').modal('hide');
                load_data();
            } else if (aksi == 'failed') {
                Snackbar.show({
                    text: 'Gagal! NIK Sudah Terdaftar.',
                    pos: 'bottom-center'
                });
            }
        }
    });
});

// Update Anggota
function btnUpdate(id) {
    $.ajax({
        type: "POST",
        url: "./fetch-edit-anggota",
        dataType: "JSON",
        data: {
            id: id
        },
        success: function (data) {
            $('#editnama').val(data.nama);
            $('#editidkk').val(data.kk_id);
            $('#editnik').val(data.nik);
            $('#editjk').val(data.jk);
            $('#editjk').html(data.jk);
            $('#edittempatlahir').val(data.tempat_lahir);
            $('#edittanggallahir').val(data.tanggal_lahir);
            $('#editAgama').val(data.agama);
            $('#editAgama').html(data.agama);
            $('#editpendidikan').val(data.pendidikan);
            $('#editpekerjaan').val(data.pekerjaan);
            $('#editgoldarah').val(data.golongan_darah);
            $('#editgoldarah').html(data.golongan_darah);
            $('#editstatuskawin').val(data.status_nikah);
            $('#edittglkawin').val(data.tgl_nikah);
            $('#edithubungan').val(data.hubungan);
            $('#editkewarganegaraan').val(data.kewarganegaraan);
            $('#editkewarganegaraan').html(data.kewarganegaraan);
            $('#editpaspor').val(data.paspor);
            $('#editkitap').val(data.kitap);
            $('#editayah').val(data.ayah);
            $('#editibu').val(data.ibu);
            $('#idag').val(data.id);
        }
    });
}

$("form[id='formEditAnggota']").submit(function () {
    var dataEditAnggota = $('#formEditAnggota').serialize();
    $.ajax({
        type: "POST",
        url: './update-anggota',
        data: dataEditAnggota,
        success: function (aksi) {
            if (aksi == 'success') {
                Snackbar.show({
                    text: 'Data Berhasil Disimpan.',
                    pos: 'bottom-center'
                });
                $("#selesai").prop('disabled', false);
                $('#editAnggota').modal('hide');
                load_data();
            }
        }
    });
});

// delete Anggota 
function btnDelete(id) {
    swal({
        title: 'Anda Yakin ?',
        text: "Apakah anda yakin ingin menghapus anggota",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        padding: '2em'
    }).then(function (result) {
        if (result.value) {
            swal(
                'Hapus!',
                'Your file has been deleted.',
                'success'
            );

            $.ajax({
                type: "POST",
                url: "./delete-anggota",
                data: {
                    id: id
                },
                success: function (data) {
                    load_data();
                }
            });
        }
    })
}