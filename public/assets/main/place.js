$(document).ready(function () {
    setTimeout(function () {
        $('.preloader').fadeOut();
    }, 800);
});

$("form[id='formPlace']").submit(function () {
    var dataplace = $('#formPlace').serialize();

    $.ajax({
        type: "POST",
        url: './main/placeProcess',
        data: dataplace,
        success: function (data) {
            if (data == 'success') {
                $('#title-navbar').html("Detail Tempat");
                $('.body-switch').load('./main/place');
            }
        }
    });
});