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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//以下groupで囲われた部分はログインしていない場合にログインページに遷移する
//ミドルウェアも追加
Route::group(['middleware' => ['auth']], function() {
    Route::middleware(['clear'])->group(function(){
        Route::get('/stages', function () {
            return view('stages');
        })->name('stages');
    });
});


//ヘルプメニューへのルート
Route::get('/help', function(){
    return view('help');
});

require __DIR__.'/auth.php';
