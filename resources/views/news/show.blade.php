<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <table>
            <thead>
                <th>ID</th>
                <th>Naziv vijesti</th>
                <th>Sadržaj</th>
                <th>Slika</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{!! $post->content !!}</td>
                    <td><img src="{{$post->image}}" height="100px;" width="100px;"></td>
                </tr>
            </tbody>

        </table>
    </div>

    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>

</body>


</html>
