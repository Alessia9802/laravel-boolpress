@extends('layout.admin')

@section('content')

<h1>Create a new post</h1>

@include('partials.errors')

<form action="{{route('admin.posts.store')}}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="titleId">
      <small id="titleId" class="text-muted">Add title</small>
    </div>

    <div class="mb-3">
      <label for="Sub_title" class="form-label">Title</label>
      <input type="text" name="Sub_title" id="Sub_title" class="form-control" placeholder="" aria-describedby="Sub_titleId">
      <small id="Sub_titleId" class="text-muted">Add Subtitle</small>
    </div>

    <div class="mb-3">
      <label for="cover" class="form-label">Cover</label>
      <input type="text" name="cover" id="cover" class="form-control" placeholder="https://" aria-describedby="coverId">
      <small id="coverId" class="text-muted">Add Cover image</small>
    </div>

    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      <textarea class="form-control" name="body" id="body" rows="5">{{old('body')}}</textarea>
    </div>
</form>

<div class="form-group">
  <label for="category_id">Categories</label>
  <select class="form-control" name="category_id" id="category_id">
      <option selected disabled>Select a category</option>
      @foreach($categories as $category)
      <option value="{{$category->slug}}">{{$category->name}}</option>
      @endforeach
​
  </select>


  <button type="submit" class="btn btn-primary">Submit</button>
</div>

@endsection
