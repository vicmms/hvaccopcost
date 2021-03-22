// var sc = require('state-cities-db');

$(document).ready(function () {

    // $('#mapa').rwdImageMaps();
    $('#cUnidad').on('change', function () {
        console.log($('#cUnidad').val());
    })
    getPaises();
    //selecciona pais -> pinta ciudades de ese pais en el select
    $('#paises').on('change', function () {
        getCiudades($('#paises').val());
    });
    //selecciona ciudad -> obtiene coolingo y heating hours
    $('#ciudades').on('change', function () {
        getDegreeHrs($('#paises').val(), $('#ciudades').val());
    });

    $('#csAnio').on('change', function () {
        $('#csAnio option:selected').val() != 0 ? $('#csStdValue').val('') : false;
    });

    $('#hsAnio').on('change', function () {
        $('#hsAnio option:selected').val() != 0 ? $('#hsStd').val('') : false;
    });

    $('#csStd').on('change', function () {
        $('#cHEStandard').text($('#csStd option:selected').text());
        $('#lblCsStd').val($('#csStd option:selected').text());
    });

    $('#csTipo').on('change', function () {
        $('#lblCsTipo').val($('#csTipo option:selected').text());
    });
    $('#cheTipo').on('change', function () {
        $('#lblCheTipo').val($('#cheTipo option:selected').text());
    });
    $('#hsTipo').on('change', function () {
        $('#lblHsTipo').val($('#hsTipo option:selected').text());
    });
    $('#hheTipo').on('change', function () {
        $('#lblHheTipo').val($('#hheTipo option:selected').text());
    });

    $('#csTipo').on('click', function () {
        console.log($('#lblHheTipo').val());
    });




});

function getPaises() {
    $.ajax({
        type: 'POST',
        url: '/getPaises',
        dataType: 'json',
        data: {
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            response.map((pais, i) => {
                $('#paises').append($('<option>', {
                    value: pais.idPais,
                    text: pais.pais
                }));
            });
            console.log(response)

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function getCiudades(idPais) {
    $('#ciudades').trigger('click');
    $("#paises").val(idPais);
    //$('#paises').trigger('change');
    $.ajax({
        type: 'POST',
        url: '/getCiudades',
        dataType: 'json',
        data: {
            idPais: idPais,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            $('#ciudades').empty();
            $('#ciudades').append($('<option>', {
                value: 0,
                text: '-Selecciona tu ciudad-'
            }));
            response.map((ciudad, i) => {
                $('#ciudades').append($('<option>', {
                    value: ciudad.idCiudad,
                    text: ciudad.ciudad
                }));
            });
            console.log(response)

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function getDegreeHrs(pais, cd) {
    var cooling = heating = 0;
    $.ajax({
        type: 'POST',
        url: '/getDegreeHrs',
        dataType: 'json',
        data: {
            idPais: pais,
            idCiudad: cd,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            response.forEach(mes => {
                cooling += mes['cooling'];
                heating += mes['heating'];
            });
            $('#hrsEnfriado').val(cooling);
            $('#dDays').val(heating);

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function cambiarLblMapa(txt) {
    $('#lblMapa').text(txt);
}


//nota: validar cb standar sea igual en los dos campos pe IEER = IEER
function submit() {

}
