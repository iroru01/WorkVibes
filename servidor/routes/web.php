<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//vistas para la autentificación de Laravel, enganchar las que tenemos de html
Route::view('/login',"login") -> name('login');
Route::view('/registro',"register") -> name('registro');
Route::view('/privada', "secret") -> middleware(auth) -> name('privada');//donde queremos llegar una vez tenemos inciada sesión de forma correcta
//con el middleware lo que hacemos es buscar una sesion activa del usuario que entrase previamente y comprobamos que las credenciales sean correctas y sigan igual entonces podemos dejarle enetrar
//controladores con el que sabremos qué quiere hacer el usuario
Route::post('/validar-registro',[LoginController::class, 'register']) -> name('validar-registro');
Route::post('/inicia-sesión',[LoginController::class,'login']) -> name('inicia-sesion');
Route::get('/logout',[LoginController::class,'logout']) -> name('logout');
