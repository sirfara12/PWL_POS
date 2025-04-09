<?php
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Routing\Controllers\Middleware;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

//Jobsheet 5
//auth
Route::pattern('id', '[0+9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postregister']);

Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function(){
    Route::get('/', [WelcomeController::class, 'index']);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);
    Route::post('/ajax', [UserController::class, 'store_ajax']);
    Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update']);
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
    Route::get('/import', [UserController::class, 'import']);
    Route::post('/import_ajax', [UserController::class, 'import_ajax']);
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});
    //Tugas Jobsheet 5
// m_level
// Route::middleware(['authorize:ADM2,STF'])->group(function(){
Route::group(['prefix' => 'level'], function () {
Route::get('/', [LevelController::class, 'index']);
Route::post('/list', [LevelController::class, 'list']);
Route::get('/create', [LevelController::class, 'create']);
Route::post('/', [LevelController::class, 'store']);
Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
Route::post('/ajax', [LevelController::class, 'store_ajax']);
Route::get('/{id}', [LevelController::class, 'show']);
Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
Route::get('/{id}/edit', [LevelController::class, 'edit']);
Route::put('/{id}', [LevelController::class, 'update']);
Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
Route::get('/import', [LevelController::class, 'import']);
Route::post('/import_ajax', [LevelController::class, 'import_ajax']);
Route::delete('/{id}', [LevelController::class, 'destroy']);
});
// });
//m_kategori
Route::group(['prefix' => 'kategori'], function () {
Route::get('/', [KategoriController::class, 'index']);
Route::post('/list', [KategoriController::class, 'list']);
Route::get('/create', [KategoriController::class, 'create']);
Route::post('/', [KategoriController::class, 'store']);
Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
Route::post('/ajax', [KategoriController::class, 'store_ajax']);
Route::get('/{id}', [KategoriController::class, 'show']);
Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
Route::get('/{id}/edit', [KategoriController::class, 'edit']);
Route::put('/{id}', [KategoriController::class, 'update']);
Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
Route::get('/import', [KategoriController::class, 'import']);
Route::post('/import_ajax', [KategoriController::class, 'import_ajax']);
Route::delete('/{id}', [KategoriController::class, 'destroy']);
});
//m_barang
Route::group(['prefix' => 'barang'], function () {
Route::get('/', [BarangController::class, 'index']);
Route::post('/list', [BarangController::class, 'list'])->name('barang.list');
Route::get('/create', [BarangController::class, 'create']);
Route::post('/', [BarangController::class, 'store']);
Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
Route::post('/ajax', [BarangController::class, 'store_ajax']);
Route::get('/{id}', [BarangController::class, 'show']);
Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
Route::get('/{id}/edit', [BarangController::class, 'edit']);
Route::put('/{id}', [BarangController::class, 'update']);
Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
Route::get('/import', [BarangController::class, 'import']);
Route::post('/import_ajax', [BarangController::class, 'import_ajax']);
Route::get('/export_excel', [BarangController::class, 'export_excel']);
Route::delete('/{id}', [BarangController::class, 'destroy']);
});
//m_supplier
Route::group(['prefix' => 'supplier'], function () {
Route::get('/', [SupplierController::class, 'index']);
Route::post('/list', [SupplierController::class, 'list']);
Route::get('/create', [SupplierController::class, 'create']);
Route::post('/', [SupplierController::class, 'store']);
Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
Route::post('/ajax', [SupplierController::class, 'store_ajax']);
Route::get('/{id}', [SupplierController::class, 'show']);
Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
Route::get('/{id}/edit', [SupplierController::class, 'edit']);
Route::put('/{id}', [SupplierController::class, 'update']);
Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
Route::get('/supplier/import', [SupplierController::class, 'import']);
Route::post('/import_ajax', [SupplierController::class, 'import_ajax']);
Route::delete('/{id}', [SupplierController::class, 'destroy']);
});

// Route::get('/', function() {
//     return view('welcome');
// });

// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
// Route::get('/', [WelcomeController::class, 'index']); -->