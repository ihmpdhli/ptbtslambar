<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\TowerbtsController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\JaringanController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\RetribusiController;
use App\Http\Controllers\RekombtsController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TahunController;
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

//frontend
Route::get('/', [WebController::class, 'index']);

Route::get('/kecamatanpeta/{id}', [WebController::class, 'kecamatan']);
Route::get('/providerpeta/{id}', [WebController::class, 'provider']);
Route::get('/tentang', [WebController::class, 'tentang']);

Route::get('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'register']);

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Towerbts
    Route::get('/towerbts', [TowerbtsController::class, 'index'])->name('towerbts');
    Route::get('/towerbts/towerbtsexport', [TowerbtsController::class, 'towerbtsexport']);
    Route::get('/towerbts/add', [TowerbtsController::class, 'add']);
    Route::post('/towerbts/insert', [TowerbtsController::class, 'insert']);
    Route::get('/towerbts/detail/{id}', [TowerbtsController::class, 'detail']);
    Route::get('/towerbts/edit/{id}', [TowerbtsController::class, 'edit']);
    Route::post('/towerbts/update/{id}', [TowerbtsController::class, 'update']);
    Route::get('/towerbts/delete/{id}', [TowerbtsController::class, 'delete']);

    //Provider
    Route::get('/provider', [ProviderController::class, 'index'])->name('provider');

    //kecamatan
    Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan');

    //Rekombts
    Route::get('/rekombts', [RekombtsController::class, 'index'])->name('rekombts');
    Route::get('/rekombts/detail/{id}', [RekombtsController::class, 'detail']);
    Route::get('/rekombts/edit/{id}', [RekombtsController::class, 'edit']);
    Route::post('/rekombts/update/{id}', [RekombtsController::class, 'update']);
    Route::get('/rekombts/delete/{id}', [RekombtsController::class, 'delete']);
    //Rekombts izin / tolak / terdapat kesalahan data / sudah diperbaiki
    Route::get('/rekombts/accept/{id}', [RekombtsController::class, 'accept']);
    Route::get('/rekombts/reject/{id}', [RekombtsController::class, 'reject']);
    Route::get('/rekombts/wrong/{id}', [RekombtsController::class, 'wrong']);
    Route::get('/rekombts/done/{id}', [RekombtsController::class, 'done']);
    //download
    Route::get('/rekombts/detail/download/{surat_permohonan}', [RekombtsController::class, 'downloadpermohonan']);
    Route::get('/rekombts/download/{fotocopy_ktp}', [RekombtsController::class, 'downloadktp']);
    Route::get('/rekombts/download/{surat_izinlokasi}', [RekombtsController::class, 'downloadizinlokasi']);
    Route::get('/rekombts/download/{fotocopy_akta}', [RekombtsController::class, 'downloadakta']);
    Route::get('/rekombts/download/{gambar_menara}', [RekombtsController::class, 'downloadgambar']);
    Route::get('/rekombts/download/{rencana_anggaran}', [RekombtsController::class, 'downloadanggaran']);
    Route::get('/rekombts/download/{jaminan_asuransi}', [RekombtsController::class, 'downloadasuransi']);
    Route::get('/rekombts/download/{izin_lingkungan}', [RekombtsController::class, 'downloadizinlingkungan']);

    //Rotribusi BTS
    Route::get('/retribusi', [RetribusiController::class, 'index'])->name('retribusi');
    Route::get('/retribusi/add', [RetribusiController::class, 'add']);
    Route::post('/retribusi/insert', [RetribusiController::class, 'insert']);
    Route::get('/retribusi/edit/{id}', [RetribusiController::class, 'edit']);
    Route::post('/retribusi/update/{id}', [RetribusiController::class, 'update']);
    Route::get('/retribusi/detail/{id}', [RetribusiController::class, 'detail']);
    //done
    Route::get('/retribusi/done/{id}', [RetribusiController::class, 'done']);
    Route::get('/retribusi/bayar/{id}', [RetribusiController::class, 'bayar']);

    //Peta
    Route::get('/peta', [PetaController::class, 'index'])->name('peta');

    //Edit Profil

    Route::get('/profil/{id}', [ProfilController::class, 'edit']);
    Route::post('/profil/update', [ProfilController::class, 'update']);


    //hak akses Admin
    Route::group(['middleware' => 'admin'], function () {

        //Operator
        Route::get('/operator', [OperatorController::class, 'index'])->name('operator');
        Route::get('/operator/add', [OperatorController::class, 'add']);
        Route::post('/operator/insert', [OperatorController::class, 'insert']);
        Route::get('/operator/edit/{id}', [OperatorController::class, 'edit']);
        Route::post('/operator/update/{id}', [OperatorController::class, 'update']);
        Route::get('/operator/delete/{id}', [OperatorController::class, 'delete']);

        //Jaringan
        Route::get('/jaringan', [JaringanController::class, 'index'])->name('jaringan');
        Route::get('/jaringan/add', [JaringanController::class, 'add']);
        Route::get('/jaringan/kategori', [JaringanController::class, 'kategori']);
        Route::post('/jaringan/insert', [JaringanController::class, 'insert']);
        Route::get('/jaringan/edit/{id}', [JaringanController::class, 'edit']);
        Route::post('/jaringan/update/{id}', [JaringanController::class, 'update']);
        Route::get('/jaringan/delete/{id}', [JaringanController::class, 'delete']);

        //Users
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        Route::get('/users/add', [UsersController::class, 'add']);
        Route::post('/users/insert', [UsersController::class, 'insert']);
        Route::get('/users/edit/{id}', [UsersController::class, 'edit']);
        Route::post('/users/update/{id}', [UsersController::class, 'update']);
        Route::get('/users/delete/{id}', [UsersController::class, 'delete']);

        //Provider
        Route::get('/provider/add', [ProviderController::class, 'add']);
        Route::get('/provider/towerbts', [ProviderController::class, 'towerbts']);
        Route::get('/provider/towerbts/dataprovider/{id}', [ProviderController::class, 'dataprovider']);
        Route::post('/provider/insert', [ProviderController::class, 'insert']);
        Route::get('/provider/edit/{id}', [ProviderController::class, 'edit']);
        Route::post('/provider/update/{id}', [ProviderController::class, 'update']);
        Route::get('/provider/delete/{id}', [ProviderController::class, 'delete']);

        //Kecamatan
        Route::get('/kecamatan/add', [KecamatanController::class, 'add']);
        Route::get('/kecamatan/towerbts', [KecamatanController::class, 'towerbts']);
        Route::get('/kecamatan/towerbts/datakecamatan/{id}', [KecamatanController::class, 'datakecamatan']);
        Route::post('/kecamatan/insert', [KecamatanController::class, 'insert']);
        Route::get('/kecamatan/edit/{id}', [KecamatanController::class, 'edit']);
        Route::post('/kecamatan/update/{id}', [KecamatanController::class, 'update']);
        Route::get('/kecamatan/delete/{id}', [KecamatanController::class, 'delete']);

        //Rotribusi BTS
        Route::get('/retribusi/delete/{id}', [RetribusiController::class, 'delete']);
        //Rotribusi silahkan bayar, izin, tolak, terdapat kesalah data
        Route::get('/retribusi/slkbayar/{id}', [RetribusiController::class, 'slkbayar']);
        Route::get('/retribusi/accept/{id}', [RetribusiController::class, 'accept']);
        Route::get('/retribusi/reject/{id}', [RetribusiController::class, 'reject']);
        Route::get('/retribusi/wrong/{id}', [RetribusiController::class, 'wrong']);

        //Tahun
        Route::get('/tahun', [TahunController::class, 'index'])->name('tahun');
        Route::get('/tahun/add', [TahunController::class, 'add']);
        Route::get('/tahun/retribusi', [TahunController::class, 'retribusi']);
        Route::get('/tahun/retribusi/datatahun/{id}', [TahunController::class, 'datatahun']);
        Route::post('/tahun/insert', [TahunController::class, 'insert']);
        Route::get('/tahun/edit/{id}', [TahunController::class, 'edit']);
        Route::post('/tahun/update/{id}', [TahunController::class, 'update']);
        Route::get('/tahun/delete/{id}', [TahunController::class, 'delete']);
    });
    Route::group(['middleware' => 'user'], function () {

        //Rekombts
        Route::get('/rekombts/add', [RekombtsController::class, 'add']);
        Route::post('/rekombts/insert', [RekombtsController::class, 'insert']);
    });
});
