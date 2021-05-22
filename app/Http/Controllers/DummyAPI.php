<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DummyAPI extends Controller
{
    public function index()
    {
        $category = Category::select('id','name_'.app()->getLocale() .' as name')->get();
        return [
          "status" => '200',
          "msg"    => '',
          "data" => response()->json($category)
        ];
    }
}
