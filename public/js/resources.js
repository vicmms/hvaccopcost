$(document).ready(function () {

    $('#logo').on("load", function () {
        $('#loader').hide();
        $('#blur').removeClass('blur');
        $('#footer').removeClass('blur');
    });
    setLogo();
})

function setLogo() {
    $.ajax({
        type: 'POST',
        url: '/getLogo',
        dataType: 'json',
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            $('#logo').attr("src", "assets/images/logos/" + response);;
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}