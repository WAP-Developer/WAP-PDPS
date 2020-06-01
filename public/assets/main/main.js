$("#logout").click(function () {
    location.replace("./logout");
});

$(document).ready(function () {
    $('.menus').click(function () {

        $('.menu-active').removeClass('active');
        $(".menus").removeAttr('data-active');
        $(".menus").attr('aria-expanded', 'false');
        $(this).attr('data-active', 'true');

        var menu = $(this).attr('id');

        if (menu == "dashboard") {
            $(".submenu").removeClass('show');
            $('#title-navbar').html("Dashboard");
            $('.body-switch').load('./dashboard-content');
        } else if (menu == "penduduk") {
            $(".submenu").removeClass('show');
            $('#title-navbar').html("Penduduk");
            $('.body-switch').load('./penduduk');
        } else if (menu == "karyawan") {
            $(".submenu").removeClass('show');
            $('#title-navbar').html("Karyawan");
            $('.body-switch').load('./employe');
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
            $('.body-switch').load('./surat-perusahaan');
        } else if (surat == "usaha") {
            $('#title-navbar').html("Surat Domisili Usaha");
            $('.body-switch').load('./surat-usaha');
        } else if (surat == "warga") {
            $('#title-navbar').html("Domisili Warga");
            $('.body-switch').load('./surat-warga');
        } else if (surat == "kematian") {
            $('#title-navbar').html("Kematian");
            $('.body-switch').load('./surat-kematian');
        } else if (surat == "sktm") {
            $('#title-navbar').html("SKTM");
            $('.body-switch').load('./surat-sktm');
        }
    });

    $('.report-active').click(function () {

        $('#report').attr('data-active', 'true');
        $(".report-active").removeClass('active');

        $(this).addClass('active');
        var report = $(this).attr('id');
        if (report == "perusahaan") {
            $('#title-navbar').html("Domisili Perusahaan");
            $('.body-switch').load('./report-perusahaan');
        } else if (report == "usaha") {
            $('#title-navbar').html("Domisili Usaha");
            $('.body-switch').load('./report-usaha');
        } else if (report == "warga") {
            $('#title-navbar').html("Domisili Warga");
            $('.body-switch').load('./report-warga');
        } else if (report == "kematian") {
            $('#title-navbar').html("Kematian");
            $('.body-switch').load('./report-kematian');
        } else if (report == "sktm") {
            $('#title-navbar').html("SKTM");
            $('.body-switch').load('./report-sktm');
        }
    });

    $(this).attr('data-active', 'true');
    $('#title-navbar').html("Dashboard");
    $('.body-switch').load('./dashboard-content');
});