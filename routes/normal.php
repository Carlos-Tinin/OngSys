<?php

/*
|--------------------------------------------------------------------------
| Normal Routes
|--------------------------------------------------------------------------
|
 */

Route::get('/servicos', 'HomeController@servicos')->name('servicos');

Route::get('/register', 'HomeController@register')->name('register');
