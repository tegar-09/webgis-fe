<?php

use Illuminate\Support\Facades\Route;

// RUTE LOGIN
Route::get('/login', function () {
    return view('login/index');
});

// RUTE PUBLIK
Route::get('/', function () {
    return view('user/beranda/index');
});

// RUTE ADMIN
// Kelola Maps di Admin
Route::get('/preview', function () {
    return view('admin/maps-admin/preview');
});

// Kelola Kejadian
Route::get('/kejadian', function () {
    return view('admin/kelola-kejadian/index');
});
Route::post('/tambah_kejadian', function () {
    return view('admin/kelola-kejadian/insert');
});
Route::get('/update_kejadian', function () {
    return view('admin/kelola-kejadian/update');
});
Route::get('/detail_kejadian', function () {
    return view('admin/kelola-kejadian/detail');
});

// Kelola Tanggap Bencana
Route::get('/tanggap', function () {
    return view('admin/kelola-tanggap/index');
});
Route::get('/insert_tanggap', function () {
    return view('admin/kelola-tanggap/insert');
});
Route::get('/update_tanggap', function () {
    return view('admin/kelola-tanggap/update');
});

// Kelola User
Route::get('/user', function () {
    return view('admin/kelola-user/index');
});
Route::get('/insert_user', function () {
    return view('admin/kelola-user/insert');
});
Route::get('/update_user', function () {
    return view('admin/kelola-user/update');
});

// Laporan Banjir
Route::get('/laporan', function () {
    return view('admin/laporan-bencana/index');
});


