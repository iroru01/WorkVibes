<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\App\Models\User; //usuario del perfil que queramos abrir
use Illuminate\Support\Facades\Hash; //nos permite cifrar contraseñas
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller
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

    public function logout(Request $request){
        Auth::logout(); //laravel cerrará sesión del usuario que haya abierto sesión por cualquiera de las vías

        $request -> session() -> invalidate(); //reseteamos la sesión para evitar que quede guardada y pueda dar algún problema, invalida la sesión
        $request -> session() -> regenerateToken(); 

        return redirect(route('login')); //una vez cerrada la sesión lo redirigiremos a login
    }




}
