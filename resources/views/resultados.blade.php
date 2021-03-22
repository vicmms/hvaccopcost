<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo_default.webp')}}"/>
    <script src="https://use.fontawesome.com/4e957e572c.js"></script>
    <!-- hoja de estilos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('plugins/chartjs/dist/Chart.css')}}" rel="stylesheet" media="all">
    
    <title>HVACOPCOST</title>
</head>
<body>
    <div id="loader" class="">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    <div id="blur" class="blur">
        <header>
            <div id="slider" class="slider-big">
                <a href="{{route('index')}}"><img class="header" id="logo" src="" alt=""></a>
                {{-- <span class="small-content">Identifica tu region en los mapas de calor y frío</span>  --}}
                <a href="{{route('settings')}}" id="settingsIcon"><i class="fa fa-cog" aria-hidden="true" id="settings"></i>   </a>
            </div>
        </header>
        <div class="center">
            <table>
                <tr>
                    <td><b>Periodo de tiempo</b></td>
                    <td>Desde: </td>
                    <td>
                        <input class="fcontrol flatpickr flatpickr-input" style="margin-top: 10px" type="text" name="fechaDia" id="fechaDia" placeholder="seleccione fecha" readonly="readonly">

                    </td>
                    <td>Hasta: </td>
                    <td>
                        <input class="fcontrol flatpickr flatpickr-input" style="margin-top: 10px" type="text" name="fechaDia" id="fechaDia" placeholder="seleccione fecha" readonly="readonly">

                    </td>
                    <td><b>Factor(Filtro)</b></td>
                    <td>
                        <select name="" id="" class="fcontrol" style="margin-top: 10px">
                            <option value="1">opcion 1</option>
                            <option value="2">opcion 2</option>
                            <option value="3">opcion 3</option>
                            <option value="4">opcion 4</option>
                        </select>
                    </td>
                </tr>
            </table>
        </div>
        <div class="center">
            <section id="content"> 
                <table id="tabla-resultados">
                    <tr>
                        <td colspan="4" class="table-header">Input values</td>
                    </tr>
                    <tr>
                        <td class="cooling" colspan="2"><h2>COOLING</h2></td>
                        <td class="heating" colspan="2"><h2>HEATING</h2></td>
                    </tr>
                    <tr>
                        <label for="" id="cUnidad" class="hidden">{{$cUnidad}}</label>
                        <td><strong>Tamaño de equipo: </strong></td>
                        <td><label for="" id="cSize">{{$cSize}}</label>  {{$cUnidadLbl}}</td>
                        <td><strong>Tamaño de equipo: </strong></td>
                        <td>{{$hSize}}</td>
                    </tr>
                    <tr>
                        <td><strong>Tarifa electrica</strong></td>
                        <td><label for="" id="cTarifa">{{$cTarifa}}</label> c$/Kw</td>
                        <td><strong>Tarifa de gas</strong></td>
                        <td>{{$hTarifa}}</td>
                    </tr>
                    <tr>
                        <td>Horas de enfriado</td>
                        <td><label for="" id="hrsEnfriado">{{$hrsEnfriado}}</label></td>
                        <td>degree days</td>
                        <td>{{$dDays}}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><h2>COOLING - STANDARD</h2></td>
                        <td colspan="2"><h2>HEATING - STANDARD</h2></td>
                    </tr>
                    <tr>
                        <td>{{$csStd}}</td>
                        <td><label for="" id="csStdValue">{{$csStdValue}}</label></td>
                        <td>AFUE</td>
                        <td>{{$hsStd}}</td>
                    </tr>
                    <tr>
                        <label class="hidden" id="csTipo">{{$csTipoValue}}</label>
                        <td>Tipo de sistema</td>
                        <td>{{$csTipo}}</td>
                        <td>Tipo de sistema</td>
                        <td>{{$hsTipo}}</td>
                    </tr>
                    <tr>
                        <label class="hidden" id="csDisenio">{{$csDisenio}}</label>
                        <td>Diseño</td>
                        <td>{{$lblCsDisenio}}</td>
                        <td>Diseño</td>
                        <td>xxx</td>
                    </tr>
                    <tr>
                        <label class="hidden" id="csMantenimiento">{{$csMantenimiento}}</label>
                        <td>Mantenimiento</td>
                        <td>{{$lblCsMantenimiento}}</td>
                        <td>Mantenimiento</td>
                        <td>xxx</td>
                    </tr>
                    <tr>
                        <td colspan="2"><h2>COOLING - HIGH EFFICIENCY</h2></td>
                        <td colspan="2"><h2>HEATING - HIGH EFFICIENCY</h2></td>
                    </tr>
                    <tr>
                        <td>{{$csStd}}</td>
                        <td>{{$cheStd}}</td>
                        <td>AFUE</td>
                        <td>{{$hheStd}}</td>
                    </tr>
                    <tr>
                        <td>Tipo de sistema</td>
                        <td>{{$cheTipo}}</td>
                        <td>Tipo de sistema</td>
                        <td>{{$hheTipo}}</td>
                    </tr>
                    <tr>
                        <td>Diseño</td>
                        <td>{{$lblCheDisenio}}</td>
                        <td>Diseño</td>
                        <td>xxx</td>
                    </tr>
                    <tr>
                        <td>Mantenimiento</td>
                        <td>{{$lblCheMantenimiento}}</td>
                        <td>Mantenimiento</td>
                        <td>xxx</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="table-header">Resultados</td>
                    </tr>
                    <tr>
                        <td colspan="2"><h3>Cooling - Standard</h3></td>
                        <td colspan="2"><h3>Heating - Standard</h3></td>
                    </tr>
                    <tr>
                        <td><b>Costo de operacion por año</b></td>
                        <td>$ <label for="" id="resultadoCs"></label></td>
                        <td><b>Costo de operacion por año</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><h3>Cooling - High Efficiency</h3></td>
                        <td colspan="2"><h3>Heating - High Efficiency</h3></td>
                    </tr>
                    <tr>
                        <td><b>Costo de operacion por año</b></td>
                        <td></td>
                        <td><b>Costo de operacion por año</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>Ahorro anual</b></td>
                        <td></td>
                        <td><b>Ahorro anual</b></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="4">Incremento de utilidad promedio <input type="number" step="0.01" id="porcentaje" value="6"> %</td>
                    </tr>
                    <tr style="text-align: -webkit-center">
                        <td colspan="4">
                            <canvas id="myChart" style="max-height: 300px; max-width: 600px"></canvas>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Aumento en el valor de la vivienda:</td>
                        <td colspan="2">*</td>
                    </tr>
                    <tr>
                        <td colspan="4">(*Basado en estudios recientes del gobierno)</td>
                    </tr>
                    <tr>
                        <td colspan="4"><h1>Ahorro de energia a lo largo de 20 años</h1></td>
                    </tr>
                </table>
            </section>
            <div class="bloque">
                <button class="btn btn-primary" onClick="recalcular()">Re-calcular</button>
                <button class="btn btn-secondary" id="btn-imprimir">Imprimir</button>
                <a class="btn" href="{{route('index')}}">Atras</a>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('plugins/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('plugins/chartjs/dist/Chart.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script> 
    <script src="{{asset('js/resources.js')}}"></script>
    <script src="{{asset('js/resultados.js')}}"></script>
</body>
<footer id="footer" class="blur">
    <div class="center">
        <p>&copy;2021 Nano Degree</p>
    </div>
</footer>
</html>