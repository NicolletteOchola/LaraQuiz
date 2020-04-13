<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Topic;

class contentsController extends Controller
{
    public function contents(){
        // $data = Content::all();


        // $tags = Topic::find(1)->tag;
        // print($tags);
                
        
        $data = app('db')->select("
        SELECT * FROM contents 
        JOIN users on contents.user_id = users.id
        JOIN topics on contents.tag = topics.id"); 

        // return response()->json([
        //     'body' => view('contents/content', compact('data'))->render(),
        //     'data' => $data,
        // ]);

        // return response(view('contents/content',array('data'=>$data)),200);
        
        // return response()->json($data);

        return view('contents/content',['data'=>$data]);
    }

    // Function for storing contents
    public function storeContents(request $request){
        $tags = Topic::all()->toArray();

        if($request['title']){
            $file = $request['file'];
            if ($file) {
                // get file name with extension
                $fileNameWithExt = $file->getClientOriginalName();
                
                // get file name alone
                $fileNm = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
                // get file extension
                $ext = $file->getClientOriginalExtension();
                
                // file name to store
                $fileNames = $fileNm.'_'.time().'.'.$ext;
                
                $files = $request->file->storeAs('public/contents', $fileNames);
                // print($request->video->store('public/videoCont'));
                // $urrl = Storage::url($image);
                
                
            }else{
                //     print("please select a video");
            };

            // create the new content
            $textCont = new Content;
            $textCont->title = $request['title'];
            print($request['title']);

            $textCont->content = $request['content'];
            print($request['content']); 

            $textCont->tag = $request['tag'];
            print($request['tag']); 

            $textCont->user_id = $id = auth()->user()->id;
            print("*******************");
            print($textCont->user_id);  
            // $textCont->file =  $fileNames;
            $textCont->save();
            
            
            return redirect('content');
        }else{
            return view('contents/create-content', compact('tags'));
        }
    }

    public function contentsDetails($content_id){
        // $trial = $content_id;
        echo $content_id;
        $trial = Content::find($content_id)
                ->join('users', 'users.id', '=', 'contents.user_id')
                ->join('topics', 'topics.id', '=', 'contents.tag')->first();

        return response()->json($trial);
        // return view('contents/contDetails', compact('trial','data'));
    }
}