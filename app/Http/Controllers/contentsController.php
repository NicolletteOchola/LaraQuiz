<?php

namespace App\Http\Controllers;

require "../vendor/autoload.php";
require "../config-cloud.php";

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

        return view('contents/content',['data'=>$data]);
    }

    // Function for storing contents
    public function storeContents(request $request){
        $tags = Topic::all()->toArray();

        if($request['content_name']){
            $file = $request['file'];
            if($file){

                $fileNameWithExt = $file->getClientOriginalName();
                $fileNm = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $ext = $file->getClientOriginalExtension();
                $fileNames = $fileNm.'_'.time().'.'.$ext;
    
                // encoding the file name before using it as public id on cloudinary 
                $file_tmp = $_FILES['file']['tmp_name'];
                
                if($ext = 'mp4' || $ext = 'mp3' || $ext = 'avi' || $ext = 'mov'){
                    // uploading the image to cloudinary
                    // images able to upload are .png & .jpeg
                    $response = \Cloudinary\Uploader::upload($file, array("resource_type" => "video", "public_id" => $fileNames));
                }elseif($ext = 'npg' || $ext = 'jpeg'){
                    
                    $response = \Cloudinary\Uploader::upload($file, array("public_id" => $fileNames));
                }
                
                // retrieving image url from cloudinary to save to database
                $path = $response['secure_url'];
            }else{
                $path = '';
            }
           
            // create the new content
            $textCont = new Content;
            $textCont->content_name = $request['content_name'];
            $textCont->content = $request['content'];
            $textCont->tag = $request['tag'];
            $textCont->user_id = $id = auth()->user()->id;
            $textCont->file =  $path;
            
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
                ->join('topics', 'topics.id', '=', 'contents.tag');

        return response()->json($trial);
        // return view('contents/contDetails', compact('trial','data'));
    }

    public function edit(Request $request) {
        $post = Content::findOrFail($request->content_id);

        return view('contents/content_edit', ['post' => $post]);
    }
    
    public function update(Request $request) {
        $post = Content::findOrFail($request->content_id);
        $post->update([
            'content_name' => $request->content_name,
            'content' => $request->content
        ]);
        
        return redirect('content');
    }

    public function destroy(Request $request) {
        $post = Content::findOrFail($request->content_id);
        $post->delete();
       
        return redirect('content');
    }
}