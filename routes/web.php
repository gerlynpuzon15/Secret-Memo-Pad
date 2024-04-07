<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NoteController;




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

route::get('/',[NoteController::class,'home']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/home',[NoteController::class,'index']);


route::post('/createnote',[NoteController::class,'createnote']);

route::get('/note',[NoteController::class,'note']);

route::get('/deletenote/{id}',[NoteController::class,'deletenote']);

route::get('/updatenote/{id}',[NoteController::class,'updatenote']);

route::post('/editnote/{id}',[NoteController::class,'editnote']);



