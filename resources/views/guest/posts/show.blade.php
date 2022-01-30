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
        <div class="metadata">
        <div class="category">

            @if($post->category)
            Category: <a href="{{route('categories.posts', $post->category->slug)}}">{{$post->category->name}}</a>
            @else
            <span>'Uncategorized'</span>
            @endif

        </div>
        <div class="tags">
            Tags:
            @forelse($post->tags as $tag)
            <a href="{{route('tags.posts', $tag->slug)}}">{{$tag->name}}</a>
            @empty
            <span>Untagged</span>
            @endforelse

        </div>
    </div>
</div>
@endsection
