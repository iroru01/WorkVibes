<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    //
    public function registrer (Request $request){
        //Validar los datos
        //Validar el usuario que tenemos abierto
        $user = new User();
        $user -> name = $request -> name;
        $user -> apellido = $request -> apellido;
        $user -> dni = $request -> dni;
        $user -> teléfono = $request -> teléfono;
        $user -> direccion = $request -> direccion;
        $user -> password = Hash::make($request -> password); //creamos token de la contraseña para que llame a hash y la guarde cifrada
        $user -> confirmarContraseña = $request -> confirmarContraseña;
        
        $user -> save();

        //después de haber hecho el registro nos redirige a login, pero esto es opcional creo que nosotros no lo tenemos
        Auth::login($user); //entendemos que está validado y todo correcto y lo redigiremos a su perfil
        return redirect(route('privada'));
    }
}
