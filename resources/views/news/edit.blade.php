<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.tiny.cloud/1/mypjlpl0ll198jkom1nivwr7g17mj8g5oefvob9eqey6bvy5/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
</head>

<body>
    <div class="container">
        @if($errors->any())
        {!! implode('', $errors->all('<div class="alert-danger">:message</div>')) !!}
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert-danger">{{$error}}</div>
        @endforeach
        @endif
        <form action={{route('update')}} method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$article->id}}" name="article">
            <div class="form-group">
                <label>Naslov vijesti</label>
                <input type="text" name="title" value="{{$article->title}}" class="form-control">
                @if ($errors->has('title'))
                <span class="invalid feedback" role="alert">
                    <strong>{{ $errors->first('title') }}.</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label>Sadržaj vijesti</label>
                <textarea name="content" class="form-control">{{$article->content}}</textarea>
                @if ($errors->has('content'))
                <span class="invalid feedback" role="alert">
                    <strong>{{ $errors->first('content') }}.</strong>
                </span>
                @endif
            </div>
            <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                    <span>Odaberite sliku</span>
                    <input type="file" name="image">
                </div>
            </div>
            <input type="submit" value="Snimi">

        </form>
    </div>
    <script>
        tinymce.init({
			  selector: 'textarea',
			  plugins: [ "advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste hr" ],
			toolbar: "insertfile undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | blockquote hr | bullist numlist outdent indent | link image"
			});
    </script>


</body>


</html>
