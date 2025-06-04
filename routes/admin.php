<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PasantiaController;
use App\Http\Controllers\Admin\DocenteController;
use App\Http\Controllers\Admin\AlumnoController;
use App\Http\Controllers\Admin\CarreraController;
use App\Http\Controllers\Admin\FacultadController;


Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

/*Route::get('/docentes/list', [DocenteController::class, 'getDocentes']);
Route::get('/alumnos/list', [AlumnoController::class, 'getAlumnos']);
Route::get('/pasantias/list', [PasantiaController::class, 'getPasantias']);
Route::get('/carreras/list', [CarreraController::class, 'getCarreras']);*/
Route::get('/facultades/list', [FacultadController::class, 'getFacultades']);

//Rutas para pasantías
Route::middleware('auth')->group(function () {
    Route::redirect('pasantias', 'pasantias.index');

    /*Route::resource('/pasantias', PasantiaController::class)
        ->names([
            'index' => 'pasantias.index',
            'create' => 'pasantias.create',
            'store' => 'pasantias.store',
            //'show' => 'pasantias.show',
            'edit' => 'pasantias.edit',
            'update' => 'pasantias.update',
            'destroy' => 'pasantias.destroy'
        ]);


    Route::resource('docentes', DocenteController::class)
    ->names([
        'index' => 'docentes.index',
        'create' => 'docentes.create',
        'store' => 'docentes.store',
        //'show' => 'docentes.show',
        'edit' => 'docentes.edit',
        'update' => 'docentes.update',
        'destroy' => 'docentes.destroy'
    ]);

    Route::resource('alumnos', AlumnoController::class)
    ->names([
        'index' => 'alumnos.index',
        'create' => 'alumnos.create',
        'store' => 'alumnos.store',
        //'show' => 'alumnos.show',
        'edit' => 'alumnos.edit',
        'update' => 'alumnos.update',
        'destroy' => 'alumnos.destroy'
    ]);

    Route::resource('carreras', CarreraController::class)
    ->names([
        'index' => 'carreras.index',
        'create' => 'carreras.create',
        'store' => 'carreras.store',
        //'show' => 'carreras.show',
        'edit' => 'carreras.edit',
        'update' => 'carreras.update',
        'destroy' => 'carreras.destroy'
    ]);*/

    Route::resource('facultades', FacultadController::class)
    ->names([
        'index' => 'facultades.index',
        'create' => 'facultades.create',
        'store' => 'facultades.store',
        //'show' => 'facultades.show',
        'edit' => 'facultades.edit',
        'update' => 'facultades.update',
        'destroy' => 'facultades.destroy'
    ]);
});