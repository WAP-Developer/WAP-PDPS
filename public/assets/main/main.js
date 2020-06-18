$("#logout").click(function () {
    location.replace("./main/logout");
});

$(document).ready(function () {
    $('.menus').click(function () {

        $('.report-active').removeClass('active');
        $('.surat-active').removeClass('active');
        $(".menus").removeAttr('data-active');
        $(".menus").attr('aria-expanded', 'false');
        $(this).attr('data-active', 'true');

        var menu = $(this).attr('id');

        if (menu == "dashboard") {
            $(".submenu").removeClass('show');
            $('#title-navbar').html("Dashboard");
            $('.body-switch').load('./main/dashboard');
        } else if (menu == "penduduk") {
            $(".submenu").removeClass('show');
            $('#title-navbar').html("Penduduk");
            $('.body-switch').load('./main/penduduk');
        } else if (menu == "karyawan") {
            $(".submenu").removeClass('show');
            $('#title-navbar').html("Karyawan");
            $('.body-switch').load('./main/employe');
        } else if (menu == "suratMain") {
            $(".menus").removeAttr('data-active');
        } else if (menu == "report") {
            $(".menus").removeAttr('data-active');
        }
    });

    $('.surat-active').click(function () {

        $('#suratMain').attr('data-active', 'true');
        $(".surat-active").removeClass('active');

        $(this).addClass('active');
        var surat = $(this).attr('id');
        if (surat == "perusahaan") {
            $('#title-navbar').html("Surat Domisili Perusahaan");
            $('.body-switch').load('./main/suratPerusahaan');
        } else if (surat == "usaha") {
            $('#title-navbar').html("Surat Domisili Usaha");
            $('.body-switch').load('./main/suratUsaha');
        } else if (surat == "warga") {
            $('#title-navbar').html("Domisili Warga");
            $('.body-switch').load('./main/suratWarga');
        } else if (surat == "kematian") {
            $('#title-navbar').html("Kematian");
            $('.body-switch').load('./main/suratKematian');
        } else if (surat == "pindah") {
            $('#title-navbar').html("Pindah");
            $('.body-switch').load('./main/suratPindah');
        } else if (surat == "sktm") {
            $('#title-navbar').html("SKTM");
            $('.body-switch').load('./main/suratSktm');
        }
    });

    $('.report-active').click(function () {

        $('#report').attr('data-active', 'true');
        $(".report-active").removeClass('active');

        $(this).addClass('active');
        var report = $(this).attr('id');
        if (report == "perusahaan") {
            $('#title-navbar').html("Domisili Perusahaan");
            $('.body-switch').load('./main/domisiliPerusahaan');
        } else if (report == "usaha") {
            $('#title-navbar').html("Domisili Usaha");
            $('.body-switch').load('./main/domisiliUsaha');
        } else if (report == "warga") {
            $('#title-navbar').html("Domisili Warga");
            $('.body-switch').load('./main/domisiliWarga');
        } else if (report == "kematian") {
            $('#title-navbar').html("Kematian");
            $('.body-switch').load('./main/kematian');
        } else if (report == "sktm") {
            $('#title-navbar').html("SKTM");
            $('.body-switch').load('./main/sktm');
        }
    });

    $(this).attr('data-active', 'true');
    $('#title-navbar').html("Dashboard");
    $('.body-switch').load('./main/dashboard');
});