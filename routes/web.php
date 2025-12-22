<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ClassificationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\UserBookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});


Route::prefix('admin')->name('admin.')->group(function () {

Route::middleware('auth:admin')->group(function () {
Route::resource('classifications', ClassificationController::class)->names(
    ['index'=>'classifications.index',
    'show'=>'classifications.show',
    'create'=>'classifications.create',
    'update'=>'classifications.update',
    'edit'=>'classifications.edit',
    'store'=>'classifications.store',
    'destroy'=>'classifications.destroy',
]);

Route::resource('categories', CategoryController::class)->names(
    ['index'=>'categories.index',
    'show'=>'categories.show',
    'create'=>'categories.create',
    'update'=>'categories.update',
    'edit'=>'categories.edit',
    'store'=>'categories.store',
    'destroy'=>'categories.destroy',
]);

Route::resource('types',TypeController::class)->names(
    ['index'=>'types.index',
    'show'=>'types.show',
    'create'=>'types.create',
    'update'=>'types.update',
    'edit'=>'types.edit',
    'store'=>'types.store',
    'destroy'=>'types.destroy',
]);


Route::resource('books',BookController::class)->names(
    ['index'=>'books.index',
    'show'=>'books.show',
    'create'=>'books.create',
    'update'=>'books.update',
    'edit'=>'books.edit',
    'store'=>'books.store',
    'destroy'=>'books.destroy',
]);

Route::resource('dashboard',DashboardController::class)->names(
    ['index'=>'dashboard.index',
]);
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');
});

Route::get('/login', [AuthController::class, 'adminLogin'])->name('login');
Route::post('/Checklogin', [AuthController::class, 'adminCheckLogin'])->name('check');
});

Route::prefix('user')->group(function () {
    Route::get('/login', [AuthController::class, 'userLogin'])->name('user.login');
    Route::post('/check', [AuthController::class, 'userCheckLogin'])->name('user.check');

    Route::get('/register', [AuthController::class, 'userRegister'])->name('user.register');
    Route::post('/register', [AuthController::class, 'userStoreRegister'])->name('user.register.store');

    // Logged-in user area
    Route::middleware('auth:web')->group(function () {
        Route::get('/home', [UserBookController::class, 'index'])->name('user.Home.index');
        Route::get('/books/search', [UserBookController::class, 'search'])->name('user.books.search');
        Route::resource('books', UserBookController::class)
            ->only(['index'])
            ->names(['index' => 'user.books.index']);

        Route::resource('cart', CartController::class)->names(
            ['index'=>'user.cart.index',
            'show'=>'user.cart.show',
            'create'=>'user.cart.create',
            'update'=>'user.cart.update',
            'edit'=>'user.cart.edit',
            'store'=>'user.cart.store',
            'destroy'=>'user.cart.destroy',
        ]);
        Route::post('cart/{book}/remove', [CartController::class, 'remove'])
            ->name('user.cart.remove');

        Route::resource('orders', OrderController::class)
            ->only(['index', 'show', 'store'])
            ->names([
                'index' => 'orders.index',
                'show'  => 'orders.show',
                'store' => 'orders.store',
            ]);

        Route::get('checkout', [OrderController::class, 'checkout'])
            ->name('orders.checkout');

        Route::post('logout', [AuthController::class, 'Logout'])->name('logout');
    });
});


Route::get('/login', function () {
    return redirect()->route('user.login');
})->name('login');
