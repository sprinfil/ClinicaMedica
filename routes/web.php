<?php

use App\Http\Controllers\ReportesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\subirImagenController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\HistoriaOdontologicaController;

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

//HOME
Route::get('/', HomeController::class)->name('home');


// AUTH
    //LOGIN
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'store']);
    //LOGOUT
        Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');


Route::controller(UsuarioController::class)->group(function () {
    Route::get('/usuarios','show_crud')->name('usuarios');
});
Route::controller(PacienteController::class)->group(function(){
    Route::get('/pacientes', 'index')->name('pacientes');
});

Route::get('historial-medico', [HistorialController::class, 'index'])->name('historial_medico');
Route::get('historial-medico/expediente/{paciente_id}', [HistorialController::class, 'expediente'])->name('expediente');

Route::controller(HistoriaOdontologicaController::class)->group(function () {
    Route::get('historial-medico/historia-odontologica/{paciente_id}','index')->name('historia_odontologica');
    Route::get('historial-medico/historia-odontologica/create/tratamiento/{paciente_id}','create')->name('historia_odontologica_create');
    Route::post('historial-medico/historia-odontologica/create/store/{paciente_id}','store')->name('historia_odontologica_store');
    Route::get('historial-medico/historia-odontologica/create/tratamiento/{paciente_id}','create')->name('historia_odontologica_create');
    Route::get('historial-medico/historia-odontologica/tratamiento/{tratamiento_id}/{paciente_id}','edit')->name('historia_odontologica_editar');
    Route::get('historial-medico/historia-odontologica/tratamiento/delete/{tratamiento_id}/{paciente_id}','delete')->name('tratamiento_delete');
});

Route::controller(subirImagenController::class)->group(function () {
    Route::get('historial-medico/historia-odontologica/subirImagen/{tratamiento_id}/{paciente_id}','index')->name('historia_odontologica_imagen');
    Route::post('historial-medico/historia-odontologica/subirClinica/{tratamiento_id}/{paciente_id}','store_clinica')->name('historia_odontologica_clinica_subir');
    Route::post('historial-medico/historia-odontologica/subirRadiografia/{tratamiento_id}/{paciente_id}','store_radiografia')->name('historia_odontologica_radiografia_subir');
});

Route::controller(HistoriaClinicaController::class)->group(function() {
    Route::get('historial-medico/historia-clinica/{paciente_id}', 'index')->name('historia-clinica');
});

Route::controller(CitaController::class)->group(function() {
    Route::get('citas', 'index')->name('citas_index');
});

Route::controller(ReportesController::class)->group(function() {
    Route::get('reportes', 'corte_caja_index')->name('corte_caja');
});


//ruta para limpiar el cache
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return  "all cleared ...";
});