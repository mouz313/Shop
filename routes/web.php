<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\http\Controllers\CategoryController;
use App\http\Controllers\BrandController;
use App\Models\User;
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
    return view('welcome');
});

Route::get('category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/category/restore/{id}', [CategoryController::class, 'ReStore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);


//Brand Routes
 
Route::get('brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');


Route::middleware([
'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {Route::get('/dashboard', function () {
        
    // $users =User::all();
    $users = DB::table('users')->get();
    return view('dashboard',compact('users'));
    })->name('dashboard');
});
