@extends('layouts.app')

@section('content')
<a href="{!! url('create-content') !!}">
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
    Add Content
  </button>
</a>
<div class="flex mb-4">
  @foreach($data as $data)      
    <div class="w-1/3 bg-400 h-12">
      <div class="max-w-lg rounded overflow-hidden shadow-lg">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">

            <a href="{{ url('content/'.$data->content_id) }}" style="text-decoration:none;">{{ $data->content_name }}</a>
          
          </div>
          <p class="text-gray-700 text-base" style="color:black;font-size:1em;">
            {{ \Illuminate\Support\Str::limit($data->content, 100) }}
          </p>
          {{-- <img src="{{ $data->file }}" alt=""> --}}
        </div>
        <div class="px-6 py-4">
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{ $data->title }}</span>
        </div>
      </div>
      @if (Auth::check() && $data->user_id == Auth::id())
        <a href="{{URL::to('/')}}/content/{{ $data->content_id }}/edit">Edit</a>

        <form action="{{URL::to('/')}}/content/{{ $data->content_id }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
         
          <button type="submit">Delete</button>
        </form>
      @endif

    </div>
  @endforeach
</div>
@endsection