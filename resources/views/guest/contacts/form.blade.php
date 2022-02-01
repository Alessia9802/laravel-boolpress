@extends('layouts.app')

@section('content')

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Contact us</h1>
        <p class="lead">Send us an email</p>

    </div>
</div>

@include('partials.errors')

<div class="container">
    <form action="{{route('contacts.form')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Mario" aria-describedby="nameHelp" value="{{old('name')}}">
        <small id="nameHelp" class="text-muted">Type your name above</small>
    </div>
    <div class="form-group">
        <label for="Lastname">Lastname</label>
        <input type="text" name="Lastame" id="Lastname" class="form-control" placeholder="Bross" aria-describedby="nameHelp" value="{{old('Lastname')}}">
        <small id="nameHelp" class="text-muted">Type your Lastname above</small>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="MarioBross@gmail.com" aria-describedby="emailHelp" value="{{old('email')}}">
        <small id="emailHelp" class="text-muted">Type your email above</small>
    </div>
    <div class="form-group">
        <label for="body">Message</label>
        <textarea class="form-control" name="Message" id="Message" rows="5">{{old('Message')}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fas fa-envelope-open fa-lg fa-fw"></i> Send</button>
</form>
</div>

@stop
