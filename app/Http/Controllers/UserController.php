<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use DB;
use Session;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function login(Request $request)
    {
        $usuario    = $request->input('username');
        $usuario2 =  DB::select('SELECT * FROM usuario WHERE nombre = ? ', [$usuario]);
        if (count($usuario2)>0) {
                $pass = password_verify($request->input('password'), $usuario2[0]->password);
                if($pass){
                    Session::put('idUsuario',         $usuario2[0]->idUsuario); 
                    session()->put('nombre',      $usuario2[0]->nombre);
                    session()->put('tipoUsuario',    $usuario2[0]->idTipoUsuario);
                    session()->save();
                    return redirect('/home');
                }
                else
                {
                    return view('login');
                }
        }else{
            return view('login');
        }
        // password_hash($request->input('password'), PASSWORD_DEFAULT);
       
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/');
    }

    public function getLogo(){
        $submit = DB::table('usuario')
        ->where('idUsuario', session('idUsuario'))
        ->get();        
        
        return response()->json($submit[0]->logo);
    }
    public function actualizarLogo(Request $request){
        date_default_timezone_set("America/Mexico_City");
        if ($request->hasFile('file')){
            $file           = $request->file("file");
            $extension = $file->getClientOriginalExtension();
            //$nombrearchivo  = str_slug($request->slug).".".$file->getClientOriginalExtension();
            $nombrearchivo  = session('nombre').date("YmdHis").".".$extension;
            $file->move(public_path("assets/images/logos/"),$nombrearchivo);
            $submit = DB::table('usuario')
              ->where('idUsuario', session('idUsuario'))
              ->update(['logo' => $nombrearchivo]);

        }else {
            return redirect()->route('settings');
        }

        return redirect()->route('index');
    }

}