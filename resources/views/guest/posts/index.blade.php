@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row gy-2">
        @foreach($posts as $post)

        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="{{$post->cover}}" alt="{{$post->title}}">
                <div class="card-body">
                    <h4 class="card-title">{{$post->title}}</h4>
                    <p class="card-text">{{$post->text}}</p>
                    <a href="{{route('posts.show', $post->slug)}}">View post</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>

     <aside class="col-md-3">


            <div class="card mb-2">
                <div class="card-body">
                    <h3>
                        Categories
                    </h3>

                    <ul>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{route('categories.posts', $category->slug )}}">{{$category->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

     </aside>
</div>

@endsection
