@extends('layouts.app')

@section('app-content')
<div class="jumbotron text-center mt-4">
    <h1>Welcome!</h1>
    <p>This is a simple laravel CRUD application where a logged in user can create, update and delete posts. To begin please register or click <a class="p-link" href="/posts">here</a> to see posts as a guest.</p>
    <p>
        <a href="/login" class="btn btn-primary btn-lg" role="button">Login</a>
        <a href="/register" class="btn btn-secondary btn-lg" role="button">Register</a>
    </p>
</div>
@endsection
