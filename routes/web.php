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
    Route::get('geography', [GeographyController::class, 'index'])->name('create_geography');
    Route::get('geography/view', [GeographyController::class, 'get_geography'])->name('view_geography');
    Route::resource('illustrations', IllustrationsController::class);
    Route::get('notes', [NotesController::class, 'index'])->name('create_notes');
    Route::get('notes/view', [NotesController::class, 'get_notes'])->name('view_notes');
    Route::resource('sources', SourcesController::class);
    Route::get('str_chapters', [StrChaptersController::class, 'index'])->name('create_str_chapter');
    Route::post('str_chapters', [StrChaptersController::class, 'store'])->name('save_str_chapter');
    Route::get('str_chapters/view{number}', [StrChaptersController::class, 'get_chapter'])->name('view_str_chapter');
    Route::POST('str_chapters/view', [StrChaptersController::class, 'update_chapter'])->name('update_str_chapter');
    Route::resource('structure', StructureController::class);
    Route::view('/universe', 'universe/index')->name('universeList');
    Route::group(['prefix' => 'universe'], function () {
        Route::get('/bestiary', [BestiaryController::class,'index'])->name('create_bestiary');
        Route::get('/bestiary/view', [BestiaryController::class,'get_bestiary'])->name('view_bestiary');
        Route::get('/civilization', [CivilizationController::class,'index'])->name('create_civilization');
        Route::get('/civilization/view', [CivilizationController::class,'get_civilization'])->name('view_civilization');
        Route::get('/magic', [MagicController::class,'index'])->name('create_magic');
        Route::get('/magic/view', [MagicController::class,'get_magic'])->name('view_magic');
        Route::get('/myths-and-legends', [MythsAndLegendsController::class,'index'])->name('create_myths_and_legends');
        Route::get('/myths-and-legends/view', [MythsAndLegendsController::class,'get_myths_and_legends'])->name('view_myths_and_legends');
        Route::get('/technology', [TechnologyController::class,'index'])->name('create_technology');
        Route::get('/technology/view', [TechnologyController::class,'get_technology'])->name('view_technology');
        Route::get('/other', [OtherController::class,'index'])->name('create_other');
        Route::get('/other/view', [OtherController::class,'get_other'])->name('view_other');
    });
});


require __DIR__.'/auth.php';