@extends('layouts.app')

@section('app-content')
<a href="/posts" class="btn btn-default">Go Back</a>
<div class="card card-body bg-light">
    <img style="width: 50%" src="/storage/post_images/{{$post->post_image}}" alt="post image" srcset="">
    <h3>{{$post->title}}</h3>
    <small>{{$post->created_at}}</small>
    <div class="body-container">{!!$post->body!!}</div>
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <div class="d-flex flex-row">
                <div class="p-2"><a href="/posts/{{$post->id}}/edit" class="btn btn-light">Edit</a></div>
                <div class="p-2">
                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'pl-5'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        @endif
    @endif
</div>
<script src="/js/preTag.js"></script>
@endsection
