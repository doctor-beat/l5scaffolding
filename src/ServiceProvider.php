<?php
namespace DoctorBeat\L5Scaffolding;

use DoctorBeat\L5Scaffolding\Controller\ScaffoldingController;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends  BaseServiceProvider {
    const PACKAGE_KEY = 'l5scaffolding';
    
    public function register() {
        include __DIR__.'/routes.php';
        $this->app->make(ScaffoldingController::class);
        
        $this->mergeConfigFrom(__DIR__.'/config/main.php', self::PACKAGE_KEY);
    }
    
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'l5scaffolding');
        $this->publishes([__DIR__.'/config' => config_path(self::PACKAGE_KEY)]);
    }
}
