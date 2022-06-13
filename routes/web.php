<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TreeController;

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

Route::get('/tree-view', [TreeController::class, 'manageNode']);
Route::post('/add-node', [TreeController::class, 'addNode'])->name('add.node');
Route::post('/delete-node', [TreeController::class, 'deleteNode'])->name('delete.node');
Route::post('/update-node', [TreeController::class, 'updateNode'])->name('update.node');
Route::post('/move-node', [TreeController::class, 'moveNode'])->name('move.node');
Route::post('/sort-nodes', [TreeController::class, 'sortNodes'])->name('sort.nodes');