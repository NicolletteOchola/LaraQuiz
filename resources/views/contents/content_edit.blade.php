@extends('layouts.app')
 
@section('content')
  
  {{ Form::model($post, ['route' => ['content.update', $post->content_id], 'method' => 'PATCH']) }}
    <div><b><u>Title</u></b></div>
    <br>
    <p style="border:solid; width:18%;">{{ Form::text('content_name', old('content_name')) }}</p>
    <br>
    <br>                                        
    <div><b><u>Content</u></b></div>
    <br>
    <p style="border:solid; width:41%;">{{ Form::textarea('content', old('content')) }}</p>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" style="color:black;">
      {{ Form::submit('Save', ['name' => 'submit']) }}
    </button>
  {{ Form::close() }}
 
@endsection