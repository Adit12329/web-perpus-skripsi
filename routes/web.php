<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BukuIndukController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\TambahDataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeknisController;
use App\Http\Controllers\TeknisDuaController;
use App\Http\Controllers\TeknisSatuController;
use App\Http\Controllers\UploadgambarController;
use App\Http\Controllers\UploadGambarController as ControllersUploadGambarController;
use App\Http\Controllers\WorkshopController;
use App\Models\BukuInduk;
use App\Models\Uploadgambar;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/beranda', function () {
//     return view('beranda');
// });
Route::get('/', function () {
    return view('Pengguna.login');
})->name('login');
// Route::get('/login', function () {
//     return view('Pengguna.login');
// })->name('login');

// Route::get('/tambahdata', [BerandaController::class, 'create'])->name('create');

// Route::get('/datadiklat', [DataDiklatController::class, 'index']);

// Route::get('/beranda', 'BerandaController@index');
// Route::get('/beranda', [BerandaController::class, 'index'])->name('index');
// Route::get('/createdata', [TambahDataController::class, 'create'])->name('createdata');
// Route::get('/tambahdata', [TambahDataController::class, 'index'])->name('index');
// Route::post('/tambahdata', [TambahDataController::class, 'store'])->name('store');
// Route::get('/editdata/{id}', [TambahDataController::class, 'edit'])->name('editdata');
// Route::post('/updatedata/{id}', [TambahDataController::class, 'update'])->name('updatedata');
// Route::get('/deletedata/{id}', [TambahDataController::class, 'destroy'])->name('deletedata');
// Route::get('/cetakdata', [TambahDataController::class, 'cetakData'])->name('cetakdata');
// Route::get('/cetaktanggal', [TambahDataController::class, 'cetakForm'])->name('cetaktanggal');
// Route::get('/cetakdatapertanggal/{tanggalawal}/{tanggalakhir}', [TambahDataController::class, 'cetakdataPertanggal'])->name('cetakdatapertanggal');
// Route::get('/profile/{id}', [ProfileController::class, 'profile'])->name('profile');
// Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
// Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::post('/simpanregister', [LoginController::class, 'simpanregister'])->name('simpanregister');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/send/{id}', [EmailController::class, 'index']);

Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    // route::get('/createdata', [TambahDataController::class, 'create'])->name('createdata');
    // Route::get('/tambahdata', [TambahDataController::class, 'index'])->name('index');
    // Route::post('/tambahdata', [TambahDataController::class, 'store'])->name('store');
    // Route::get('/editdata/{id}', [TambahDataController::class, 'edit'])->name('editdata');
    Route::get('/show', [TambahDataController::class, 'show'])->name('show');
    // Route::post('/updatedata/{id}', [TambahDataController::class, 'update'])->name('updatedata');
    Route::get('/cetakdata', [TambahDataController::class, 'cetakData'])->name('cetakdata');
    Route::get('/detail/{id}', [ProfileController::class, 'detail'])->name('detail');
    Route::get('/deletedata/{id}', [TambahDataController::class, 'destroy'])->name('deletedata');
    Route::get('/cetakdata', [PeminjamanController::class, 'cetakData'])->name('cetakdata');
    Route::get('/cetakdatabukuinduk', [BukuIndukController::class, 'cetakbukuinduk'])->name('cetakdatabukuinduk');
    Route::get('/cetaktanggal', [TambahDataController::class, 'cetakForm'])->name('cetaktanggal');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('/pengguna/{pengguna}', [PenggunaController::class, 'edit'])->name('edit_pengguna');
    Route::get('/tambah_pengguna', [PenggunaController::class, 'tambah_pengguna'])->name('tambah_pengguna');
    Route::post('/create', [PenggunaController::class, 'create'])->name('create');
    Route::put('/update/{pengguna}', [PenggunaController::class, 'update'])->name('update_pengguna');
    Route::get('/destroy/{pengguna}', [PenggunaController::class, 'destroy'])->name('deletedata');
    Route::get('/upload}', [UploadgambarController::class, 'upload'])->name('upload');
    Route::post('/upload/{proses}', [UploadgambarController::class, 'upload'])->name('upload');
    Route::post('/proses_upload', [BukuIndukController::class, 'proses_upload'])->name('proses_upload');
    // Route::get('/edit/{bukuinduk}', [BukuIndukController::class, 'edit'])->name('edit');
    


    // Buku Induk
    Route::get('/accept/bukuinduk/{id}', [BukuIndukController::class, 'accept_bukuinduk'])->name('accept_bukuinduk');
    Route::get('/reject/bukuinduk/{id}', [BukuIndukController::class, 'reject_bukuinduk'])->name('reject_bukuinduk');
    // Kepemimpinan
    Route::get('/accept/pengembalian/{id}', [PengembalianController::class, 'accept_pengembalian'])->name('accept_pengembalian');
    Route::get('/reject/pengembalian/{id}', [PengembalianController::class, 'reject_pengembalian'])->name('reject_pengembalian');
    //Fungsional
    Route::get('/accept/peminjaman/{id}', [PeminjamanController::class, 'accept_peminjaman'])->name('accept_peminjaman');
    Route::get('/reject/peminjaman/{id}', [PeminjamanController::class, 'reject_peminjaman'])->name('reject_peminjaman');
    // Magang
    Route::get('/accept/magang/{id}', [MagangController::class, 'accept_magang'])->name('accept_magang');
    Route::get('/reject/magang/{id}', [MagangController::class, 'reject_magang'])->name('reject_magang');
    // Teknis
    Route::get('/accept/teknis/{id}', [TeknisController::class, 'accept_teknis'])->name('accept_teknis');
    Route::get('/reject/teknis/{id}', [TeknisController::class, 'reject_teknis'])->name('reject_teknis');
    // Teknis Satu
    Route::get('/accept/satu/{id}', [TeknisSatuController::class, 'accept_satu'])->name('accept_satu');
    Route::get('/reject/satu/{id}', [TeknisSatuController::class, 'reject_satu'])->name('reject_satu');
    // Teknis Dua
    Route::get('/accept/dua/{id}', [TeknisDuaController::class, 'accept_dua'])->name('accept_dua');
    Route::get('/reject/dua/{id}', [TeknisDuaController::class, 'reject_dua'])->name('reject_dua');
    // Workshop
    Route::get('/accept/workshop/{id}', [WorkshopController::class, 'accept_workshop'])->name('accept_workshop');
    Route::get('/reject/workshop/{id}', [WorkshopController::class, 'reject_workshop'])->name('reject_workshop');
    // SendEmail
    // Route::get('kirimemail', function(){
    //     Mail::raw('halo siswa baru', function ($message){
    //         $message->to('madityamartono@gmail.com', 'Aditya');
    //         $message->subject('Mohon Jangan Terlambat Mengembalikan Buku Perpustakaan');
    //     });
    // });
    
    




    // Route::get('/datagambar',[UploadgambarController::class,'index'])->name('datagambar');
    // Route::get('/creategambar', [UploadgambarController::class, 'create'])->name('creategambar');
    // Route::post('/simpangambar', [UploadgambarController::class, 'store'])->name('simpangambar');


});

Route::group(['middleware' => ['auth', 'ceklevel:admin,user']], function () {
    route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    route::get('/createdata', [TambahDataController::class, 'create'])->name('createdata');
    Route::get('/tambahdata', [TambahDataController::class, 'index'])->name('index');
    Route::post('/tambahdata', [TambahDataController::class, 'store'])->name('store');
    Route::get('/editdata/{id}', [TambahDataController::class, 'edit'])->name('editdata');
    Route::post('/updatedata/{id}', [TambahDataController::class, 'update'])->name('updatedata');
    // Route::get('/cetakdata', [TambahDataController::class, 'cetakData'])->name('cetakdata');
    Route::get('/detail/{id}', [ProfileController::class, 'detail'])->name('detail');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    // Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    // Route::get('/pengguna/{pengguna}', [PenggunaController::class, 'edit'])->name('edit_pengguna');
    // Route::put('/update/{pengguna}', [PenggunaController::class, 'update'])->name('update_pengguna');
    // Route::get('/tambah_pengguna', [PenggunaController::class, 'tambah_pengguna'])->name('tambah_pengguna');
    Route::resource('/peminjaman', PeminjamanController::class);
    Route::post('/caribuku', [PeminjamanController::class, 'caribuku'])->name('caribuku');
    Route::resource('/teknis', TeknisController::class);
    Route::resource('/pengembalian', PengembalianController::class);
    Route::resource('/magang', MagangController::class);
    Route::resource('/workshop', WorkshopController::class);
    Route::resource('/teknissatu', TeknisSatuController::class);
    Route::resource('/teknisdua', TeknisDuaController::class);
    Route::resource('/bukuinduk', BukuIndukController::class);
});
// Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
//     Route::get('/beranda', [BerandaController::class, 'index']);
//     Route::get('/halaman-satu', [BerandaController::class, 'halamansatu'])->name('halaman-satu');
//     // Route::get('/halaman-dua', [BerandaController::class, 'halamandua'])->name('halaman-dua');
// });

// Route::group(['middleware' => ['auth', 'ceklevel:admin,user']], function () {
//     Route::get('/beranda', [BerandaController::class, 'index']);
//     Route::get('/halaman-dua', [BerandaController::class, 'halamandua'])->name('halaman-dua');
// });
