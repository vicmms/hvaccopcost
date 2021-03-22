<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo_default.webp')}}"/>
    <script src="https://use.fontawesome.com/4e957e572c.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
    <!-- hoja de estilos -->
    {{-- <link rel="stylesheet" type="text/css" href="../public/assets/css/styles.css"> --}}
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    
    <title>HVACOPCOST</title>
</head>
<body>
    <div id="loader" class="">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>
    <div id="blur" class="blur">
        <header>
            <div id="slider" class="slider-big">
                <a href="{{route('index')}}"><img class="header" id="logo" id="logo" src="" alt=""></a>
                {{-- <span class="samll-content">Identifica tu region en los mapas de calor y frío</span>  --}}
                <a href="{{route('settings')}}"><i class="fa fa-cog" aria-hidden="true" id="settings"></i>   </a>
            </div>
        </header>
        <div id="mapa-div">
            {{-- <div class="col-6">
                <h2>Cooling Map</h2>
                <img src="{{asset('assets\images\cooling.png')}}" alt="">
            </div> --}}
            
                <h2 id="lblMapa">Mapa</h2>
                <img src="{{asset('assets\images\mapa2.png')}}" alt="" usemap="#mapa" onClick="cambiarLblMapa('Mapa')">
                <map name="mapa">
                    <area shape="polygon" coords="2,3, 67,5, 98,19, 121,43, 129,81, 174,65, 150,91, 139,112, 78,93, 29,54, 8,27" onclick="getCiudades(17); cambiarLblMapa('México')" alt="México">
                    <area shape="polygon" coords="144,108, 155,96, 155,89, 175,84, 232,133, 216,150, 179,131, 171,117" onclick="getCiudades(28); cambiarLblMapa('Centro América')" alt="Centro América">
                    <area shape="polygon" coords="187,59,210,55,237,66,272,76,302,83,302,91,260,95,226,92" onclick="getCiudades(27); cambiarLblMapa('Caribe')" alt="Caribe">
                    <area shape="polygon" coords="227,142,234,139,244,126,258,120,256,128,253,136,258,142,266,146,272,148,279,152,285,151,285,158,285,167,280,171,274,173,271,182,273,193,256,193,241,181,233,179,224,173" onclick="getCiudades(5); cambiarLblMapa('Colombia')" alt="Colombia">
                    <area shape="polygon" coords="223,175,229,179,237,179,241,185,236,192,227,196,222,203,214,202,210,192,213,179" onclick="getCiudades(8); cambiarLblMapa('Ecuador')"  alt="Ecuador">
                    <area shape="polygon" coords="270,274,277,265,275,257,278,247,276,238,268,236,256,229,249,219,256,207,269,200,267,193,257,194,244,183,235,194,228,197,225,203,209,204,215,216,236,254,249,264" onclick="getCiudades(21); cambiarLblMapa('Perú')"  alt="Perú">
                    <area shape="polygon" coords="278,237,287,237,299,231,301,240,309,246,327,255,329,265,339,267,340,282,333,281,319,282,315,295,306,295,297,294,288,297,283,282,279,270" onclick="getCiudades(2); cambiarLblMapa('Bolivia')"  alt="Bolivia">
                    <area shape="polygon" coords="275,273,270,278,268,304,262,335,262,346,261,364,250,388,241,451,243,491,256,508,281,516,276,496,260,492,253,482,252,471,259,462,263,442,260,424,260,403,265,395,264,382,270,376,271,365,270,353,272,342,274,335,279,324,281,312,287,305,290,299,283,296" onclick="getCiudades(4); cambiarLblMapa('Chile')"  alt="Chile">
                    <area shape="polygon" coords="319,307,314,297,307,300,297,296,292,300,289,307,283,311,283,320,278,331,274,346,273,365,272,376,266,386,266,403,262,408,263,430,264,441,260,464,255,470,261,485,281,493,280,479,297,462,298,449,292,447,298,436,309,423,318,411,327,397,346,389,352,378,339,365,341,343,351,331,336,327,340,314" onclick="getCiudades(1); cambiarLblMapa('Argentina')"  alt="Argentina">
                    <area shape="polygon" coords="341,365,342,356,345,344,356,349,363,352,369,358,369,366,360,372,349,370" onclick="getCiudades(25); cambiarLblMapa('Uruguay')"  alt="Uruguay">
                    <area shape="polygon" coords="373,355,361,348,351,344,351,335,364,325,369,320,363,313,358,302,351,296,343,296,343,279,345,271,339,264,328,255,301,236,292,230,280,236,269,236,270,229,261,229,254,220,263,205,273,202,276,185,289,176,303,176,310,171,318,159,332,159,331,169,335,174,347,172,373,171,380,160,403,184,451,196,478,216,471,233,451,253,451,278,432,302,421,303,398,316,396,333,386,347" onclick="getCiudades(3); cambiarLblMapa('Brasil')"  alt="Brasil">
                    <area shape="polygon" coords="340,324,348,326,356,325,361,316,360,307,354,302,349,297,342,297,340,285,332,281,321,283,318,291,316,296,322,299,326,303,333,308,345,313" onclick="getCiudades(19); cambiarLblMapa('Paraguay')"  alt="Paraguay">
                    <area shape="polygon" coords="266,119,260,123,256,131,260,136,261,142,274,145,279,148,289,148,291,171,301,172,308,167,304,159,314,158,324,154,333,157,334,166,343,170,358,168,374,166,375,156,349,149,326,133,313,126,292,126" onclick="getCiudades(26); cambiarLblMapa('Venezuela/Guyana/Suniam')"  alt="Venezuela">
                </map>
            
        </div>
        <div class="center">
            {{-- <div id='map' style='width: 80%; height: 800px;'></div> --}}
            <form action="{{route('resultados')}}" method="POST" name="formulario">
                @csrf
                <hr style="width: 100%;">
                <div id="content"> 
                    <table id="tabla-region">
                        <tr>
                            <td colspan="2"><b>Selecciona tu región para obetener resultados mas certeros</b></td>
                        </tr>
                        <tr>
                            <td><label>Región</label></td>
                            <td>
                                <select class="fcontrol" name="paises" id="paises">
                                    <option value="0">-Selecciona tu región-</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Ciudad</label></td>
                            <td>
                                <select class="fcontrol" name="ciudades" id="ciudades">
                                    <option value="0">-Selecciona tu ciudad-</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                        <div class="col-6">
                            <table>
                                <thead>
                                    <th colspan="2" class="cooling"><h2>ENFRIAMINETO</h2></th>
                                </thead>
                                <tr>
                                    <td><label for="">Capacidad del equipo</label></td>
                                    <td>
                                        <input class="fcontrol" type="number" step="0.01" name="cSize" id="cSize" style="width: 50% !important">
                                        <select class="fcontrol" name="cUnidad" id="cUnidad" style="width: 45% !important">
                                            <option value="0">tr</option>
                                            <option value="1">Kw</option>
                                            <option value="2">Btuh</option>
                                        </select>
                                        <input style="display: none" id="cUnidadLbl" name="cUnidadLbl" value="Kw" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Tarifa electrica</label></td>
                                    <td>
                                        <input class="fcontrol" type="number" step="0.01" name="cTarifa" id="cTarifa" style="width: 50% !important;">
                                        <label for="" style="width: 45% !important;">c$/Kw</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Horas de enfriado</label></td>
                                    <td><input class="fcontrol" type="number" step="0.01" name="hrsEnfriado" id="hrsEnfriado"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h2>ENFRIAMIENTO  - ESTANDAR</h2></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="csStd" id="csStd">
                                            <option value="0">SEER</option>
                                            <option value="1">IEER</option>
                                            <option value="2">IPVL</option>
                                        </select>
                                        <input style="display: none" id="lblCsStd" name="lblCsStd" value="SEER" />
                                    </td>
                                    <td><input class="fcontrol" type="number" step="0.01" name="csStdValue" id="csStdValue"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Tipo de sistema</label></td>
                                    <td>
                                        <select class="fcontrol"  name="csTipo" id="csTipo">
                                            <option value="0">Standard</option>
                                            <option value="1">Split</option>
                                            <option value="2">Mini Split</option>
                                            <option value="3">VRF</option>
                                            <option value="4">c/Economizador</option>
                                            <option value="5">c/Economizador y VAV</option>
                                            <option value="6">Chillers Standard</option>
                                            <option value="7">Chillers Variable</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblCsTipo" name="lblCsTipo" value="A/C 1">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Diseño</label></td>
                                    <td>
                                        <select class="fcontrol" name="csDisenio" id="csDisenio">
                                            <option value="0">ASHRAE 55/62.1/90.1</option>
                                            <option value="1">Básico</option>
                                            <option value="2">Básico c/ducto Flexible</option>
                                            <option value="3">Ducto Flex. y Plenum Ret.</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblCsDisenio" name="lblCsDisenio" value="ASHRAE 55/62.1/90.1">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Mantenimimento</label></td>
                                    <td>
                                        <select class="fcontrol" name="csMantenimiento" id="csMantenimiento">
                                            <option value="0">ASHRAE 180 Proactivo</option>
                                            <option value="1">Deficiente</option>
                                            <option value="2">Sin Mantenimiento</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblCsMantenimiento" name="lblCsMantenimiento" value="ASHRAE 180 Proactivo">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h2>ENFRIAMIENTO  - ALTA EFICIENCIA</h2></td>
                                </tr>
                                <tr>
                                    <td><label for="" id="cHEStandard">SEER</label></td>
                                    <td><input class="fcontrol" type="number" step="0.01" name="cheStd" id="cheStd"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Tipo de sistema</label></td>
                                    <td>
                                        <select class="fcontrol" name="cheTipo" id="cheTipo">
                                            <option value="0">Standard</option>
                                            <option value="1">Split</option>
                                            <option value="2">Mini Split</option>
                                            <option value="3">VRF</option>
                                            <option value="4">c/Economizador</option>
                                            <option value="5">c/Economizador y VAV</option>
                                            <option value="6">Chillers Standard</option>
                                            <option value="7">Chillers Variable</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblCheTipo" name="lblCheTipo" value="A/C 1">
                                        </td>
                                </tr>
                                <tr>
                                    <td><label for="">Diseño</label></td>
                                    <td>
                                        <select class="fcontrol" name="cheDisenio" id="cheDisenio">
                                            <option value="0">ASHRAE 55/62.1/90.1</option>
                                            <option value="1">Básico</option>
                                            <option value="2">Básico c/ducto Flexible</option>
                                            <option value="3">Ducto Flex. y Plenum Ret.</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblCheDisenio" name="lblCheDisenio" value="ASHRAE 55/62.1/90.1">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Mantenimimento</label></td>
                                    <td>
                                        <select class="fcontrol" name="cheMantenimiento" id="cheMantenimiento">
                                            <option value="0">ASHRAE 180 Proactivo</option>
                                            <option value="1">Deficiente</option>
                                            <option value="2">Sin Mantenimiento</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblCheMantenimiento" name="lblCheMantenimiento" value="ASHRAE 180 Proactivo">
                                    </td>
                                </tr>
                            </table>
        
                        </div>
                        <div class="col-6">
                            <table>
                                <thead>
                                    <th colspan="2" class="heating"><h2 >CALEFACCIÓN</h2></th>
                                </thead>
                                <tr>
                                    <td><label for="">Capacidad del equipo</label></td>
                                    <td>
                                        <input class="fcontrol" type="number" step="0.01" name="hSize" id="hSize" style="width: 50% !important">
                                        <select class="fcontrol" name="hUnidad" id="hUnidad" style="width: 45% !important">
                                            <option value="0">Kw</option>
                                            <option value="1">tr</option>
                                            <option value="2">Btuh</option>
                                        </select>
                                        <input style="display: none" id="hUnidadLbl" name="hUnidadLbl" value="Kw" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Tarifa de gas</label></td>
                                    <td>
                                        <input class="fcontrol" type="number" step="0.01" name="hTarifa" id="hTarifa" style="width: 50% !important;">
                                        <label for="" style="width: 45% !important;">c$/Kw</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">HORAS DE CALEFACCIÓN</label></td>
                                    <td><input class="fcontrol" type="number" step="0.01" name="dDays" id="dDays"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h2>CALEFACCION  - ESTANDAR</h2></td>
                                </tr>
                                <tr>
                                    <td><label for="">AFUE</label></td>
                                    <td><input class="fcontrol" type="number" step="0.01" name="hsStd" id="hsStd"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Tipo de sistema</label></td>
                                    <td>
                                        <select class="fcontrol" name="hsTipo" id="hsTipo">
                                            <option value="0">A/C 1</option>
                                            <option value="1">A/C 2</option>
                                            <option value="2">A/C 3</option>
                                            <option value="3">A/C 4</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblHsTipo" name="lblHsTipo" value="A/C 1">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Diseño</label></td>
                                    <td>
                                        <select class="fcontrol" name="hsDisenio" id="hsDisenio">
                                            <option value="0">ASHRAE 55/62.1/90.1</option>
                                            <option value="1">Básico</option>
                                            <option value="2">Básico c/ducto Flexible</option>
                                            <option value="3">Ducto Flex. y Plenum Ret.</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblHsDisenio" name="lblHsDisenio" value="ASHRAE 55/62.1/90.1">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Mantenimimento</label></td>
                                    <td>
                                        <select class="fcontrol" name="hsMantenimiento" id="hsMantenimiento">
                                            <option value="0">ASHRAE 180 Proactivo</option>
                                            <option value="1">Deficiente</option>
                                            <option value="2">Sin Mantenimiento</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblHsMantenimiento" name="lblHsMantenimiento" value="ASHRAE 180 Proactivo">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><h2>CALEFACCIÓN  - ALTA EFICIENCIA</h2></td>
                                </tr>
                                <tr>
                                    <td><label for="">AFUE</label></td>
                                    <td><input class="fcontrol" type="number" step="0.01" name="hheStd" id="hheStd"></td>
                                </tr>
                                <tr>
                                    <td><label for="">Tipo de sistema</label></td>
                                    <td>
                                        <select class="fcontrol" name="hheTipo" id="hheTipo">
                                            <option value="0">A/C 1</option>
                                            <option value="1">A/C 2</option>
                                            <option value="2">A/C 3</option>
                                            <option value="3">A/C 4</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblHheTipo" name="lblHheTipo" value="A/C 1">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Diseño</label></td>
                                    <td>
                                        <select class="fcontrol" name="hheDisenio" id="hheDisenio">
                                            <option value="0">ASHRAE 55/62.1/90.1</option>
                                            <option value="1">Básico</option>
                                            <option value="2">Básico c/ducto Flexible</option>
                                            <option value="3">Ducto Flex. y Plenum Ret.</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblHheDisenio" name="lblHheDisenio" value="ASHRAE 55/62.1/90.1">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="">Mantenimimento</label></td>
                                    <td>
                                        <select class="fcontrol" name="hheMantenimiento" id="hheMantenimiento">
                                            <option value="0">ASHRAE 180 Proactivo</option>
                                            <option value="1">Deficiente</option>
                                            <option value="2">Sin Mantenimiento</option>
                                        </select>
                                        <input type="text" style="display: none" id="lblHheMantenimiento" name="lblHheMantenimiento" value="ASHRAE 180 Proactivo">
                                    </td>
                                </tr>
                            </table>
                        </div>
    
                </div>
                <div class="clearfix"></div>
                <hr style="width: 100%; margin-top:60px;">
                <div class="bloque">
                    <input  type="submit" name="calcular" id="calcular" value="Calcular" class="btn btn-primary">
                    <button class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{asset('plugins/requirejs/require.js')}}"></script>
    <script src="{{asset('plugins/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('plugins/rwdImageMaps/jquery.rwdImageMaps.min.js')}}" type="module"></script>
    <script src="{{asset('js/resources.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
</body>
<footer id="footer" class="blur">
    <div class="center">
        <p>&copy;2021 Nano Degree</p>
    </div>
</footer>
</html>