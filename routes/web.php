<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatequistaController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/catequistas', [CatequistaController::class, 'index']);

Route::get('/catequistas/create', [CatequistaController::class, 'create']);
Route::get('/catequistas/show/{id}', [CatequistaController::class, 'show']);
Route::get('/catequistas/edit/{id}', [CatequistaController::class, 'edit']);
Route::post('/catequistas/store', [CatequistaController::class, 'store']);
Route::put('/catequistas/store/{id}', [CatequistaController::class, 'update']);
Route::get('/catequistas/eliminar/{id}', [CatequistaController::class, 'destroy']);

//Route::resource('catequistas', CatequistaController::class);