@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <div class="container">
                <div class="row gy-2">
                    @foreach($posts as $post)

                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{$post->cover}}" alt="{{$post->title}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>

                                <a href="{{route('posts.show', $post->slug)}}">View post</a>
                                <div class="metadata">
                                   <div class="category">
                                         @if($post->category)
                                        Category: <a href="{{route('categories.posts', $post->category->slug)}}">{{$post->category->name}}</a>
                                        @else
                                        <span>'Uncategorized'</span>
                                        @endif
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
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

            <div class="card">
                <div class="card-body">
                    <h3>
                        Tags
                    </h3>
                    <ul>
                        @foreach($tags as $tag)
                        <li>
                            <a href="{{route('tags.posts', $tag->slug )}}">{{$tag->name}}</a>
                        </li>
                        @endforeach
                    </ul>

                </div>
            </div>

        </aside>
    </div>
</div>


@endsection
