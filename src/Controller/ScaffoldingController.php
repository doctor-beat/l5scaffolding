<?php

namespace DoctorBeat\L5Scaffolding\Controller;

use Illuminate\Routing\Controller;

class ScaffoldingController extends Controller{
    public function models()
    {
        $dir = config('l5scaffolding.model_dir');
        $path = app_path($dir);
        
        $models = [];
        foreach (scandir($path) as $file) {
            if (preg_match('/^(.*)\\.php$/', $file, $matches)) {
                $models[] = $matches[1];
            }
        }
        
        return view('l5scaffolding::models', compact('models'));
    }

    public function index($model, \DoctorBeat\L5Scaffolding\Metadata\SqliteMetadataRepository $repo)
    {
        $dir = config('l5scaffolding.model_dir');
        
        $class ="App\\{$dir}\\{$model}"; 
        $rows = $class::all();
        
        #$table = $rows[0]->getTable();
        #$metadata = DB::select("describe {$table}");
        
        $metadata = $repo->getMetadata('Demo');
        
        return view('l5scaffolding::index', compact(['model', 'rows', 'metadata']));
    }

    public function create($model, \DoctorBeat\L5Scaffolding\Metadata\SqliteMetadataRepository $repo)
    {
        $dir = config('l5scaffolding.model_dir');
        
        $class ="App\\{$dir}\\{$model}"; 
        
        $metadata = $repo->getMetadata('Demo');
        
        return view('l5scaffolding::form', compact(['model', 'metadata']));
    }
    
    //todo:
    //- hasScaffold enabled
}
