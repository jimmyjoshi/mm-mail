<?php

Route::group([
    'namespace'  => 'Sms',
], function () {

    /*
     * Admin Emailer Controller
     */
   	Route::resource('sms', 'AdminSmsController', [
        'except' => ['index', 'show']
    ]);

    Route::get('sms/', 'AdminSmsController@index')->name('sms.index');
  	Route::get('sms/get', 'AdminSmsController@getTableData')->name('sms.get-list-data');
});
