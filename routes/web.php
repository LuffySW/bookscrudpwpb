<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
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
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'books'], function () {
        Route::get('/', [BookController::class, 'index'])->name('book.index');
        Route::get('edit/{book}', [BookController::class, 'edit'])->name('book.edit');
        Route::get('create', [BookController::class, 'create'])->name('book.create');
        Route::post('update/{book}', [BookController::class, 'update'])->name('book.update');
        Route::post('delete/{book}', [BookController::class, 'destroy'])->name('book.delete');
        Route::post('store', [BookController::class, 'store'])->name('book.store');
        
        Route::post('pictureDelete/{book}', [BookController::class, 'deletePicture'])->name('book.picture-delete');
        // JS 
        Route::get('show/{book}', [BookController::class, 'show'])->name('book.show');
    });
    
    Route::group(['prefix' => 'authors'], function () {
        Route::get('/', [AuthorController::class, 'index'])->name('author.index');
        Route::get('edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
        Route::get('create', [AuthorController::class, 'create'])->name('author.create');
        Route::post('update/{author}', [AuthorController::class, 'update'])->name('author.update');
        Route::post('delete/{author}', [AuthorController::class, 'destroy'])->name('author.delete');
        Route::post('store', [AuthorController::class, 'store'])->name('author.store');

        Route::post('pictureDelete/{author}', [AuthorController::class, 'deletePicture'])->name('author.picture-delete');

    });
    
});