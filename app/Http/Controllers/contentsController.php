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
        // $data = response()->json($dataa);
        // echo count($data);

        // Trial face;
        for($i = 0; $i < count($data);$i++){
            echo $i;

            $trial = $data[$i];

            return view('contents/content', compact('trial'));
        }
        
        foreach ($data as $data) {

            $id = $data->id;
            // echo $id;
            $title = $data->content_name;
            $content = $data->content;
            $tag = $data->title;


        };
        return view('contents/content', compact('id','title','content','tag'));
        
        // return view('contents/content', compact('data'));
        // return $data;
    }

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

    public function contentsDetails($id){
        $trial = $id;

        $data = Content::find($id)->first();

        return view('contents/contDetails', compact('trial','data'));
    }
}
