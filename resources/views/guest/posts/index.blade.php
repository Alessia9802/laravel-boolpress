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
        </div>

        @endforeach

    </div>

      <aside class="col-md-3">




        </aside>
</div>

@endsection
