$(document).ready(function () {
    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 800);
})

$('#zero-config').DataTable({
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

$('#addPenduduk').click(function () {
    $('#title-navbar').html("Tambah Penduduk");
    $('.body-switch').load('./add-penduduk', function () {
        $.getScript("/assets/admin/plugins/table/datatable/datatables.js");
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
    });
});

$('.btn-delete').click(function () {

    var id = $(this).attr('id');

    swal({
        title: 'Anda Yakin ?',
        text: "Apakah anda yakin ingin menghapus data penduduk",
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
                url: "./delete-penduduk",
                data: {
                    id: id
                },
                success: function (data) {
                    $('#title-navbar').html("Penduduk");
                    $('.body-switch').load('./penduduk');
                }
            });
        }
    })
});

$('.btn-editPenduduk').click(function () {
    var id = $(this).attr('id');
    $('#title-navbar').html("Edit Penduduk");
    $('.body-switch').load('./edit-penduduk/' + id);
});