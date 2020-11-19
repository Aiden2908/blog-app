@extends('layouts.app')

@section('app-content')
    <h3>See whats new</h3>
    @if(count($posts)>0)
        @foreach ($posts as $post)
            <div class="card card-body bg-light">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on {{$post->created_at}}</small>
            </div>
            <hr>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection
