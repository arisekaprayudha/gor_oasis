<?php
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

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


// home page tampilan awal
Route::view('/','authentification.loginn');
//Route::get('/',[HomeController::class,'index'])->name('home');

Auth::routes();

//hakakses admin
Route::middleware(['auth', 'role:Admin'])->group(function () {

    //change password
    Route::put('/user/changePassword', [UserController::class, 'updatePassword'])->name('user.changePassword');
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class,'store']);
    Route::get('/user/{id}', [UserController::class,'show']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::get('/exportBobot',[BobotController::class,'bobotExport']);
    Route::post('/importBobot',[BobotController::class,'bobotImport'])->name('bobot.import');
    Route::get('/templateBobot',[BobotController::class,'templateBobot'])->name('bobot.template');
    Route::get('/dashboard', [HomeController::class,'index']);

    //data jadwal
    Route::get('/jadwal', [JadwalController::class,'index']);
    Route::post('/jadwal', [JadwalController::class,'store']);
    Route::get('/jadwal/create', [JadwalController::class, 'create']);
    Route::get('/jadwal/{id}', [JadwalController::class, 'show']);
    Route::get('/jadwal/{id}/edit', [JadwalController::class,'edit']);
    Route::put('/jadwal/{id}', [JadwalController::class, 'update']);
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy']);
    Route::get('/exportJadwal',[JadwalController::class,'jadwalExport']);
    Route::post('/importJadwal',[JadwalController::class,'jadwalImport'])->name('jadwal.import');
    Route::get('/templateJadwal',[JadwalController::class,'templateJadwal'])->name('jadwal.template');

    //data group
    Route::get('/group', [GroupController::class,'index']);
    Route::post('/group', [GroupController::class,'store']);
    Route::get('/group/create', [GroupController::class, 'create']);
    Route::get('/group/{id}', [GroupController::class, 'show']);
    Route::get('/group/{id}/edit', [GroupController::class,'edit']);
    Route::put('/group/{id}', [GroupController::class, 'update']);
    Route::delete('/group/{id}', [GroupController::class, 'destroy']);
    Route::get('/exportGroup',[GroupController::class,'groupExport']);
    Route::post('/importGroup',[GroupController::class,'groupImport'])->name('group.import');
    Route::get('/templateGroup',[GroupController::class,'templateGroup'])->name('group.template');
    
    
    //hasil prediksi
    Route::get('/klasifikasi', [KlasifikasiController::class,'index']);

    //data kiteria bobot
    Route::get('/bobot', [BobotController::class,'index']);
    Route::post('/bobot', [BobotController::class,'store']);
    Route::get('/bobot/create', [BobotController::class, 'create']);
    Route::get('/bobot/{id}', [BobotController::class, 'show']);
    Route::get('/bobot/{id}/edit', [BobotController::class,'edit']);
    Route::put('/bobot/{id}', [BobotController::class, 'update']);
    Route::delete('/bobot/{id}', [BobotController::class, 'destroy']);
    Route::get('/exportBobot',[BobotController::class,'bobotExport']);
    Route::post('/importBobot',[BobotController::class,'bobotImport'])->name('bobot.import');
    Route::get('/templateBobot',[BobotController::class,'templateBobot'])->name('bobot.template');
   

    //data nilai
    Route::get('/nilai', [NilaiController::class,'index']);
    Route::post('/nilai', [NilaiController::class,'store']);
    Route::get('/nilai/create', [NilaiController::class, 'create']);
    Route::get('/nilai/{id}', [NilaiController::class, 'show']);
    Route::get('/nilai/{id}/edit', [NilaiController::class,'edit']);
    Route::put('/nilai/{id}', [NilaiController::class, 'update']);
    Route::delete('/nilai/{id}', [NilaiController::class, 'destroy']);
    Route::get('/exportNilai',[NilaiController::class,'bobotExport']);
    Route::post('/importNilai',[NilaiController::class,'bobotImport'])->name('nilai.import');
    Route::get('/templateNilai',[NilaiController::class,'templateBobot'])->name('nilai.template');
   
    });

