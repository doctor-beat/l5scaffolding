<html>
    <body>
        @foreach ($models as $model)
            <li><a href="/scaffold/{{$model}}">{{$model}}</li>
        @endforeach
    </body>
</html>