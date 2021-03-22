<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    if (Session::get('idUsuario'))
    {
        return view('index');
    }else{
        return view('login');
    }
})->name('index');
Route::get('/', function () {
    if (Session::get('idUsuario'))
    {
        return view('index');
    }else{
        return view('login');
    }
})->name('index');
Route::get('/settings', function () {
    if (Session::get('idUsuario'))
    {
        return view('settings');
    }else{
        return view('login');
    }
})->name('settings');
Route::get('/resultados', function () {
    if (Session::get('idUsuario'))
    {
        return view('index');
    }else{
        return view('login');
    }
})->name('resultados2');
Route::get('/login', function () {
    return view('login');
})->name('login');



//-----------Login/logout--------------------
Route::post('/login', 'UserController@login')->name('login');

Route::post('/logout', 'UserController@logout')->name('logout');
//-------------------------------------------


//rutas index
Route::post('/getPaises','IndexController@getPaises');
Route::post('/getCiudades','IndexController@getCiudades');
Route::post('/getDegreeHrs','IndexController@getdegreeHrs');
// rutas resultados
Route::post('/resultados','ResultadosController@getResultados')->name('resultados');

//rutas resources y user controller
Route::post('/getLogo','UserController@getLogo');
Route::post('/actualizarLogo','UserController@actualizarLogo')->name('setLogo');

//rutas settings
Route::post('/setDegreeHrs','SettingsController@setdegreeHrs');