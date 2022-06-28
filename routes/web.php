<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }
    return view('home');
    
})->name('home');

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Transaksis
    Route::delete('transaksis/destroy', 'TransaksisController@massDestroy')->name('transaksis.massDestroy');
    Route::resource('transaksis', 'TransaksisController');

    // penyetors
    Route::delete('penyetors/destroy', 'PenyetorController@massDestroy')->name('penyetors.massDestroy');
    Route::resource('penyetors', 'PenyetorController');

    // pengepuls
    Route::delete('pengepuls/destroy', 'PengepulController@massDestroy')->name('pengepuls.massDestroy');
    Route::resource('pengepuls', 'PengepulController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
});

Route::group(['prefix' => 'penyetor', 'as' => 'penyetor.', 'namespace' => 'Penyetor', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Transaksis
    Route::resource('transaksis', 'TransaksiController');

    // Progress
    Route::resource('progress', 'ProgresController');

});

Route::group(['prefix' => 'pengepul', 'as' => 'pengepul.', 'namespace' => 'Pengepul', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Transaksis
    Route::resource('transaksis', 'TransaksiController');

    

    Route::put('updatestatus', 'status@update')->name('updatestatus');
    Route::get('updates', 'status@update')->name('updates');

});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
