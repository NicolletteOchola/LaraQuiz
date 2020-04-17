@extends('layouts.app')
 
@section('content')
  
  {{ Form::model($post, ['route' => ['content.update', $post->content_id], 'method' => 'PATCH']) }}
    <p>{{ Form::text('content_name', old('content_name')) }}</p>
    <p>{{ Form::textarea('content', old('content')) }}</p>
    <p>{{ Form::submit('Save', ['name' => 'submit']) }}</p>
  {{ Form::close() }}
 
@endsection