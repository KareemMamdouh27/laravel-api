<?php

namespace App\Http\Controllers\Api;

use App\Models\PostModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;

class PostContoller extends Controller
{
    public function index()
    {
        $post = PostModel::get();
        return [
            $post
        ];
    }

    public function add(Request $req)
    {   
        $rules = array(
            "name" => "required|unique:posts",
            "title" => "required"
        );

        $validator = Validator::make($req->all(),$rules);
        if($validator->fails()){
            return [
                "Status" => "300",
                "Error" => $validator->errors() 
            ];
        }else{
            $post = new PostModel;
            $post->name=$req->name;
            $post->title=$req->title;
            $post->text=$req->text;
            $result = $post->save();
            if($result)
            {
                return [
                    "Result" => "Post Added",
                    "data"   => PostModel::get()
                ];
            }else{
                return [
                    "Result" => "Post Not Added"
                ];
            }
        }

    }

    public function update(Request $req)
    {
        $rules = array(
            "name" => "required|unique:posts",
            "title" => "required"
        );

        $validator = Validator::make($req->all(),$rules);

        if($validator->fails()){
            return [
                "Status" => "300",
                "Error"  => $validator->errors()
            ];
        }

        $post = PostModel::find($req->id);
        $post->name=$req->name;
        $post->name=$req->name;
        $post->name=$req->name;
        $result = $post->save();
        return[ 
            "Status" => "200",
            "Msg"   => "updated",
        ];
    }

    public function delete($id)
    {
        $post = PostModel::find($id);
        $res  = $post->delete();
        return [
            "status" => "200",
            "Msg"    => "post has been deleted"
        ];
    }

    public function search($name)
    {
        return PostModel::where("name",$name)->get();

    }
}
