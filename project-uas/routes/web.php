<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RolesController;
use App\Http\Middleware\CheckRole;
use App\Htpp\Livewire\RoleTable;

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

Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->middleware('guest')->name('login');
    Route::post('/login', 'LoginController@login')->middleware('guest');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

    //User
    Route::get('/user', 'UserController@index')->name('user.index');


    //Role
    Route::middleware(['checkrole:admin|hrd|direktur'])->group(function () {
        Route::get('/roles', 'RolesController@index')->name('roles.index');
        Route::get('/roles/tambah', 'RolesController@tambah')->name('roles.tambah');
        Route::post('/roles', 'RolesController@store')->name('roles.store');
        Route::get('/roles/{id}', 'RolesController@hapus')->name('roles.hapus');
        Route::get('/roles/edit/{id}', 'RolesController@edit')->name('roles.edit');
        Route::patch('/roles/update/{id}', 'RolesController@update')->name('roles.update');
    });

    //karyawan
    Route::middleware(['checkrole:admin|hrd|direktur'])->group(function () {
        Route::get('/karyawan', 'KaryawanController@index')->name('karyawan.index');
        Route::get('/karyawan/getStatusInfo', 'KaryawanController@getStatusInfo');
        Route::get('/karyawan/getAgamaInfo', 'KaryawanController@getAgamaInfo');
        Route::get('/karyawan/tambah', 'KaryawanController@tambah')->name('karyawan.tambah');
    });
    Route::post('/karyawan', 'KaryawanController@store')->name('karyawan.store');
    Route::get('/karyawan/{id}', 'KaryawanController@hapus')->name('karyawan.hapus');
    Route::get('/karyawan/edit/{id}', 'KaryawanController@edit')->name('karyawan.edit');
    Route::patch('/karyawan/update/{id}', 'KaryawanController@update')->name('karyawan.update');
    Route::get('/karyawan/profile/{id}', 'KaryawanController@profile')->name('karyawan.profile');
    Route::get('/karyawan/profile/{id}/export-pdf', 'KaryawanController@profile_export_pdf')->name('karyawan.profile.export-pdf');


    //departement
    Route::middleware(['checkrole:admin|hrd|direktur'])->group(function () {
        Route::get('/departement', 'DepartementController@index')->name('departement.index');
        Route::get('/departement/getDepartementInfo', 'DepartementController@getDepartementInfo');
        Route::get('/departement/tambah', 'DepartementController@tambah')->name('departement.tambah');
        Route::post('/departement', 'DepartementController@store')->name('departement.store');
        Route::get('/departement/{id}', 'DepartementController@hapus')->name('departement.hapus');
        Route::get('/departement/edit/{id}', 'DepartementController@edit')->name('departement.edit');
        Route::patch('/departement/update/{id}', 'DepartementController@update')->name('departement.update');
    });

    //jabatan
    Route::middleware(['checkrole:admin|hrd|direktur'])->group(function () {
        Route::get('/jabatan', 'JabatanController@index')->name('jabatan.index');
        Route::get('/jabatan/getJabatanInfo', 'JabatanController@getJabatanInfo');
        Route::get('/jabatan/tambah', 'JabatanController@tambah')->name('jabatan.tambah');
        Route::post('/jabatan', 'JabatanController@store')->name('jabatan.store');
        Route::get('/jabatan/{id}', 'JabatanController@hapus')->name('jabatan.hapus');
        Route::get('/jabatan/edit/{id}', 'JabatanController@edit')->name('jabatan.edit');
        Route::patch('/jabatan/update/{id}', 'JabatanController@update')->name('jabatan.update');
    });


    //cuti
    Route::get('/cuti', 'CutiController@index')->name('cuti.index');
    Route::get('/cuti/tambah', 'CutiController@tambah')->name('cuti.tambah');
    Route::post('/cuti', 'CutiController@store')->name('cuti.store');
    Route::get('/cuti/edit/{id}', 'CutiController@edit')->name('cuti.edit');
    Route::patch('/cuti/update/{id}', 'CutiController@update')->name('cuti.update');

    //teguran
    Route::get('/teguran', 'TeguranController@index')->name('teguran.index');
    Route::get('/teguran/tambah', 'TeguranController@tambah')->name('teguran.tambah');
    Route::post('/teguran', 'TeguranController@store')->name('teguran.store');
    Route::get('/teguran/edit/{id}', 'TeguranController@edit')->name('teguran.edit');
    Route::patch('/teguran/update/{id}', 'TeguranController@update')->name('teguran.update');

    //Websettings
    Route::middleware(['checkrole:admin'])->group(function () {
        Route::get('/websettings', 'WebSettingsController@index')->name('websettings.index');
        Route::get('/websettings/setup', 'WebSettingsController@setup')->name('websettings.setup');
        Route::patch('/websettings/update', 'WebSettingsController@update')->name('websettings.update');
    });
});
