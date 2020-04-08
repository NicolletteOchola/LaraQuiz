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

              <a href="" style="text-decoration:none;">{{ $data->content_name }}</a>
              {{-- <a href="{{ url('content/'.$id) }}" style="text-decoration:none;">{{ $title }}</a> --}}
            
            </div>
            <p class="text-gray-700 text-base" style="color:black;font-size:1em;">
              {{ \Illuminate\Support\Str::limit($data->content, 100) }}
            </p>
          </div>
          <div class="px-6 py-4">
            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{ $data->title }}</span>
            {{-- <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{ $tag }}</span> --}}
            {{-- <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#stress</span> --}}
          </div>
        </div>
      </div>
    @endforeach

  {{-- @foreach($data as $datas) --}}
    {{-- @foreach($datas as $dats) --}}
      {{-- {{ $datas->content_name }}<br> --}}
    {{-- @endforeach --}}
  {{-- @endforeach --}}

  {{-- {{ isset($data[1]) ? $data[1]->title : '' }}<br>
  {{ isset($data[2]) ? $data[2]->title : '' }}<br> --}}
  
  {{-- @for($i = 0; $i < count($data); $i++)
  {{ isset($data[$i]) ? $data[$i]->content_name : '' }}<br>
  @endfor --}}
@endsection