<?php
use App\Http\Controllers\Admin\bookController;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Admin\classificationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\typeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('classification',classificationController::class)->names([
    'index'=>'classification.index',
    'create'=>'classification.create',
    'show'=>'classification.show',
    'edit'=>'classification.edit',
    'store'=>'classification.store',
    'update'=>'classification.update',
    'destory'=>'classification.destory',

]);



Route::resource('category', CategoryController::class)->names([
    'index'=>'category.index',
    'create'=>'category.create',
    'show'=>'category.show',
    'edit'=>'category.edit',
    'store'=>'category.store',
    'update'=>'category.update',
    'destory'=>'category.destory',

]);


Route::resource('type', typeController::class , [
    'index'=>'type.index',
    'create'=>'type.create',
    'show'=>'type.show',
    'edit'=>'type.edit',
    'store'=>'type.store',
    'update'=>'type.update',
    'destory'=>'type.destory',
]);


Route::resource('book', bookController::class,[
    'index'=>'book.index',
    'create'=>'book.create',
    'show'=>'book.show',
    'edit'=>'book.edit',
    'store'=>'book.store',
    'update'=>'book.update',
    'destory'=>'book.destory',
]);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


