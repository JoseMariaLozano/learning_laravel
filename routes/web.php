<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('home');
    } 
    return view('welcome');

});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
Route::put('/contacts/{contact}/', [ContactController::class, 'update'])->name('contacts.update');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
