@extends('layouts.admin')


@section('content')

<h1>Update Post {{$post->title}}</h1>

@include('partials.errors')

<form action="{{route('admin.posts.update', $post->slug)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is_invalid @enderror" placeholder="title here" aria-describedby="titleHelper" value="{{$post->title}}">
        <small id="titleHelper" class="text-muted">Add your post title, max 200 characters</small>
    </div>
    <div class="mb-3">
        <label for="sub_title" class="form-label">Sub title</label>
        <input type="text" name="sub_title" id="sub_title" class="form-control @error('sub_title') is_invalid @enderror" placeholder="sub title here" aria-describedby="sub_titleHelper" value="{{$post->sub_title}}">
        <small id=" sub_titleHelper" class="text-muted">Add your post sub title max 255 characters</small>
    </div>

    <div class="mb-3 d-flex">
        <div class="p-2">
            <img width="100" src="{{$post->cover}}">
        </div>
        <div>
            <label for="immagine">Immagine</label>
            <input type="file" name="cover" id="" value="{{ $post->cover }}">
            <img src="{{asset('storage/' . $post->cover )}}" alt="">
        </div>
    </div>

     <div class="mb-3">
        <label for="category_id" class="form-label">Categories</label>
        <select class="form-control @error('category_id') is_invalid @enderror" name="category_id" id="category_id">
            <option value="">Uncategorized</option>

            @foreach($categories as $category)
            <option value="{{$category->id}}" {{ $category->id === $post->category_id ? 'selected' :'' }}>{{$category->name}}</option>
            @endforeach

        </select>
    </div>

     <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select multiple class="form-select" name="tags[]" id="tags">
            <option disabled>Select all tags</option>

            @foreach($tags as $tag)
            <option value="{{$tag->id}}" {{$post->tags->contains($tag->id) ? 'selected' :''}}> {{$tag->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is_invalid @enderror" name="description" id="description" rows="5">{{ $post->description}}</textarea>
    </div>

    <button type="submit" class="btn btn-dark">Add Post</button>

</form>

@stop
