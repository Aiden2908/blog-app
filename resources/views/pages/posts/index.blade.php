@extends('layouts.app')

@section('app-content')
    <h3 class="pt-3">See whats new</h3>
    @if(count($posts)>0)
        @foreach ($posts as $post)
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <img style="width: 60%" src="/storage/post_images/{{$post->post_image}}" alt="post image" srcset="">
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small class="">Written on {{$post->created_at}} by <span>{{$post->user->name}}</span></small>
                        <div class="body-container mt-3">{!!$post->body!!}</div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
    <script src="/js/preTag.js"></script>
@endsection
