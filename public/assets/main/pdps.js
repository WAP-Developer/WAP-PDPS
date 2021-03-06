$(document).ready(function () {
    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 800);
});

// Karyawan
function loginEmploye() {
    checkValidation();
}

function checkValidation() {
    var nipLength = $("#formNip").val().length;
    var nipValue = $("#formNip").val();

    if (nipLength < 1) {
        $("#nipError").html("NIP Tidak Boleh Kosong.");
        $("#nipError").css('display', 'block');
    } else if (!(/^\S{3,}$/.test(nipValue))) {
        $("#nipError").html("NIP Tidak Boleh Ada Spasi.");
        $("#nipError").css('display', 'block');
    } else {
        $("#nipError").css('display', 'none');
    }

    var passLength = $("#password").val().length;

    if (passLength < 1) {
        $("#passwordError").html("Password Tidak Boleh Kosong.");
        $("#passwordError").css('display', 'block');
    } else if (passLength < 8) {
        $("#passwordError").html("Password Mininal 8 Karakter.");
        $("#passwordError").css('display', 'block');
    } else {
        $("#passwordError").css('display', 'none');
    }

    if (nipLength > 0 && passLength > 0 && passLength > 7 && (/^\S{3,}$/.test(nipValue))) {
        loginCheck();
    }
}

function loginCheck() {
    var datalogin = {
        nip: $("#formNip").val(),
        password: $("#password").val()
    };

    $.ajax({
        type: "POST",
        url: "./",
        data: datalogin,
        success: function (aksi) {
            if (aksi == 'success') {
                var type = "success";
                var notif = "Login Berhasil"
                failedNotif(notif, type);

                setTimeout(function () {
                    location.replace("./dashboard");
                }, 3000);
            } else if (aksi == 'nipError') {
                var type = "error";
                var notif = "NIP Tidak Ditemukan"
                failedNotif(notif, type);
            } else if (aksi = "passwordErrror") {
                var type = "error";
                var notif = "Password Yang Anda Masukan Salah"
                failedNotif(notif, type);
            }
        }
    });
    return false;

}

// Admin

function loginAdmin() {
    checkValidationAdmin();
}

function checkValidationAdmin() {
    // Nip
    var userLength = $("#formUsername").val().length;
    var userValue = $("#formUsername").val();

    if (userLength < 1) {
        $("#usernameError").html("Username Tidak Boleh Kosong.");
        $("#usernameError").css('display', 'block');
    } else if (!(/^\S{3,}$/.test(userValue))) {
        $("#usernameError").html("Username Tidak Boleh Ada Spasi.");
        $("#usernameError").css('display', 'block');
    } else {
        $("#usernameError").css('display', 'none');
    }

    // password
    var passLength = $("#password").val().length;

    if (passLength < 1) {
        $("#passwordError").html("Password Tidak Boleh Kosong.");
        $("#passwordError").css('display', 'block');
    } else if (passLength < 8) {
        $("#passwordError").html("Password Mininal 8 Karakter.");
        $("#passwordError").css('display', 'block');
    } else {
        $("#passwordError").css('display', 'none');
    }

    if (userLength > 0 && passLength > 0 && passLength > 7 && (/^\S{3,}$/.test(userValue))) {
        loginAdminCheck();
    }
}

function loginAdminCheck() {
    var datalogin = {
        username: $("#formUsername").val(),
        password: $("#password").val()
    };

    $.ajax({
        type: "POST",
        url: "./cp-admin",
        data: datalogin,
        success: function (aksi) {
            if (aksi == 'success') {
                var type = "success";
                var notif = "Login Berhasil"
                failedNotif(notif, type);

                setTimeout(function () {
                    location.replace("./dashboard");
                }, 3000);
            } else if (aksi == 'usernameError') {
                var type = "error";
                var notif = "Username Tidak Ditemukan"
                failedNotif(notif, type);
            } else if (aksi = "passwordErrror") {
                var type = "error";
                var notif = "Password Yang Anda Masukan Salah"
                failedNotif(notif, type);
            }
        }
    });
    return false;
}

// Notif
function failedNotif(notif, type) {
    const toast = swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000,
        padding: '2em'
    });

    toast({
        type: type,
        title: notif,
        padding: '2em',
    })
}