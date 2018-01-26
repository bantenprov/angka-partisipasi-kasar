<?php

Route::group(['prefix' => 'ap-kasar', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\PdrbHargaDasar\Http\Controllers\PdrbHargaDasarController@index',
        'create'     => 'Bantenprov\PdrbHargaDasar\Http\Controllers\PdrbHargaDasarController@create',
        'store'     => 'Bantenprov\PdrbHargaDasar\Http\Controllers\PdrbHargaDasarController@store',
        'show'      => 'Bantenprov\PdrbHargaDasar\Http\Controllers\PdrbHargaDasarController@show',
        'update'    => 'Bantenprov\PdrbHargaDasar\Http\Controllers\PdrbHargaDasarController@update',
        'destroy'   => 'Bantenprov\PdrbHargaDasar\Http\Controllers\PdrbHargaDasarController@destroy',
    ];

    Route::get('/',$controllers->index)->name('ap-kasar.index');
    Route::get('/create',$controllers->create)->name('ap-kasar.create');
    Route::post('/store',$controllers->store)->name('ap-kasar.store');
    Route::get('/{id}',$controllers->show)->name('ap-kasar.show');
    Route::put('/{id}/update',$controllers->update)->name('ap-kasar.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('ap-kasar.destroy');

});

