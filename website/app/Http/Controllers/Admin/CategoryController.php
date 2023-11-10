<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = DB::table('categories')->get();
        /*echo "<pre>";
        print_r($categories);
        echo "</pre>";
        exit;*/
        return view("admin.content.category.index",["categories"=>$categories]);
    }
}
