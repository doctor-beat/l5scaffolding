<?php

use DoctorBeat\L5Scaffolding\Controller\ScaffoldingController;

Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'scaffold'], function () {
        $class = ScaffoldingController::class;
        Route::get('',                      ['uses' => "{$class}@models",   'as' => 'scf-models']);
        Route::get('{model}',               ['uses' => "{$class}@index",    'as' => 'scf-index']);
        Route::get('{model}/create',        ['uses' => "{$class}@create",   'as' => 'scf-create']);
        Route::post('{model}',              ['uses' => "{$class}@store",    'as' => 'scf-store']);
        Route::get('{model}/{id}/edit',     ['uses' => "{$class}@edit",     'as' => 'scf-edit']);
        Route::put('{model}/{id}',          ['uses' => "{$class}@update",   'as' => 'scf-update']);
        Route::get('{model}/{id}/delete',   ['uses' => "{$class}@delete",   'as' => 'scf-delete']);
    });
});