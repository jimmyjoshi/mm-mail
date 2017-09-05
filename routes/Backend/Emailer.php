<?php

Route::group([
    'namespace'  => 'Emailer',
], function () {

    /*
     * Admin Emailer Controller
     */
   	Route::resource('emailer', 'AdminEmailerController', [
        'except' => ['index', 'show']
    ]);

    Route::get('emailer/', 'AdminEmailerController@index')->name('emailer.index');
  	Route::get('emailer/get', 'AdminEmailerController@getTableData')->name('emailer.get-list-data');
});
