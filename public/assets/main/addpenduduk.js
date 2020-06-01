// Validasi
function addMainPenduduk() {
    validationForm();
}

function validationForm() {
    var nokk = $("#nokk").val().length;
    var kepala = $("#kepala").val().length;
    var anggota = $("#anggota").val().length;
    var alamat = $("#alamat").val().length;
    var rt = $("#rt").val().length;
    var desa = $("#desa").val().length;
    var kec = $("#kec").val().length;
    var kab = $("#kab").val().length;
    var pos = $("#pos").val().length;
    var provinsi = $("#provinsi").val().length;

    if (nokk < 1) {
        $("#nokkError").html("No KK Tidak Boleh Kosong.");
        $("#nokkError").css('display', 'block');
    } else if (nokk != 16) {
        $("#nokkError").html("No KK Harus 16 Angka");
        $("#nokkError").css('display', 'block');
    } else {
        $("#nokkError").css('display', 'none');
    }

    if (kepala < 1) {
        $("#kepalaError").html("Kepala Tidak Boleh Kosong.");
        $("#kepalaError").css('display', 'block');
    } else {
        $("#kepalaError").css('display', 'none');
    }

    if (anggota < 1) {
        $("#anggotaError").html("Anggota Tidak Boleh Kosong.");
        $("#anggotaError").css('display', 'block');
    } else {
        $("#anggotaError").css('display', 'none');
    }

    if (alamat < 1) {
        $("#alamatError").html("Alamat Tidak Boleh Kosong.");
        $("#alamatError").css('display', 'block');
    } else {
        $("#alamatError").css('display', 'none');
    }

    if (rt < 1) {
        $("#rtError").html("RT/RW Tidak Boleh Kosong.");
        $("#rtError").css('display', 'block');
    } else {
        $("#rtError").css('display', 'none');
    }

    if (desa < 1) {
        $("#desaError").html("Desa Tidak Boleh Kosong.");
        $("#desaError").css('display', 'block');
    } else {
        $("#desaError").css('display', 'none');
    }

    if (kec < 1) {
        $("#kecError").html("Kecamatan Tidak Boleh Kosong.");
        $("#kecError").css('display', 'block');
    } else {
        $("#kecError").css('display', 'none');
    }

    if (kab < 1) {
        $("#kabError").html("Kabupaten/Kota Tidak Boleh Kosong.");
        $("#kabError").css('display', 'block');
    } else {
        $("#kabError").css('display', 'none');
    }

    if (pos < 1) {
        $("#posError").html("Kode Pos Tidak Boleh Kosong.");
        $("#posError").css('display', 'block');
    } else {
        $("#posError").css('display', 'none');
    }

    if (provinsi < 1) {
        $("#provError").html("Provinsi Tidak Boleh Kosong.");
        $("#provError").css('display', 'block');
    } else {
        $("#provError").css('display', 'none');
    }

    if (nokk > 0 && kepala > 0 && anggota > 0 && alamat > 0 && rt > 0 && desa > 0 && kec > 0 && kab > 0 && pos > 0 && provinsi > 0 && nokk == 16) {
        submitData();
    }
}

//  Simpan data KK
function submitData() {
    $("#loading-button").show();
    var datapenduduk = $('#formAddMain').serialize();
    $.ajax({
        type: "POST",
        url: './add-penduduk',
        data: datapenduduk,
        success: function (aksi) {
            if (aksi == 'success') {
                successAdd()
            } else if (aksi == 'failed') {
                Snackbar.show({
                    text: 'Gagal! No KK Sudah Terdaftar.',
                    pos: 'bottom-center'
                });
            }
            $("#loading-button").hide();
        }
    });

    function successAdd() {
        Snackbar.show({
            text: 'Data Berhasil Disimpan.',
            pos: 'bottom-center'
        });
        $("#nokk").prop('disabled', true);
        $("#kepala").prop('disabled', true);
        $("#anggota").prop('disabled', true);
        $("#alamat").prop('disabled', true);
        $("#rt").prop('disabled', true);
        $("#desa").prop('disabled', true);
        $("#kec").prop('disabled', true);
        $("#kab").prop('disabled', true);
        $("#pos").prop('disabled', true);
        $("#provinsi").prop('disabled', true);
        $("#submitData").prop('disabled', true);
        $("#daftarAnggota").show("slow");

        var datakk = {
            nokk: $("#nokk").val(),
        };

        $.ajax({
            type: "POST",
            url: './fetchnokk',
            data: datakk,
            success: function (hasil) {
                $('#idkk').val(hasil);
            }
        });
    }
}

function load_data() {
    var loaddata = {
        kkid: $("#idkk").val()
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
                html += '<td width="200px"><button class="btn btn-warning btn-sm mr-1 btn-update" data-toggle="modal" data-target="#editAnggota" onclick="btnUpdate(' + data[i].id + ')">Edit</button><button type="button" class="btn btn-danger btn-sm mr-1 btn-delete" onclick="btnDelete(' + data[i].id + ')">Hapus</button></td>';
            }
            $('tbody').html(html);
        }
    })
};

// Load Data Awal
$(document).ready(function () {
    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 800);
    load_data();
    $("#selesai").prop('disabled', true);
    $("#loading-button").hide();
    $("#daftarAnggota").hide();
});

// submitAnggota
$("form[id='formAddAnggota']").submit(function () {
    var dataanggota = $('#formAddAnggota').serialize();
    $.ajax({
        type: "POST",
        url: './add-anggota',
        data: dataanggota,
        success: function (aksi) {
            if (aksi == 'success') {
                Snackbar.show({
                    text: 'Data Berhasil Disimpan.',
                    pos: 'bottom-center'
                });
                $('#addAnggota').modal('hide');
                $("#selesai").prop('disabled', false);
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

// Load Penduduk
function loadPenduduk() {
    $('.body-switch').load('./penduduk');
}

// btn Delete
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
                'Berhasil!',
                'Data Berhasil Dihapus.',
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

// btn Update
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