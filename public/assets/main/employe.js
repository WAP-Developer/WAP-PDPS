$(document).ready(function () {
    $('#addEmployeForm').hide("fast");
    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 800);
});

$('#addEmploye').click(function () {
    $("#title-head").html("<b>Tambah Karyawan</b>");
    $("#addEmploye").hide("fast");
    $("#tableEmploye").hide("slow");
    $('#addEmployeForm').show("slow");
});

$('#btnCancel').click(function () {
    $("#title-head").html("<b>Daftar Karyawan</b>");
    $("#addEmploye").show("fast");
    $("#tableEmploye").show("slow");
    $('#addEmployeForm').hide("slow");
})

$('#html5-extension').DataTable({
    dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
    buttons: {
        buttons: [{
                extend: 'excel',
                className: 'btn'
            },
            {
                extend: 'print',
                className: 'btn'
            }
        ]
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

// =====================================
// Proses Add Employe

$("form[id='formAddEmploye']").submit(function () {
    var dataEmploye = $('#formAddEmploye').serialize();

    $.ajax({
        type: "POST",
        url: './main/addEmploye',
        data: dataEmploye,
        success: function (data) {
            if (data == 'success') {
                swal(
                    'Berhasil!',
                    'Data Berhasil di Tambahkan.',
                    'success'
                );
                $('#title-navbar').html("Karyawan");
                $('.body-switch').load('./main/employe');
            } else {
                swal({
                    title: 'Gagal!',
                    text: "NIP anda sudah terdaftar",
                    type: 'error',
                    padding: '2em'
                })
            }
        }
    });
});

// =====================================
// Reset Employe

$('.btn-reset').click(function () {

    var id = $(this).data('id');

    swal({
        title: 'Anda Yakin ?',
        text: "Apakah anda yakin ingin mengatur ulang kata sandi",
        type: 'warning',
        showCancelButton: 'true',
        confirmButtonText: 'Atur Ulang',
        padding: '2em'
    }).then(function (result) {
        if (result.value) {
            swal(
                'Berhasil!',
                'Kata Sandi Berhasil di Setel Ulang.',
                'success'
            );

            $.ajax({
                type: "POST",
                url: "./main/resetEmploye",
                data: {
                    id: id
                },
                success: function (data) {
                    $('#title-navbar').html("Karyawan");
                    $('.body-switch').load('./main/employe');
                }
            });
        }
    });
});

// =====================================
// Delete Employe

$('.btn-delete').click(function () {

    var id = $(this).data('id');

    swal({
        title: 'Anda Yakin ?',
        text: "Apakah anda yakin ingin menghapus data karyawan",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        padding: '2em'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: "POST",
                url: "./main/deleteEmploye",
                data: {
                    id: id
                },
                success: function (data) {
                    $('#title-navbar').html("Karyawan");
                    $('.body-switch').load('./main/employe');
                    swal(
                        'Berhasil!',
                        'Data Berhasil Dihapus.',
                        'success'
                    );
                }
            });
        }
    });
});