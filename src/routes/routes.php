<?php

Route::group(['prefix' => 'ap-kasar', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\APKasar\Http\Controllers\APKasarController@index',
        'create'     => 'Bantenprov\APKasar\Http\Controllers\APKasarController@create',
        'store'     => 'Bantenprov\APKasar\Http\Controllers\APKasarController@store',
        'show'      => 'Bantenprov\APKasar\Http\Controllers\APKasarController@show',
        'update'    => 'Bantenprov\APKasar\Http\Controllers\APKasarController@update',
        'destroy'   => 'Bantenprov\APKasar\Http\Controllers\APKasarController@destroy',
    ];

    Route::get('/',$controllers->index)->name('ap-kasar.index');
    Route::get('/create',$controllers->create)->name('ap-kasar.create');
    Route::post('/store',$controllers->store)->name('ap-kasar.store');
    Route::get('/{id}',$controllers->show)->name('ap-kasar.show');
    Route::put('/{id}/update',$controllers->update)->name('ap-kasar.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('ap-kasar.destroy');

});

