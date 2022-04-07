<?php
use \Illuminate\Support\Facades\Route;

Route::group(['prefix'=>config('catering.catering_route_prefix')],function(){
    Route::get('/','CateringController@index')->name('catering.search'); // Search
    Route::get('/{slug}','CateringController@detail')->name('catering.detail');// Detail
});

Route::group(['prefix'=>'user/'.config('catering.catering_route_prefix'),'middleware' => ['auth','verified']],function(){
    Route::get('/','ManageCateringController@manageCatering')->name('catering.vendor.index');
    Route::get('/create','ManageCateringController@createCatering')->name('catering.vendor.create');
    Route::get('/edit/{id}','ManageCateringController@editCatering')->name('catering.vendor.edit');
    Route::get('/del/{id}','ManageCateringController@deleteCatering')->name('catering.vendor.delete');
    Route::post('/store/{id}','ManageCateringController@store')->name('catering.vendor.store');
    Route::get('bulkEdit/{id}','ManageCateringController@bulkEditCatering')->name("catering.vendor.bulk_edit");
    Route::get('/booking-report/bulkEdit/{id}','ManageCateringController@bookingReportBulkEdit')->name("catering.vendor.booking_report.bulk_edit");
    Route::get('/recovery','ManageCateringController@recovery')->name('catering.vendor.recovery');
    Route::get('/restore/{id}','ManageCateringController@restore')->name('catering.vendor.restore');
});

Route::group(['prefix'=>'user/'.config('catering.catering_route_prefix')],function(){
    Route::group(['prefix'=>'availability'],function(){
        Route::get('/','AvailabilityController@index')->name('catering.vendor.availability.index');
        Route::get('/loadDates','AvailabilityController@loadDates')->name('catering.vendor.availability.loadDates');
        Route::post('/store','AvailabilityController@store')->name('catering.vendor.availability.store');
    });
});
