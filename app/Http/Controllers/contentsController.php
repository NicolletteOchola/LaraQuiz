<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Topic;

class contentsController extends Controller
{
    public function contents(){
        $data = Content::all();
                
        return view('contents/content', compact('data'));
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

            // create the new image
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
