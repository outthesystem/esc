<?php
/*
|--------------------------------------------------------------------------
| Install Routes
|--------------------------------------------------------------------------
|
| This route is responsible for handling the intallation process
|
|
|
*/
Route::get('/', 'Installation@step0');
Route::get('/step1', 'Installation@step1')->name('step1');
Route::get('/step2', 'Installation@step2')->name('step2');
Route::get('/step3/{error?}', 'Installation@step3')->name('step3');
Route::get('/step4', 'Installation@step4')->name('step4');
Route::get('/step5', 'Installation@step5')->name('step5');
Route::get('/step6', 'Installation@step6')->name('step6');
Route::get('/proceed_login', 'Installation@login')->name('proceed.to.login');

Route::post('/database_installation', 'Installation@database_installation')->name('install.db');
Route::get('import_sql', 'Installation@import_sql')->name('import_sql');
Route::post('system_settings', 'Installation@system_settings')->name('system_settings');
Route::post('purchase_code', 'Installation@purchase_code')->name('purchase.code');
Route::get('/login', 'LoginController@login');
