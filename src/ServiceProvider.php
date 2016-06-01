<?php
namespace DoctorBeat\L5Scaffolding;

use Collective\Html\FormFacade;
use Collective\Html\HtmlFacade;
use Collective\Html\HtmlServiceProvider;
use DoctorBeat\L5Scaffolding\Controller\ScaffoldingController;
use DoctorBeat\L5Scaffolding\Metadata\MetadataRepository;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends  BaseServiceProvider {
    const PACKAGE_KEY = 'l5scaffolding';
    
    public function register() {
        include __DIR__.'/routes.php';
        $this->app->make(ScaffoldingController::class);
        
        $this->mergeConfigFrom(__DIR__.'/config/main.php', self::PACKAGE_KEY);

        $this->app->bind(MetadataRepository::class, config('l5scaffolding.metadataRepository'));        
        
    }
    
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'l5scaffolding');
        $this->publishes([__DIR__.'/config' => config_path(self::PACKAGE_KEY)]);
        
        //register the html and form aliases:
        $this->app->register(HtmlServiceProvider::class);
        $loader = AliasLoader::getInstance();
        if (! in_array('Form', $loader->getAliases())) {
            $loader->alias('Form', FormFacade::class);
        }
        if (! in_array('Html', $loader->getAliases())) {
            $loader->alias('Html', HtmlFacade::class);
        }
    }
}
