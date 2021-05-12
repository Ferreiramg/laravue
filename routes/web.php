<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use Illuminate\Routing\RouteGroup;

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
    return view('app');
});
Route::get('menus', [Controllers\ModuloController::class, 'index']);
Route::get('menus-json', [Controllers\ModuloController::class, 'recursiveJsonMenu']);
Route::get('menus-show', [Controllers\ModuloController::class, 'show']);
Route::post('menus', [Controllers\ModuloController::class, 'store'])->name('menus.store');

Auth::routes();

Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
Route::get('/adm', [Controllers\HomeController::class, 'admin'])->middleware('permissions:ver')->name('admin');

Route::get('/permission/add', [Controllers\ACLController::class, 'permission'])->name('perm.add');
Route::get('/role/add', [Controllers\ACLController::class, 'role'])->name('role.add');
Route::get('/group/add', [Controllers\ACLController::class, 'group'])->name('group.add');
Route::get('/group/user/add', [Controllers\ACLController::class, 'usersGroup'])->name('user-group.add');
Route::post('/user/save', [Controllers\ACLController::class, 'usersGroupSave'])->name('user-group.save');
Route::post('/group/save', [Controllers\ACLController::class, 'groupSave'])->name('group.save');
Route::post('/permission/save', [Controllers\ACLController::class, 'permSave'])->name('perm.save');
Route::post('/role/save', [Controllers\ACLController::class, 'roleSave'])->name('role.save');
