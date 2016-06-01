@extends('l5scaffolding::layouts.master')

@section('title', $model . ' Create')


@section('content')
    @include('l5scaffolding::shared.errors')
    <br/>

    <table>
        {{Form::model($data, 
            [   'route' => [$route, $model, $id]
            ,   'method' => ($route == 'scf-update' ? 'PUT' : 'POST')
            ])}}
            @foreach ($metadata as $head)
                @if (! $head->key) 
                    <tr>
                        <td>{{Form::label($head->name, $head->name)}}</td>
                        <td>{{ 
                            $head->key ?            Form::hidden($head->name)   : 
                            $head->getType() == 'clob' ? Form::textarea($head->name) : Form::text($head->name)}}  
                            => {{print_r($head)}}</td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td></td>
                <td>{{Form::submit()}}</td>
            </tr>
        {{Form::close()}}
    </table>
@endsection