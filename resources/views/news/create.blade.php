<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://cdn.tiny.cloud/1/mypjlpl0ll198jkom1nivwr7g17mj8g5oefvob9eqey6bvy5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
            <?= vratiString('create-view'); ?>
			<form action={{route('snimi-vijest')}} method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Naslov vijesti</label>
                    <input type="text" name="title" value="{{old('title')}}" class="form-control">
                    @if ($errors->has('title'))
                    <span class="invalid feedback" role="alert">
                        <strong>{{ $errors->first('title') }}.</strong>
                    </span>
                    @endif
				</div>
				<div class="form-group">
					<label>Sadržaj vijesti</label>
                    <textarea  name="content" class="form-control"></textarea>
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
        <div class="container">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#cookieModal">
                See Cookies
            </button>
        </div>

        <div class="modal fade" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="notice d-flex justify-content-between align-items-center">
                            <div class="cookie-text">Ovaj site koristi kolačiće. Ukoliko želite nastaviti dalje, molimo
                                prihvatite korištenje kolačića.</div>
                            <div class="buttons d-flex flex-column flex-lg-row">
                                <a href="#a" class="btn btn-success btn-sm" id="accept">Prihvatam</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .container {
                padding: 2rem 0rem;
            }

            .modal-dialog {
                margin-top: 0rem;
                max-width: 100%;

                .modal-content {
                    border-radius: 0rem;
                }

                .buttons {
                    .btn {
                        margin: 0.2rem;
                    }
                }
            }
        </style>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
            </script>
		<script>
            $(document).ready(function() {
                if(!getCookie("cookies")){
                    $('#cookieModal').modal('show');
                }


                $("accept").click(function(){

                    setCookie("cookies",'Da');
                    $("#cookieModal").modal("hide");
                })

            });
            function setCookie(name,value,days) {
            var expires = "";
            if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }
            function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) { var c=ca[i]; while (c.charAt(0)==' ' ) c=c.substring(1,c.length); if
                (c.indexOf(nameEQ)==0) return c.substring(nameEQ.length,c.length); } return null; }
			tinymce.init({
			  selector: 'textarea',
			  plugins: [ "advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste hr" ],
			toolbar: "insertfile undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | blockquote hr | bullist numlist outdent indent | link image"
			});
        </script>


    </body>


</html>
