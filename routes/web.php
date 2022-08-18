<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\AturanController;
use App\Http\Controllers\BobotAturanController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HasilahpController;
use App\Http\Controllers\HasilAkhirController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\NilaiahpController;
use Illuminate\Support\Facades\Artisan;

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

// Create Storage Link For CPanel
// after upload to Cpanel Remember to RUN This route before you launch the web
Route::get('/foo', function () {
    Artisan::call('storage:link');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    // Artisan::call('migrate:fresh --seed');
    return redirect()->route('dashboard_index');
});



// route login
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('layout.dashboard');
    // });

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // route kriteria
    Route::get('/kriteria',[KriteriaController::class, 'index'])->name('kriteria-index');
    Route::get('/kriteria/tambah',[KriteriaController::class, 'create'])->name('kriteria-create'); 
    Route::post('/kriteria/simpan',[KriteriaController::class, 'store'])->name('kriteria-simpan');
    Route::get('/kriteria/edit/{id}',[KriteriaController::class, 'edit'])->name('kriteria-edit');
    Route::post('/kriteria/update',[KriteriaController::class, 'update'])->name('kriteria-update');
    Route::delete('/kriteria/delete',[KriteriaController::class, 'destroy'])->name('kriteria-delete');
    Route::get('/kriteria/data-table', [KriteriaController::class, 'DataTable'])->name('kriteria_dataTable');
    
    // route nilai ahp
    Route::get('/nilaiahp',[NilaiahpController::class, 'index'])->name('nilaiahp-index');
    Route::get('/nilaiahp/tambah',[NilaiahpController::class, 'create'])->name('nilaiahp-create'); 
    Route::post('/nilaiahp/simpan',[NilaiahpController::class, 'store'])->name('nilaiahp-simpan');
    Route::get('/nilaiahp/edit/{id}',[NilaiahpController::class, 'edit'])->name('nilaiahp-edit');
    Route::post('/nilaiahp/update',[NilaiahpController::class, 'update'])->name('nilaiahp-update');
    Route::delete('/nilaiahp/delete',[NilaiahpController::class, 'destroy'])->name('nilaiahp-delete');
    Route::get('/nilaiahp/data-table', [NilaiahpController::class, 'DataTable'])->name('nilaiahp_dataTable');
    
    // route hasil ahp
    Route::get('/Hasilahp',[HasilahpController::class, 'index'])->name('hasilahp-index');

    // route sub kriteria
    Route::get('/subkriteria',[SubkriteriaController::class, 'index'])->name('subkriteria-index');
    Route::get('/subkriteria/tambah',[SubkriteriaController::class, 'create'])->name('subkriteria-create'); 
    Route::post('/subkriteria/simpan',[SubkriteriaController::class, 'store'])->name('subkriteria-simpan');
    Route::get('/subkriteria/edit/{id}',[SubkriteriaController::class, 'edit'])->name('subkriteria-edit');
    Route::post('/subkriteria/update',[SubkriteriaController::class, 'update'])->name('subkriteria-update');
    Route::delete('/subkriteria/delete',[SubkriteriaController::class, 'destroy'])->name('subkriteria-delete');
    Route::get('/subkriteria/data-table', [SubkriteriaController::class, 'DataTable'])->name('subkriteria_dataTable');

     // route alternatif
     Route::get('/alternatif',[AlternatifController::class, 'index'])->name('alternatif-index');
     Route::get('/alternatif/tambah',[AlternatifController::class, 'create'])->name('alternatif-create'); 
     Route::post('/alternatif/simpan',[AlternatifController::class, 'store'])->name('alternatif-simpan');
     Route::get('/alternatif/edit/{id}',[AlternatifController::class, 'edit'])->name('alternatif-edit');
     Route::post('/alternatif/update',[AlternatifController::class, 'update'])->name('alternatif-update');
     Route::delete('/alternatif/delete',[AlternatifController::class, 'destroy'])->name('alternatif-delete');
     Route::get('/alternatif/data-table', [AlternatifController::class, 'DataTable'])->name('alternatif_dataTable');
    
     // route penilaian
     Route::get('/penilaian',[PenilaianController::class, 'index'])->name('penilaian-index');
     Route::get('/penilaian/tambah',[PenilaianController::class, 'create'])->name('penilaian-create'); 
     Route::post('/penilaian/simpan',[PenilaianController::class, 'store'])->name('penilaian-simpan');
     Route::get('/penilaian/show/{id}',[PenilaianController::class, 'show'])->name('penilaian-edit');
     Route::post('/penilaian/update',[PenilaianController::class, 'update'])->name('penilaian-update');
     Route::delete('/penilaian/delete',[PenilaianController::class, 'destroy'])->name('penilaian-delete');
     Route::get('/penilaian/data-table', [PenilaianController::class, 'DataTable'])->name('penilaian_dataTable');
     
    //  hasil akhir
     Route::get('/hasilAkhir',[HasilAkhirController::class, 'index'])->name('hasilAkhir-index');
});
