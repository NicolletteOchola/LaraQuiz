@extends('layouts.app')

@section('content')
    <div class="container" style="width:95%;border:solid;margin:0 auto;min-height:80%;">
        <h2>{{ $data->title }}</h2>
        {{ $data->content }}
    </div>
@endsection