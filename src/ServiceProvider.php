<?php
namespace DoctorBeat\L5Scaffolding;

use DoctorBeat\L5Scaffolding\Controller\ScaffoldingController;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends  BaseServiceProvider {
    public function register() {
        include __DIR__.'/routes.php';
        $this->app->make(ScaffoldingController::class);
    }
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'l5scaffolding');
    }}
