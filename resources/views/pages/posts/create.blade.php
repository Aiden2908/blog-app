@extends('layouts.app')

@section('app-content')
    <h2 class="mt-4">Create Post</h2>
    {!! Form::open(['action' => 'PostsController@store', 'POST' , 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Title'])}}
        </div>        
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id'=>'article-ckeditor','class'=>'form-control', 'placeholder'=>'Write something here..'])}}
        </div>
        <div class="form-group">
            {{Form::file('post_image')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
