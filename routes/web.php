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

Auth::routes();

Route::get('/calendar', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('index');
Route::get('/calendar/getAllEventos', [App\Http\Controllers\Auth\LoginController::class, 'getAllEventos'])->name('getAllEventos');
Route::get('/calendar/{sala}', [App\Http\Controllers\Auth\LoginController::class, 'getAllCalendarioSala'])->name('allCalendarioSala');     
Route::get('/calendar/getAllEventosSala/{sala}', [App\Http\Controllers\Auth\LoginController::class, 'getAllEventosSala'])->name('getAllEventosSala');

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout'); 
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'customLogin'])->name('customlogin');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /*calendario*/
    
    Route::get('/calendario', [App\Http\Controllers\HomeController::class, 'getCalendario'])->name('calendario');
    Route::post('/createNewEvento', [App\Http\Controllers\HomeController::class, 'createNewEvento'])->name('createNewEvento');
    Route::get('/calendario/getEventos/{id}', [App\Http\Controllers\HomeController::class, 'getEventos'])->name('getEventos');
    Route::get('/calendario/showEvento/{id}', [App\Http\Controllers\HomeController::class, 'showEvento'])->name('showEvento');
    Route::post('/calendario/eliminar', [App\Http\Controllers\HomeController::class, 'eliminarEvento'])->name('eliminarEvento');
    Route::post('/calendario/editar', [App\Http\Controllers\HomeController::class, 'updateEvento'])->name('updateEvento');

    
    /*apartado usuarios*/
    
    Route::get('/usuarios', [App\Http\Controllers\UsersController::class, 'getList'])->name('users');
    Route::get('/userdata/{id}', [App\Http\Controllers\UsersController::class, 'getTableData'])->name('usersdata');
    Route::get('/usuario/{user}', [App\Http\Controllers\UsersController::class, 'editUsuario'])->name('user.edit');
    Route::post('/usuario/editar', [App\Http\Controllers\UsersController::class, 'updateUsuario'])->name('user.update');
    Route::post('/usuario/eliminar', [App\Http\Controllers\UsersController::class, 'eliminarUsuario'])->name('user.delete');
    Route::get('/createNewUser', [App\Http\Controllers\UsersController::class, 'createUser'])->name('user.create');
    Route::post('/usuario/crear', [App\Http\Controllers\UsersController::class, 'createNewUser'])->name('user.createNewUser');

     /*apartado salas */
    
     Route::get('/salas', [App\Http\Controllers\SalasController::class, 'getList'])->name('salas');
     Route::get('/saladata/{id}', [App\Http\Controllers\SalasController::class, 'getTableData'])->name('salasdata');
     Route::get('/sala/{sala}', [App\Http\Controllers\SalasController::class, 'editSala'])->name('sala.edit');
     Route::post('/sala/editar', [App\Http\Controllers\SalasController::class, 'updateSala'])->name('updateSala');
     Route::post('/sala/eliminar', [App\Http\Controllers\SalasController::class, 'eliminarSala'])->name('sala.delete');
     Route::get('/createNewSala', [App\Http\Controllers\SalasController::class, 'createSala'])->name('sala.create');
     Route::post('/sala/crear', [App\Http\Controllers\SalasController::class, 'createNewSala'])->name('sala.createNewSala');
     Route::get('/calendario/{sala}', [App\Http\Controllers\SalasController::class, 'getCalendarioSala'])->name('calendarioSala');
     Route::get('/calendario/getEventosSala/{sala}', [App\Http\Controllers\SalasController::class, 'getEventosSala'])->name('getEventosSala');
     
    /*apartado eventos*/

    Route::get('/eventos', [App\Http\Controllers\EventosController::class, 'getEventos'])->name('eventos');
    Route::get('/eventosdata/{id}', [App\Http\Controllers\EventosController::class, 'getTableEventos'])->name('eventosdata');
   
});