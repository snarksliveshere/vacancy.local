<?php

Route::group(['as' => 'frontend.'], function (){
    Route::get('/', 'PageController@vacancies')->name('vacancies');
    Route::get('/vacancies/{id}', 'PageController@vacanciesShow')->name('vacancies.show');


});
Auth::routes();
//Route::post('register', 'Auth\RegisterController@testRegister');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::resource('/vacancy', 'VacancyController')->middleware('auth');
