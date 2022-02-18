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
use App\Http\Controllers\Universe\Bestiary\BestiaryController;
use App\Http\Controllers\Universe\Civilization\CivilizationController;
use App\Http\Controllers\Universe\Magic\MagicController;
use App\Http\Controllers\Universe\MythsAndLegends\MythsAndLegendsController;
use App\Http\Controllers\Universe\Other\OtherController;
use App\Http\Controllers\Universe\Technology\TechnologyController;
use App\Http\Controllers\Universe\UniverseController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'auth/login');
    Route::view('/register', 'auth/register');
    Route::view('/', 'auth/login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('bookinfo', BookInfoController::class);
    Route::resource('cards', CardsController::class);
    Route::get('chapters', [ChaptersController::class, 'index'])->name('create_chapter');
    Route::get('chapters/view', [ChaptersController::class, 'get_chapter'])->name('view_chapter');
    Route::get('characters', [CharactersController::class, 'index'])->name('create_character');
    Route::get('characters/view', [CharactersController::class, 'get_character'])->name('view_character');
    Route::resource('geography', GeographyController::class);
    Route::resource('illustrations', IllustrationsController::class);
    Route::resource('notes', NotesController::class);
    Route::resource('sources', SourcesController::class);
    Route::get('str_chapters', [ChaptersController::class, 'index'])->name('create_str_chapter');
    Route::get('str_chapters/view', [ChaptersController::class, 'get_chapter'])->name('view_str_chapter');
    Route::resource('structure', StructureController::class);
    Route::view('/universe', 'universe/index')->name('universeList');
    Route::group(['prefix' => 'universe'], function () {
        Route::resource('/bestiary', BestiaryController::class);
        Route::resource('/civilization', CivilizationController::class);
        Route::resource('/magic', MagicController::class);
        Route::resource('/myths-and-legends', MythsAndLegendsController::class);
        Route::resource('/technology', TechnologyController::class);
        Route::resource('/other', OtherController::class);
    });
});


require __DIR__.'/auth.php';