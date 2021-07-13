<?php

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

Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('', 'HomeController@index')->name('index');

    Route::group(['prefix' => 'phieumua', 'as' => 'phieumua.'], function () {
        Route::middleware('acl:phieumua-list')->group(function () {
            Route::get('danhsach', 'PhieuMuaController@index')->name('index');
        });
        Route::middleware('acl:phieumua-create')->group(function () {
            Route::get('them', 'PhieuMuaController@showCreate')->name('create');
            Route::post('them', 'PhieuMuaController@create');
        });
        Route::middleware('acl:phieumua-delete')->group(function () {
            Route::delete('xoa/{ID?}', 'PhieuMuaController@delete')->name('delete');
        });
        Route::get('sua/{ID?}', 'PhieuMuaController@showEdit')->name('edit');
        Route::put('sua/{ID?}', 'PhieuMuaController@update');
        Route::get('chitiet/{ID?}', 'PhieuMuaController@detail')->name('detail');
        Route::get('HTPhieuMua/{ID?}', 'PhieuMuaController@confirmHoanThanhPhieuDN')->name('confirm');
    });

    Route::group(['prefix' => 'xetduyet', 'as' => 'xetduyet.'], function () {
        Route::middleware('acl:phieudenghi-xetduyet')->group(function () {
            Route::get('danhsach', 'XetDuyetController@index')->name('index');
            Route::get('chitiet/{ID?}', 'XetDuyetController@detail')->name('detail');
            Route::put('/phieudenghi/{ID?}', 'XetDuyetController@xetDuyet')->name('confirm');
            Route::put('/ghichu/{ID?}', 'XetDuyetController@ghiChu')->name('ghiChu');
        });
    });

    Route::group(['prefix' => 'phieubangiao', 'as' => 'phieubangiao.'], function () {
        Route::middleware('acl:phieubangiao-list')->group(function () {
            Route::get('danhsach', 'PhieuBanGiaoController@index')->name('index');
        });
        Route::middleware('acl:phieubangiao-create')->group(function () {
            Route::get('them', 'PhieuBanGiaoController@showCreateForm')->name('create');
            Route::post('bangiao', 'PhieuBanGiaoController@create');
        });
        Route::get('chitiet/{ID?}', 'PhieuBanGiaoController@detail')->name('detail');
        Route::get('xacnhanBG/{ID?}','PhieuBanGiaoController@confirmPhieuBG')->name('confirm');
    });

    Route::group(['prefix' => 'vattu', 'as' => 'vattu.'], function () {
        Route::middleware('acl:vattu-list')->group(function () {
            Route::get('danhsach', 'VatTuController@index')->name('index');
        });
        Route::middleware('acl:vattu-create')->group(function () {
            Route::get('them', 'VatTuController@showCreateForm')->name('create');
            Route::post('bangiao', 'VatTuController@create');
        });
        Route::get('chitiet/{ID?}', 'VatTuController@detail')->name('detail');
    });

    Route::group(['prefix' => 'nguoidung', 'as' => 'nguoidung.'], function () {
        Route::middleware('acl:nguoidung-list')->group(function () {
            Route::get('danhsach', 'NguoiDungController@index')->name('index');
        });
    });

    Route::get('thongke', 'ThongKeController@index')->name('thongke');

    Route::get('trangcanhan', 'NguoiDungController@profile')->name('profile');
});
