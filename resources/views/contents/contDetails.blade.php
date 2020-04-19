@extends('layouts.app')

@section('content')
    <div class="container" style="width:95%;margin:0 auto;min-height:80%;">
        <h2 style="font-size:2em; margin-bottom:3rem;"><b>{{ $data->content_name }}</b></h2>
        {{-- this is for the tag title --}}
        <p style="margin-bottom:2rem;">{{ $data->content }}</p>
        @if($data->file)
            <p style="margin-bottom:2rem;">
                <em>File Url:</em> <b><a href="{{ $data->file }}" target="_blank">Content File</a></b>
            </p>
        @endif
        <p style="margin-bottom:2rem;"><em>Tag</em><b>{{ $data->title }}</b></p>
        <p style="margin-bottom:2rem;"><em>Posted By</em> <b>{{ $data->name }}</b></p>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" style="margin-left:2.5rem;">
        Publish
    </button>
@endsection