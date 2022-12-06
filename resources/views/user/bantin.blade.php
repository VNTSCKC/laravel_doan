
@extends('layouts.user')
@section('css')
<link rel="stylesheet" href="{{asset('style.css')}}">
@endsection
@section('content')
@foreach ($newsCasts as $newsCast)
<div class="box-news-cast">
    <a href="/news-cast/detail/{{$newsCast->type_id}}/{{$newsCast->id}}">
        <img src="{{URL::to('/')}}/images/post/{{$newsCast->image}}" style="width:100%; height:400px; object-fit:cover;">
        <br>
        <h1>
            {{$newsCast->title}}
        </h1>
        <p>Ngày đăng: {{$newsCast->created_at}}</p>
    </a>
</div>
<br>

@endforeach

@endsection
