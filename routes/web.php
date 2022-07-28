<?php
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\UnitKerjaController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\PermissionController;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\UserController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

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


//Route::view('/', 'welcome');

//Route::view('/','authentification.loginn');

Route::view('/','dashboard');

Route::get('/ajaxRequest', [RequestController::class, 'ajaxRequestPost'])->name('ajaxRequestPost');

// Route::post('/ajaxRequest/{file_id}', [RequestController::class, 'ajaxRequestPost'])->name('ajaxRequest.post');

//detail pengajuan peminjaman di user
Route::get('/peminjaman/{id}', [RequestController::class, 'create']);

//home page tampilan pendaftaran training
Route::get('/dashboard',[HomeController::class,'index'])->name('home');

Route::get('/requestrecord', [RequestController::class,'index']);

//update approval arsip
Route::put('/pengajuaan/{id}', [RequestController::class, 'update']);
//store approval arsip
//Route::post('/arsip/{id}/store', [RequestController::class, 'store']);
Route::post('/arsip/store', [RequestController::class, 'store']);


//detail pengajuan untuk user
//Route::get('/registsubmission/{id}', [RegistController::class,'registShow']);
Route::get('/detailrequest/{id}', [RequestController::class,'show']);

Route::get('/search', [SearchController::class, 'create']);

    Route::get('/arsip', [ArsipController::class,'index']);
    Route::post('/arsip', [ArsipController::class,'store']);
    Route::get('/arsip/create', [ArsipController::class, 'create']);
    Route::get('/arsip/{id}', [ArsipController::class, 'show']);
    Route::get('/arsip/{id}/edit', [ArsipController::class,'edit']);
    Route::put('/arsip/{id}', [ArsipController::class, 'update']);
    Route::delete('/arsip/{id}', [ArsipController::class, 'destroy']);
    Route::get('/exportArsip',[ArsipController::class,'arsipExport']);
    Route::post('/importArsip',[ArsipController::class,'arsipImport'])->name('arsip.import');
    Route::get('/templateArsip',[ArsipController::class,'templateArsip'])->name('arsip.template');

    //download file
    Route::get('/arsip/download/{file}', [ArsipController::class, 'download'])->name('arsip-download');


//change password
Route::put('/user/changePassword', [UserController::class, 'updatePassword'])->name('user.changePassword');


Auth::routes();

//hakakses admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    

    // Roles
    //Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('/role', RoleController::class);
    

    // Permissions
    //Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('/permission', PermissionController::class);

    // Users
    //Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::get('/user', [UserController::class, 'index']);

    Route::get('/user/create', [UserController::class, 'create']);

    Route::post('/user', [UserController::class,'store']);

    Route::get('/user/{id}', [UserController::class,'show']);

    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    Route::get('/user/{id}/edit', [UserController::class, 'edit']);

    Route::put('/user/{id}', [UserController::class, 'update']);

    
    Route::get('/index', [IndexController::class,'index']);
    Route::post('/index', [IndexController::class,'store']);
    Route::get('/index/create', [IndexController::class, 'create']);
    Route::get('/index/{id}', [IndexController::class, 'show']);
    Route::get('/index/{id}/edit', [IndexController::class,'edit']);
    Route::put('/index/{id}', [IndexController::class, 'update']);
    Route::delete('/index/{id}', [IndexController::class, 'destroy']);
    Route::get('/exportIndex',[IndexController::class,'indexExport']);
    Route::post('/importIndex',[IndexController::class,'indexImport'])->name('index.import');
    Route::get('/templateIndex',[IndexController::class,'templateIndex'])->name('index.template');

    Route::get('/klasifikasi', [KlasifikasiController::class,'index']);
    Route::post('/klasifikasi', [KlasifikasiController::class,'store']);
    Route::get('/klasifikasi/create', [KlasifikasiController::class, 'create']);
    Route::get('/klasifikasi/{id}', [KlasifikasiController::class, 'show']);
    Route::get('/klasifikasi/{id}/edit', [KlasifikasiController::class,'edit']);
    Route::put('/klasifikasi/{id}', [KlasifikasiController::class, 'update']);
    Route::delete('/klasifikasi/{id}', [KlasifikasiController::class, 'destroy']);
    Route::get('/exportKlasifikasi',[KlasifikasiController::class,'klasifikasiExport']);
    Route::post('/importKlasifikasi',[KlasifikasiController::class,'klasifikasiImport'])->name('klasifikasi.import');
    Route::get('/templateKlasifikasi',[KlasifikasiController::class,'templateKlasifikasi'])->name('klasifikasi.template');

    Route::get('/unitkerja', [UnitKerjaController::class,'index']);
    Route::post('/unitkerja', [UnitKerjaController::class,'store']);
    Route::get('/unitkerja/create', [UnitKerjaController::class, 'create']);
    Route::get('/unitkerja/{id}', [UnitKerjaController::class, 'show']);
    Route::get('/unitkerja/{id}/edit', [UnitKerjaController::class,'edit']);
    Route::put('/unitkerja/{id}', [UnitKerjaController::class, 'update']);
    Route::delete('/unitkerja/{id}', [UnitKerjaController::class, 'destroy']);
    Route::get('/exportUnitkerja',[UnitKerjaController::class,'unitkerjaExport']);
    Route::post('/importUnitkerja',[UnitKerjaController::class,'unitkerjaImport'])->name('unitkerja.import');
    Route::get('/templateUnitkerja',[UnitKerjaController::class,'templateUnitkerja'])->name('unitkerja.template');

    //dropdowngetindex from unitkerja
    Route::post('api/fetch-index', [ArsipController::class, 'getIndex']);

    //detail pengajuan untuk admin approver
    Route::get('/requestsubmission/{request_id}', [RequestController::class,'edit']);
   
    });

