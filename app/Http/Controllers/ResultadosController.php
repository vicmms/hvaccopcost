<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ResultadosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    public function getResultados(Request $request)
    {
        return view('resultados',[
            'cSize' => $_POST['cSize'],//tamanio de equipo valor numerico
            'cUnidad' => $_POST['cUnidad'],//valor numerico de tipo de unidad en cooling
            'cUnidadLbl' => $_POST['cUnidadLbl'],//tipo de unidad en letras
            'cTarifa' => $_POST['cTarifa'],//valor numerico de tarifa en cooling
            'hrsEnfriado' => $_POST['hrsEnfriado'],//valor numerico horas de enfriado
            'csStd' => $_POST['lblCsStd'],//estandar en cooling-std en letras
            'csStdTipo' => $_POST['csStd'],//tipo de estandar, en numero, en enfriado estandar
            'csStdValue' => $_POST['csStdValue'],//cantidad del valor del estandar en cooling estandar
            'csTipo' => $_POST['lblCsTipo'],//cooling standard tipo en letras
            'csTipoValue' => $_POST['csTipo'],//tipo de sistema, en numero, en enfriado estandar
            'csDisenio' => $_POST['csDisenio'],//coolig std disenio en numero
            'lblCsDisenio' => $_POST['lblCsDisenio'],//coolig std disenio en letras
            'csMantenimiento' => $_POST['csMantenimiento'],//coolig std mantenimiento en numero
            'lblCsMantenimiento' => $_POST['lblCsMantenimiento'],//coolig std mantenimiento en letras
            'cheStd' => $_POST['cheStd'],//cantidad del standard cooling high
            'cheTipo' => $_POST['lblCheTipo'],//valor en letras del tipo de cooling high 
            'cheTipoValue' => $_POST['cheTipo'],//valor en numero del tipo de cooling high 
            'cheDisenio' => $_POST['cheDisenio'],//coolig std disenio en numero
            'lblCheDisenio' => $_POST['lblCheDisenio'],//coolig std disenio en letras
            'cheMantenimiento' => $_POST['cheMantenimiento'],//coolig std mantenimiento en numero
            'lblCheMantenimiento' => $_POST['lblCheMantenimiento'],//coolig std mantenimiento en letras
            'hSize' => $_POST['hSize'],//tamanio de equipo valor numerico
            'hUnidad' => $_POST['hUnidad'],//valor numerico de tipo de unidad en heating
            'hUnidadLbl' => $_POST['hUnidadLbl'],//tipo de unidad en letras
            'hTarifa' => $_POST['hTarifa'],//valor numerico de tarifa en heating
            'dDays' => $_POST['dDays'],//valor numerico de horas de calefaccion
            'hsTipo' => $_POST['lblHsTipo'],//tipo de sistema, en letras de  heating std
            'hsStd' => $_POST['hsStd'],//cantidad del estandar de heating standard
            'hheTipo' => $_POST['lblHheTipo'],//tipo de sistema en letras heating high
            'hheStd' => $_POST['hheStd'],//cantidad del estandard afue en heating high

        ]);
    }
}