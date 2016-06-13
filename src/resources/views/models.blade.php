@extends('l5scaffolding::layouts.master')

@section('title', '{{$model}} models')

@section('content')
    @if(! $models)
        <p>No models found</p>
    @else
        <ul>
            @foreach ($models as $thismodel)
                <li><a href="/scaffold/{{$thismodel}}">{{$thismodel}}</li>
            @endforeach
        </ul>
    @endif
@endsection