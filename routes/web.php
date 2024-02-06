<?php

use App\Http\Controllers\fakeapps;
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

Route::get('/', [fakeapps::class, 'index'])->name('fakeapps.index');
Route::get('/user', [fakeapps::class, 'user'])->name('fakeapps.content');
Route::post('/appview', [fakeapps::class, 'appview'])->name('fakeapp.appview');
Route::get('/listing', [fakeapps::class, 'listing'])->name('fakeapp.listing');
Route::post('/edit', [fakeapps::class, 'edit'])->name('fakeapp.edit');
Route::post('/delete', [fakeapps::class, 'delete'])->name('fakeapp.delete');