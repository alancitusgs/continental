<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravel_example\UserManagement;
use App\Http\Controllers\laravel_example\CourseManagement;

use App\Http\Controllers\Admin\RolesController;

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

$controller_path = 'App\Http\Controllers';

// Route::get('/users/user-management', [UserManagement::class, 'UserManagement'])->middleware('can:laravel-example-user-management')->name('laravel-example-user-management');
// Route::resource('/user-list', UserManagement::class);

// laravel example
Route::get('/users/user-management', [UserManagement::class, 'UserManagement'])->name('laravel-example-user-management');
Route::resource('/user-list', UserManagement::class);



Route::get('/app/acceso-usuarios', $controller_path . '\Admin\UsuarioController@index')->name('app-acceso-usuarios');
Route::post('/app/agregar-usuarios', $controller_path . '\Admin\UsuarioController@store')->name('AgregarUsuario');
Route::get('/app/datos-usuario/{id}', $controller_path . '\Admin\UsuarioController@edit')->name('ObtenerUsuario');
Route::delete('/app/eliminar-usuario/{id}', $controller_path . '\Admin\UsuarioController@destroy')->name('EliminarUsuario');
Route::post('/app/editar-usuario', $controller_path . '\Admin\UsuarioController@update')->name('EditarUsuario');


Route::get('/courses/course-management', [CourseManagement::class, 'CourseManagement'])->name('course-course-management');
Route::resource('/course-list', CourseManagement::class);


// Main Page Route
Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');

Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');

// pages
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');



// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');

Route::get('/users/data', $controller_path . '\apps\UserList@getUsersData')->name('users.data');


// Roles y Permisos
Route::get('/app/acceso-roles', $controller_path . '\Admin\RolesController@index')->name('app-acceso-roles');
Route::post('/app/agregar-rol', $controller_path . '\Admin\RolesController@store')->name('AgregarRol');
Route::get('/app/datos-rol/{id}', $controller_path . '\Admin\RolesController@edit')->name('ObtenerRol');
Route::post('/app/editar-rol', $controller_path . '\Admin\RolesController@update')->name('EditarRol');
Route::delete('/app/eliminar-rol/{id}', $controller_path . '\Admin\RolesController@destroy')->name('EliminarRol');





//Cursos
// Route::get('/app/acceso-cursos', $controller_path . '\Admin\CursoController@index')->name('app-acceso-cursos');

Route::get('/app/buscar-curso', $controller_path . '\Admin\CursoController@buscarCurso')->name('app-buscar-curso');

// Route::get('/app/crear-curso', $controller_path . '\Admin\CursoController@create')->name('app-crear-curso');

// Route::post('/app/agregar-cursos', $controller_path . '\Admin\CursoController@store')->name('cursos.store');

Route::post('/app/agregar-produccion', $controller_path . '\Admin\ProduccionController@store')->name('produccion.store');
Route::get('/app/acceso-produccion', $controller_path . '\Admin\ProduccionController@index')->name('app-acceso-produccion');
Route::get('/app/crear-curso', $controller_path . '\Admin\ProduccionController@create')->name('app-crear-curso');


//Temporadas
Route::get('/app/acceso-temporadas', $controller_path . '\Admin\TemporadaController@index')->name('app-acceso-temporadas');
Route::post('/app/agregar-temporada', $controller_path . '\Admin\TemporadaController@store')->name('AgregarTemporada');
Route::get('/app/datos-temporada/{id}', $controller_path . '\Admin\TemporadaController@edit')->name('ObtenerTemporada');
Route::post('/app/editar-temporada', $controller_path . '\Admin\TemporadaController@update')->name('EditarTemporada');
Route::delete('/app/eliminar-temporada/{id}', $controller_path . '\Admin\TemporadaController@destroy')->name('EliminarTemporada');

//Programas
// Route::get('/app/acceso-programas', $controller_path . '\Admin\ProgramaController@index')->middleware('can:app-acceso-programas')->name('app-acceso-programas');
Route::get('/app/acceso-programas', $controller_path . '\Admin\ProgramaController@index')->name('app-acceso-programas');

Route::get('/app/todos-programas', $controller_path . '\Admin\ProgramaController@getprograma')->name('ObtenerTodosProgramas');
Route::post('/app/agregar-programas', $controller_path . '\Admin\ProgramaController@store')->name('AgregarPrograma');
Route::get('/app/datos-programa/{id}', $controller_path . '\Admin\ProgramaController@edit')->name('ObtenerPrograma');
Route::post('/app/editar-programa', $controller_path . '\Admin\ProgramaController@update')->name('EditarPrograma');
Route::delete('/app/eliminar-programa/{id}', $controller_path . '\Admin\ProgramaController@destroy')->name('EliminarPrograma');



Route::get('/app/acceso-carpeta', $controller_path . '\Admin\CursoController@carpeta')->name('app-acceso-carpeta');

Route::get('/app/archivos', $controller_path . '\Admin\CursoController@archivos')->name('app-archivos');

Route::get('/app/listado', $controller_path . '\Admin\CursoController@listado')->name('app-listado');

Route::get('/app/subir', $controller_path . '\Admin\CursoController@subir')->name('app-subir');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () use ($controller_path) {
    Route::get('/dashboard', function () {
        return view('content.pages.pages-home');
    })->name('dashboard');

 


    

});





