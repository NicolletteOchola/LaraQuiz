@extends('layouts.app')

@section('content')
  @foreach($data as $data)
    <div class="max-w-lg rounded overflow-hidden shadow-lg">
        <img class="w-full" src="https://images.unsplash.com/photo-1585467314765-06137c2c388b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Sunset in the mountains">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">{{ $data['title'] }}</div>
          <p class="text-gray-700 text-base" style="color:black;font-size:1em;">
            {{ \Illuminate\Support\Str::limit($data['content'], 100) }}
          </p>
        </div>
        <div class="px-6 py-4">
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#photography</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#travel</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#winter</span>
        </div>
    </div>
    <a href="{!! url('create-content'); !!}">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        Add Content
      </button>
    </a>
  @endforeach  
@endsection