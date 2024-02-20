<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\App\Models\User; //usuario del perfil que queramos abrir
use Illuminate\Support\Facades\Hash; //nos permite cifrar contraseñas
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller
{
    //
    

    public function login(Request $request){ //ESTO FALTA

        //validacion

        //credenciales por los que buscaré si el usuario existe en la base de datos
        $credentials =[
            "dni" => $request -> email, //un dni para un usuario, no puede haber dni repetidos
            "password" => $request -> password, 
        ];

        //tenemos la opcion de mantener abierta la sesión, que la página te recuerde 
        //SI QUEREMOS SE PUEDE QUITAR, habría que añadir un checkbox preguntando si queremos que me recuerde o no
        $remember = ($request -> has('remember') ? true : false); 
        if(Auth::attempt($credentials,$remember)){ //si marcó que sí quiere que le recuerde 
            $request -> session() -> regenerate(); //necesitamos tener si o si una sesión abierta y que esta se pueda regenerar

        }
        else{
            return redirect('login');
        }
        


    }

}
