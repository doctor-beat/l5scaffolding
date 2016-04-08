<html>
    <body>
        <h1>{{$model}}</h1>
        @if (count($rows) == 0)
            No rows found
        @else 
            <table>
            @foreach ($metadata as $row) 
                <th>{{$row->name}}</th>
            @endforeach
            @foreach ($rows as $row)
                <tr>
                @foreach ($metadata as $meta) 
                    <?php $prop = $meta->name ?> 
                    <td>{{  $row->$prop }}</td>
                @endforeach
                </tr>
            @endforeach
            </table>
        @endif
    </body>
</html>