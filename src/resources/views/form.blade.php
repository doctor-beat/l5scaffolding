@extends('l5scaffolding::layouts.master')

@section('title', $model . ' Create')


@section('content')
    @include('l5scaffolding::shared.errors')
    <br/>

    <table>
        {{Form::model($data, 
            [   'route' => [$route, $model, $id]
            ,   'method' => $method
            ])}}
            @foreach ($metadata as $head)
                @if ((!$head->key) || $data !== null)
                    <tr>
                        <td>{{Form::label($head->name, $head->name)}}</td>
                        <td>{{ 
                            ($route == 'scf-destroy' || $head->key) ? ($data !== null ? $data->{$head->name} : '') :        
                            ($head->getType() == 'clob' ? Form::textarea($head->name) : Form::text($head->name))}}  
                        </td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td></td>
                <td>{{Form::submit($route == 'scf-destroy' ? 'Delete' : null)}}</td>
            </tr>
        {{Form::close()}}
    </table>
@endsection