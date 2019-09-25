<?php

Route::get('/', function() {
	return redirect()->route('pages.all-tasks');
});

Route::get('/tasks','PagesController@allTasks')->name('pages.all-tasks');
Route::get('/directory','PagesController@directory')->name('pages.directory');
Route::get('/signatures','PagesController@signatures')->name('pages.signatures');
Route::get('/seeders','PagesController@seeders')->name('pages.seeders');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('dashboard')->group(function(){
	Route::get('/', 'DashboardController@index')->name('dashboard');
	Route::resource('companies','CompanyController');
	Route::resource('departments','DepartmentController');
	Route::resource('employees','EmployeeController');
	Route::resource('tasks','TaskController');
});
