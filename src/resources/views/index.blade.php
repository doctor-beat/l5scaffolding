@extends('l5scaffolding::layouts.master')

@section('title', $model . '  index')

@section('content')
        @if (count($rows) == 0)
            No rows found
        @else 
            <table>
            @foreach ($metadata as $head) 
                <th>{{$head->name}}</th>
            @endforeach
            @foreach ($rows as $row)
                <tr>
                @foreach ($metadata as $meta) 
                    <?php $prop = $meta->name ?> 
                    <td>{{  $row->$prop }}</td>
                @endforeach
                    <td>
                        {{Html::linkRoute('scf-edit', 'Edit', [$model, $row->getKey()])}}
                        {{Html::linkRoute('scf-delete', 'Delete', [$model, $row->getKey()])}}
                    </td>
                </tr>
            @endforeach
            </table>
        @endif
@endsection