<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo_default.webp')}}"/>
    <script src="https://use.fontawesome.com/4e957e572c.js"></script>
    <!-- hoja de estilos -->
    {{-- <link rel="stylesheet" type="text/css" href="../public/assets/css/styles.css"> --}}
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/dropify/dist/css/dropify.css')}}" rel="stylesheet">
    
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
        <div class="clearfix"></div>
        <section class="center">
            <form action="{{route('setLogo')}}" enctype="multipart/form-data" method="POST" id="formulario-logo">
                @CSRF
                <h2>Cambiar imagen</h2>
                <input type="file" id="file" name="file" class="dropify" data-height="300" accept="image/*" onchange='enableButton()'/>
                <br><br>
                <button type="submit"  class="btn-disabled" id="btn-aceptar">Aceptar</button>
                <a href="{{route('index')}}" class="btn btn-secondary">Regresar</a>
            </form>
        </section>
        <div class="center" id="dvExcel">
            <input type="file" id="fileUpload" />
            <input type="button" id="btn-excel" value="Upload"  />
        </div>
    </div>
    <br><br>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>
    <script src="{{asset('plugins/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('plugins/dropify/dist/js/dropify.js')}}"></script>
    <script src="{{asset('js/resources.js')}}"></script>
    <script src="{{asset('js/settings.js')}}"></script>
    {{-- <script src="{{asset('js/index.js')}}"></script> --}}
</body>
<footer id="footer" class="blur">
    <div class="center">
        <p>&copy;2021 Nano Degree</p>
    </div>
</footer>
</html>