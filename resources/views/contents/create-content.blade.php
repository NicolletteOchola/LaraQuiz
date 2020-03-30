@extends('layouts.app')

@section('content')
    {{-- this page works fine --}}
    <div class="min-w-xl rounded" style="width:100%;height:1%;margin-left:1rem;background-color:#25bdd4;color:white;text-align:center;font-size:2em;">
        Add Content
    </div>
    <div class="min-w-xl rounded overflow-hidden shadow-lg" style="width:100%;margin-left:1rem;">
        <form class="w-full min-w-lg" style="margin:2rem;" action="create-content" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="flex items-center border-b border-b-2 border-teal-500 py-2" style="width:70%;">
                <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Title" aria-label="Full name" name="title">
            </div>
            <br>
            <br>
            <br>
            <div class="flex items-center py-2" style="width:70%;">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="tag">
                    <option>Choose a tag</option>
                    @foreach($tags as $data)
                    <option value="{{ $data['id'] }}">{{ $data['title'] }}</option>
                    @endforeach
                    <a>
                        <option>
                            Add New Tag
                        </option>
                    </a>
                </select>
                {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>     --}}
            </div>
            <br>
            <br>
            <div class="flex items-center border-b border-b-2 border-teal-500 py-2" style="width:70%;">
                <textarea class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Jane Doe" name="content">
                </textarea>
            </div>
            <br>
            <br>
            (Optional)
            <div class="flex items-center  py-2" style="width:70%;">
                <input type="file" id="inputFile" name="file">
                {{-- <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Jane Doe" aria-label="Full name"> --}}
            </div>
            <br>
            <br>
            <div class="flex items-center py-2" style="width:70%;">
                <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-xl border-4 text-white py-1 px-2 rounded" type="submit">
                    Post
                </button>
                &nbsp;&nbsp;&nbsp;
                <button class="flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-xl py-1 px-2 rounded" type="button" >
                    Cancel
                </button>
            </div>
        </form>
    </div>


@endsection