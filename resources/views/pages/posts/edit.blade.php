@extends('layouts.app')

@section('app-content')
    <h2 class="mt-4">Edit Post</h2>
    <img style="width: 200px" src="/storage/post_images/{{$post->post_image}}" alt="post image" srcset="">
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'Title'])}}
        </div>        
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Write something here..'])}}
        </div>
        <div class="form-group">
            {{Form::file('post_image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
