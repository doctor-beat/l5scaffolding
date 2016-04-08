<?php

use DoctorBeat\L5Scaffolding\Controller\ScaffoldingController;

Route::group(['prefix' => 'scaffold'], function () {
    $class = ScaffoldingController::class;
    Route::get('',  "{$class}@index");
    Route::get('{model}',  "{$class}@listm");
});