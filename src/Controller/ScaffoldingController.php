<?php

namespace DoctorBeat\L5Scaffolding\Controller;

use App\Http\Controllers\Controller;

class ScaffoldingController extends Controller{
    public function index()
    {
        $text = 'hellow orld';
        return view('l5scaffolding::default', compact('text'));
    }
}
