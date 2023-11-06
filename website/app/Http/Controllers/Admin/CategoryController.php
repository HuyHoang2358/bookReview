<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = [
            ["id"=>1, "name"=>"Quần áo", "slug" => "quan-ao"],
            ["id"=>2, "name"=>"Máy tính", "slug" => "may-tinh"],
            ["id"=>3, "name"=>"Điện thoại", "slug" => "dien-thoai"],
        ];
        return view("admin.content.category.index",["categories"=>$categories]);
    }
}
