@extends('layouts.app')

@section('app-content')
<a href="/posts" class="btn btn-default">Go Back</a>
<div class="card card-body bg-light">
    <h3>{{$post->title}}</h3>
    <small>{{$post->created_at}}</small>
    <div class="card card-body ">{{$post->body}}</div>
</div>
@endsection
