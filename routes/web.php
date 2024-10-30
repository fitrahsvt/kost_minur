<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//landing
Route::get('/', [LandingController::class, 'index'])->name('landing');

//register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

//show room
Route::get('/room/show/{id}', [RoomController::class, 'show'])->name('room.show');

//Authentification
Route::middleware('auth')->group(function(){
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //ADMIN
    // Route::middleware('role:admin')->group(function(){
        //user
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/user/detail/{id}', [UserController::class, 'detail'])->name('user.detail');

        //role
        Route::get('/role', [RoleController::class, 'index'])->name('role.index');
        Route::post('/role', [RoleController::class, 'store'])->name('role.store');
        Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

        //slider ubah status
        Route::get('/slider/accepted/{id}', [SliderController::class, 'accepted'])->name('slider.accepted');
        Route::get('/slider/rejected/{id}', [SliderController::class, 'rejected'])->name('slider.rejected');

        //product ubah status
        Route::get('/product/accepted/{id}', [ProductController::class, 'accepted'])->name('product.accepted');
        Route::get('/product/rejected/{id}', [ProductController::class, 'rejected'])->name('product.rejected');
    // });

    //STAFF
    // Route::middleware('role:staff')->group(function(){
        //slider
        Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
        Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
        Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update');

        //product
        Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/product', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

        //category
        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');

        //brand
        Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
        Route::put('/brand/{id}', [BrandController::class, 'update'])->name('brand.update');
    // });

    //ADMIN dan STAFF
    // Route::middleware('role:admin|staff')->group(function(){
        //product
        Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

        //slider
        Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
        Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

        //category
        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        //brand
        Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
        Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    // });

    //ADMIN dan STAFF dan USER
    //Product read and show
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

    //user edit
    Route::get('/user/profile/{id}', [UserController::class, 'editprofile'])->name('profile.edit');
    Route::put('/user/profile/{id}', [UserController::class, 'updateprofile'])->name('profile.update');

    //kamar
    Route::get('/room', [RoomController::class, 'index'])->name('room.index');
    Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');
    Route::post('/room', [RoomController::class, 'store'])->name('room.store');
    Route::delete('/room/{id}', [RoomController::class, 'destroy'])->name('room.destroy');
    Route::get('/room/edit/{id}', [RoomController::class, 'edit'])->name('room.edit');
    Route::put('/room/{id}', [RoomController::class, 'update'])->name('room.update');



    //fasilitas
    Route::get('/facility', [FacilityController::class, 'index'])->name('facility.index');
    Route::post('/facility', [FacilityController::class, 'store'])->name('facility.store');
    Route::get('/facility/edit/{id}', [FacilityController::class, 'edit'])->name('facility.edit');
    Route::put('/facility/{id}', [FacilityController::class, 'update'])->name('facility.update');
    Route::delete('/facility/{id}', [FacilityController::class, 'destroy'])->name('facility.destroy');
    // });

    // Transaksi berjalan
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transactiondetail/{id}', [TransactionController::class, 'detail'])->name('transaction.detail');
    Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::put('/transaction/{id}', [TransactionController::class, 'update'])->name('transaction.update');

    Route::get('/transaction/create/{id}', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/transaction/accepted/{id}', [TransactionController::class, 'accepted'])->name('transaction.accepted');
    Route::get('/transaction/rejected/{id}', [TransactionController::class, 'rejected'])->name('transaction.rejected');

    Route::get('/transaction/accepted/bukti/{id}', [TransactionController::class, 'accepted_bukti'])->name('transaction.accepted.bukti');
    Route::get('/transaction/rejected/bukti/{id}', [TransactionController::class, 'rejected_bukti'])->name('transaction.rejected.bukti');

    // proses transaksi
    Route::get('/process', [TransactionController::class, 'process'])->name('process.index');

    //riwayat transaksi
    Route::get('/history', [TransactionController::class, 'indexhistory'])->name('history.index');

    //pengeluaran
    Route::get('/expense', [TransactionController::class, 'indexexpense'])->name('expense.index');
    Route::get('/expense/create', [TransactionController::class, 'createexpense'])->name('expense.create');
    Route::post('/expense', [TransactionController::class, 'storeexpense'])->name('expense.store');
    Route::delete('/expense/{id}', [TransactionController::class, 'destroyexpense'])->name('expense.destroy');

    //laporan keuangan
    Route::get('/report', [TransactionController::class, 'indexreport'])->name('report.index');
    Route::get('/report/{bulan_tahun}', [TransactionController::class, 'reportdetail'])->name('report.detail');
});

//Authentification
// Route::middleware('auth')->group(function(){
//     Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//     //Dashboard
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//     //ADMIN
//     Route::middleware('role:admin')->group(function(){
//         //user
//         Route::get('/user', [UserController::class, 'index'])->name('user.index');
//         Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
//         Route::post('/user', [UserController::class, 'store'])->name('user.store');
//         Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
//         Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
//         Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
//         Route::get('/user/detail/{id}', [UserController::class, 'detail'])->name('user.detail');

//          //role
//         Route::get('/role', [RoleController::class, 'index'])->name('role.index');
//         Route::post('/role', [RoleController::class, 'store'])->name('role.store');
//         Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
//         Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');
//         Route::delete('/role/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

//         //slider ubah status
//         Route::get('/slider/accepted/{id}', [SliderController::class, 'accepted'])->name('slider.accepted');
//         Route::get('/slider/rejected/{id}', [SliderController::class, 'rejected'])->name('slider.rejected');

//         //product ubah status
//         Route::get('/product/accepted/{id}', [ProductController::class, 'accepted'])->name('product.accepted');
//         Route::get('/product/rejected/{id}', [ProductController::class, 'rejected'])->name('product.rejected');
//     });

//     //STAFF
//     Route::middleware('role:staff')->group(function(){
//         //slider
//         Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
//         Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
//         Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
//         Route::put('/slider/{id}', [SliderController::class, 'update'])->name('slider.update');

//         //product
//         Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
//         Route::post('/product', [ProductController::class, 'store'])->name('product.store');
//         Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
//         Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

//         //category
//         Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
//         Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
//         Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');

//         //brand
//         Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
//         Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
//         Route::put('/brand/{id}', [BrandController::class, 'update'])->name('brand.update');
//     });

//     //ADMIN dan STAFF
//     Route::middleware('role:admin|staff')->group(function(){
//         //product
//         Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

//         //slider
//         Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
//         Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

//         //category
//         Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
//         Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

//         //brand
//         Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
//         Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
//     });

//     //ADMIN dan STAFF dan USER
//     //Product read and show
//     Route::get('/product', [ProductController::class, 'index'])->name('product.index');
//     Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');

//     //user edit
//     Route::get('/user/profile/{id}', [UserController::class, 'editprofile'])->name('profile.edit');
//     Route::put('/user/profile/{id}', [UserController::class, 'updateprofile'])->name('profile.update');
// });


