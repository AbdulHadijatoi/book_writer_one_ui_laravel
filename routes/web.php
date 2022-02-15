<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\BookInfo\BookInfoController;
use App\Http\Controllers\Cards\CardsController;
use App\Http\Controllers\Chapters\ChaptersController;
use App\Http\Controllers\Characters\CharactersController;
use App\Http\Controllers\Geography\GeographyController;
use App\Http\Controllers\Illustrations\IllustrationsController;
use App\Http\Controllers\Notes\NotesController;
use App\Http\Controllers\Sources\SourcesController;
use App\Http\Controllers\StrChapters\StrChaptersController;
use App\Http\Controllers\Structure\StructureController;
use App\Http\Controllers\Universe\UniverseController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'auth/login');
    Route::view('/signup', 'auth/signup');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('bookinfo', BookInfoController::class);
    Route::resource('cards', CardsController::class);
    Route::resource('chapters', ChaptersController::class);
    Route::resource('characters', CharactersController::class);
    Route::resource('geography', GeographyController::class);
    Route::resource('illustrations', IllustrationsController::class);
    Route::resource('notes', NotesController::class);
    Route::resource('sources', SourcesController::class);
    Route::resource('str_chapters', StrChaptersController::class);
    Route::resource('structure', StructureController::class);
    Route::resource('universe', UniverseController::class);
});


require __DIR__.'/auth.php';