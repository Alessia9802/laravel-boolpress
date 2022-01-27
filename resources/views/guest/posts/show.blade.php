@extends('layouts.app')


@section('content')
<div class="container">

    <div class="post d-flex">
        <img src="{{$post->cover}}" alt="{{$post->title}}">

        <div class="details p-4">
            <h1 class="card-title">{{$post->title}}</h1>
            <p class="card-text">{{$post->text}}</p>
        </div>

    </div>


    @auth
    <div class="actions">
        <a href="{{route('admin.posts.index')}}">Back to Admin</a>
    </div>
    @endauth
    <div class="content p-4">
        <p>
            {{$post->description}}
        </p>
    </div>
</div>
@endsection