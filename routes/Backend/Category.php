<?php

Route::group([
    'namespace'  => 'Category',
], function () {

    /*
     * Admin Categories Controller
     */
   	Route::resource('category', 'AdminCategoriesController', [
        'except' => ['index', 'show']
    ]);

    Route::get('category/', 'AdminCategoriesController@index')->name('category.index');
  	Route::get('category/get', 'AdminCategoriesController@getTableData')->name('category.get-list-data');
});
