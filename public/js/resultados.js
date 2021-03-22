var chart;
$(document).ready(function () {
    $(".flatpickr").flatpickr(
        {
            mode: "range",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onClose: function (selectedDates, dateStr, instance) {
                let m = dateStr.split('.');
                let a = selectedDates[0] + '';
                let a2 = a.split(" ");
                mes = m[0];
                anio = a2[3];
            },
            onReady: function (selectedDates, dateStr, instance) {
                let m = dateStr.split('.');
                let a = selectedDates[0] + '';
                let a2 = a.split(" ");
                mes = m[0];
                anio = a2[3];
            },
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, //defaults to false
                    dateFormat: "m.y", //defaults to "F Y"
                    altFormat: "F Y", //defaults to "F Y"
                    theme: "dark" // defaults to "light"
                })
            ]
        });
    $('#btn-imprimir').on('click', function () {
        // printDiv('content');
        $('#settingsIcon').addClass('hidden');
        window.print()
        setTimeout(() => {
            $('#settingsIcon').removeClass('hidden')
        }, 100);
    });
    setTimeout(calcularCostoEnergia, 1000);
})

function printDiv(nombreDiv) {
    var contenido = document.getElementById(nombreDiv).innerHTML;
    var contenidoOriginal = document.body.innerHTML;

    document.body.innerHTML = contenido;

    window.print();

    document.body.innerHTML = contenidoOriginal;
}

function calcularCostoEnergia() {
    var unidad = $('#cUnidad').text(); //0-tr; 1-Kw; 2-Btuh
    var tipoEstandar = $('#csStd').text(); //0-SEER; 1-IEER; 2-IPVL; 3-AFUE
    var capacidadEquipo = $('#cSize').text();
    var tarifa = $('#cTarifa').text();
    var hrs = $('#hrsEnfriado').text();
    var valorEstandar = $('#csStdValue').text();
    var costoEnergia;
    console.log(unidad)
    switch (unidad) {
        case '0':
            costoEnergia = ((capacidadEquipo * 12000) * hrs * (tarifa / 100) / valorEstandar) / 1000;
            break;
        case '1':
            costoEnergia = (((capacidadEquipo / 3.5) * 12000) * hrs * (tarifa / 100) / valorEstandar) / 1000;
            break;
        case '2':
            costoEnergia = ((capacidadEquipo) * hrs * (tarifa / 100) / valorEstandar) / 1000;
            break;

        default:
            break;
    }

    costoEnergia ? calcularSistema(costoEnergia) : alert('Error al capturar datos; No se pudo calcular el costo de energia')
}

function calcularSistema(costo) {
    var sistema = $('#csTipo').text(); //0-Estandar; 1-Split; 2-Mini Split; 3-VRF; 4-C/Economizador; 5-C/Economizador y VAV; 6-Chillers Standard; 7-Chillers Variable; 
    var costoSistema;
    switch (sistema) {
        case '0':
            costoSistema = costo;
            break;
        case '1':
            costoSistema = costo / 0.94;
            break;
        case '2':
            costoSistema = costo / 0.85;
            break;
        case '3':
            costoSistema = costo / 0.91;
            break;
        case '4':
            costoSistema = costo / 0.9;
            break;
        case '5':
            costoSistema = costo / 0.86;
            break;
        case '6':
            costoSistema = costo / 0.84;
            break;
        case '7':
            costoSistema = costo / 0.82;
            break;

    }
    costoSistema ? calcularDisenio(costo, costoSistema) : alert('Error al capturar datos; No se pudo calcular el costo con base al tipo de sistema')

}

function calcularDisenio(costo, sistema) {
    var disenio = $('#csDisenio').text(); //0-ASHRAE 55/62.1/90.1; 1-Basico; 2-Basico c/ducto flexible; 3-ducto Flex. y Plenum Ret.
    var costoDisenio;
    switch (disenio) {
        case '0':
            costoDisenio = 0;
            break;
        case '1':
            costoDisenio = costo * 0.25;
            break;
        case '2':
            costoDisenio = costo * 0.34;
            break;
        case '3':
            costoDisenio = costo * 0.4;
            break;

    }
    costoDisenio != null ? calcularMantenimiento(costo, sistema, costoDisenio) : alert('Error al capturar datos; No se pudo calcular el costo con base al diseño especificado')
}

function calcularMantenimiento(costo, sistema, disenio) {
    var mantenimiento = $('#csMantenimiento').text(); //0-ASHRAE 180 Proactivo; 1-Deficiente; 2-Sin mantenimiento
    var costoMantenimiento;
    switch (mantenimiento) {
        case '0':
            costoMantenimiento = 0;
            break;
        case '1':
            costoMantenimiento = costo * 0.15;
            break;
        case '2':
            costoMantenimiento = costo * 0.3;
            break;


    }
    costoMantenimiento != null ? pintarResultados(costo, sistema, disenio, costoMantenimiento) : alert('Error al capturar datos; No se pudo calcular el costo con base al mantenimiento especificado')
}

function pintarResultados(costo, sistema, disenio, mantenimiento) {
    let resultado = sistema + disenio + mantenimiento;
    console.log(costo + ' ' + sistema + ' ' + disenio + ' ' + mantenimiento)
    $('#resultadoCs').text(resultado.toFixed());
    pintarGrafica(resultado.toFixed(), $('#porcentaje').val());
}

function recalcular() {
    chart.destroy();
    pintarGrafica($('#resultadoCs').text(), $('#porcentaje').val());
    console.log($('#resultadoFin').text());
    console.log($('#porcentaje').val());
}

function pintarGrafica(valor, porcentaje) {
    var porcentaje = 1 + (porcentaje / 100);
    var ctx = document.getElementById('myChart').getContext('2d');
    chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Año 1", "Año 2", "Año 3", "Año 4", "Año 5"],
            datasets: [
                {
                    label: "Costo electrico",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: [valor, (valor * (Math.pow(porcentaje, 1))).toFixed(), (valor * (Math.pow(porcentaje, 2))).toFixed(), (valor * (Math.pow(porcentaje, 3))).toFixed(), (valor * (Math.pow(porcentaje, 4))).toFixed()]
                }
            ]
        },
        options: {
            tooltips: {
                enabled: true
            },
            hover: {
                animationDuration: 1
            },
            animation: {
                duration: 1,
                onComplete: function () {
                    var chartInstance = this.chart,
                        ctx = chartInstance.ctx;
                    ctx.textAlign = 'center';
                    ctx.fillStyle = "rgba(0, 0, 0, 1)";
                    ctx.textBaseline = 'bottom';
                    // Loop through each data in the datasets
                    this.data.datasets.forEach(function (dataset, i) {
                        var meta = chartInstance.controller.getDatasetMeta(i);
                        meta.data.forEach(function (bar, index) {
                            var data = dataset.data[index];
                            ctx.fillText(data, bar._model.x, bar._model.y - 5);
                        });
                    });
                }
            }
        }
    });

}