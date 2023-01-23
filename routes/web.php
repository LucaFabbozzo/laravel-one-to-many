<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
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

Route::get('/', [PageController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
        Route::get('projects/project-type', [ProjectController::class, 'types_project'])->name('types_project');
        Route::resource('projects', ProjectController::class);
        Route::get('projects/orderby/{column}/{direction}', [ProjectController::class, 'orderby'])->name('projects.orderby');
        Route::resource('types', TypeController::class)->except(['show', 'create', 'edit']);
    });


require __DIR__.'/auth.php';
