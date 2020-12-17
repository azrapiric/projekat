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
                <th>Akcija</th>
                <th>Check</th>
            </thead>
            <tbody>
                @foreach ($news as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>
                            <a href={{route('show',['id'=>$item->id])}} class="btn btn-success">Prikaži</a>
                            <a href={{route('izmijeni',['id'=>$item->id])}} class="btn btn-primary">Izmijeni</a>

                        </td>
                        <td>
                        <form>
                            @csrf
                            <input type="checkbox" data-id="{{$item->id}}" name="remove">
                        </form>
                        </td>
                    </tr>
                @endforeach
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $("[name=remove]").click(function(){
            console.log('test');
            formData = {
                'id': $(this).attr('data-id'),
            }
            $_token = $("[name=_token]").val();
            if($(this).is(':checked')){
                ajaxURL = '/izbrisi-vijesti';
                $.ajax({
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    url: ajaxURL,
                    encode: true,
                    headers: { 'X-CSRF-TOKEN' : $_token },
                    success: function (data) {
                        location.reload();
                    }
                });
            }
        });

    </script>

</body>



</html>
