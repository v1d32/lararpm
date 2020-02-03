<?php
Route::redirect('/', '/admin/home');

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'cashier', 'as' => 'cashier.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('income','Cashier\IncomeController');
    Route::delete('income_mass_destroy', 'Cashier\IncomeController@massDestroy')->name('income.mass_destroy');
    Route::resource('expenditure','Cashier\ExpenditureController');
    Route::delete('expenditure_mass_destroy', 'Cashier\ExpenditureController@massDestroy')->name('expenditure.mass_destroy');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'teller', 'as' => 'teller.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('membership','Teller\MembershipController');
    Route::delete('membership_mass_destroy', 'Teller\MembershipController@massDestroy')->name('membership.mass_destroy');
    Route::resource('loan','Teller\LoanController');
    Route::delete('loan_mass_destroy', 'Teller\LoanController@massDestroy')->name('loan.mass_destroy');
});

