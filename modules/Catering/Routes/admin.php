<?php
use \Illuminate\Support\Facades\Route;
Route::get('/','CateringController@index')->name('catering.admin.index');
Route::get('/create','CateringController@create')->name('catering.admin.create');
Route::get('/edit/{id}','CateringController@edit')->name('catering.admin.edit');
Route::post('/store/{id}','CateringController@store')->name('catering.admin.store');
Route::post('/bulkEdit','CateringController@bulkEdit')->name('catering.admin.bulkEdit');
Route::get('/recovery','CateringController@recovery')->name('catering.admin.recovery');
Route::get('/getForSelect2','CateringController@getForSelect2')->name('catering.admin.getForSelect2');

Route::group(['prefix'=>'attribute'],function (){
    Route::get('/','AttributeController@index')->name('catering.admin.attribute.index');
    Route::get('/edit/{id}','AttributeController@edit')->name('catering.admin.attribute.edit');
    Route::post('/store/{id}','AttributeController@store')->name('catering.admin.attribute.store');
    Route::post('/editAttrBulk','AttributeController@editAttrBulk')->name('catering.admin.attribute.editAttrBulk');

    Route::get('/terms/{id}','AttributeController@terms')->name('catering.admin.attribute.term.index');
    Route::get('/term_edit/{id}','AttributeController@term_edit')->name('catering.admin.attribute.term.edit');
    Route::post('/term_store','AttributeController@term_store')->name('catering.admin.attribute.term.store');
    Route::post('/editTermBulk','AttributeController@editTermBulk')->name('catering.admin.attribute.term.editTermBulk');

    Route::get('/getForSelect2','AttributeController@getForSelect2')->name('catering.admin.attribute.term.getForSelect2');
});

Route::group(['prefix'=>'availability'],function(){
    Route::get('/','AvailabilityController@index')->name('catering.admin.availability.index');
    Route::get('/loadDates','AvailabilityController@loadDates')->name('catering.admin.availability.loadDates');
    Route::post('/store','AvailabilityController@store')->name('catering.admin.availability.store');
});
