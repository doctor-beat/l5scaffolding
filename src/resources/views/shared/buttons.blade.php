@if (isset($model)) 
    <a href="{{ route('scf-index', ['model' => $model ]) }}">Index</a>
    <a href="{{ route('scf-create', ['model' => $model ]) }}">Create</a>
@endif