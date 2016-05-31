@extends('l5scaffolding::layouts.master')

@section('title', '{{$model}} models')

@section('content')
    <ul>
        @foreach ($models as $thismodel)
            <li><a href="/scaffold/{{$thismodel}}">{{$thismodel}}</li>
        @endforeach
    </ul>
@endsection