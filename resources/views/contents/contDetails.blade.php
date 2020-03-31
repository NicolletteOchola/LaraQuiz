@extends('layouts.app')

@section('content')
    <div class="container" style="width:95%;border:solid;margin:0 auto;min-height:80%;">
        <h2 style="font-size:2em; margin-bottom:3rem;"><b>{{ $data->title }}</b></h2>
        <p style="margin-bottom:2rem;">{{ $data->tag }}</p>
        <p style="margin-bottom:2rem;">{{ $data->content }}</p>
        <p style="margin-bottom:2rem;"><em>Posted By</em> <b>{{ $data->user_id }}</b></p>
    </div>
@endsection