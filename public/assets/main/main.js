$("#logout").click(function () {
    location.replace("./logout");
});

$(document).ready(function () {
    $('.menus').click(function () {
        $(".menus").removeAttr('data-active');
        $(".submenu").removeClass('show');
        $(".menus").attr('aria-expanded', 'false');
        $(this).attr('data-active', 'true');
        var menu = $(this).attr('id');
        if (menu == "dashboard") {
            $('#title-navbar').html("Dashboard");
            $('.body-switch').load('./dashboard-content');
        } else if (menu == "penduduk") {
            $('#title-navbar').html("Penduduk");
            $('.body-switch').load('./penduduk');
        } else if (menu == "karyawan") {
            $('#title-navbar').html("Karyawan");
            $('.body-switch').load('./employe');
        } else if (menu == "sosmed") {
            $('.badan').load('sosmed.php');
        }
    });

    $('.report').click(function () {
        $(this).ready(function () {
            $('#subMenu').attr('class', 'active');
        })
        var report = $(this).attr('id');
        if (report == "perusahaan") {
            $('#title-navbar').html("Domisili Perusahaan");
            $('.body-switch').load('./report-perusahaan');
        } else if (report == "penduduk") {
            $('#title-navbar').html("Penduduk");
            $('.body-switch').load('./penduduk');
        }
    });

    $(this).attr('data-active', 'true');
    $('#title-navbar').html("Dashboard");
    $('.body-switch').load('./dashboard-content');
});