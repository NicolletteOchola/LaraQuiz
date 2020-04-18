@extends('layouts.app')

@section('content')
<a href="{!! url('create-content') !!}">
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
    Add Content
  </button>
</a>
<div class="grid grid-cols-3 gap-4">
  @foreach($data as $data)
    <div class="shadow-lg" style="margin-bottom:1rem;">
      <div class="font-bold text-xl mb-2" style="margin-left:1.5rem;">
        <a href="{{ url('content/'.$data->content_id) }}" style="text-decoration:none;">{{ $data->content_name }}</a>
      </div>

      <p class="text-gray-700 text-base" style="color:black;font-size:1em;margin-left:1.5rem;">
        {{ \Illuminate\Support\Str::limit($data->content, 100) }}
      </p>

      <div class="px-6 py-4">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#{{ $data->title }}</span>
      </div>

      @if (Auth::check() && $data->user_id == Auth::id())
        <div class="grid grid-cols-3 gap-4" style="width:65%;margin-left:1.5rem;margin-bottom:1rem;">
          <a href="{{URL::to('/')}}/content/{{ $data->content_id }}/edit">
            <span class="material-icons">
              edit
            </span>
          </a>
          
          <form action="{{URL::to('/')}}/content/{{ $data->content_id }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            
            <button type="submit">
              <span class="material-icons">
                delete
              </span>
            </button>
          </form>
        </div>
      @endif

    </div>      
  @endforeach
</div>
@endsection