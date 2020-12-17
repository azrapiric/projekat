@extends('layouts.master')
@section('content')
<h1>{{$post->title}}</h1><br>

<p>{!!$post->content!!}</p> <br>

<div style="width:200px;height:200px;background-image:url('{{$post->image}}');background-size:cover;">


</div>
@endsection
