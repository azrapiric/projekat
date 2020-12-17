@extends('layouts.master')
@section('content')

@if(isset($message))

{{$message}}

@else
    @foreach($data as $item)
        <a href="#">{{$item->title}}</a> <br>

    @endforeach

@endif

@endsection
