$(document).ready(function () {
    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 800);
});

$("form[id='avatar']").submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "./main/processUploadAvatar",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data == 'success') {
                notif('Avatar Berhasil di Upload', 'success');
                setTimeout(function () {
                    $('.body-switch').load('./main/profile');
                }, 2000);
                reloadAvatar();
            } else if (data == 'Gagal') {
                notif('File yang anda upload bermasalah', 'error');
            }
        }
    });
});

$("form[id='ttd']").submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "./main/processUploadTtd",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data == 'success') {
                notif('TTD Berhasil di Upload', 'success');
                setTimeout(function () {
                    $('.body-switch').load('./main/profile');
                }, 2000);
            } else if (data == 'Gagal') {
                notif('File yang anda upload bermasalah', 'error');
            }
        }
    });
});

$("#uploadttd").change(function (e) {
    var filename = $(this).val().split('\\').pop();
    if (filename != "") {
        $(".labelttd").html(filename);
    }
});

$("#avatarInput").change(function (e) {
    var filename = $(this).val().split('\\').pop();
    if (filename != "") {
        $(".labelavatar").html(filename);
    }
});

function notif(notif, type) {
    const toast = swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        padding: '2em'
    });

    toast({
        type: type,
        title: notif,
        padding: '2em',
    })
}

function reloadAvatar() {
    $.ajax({
        url: "./main/getAvatarEmploye",
        dataType: "JSON",
        success: function (data) {
            $("#avatarnav").attr('src', './assets/img/avatar/' + data['foto']);
        }
    })
}