<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\manager\EstadoController;
use App\Http\Controllers\manager\PrioridadController;
use App\Http\Controllers\manager\TipoTktController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\manager\SectorController;
use App\Http\Controllers\manager\CalificacionController;
use App\Http\Controllers\manager\CategoriaUsuarioController;
use App\Http\Controllers\manager\TicketController;

/*
|--------------------------------------------------------------------------
| Rutas de las API's
|--------------------------------------------------------------------------
|
|Aquí es donde puede registrar las rutas API para su aplicación.
|Estas rutas son cargadas por el RouteServiceProvider y todas ellas
|seran asignadas al grupo de middleware "api".
*/

Route::middleware('auth:sanctum')->get('/User', function (Request $request) {
    return $request->user();
});

/* LOGIN */
Route::post('/Login', [UsuarioController::class, 'Login']);

/* USUARIOS */
Route::post('/NuevoUsuario', [UsuarioController::class, 'NuevoUsuario']);
Route::post('/BorroUsuario', [UsuarioController::class, 'BorroUsuario']);
Route::post('/ModificoUsuario', [UsuarioController::class, 'ModificoUsuario']);
Route::get('/ObtenerUsuarios', [UsuarioController::class, 'ObtenerUsuarios']);

/* ESTADOS */
Route::post('/NuevoEstado', [EstadoController::class, 'NuevoEstado']);
Route::post('/BorroEstado', [EstadoController::class, 'BorroEstado']);
Route::post('/ModificoEstado', [EstadoController::class, 'ModificoEstado']);
Route::get('/ObtenerEstados', [EstadoController::class, 'ObtenerEstados']);

/* PRIORIDADES */
Route::post('/NuevaPrioridad', [PrioridadController::class, 'NuevaPrioridad']);
Route::post('/BorroPrioridad', [PrioridadController::class, 'BorroPrioridad']);
Route::post('/ModificoPrioridad', [PrioridadController::class, 'ModificoPrioridad']);
Route::get('/ObtenerPrioridades', [PrioridadController::class, 'ObtenerPrioridades']);

/* SECTORES */
Route::post('/NuevoSector', [SectorController::class, 'NuevoSector']);
Route::post('/BorroSector', [SectorController::class, 'BorroSector']);
Route::post('/ModificoSector', [SectorController::class, 'ModificoSector']);
Route::get('/ObtenerSectores', [SectorController::class, 'ObtenerSectores']);

/* CALIFICACIONES */
Route::post('/NuevaCalificacion', [CalificacionController::class, 'NuevaCalificacion']);
Route::post('/BorroCalificacion', [CalificacionController::class, 'BorroCalificacion']);
Route::post('/ModificoCalificacion', [CalificacionController::class, 'ModificoCalificacion']);
Route::get('/ObtenerCalificaciones', [CalificacionController::class, 'ObtenerCalificaciones']);

/* TICKETS */
Route::post('/NuevoTicket', [TicketController::class, 'NuevoTicket']);
Route::post('/BorroTicket', [TicketController::class, 'BorroTicket']);
Route::post('/ModificoTicket', [TicketController::class, 'ModificoTicket']);
Route::get('/ObtenerTickets', [TicketController::class, 'ObtenerTickets']);

/* TIPOS DE TICKETS */
Route::post('/NuevoTipoTkt', [TipoTktController::class, 'NuevoTipoTkt']);
Route::post('/BorroTipoTkt', [TipoTktController::class, 'BorroTipoTkt']);
Route::post('/ModificoTipoTkt', [TipoTktController::class, 'ModificoTipoTkt']);
Route::get('/ObtenerTiposTkt', [TipoTktController::class, 'ObtenerTiposTkt']);

/* CATEGORIAS DE USUARIOS */
Route::post('/NuevaCategoriaUsuario', [CategoriaUsuarioController::class, 'NuevaCategoriaUsuario']);
Route::post('/BorroCategoriaUsuario', [CategoriaUsuarioController::class, 'BorroCategoriaUsuario']);
Route::post('/ModificoCategoriaUsuario', [CategoriaUsuarioController::class, 'ModificoCategoriaUsuario']);
Route::get('/ObtenerCategoriasUsuarios', [CategoriaUsuarioController::class, 'ObtenerCategoriasUsuarios']);
