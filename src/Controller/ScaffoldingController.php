<?php

namespace DoctorBeat\L5Scaffolding\Controller;

use DoctorBeat\L5Scaffolding\Metadata\MetadataRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PDOException;

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

    public function index($model, MetadataRepository $repo)
    {
        $class = self::classname($model);
        $rows = $class::all();
        
        $metadata = $repo->getMetadata($class);
        
        return view('l5scaffolding::index', compact(['model', 'rows', 'metadata']));
    }

    public function create($model, MetadataRepository $repo, Request $request)
    {
        $class = self::classname($model);
        $metadata = $repo->getMetadata($class);
        
        $data = $request->session()->get('data');
        $error = $request->session()->get('error');
        
        return view('l5scaffolding::form', compact(['model', 'metadata', 'data', 'error']));
    }
    
    public function store($model, MetadataRepository $repo, Request $request) 
    {
        $class = self::classname($model);
        $metadata = $repo->getMetadata($class);
        
        $entry = new $class();
        foreach ($metadata as $meta) {
            if (! $meta->key) {
                $field = $meta->name;
                $entry->$field = $request->input($field);
            }
        }
        try {
            $entry->save();
        }
        catch (PDOException $e) {
            $request->session()->flash('error', $e->getMessage());
            $request->session()->flash('data', $entry);
            return redirect()->route('scf-create', ['model' => $model]);
        }
        
        return redirect()->route('scf-index', ['model' => $model]);
    }
    
    protected static function classname($model) {
        $dir = config('l5scaffolding.model_dir');
        
        return "App\\{$dir}\\{$model}";         
    }


    //todo:
    //- hasScaffold enabled
}
