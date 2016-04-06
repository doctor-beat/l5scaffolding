<?php

use DoctorBeat\L5Scaffolding\Controller\ScaffoldingController;

$class = ScaffoldingController::class;
Route::get('scaffold',  "{$class}@index");