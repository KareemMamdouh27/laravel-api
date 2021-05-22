<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::select('id','name_'.app()->getLocale() .' as name')->get();
        return response()->json($category);
    }

    public function categoryAdd(Request $request)
    {
        $category = new Category;
        $category->name_ar=$request->name_ar;
        $category->name_en=$request->name_en;
        $result = $category->save();
        if($result){
            return [
                "Status" => "200",
                "Msg" => "added",
                "data" =>response()->json($category)
            ];
        }else{
            return [
                "Result" => "not added"
            ];
        }
    }

    public function categoryUpdate(Request $request)
    {
        $category = Category::find($request->id);
        $category->name_ar=$request->name_ar;
        $category->name_en=$request->name_en;
        $result = $category->save();
        return [
            "Result" => "data is updated"
        ];
    }
}
