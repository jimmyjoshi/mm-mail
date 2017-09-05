<?php

Route::group([
    'namespace'  => 'Template',
], function () {

    /*
     * Admin Template Controller
     */
   	Route::resource('template', 'AdminTemplateController', [
        'except' => ['index', 'show']
    ]);

    Route::get('template/', 'AdminTemplateController@index')->name('template.index');
  	Route::get('template/get', 'AdminTemplateController@getTableData')->name('template.get-list-data');
});
