<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        $categories = DB::table('categories')
            ->where("category_parent_id","=",0)->paginate(6);

        $sub_categories = DB::table("categories")
            ->where("category_parent_id", ">", 0)->get();
        return view("admin.content.category.index",["categories"=>$categories, "sub_categories"=>$sub_categories]);
    }
    public function add(){
        $categories = DB::table("categories")->where("category_parent_id","=", 0)->get();
        return view("admin.content.category.add", ["categories"=>$categories]);
    }
    public function store(Request $request){
       /* echo "<pre>";
        print_r($request->all());
        echo "</pre>";*/
        $input = $request->all();
        $category = new Category();
        $category["category_name"] = $input["category_name"];
        $category["category_slug"] = $input["category_slug"];
        $category["category_parent_id"] = $input["category_parent_id"];
        $category->save();
        return redirect()->route("admin.category.index");
    }
    public function edit($id){
        $item = Category::find($id);
        $categories = DB::table("categories")->where("category_parent_id","=", 0)->get();
        return view("admin.content.category.edit", ["categories"=>$categories, "item"=>$item]);
    }
    public function update(Request $request, $id){
        $item = Category::find($id);
        if($item){
            $input = $request->all();
            $item["category_name"] = $input["category_name"];
            $item["category_slug"] = $input["category_slug"];
            $item["category_parent_id"] = $input["category_parent_id"];
            $item->save();
        }

        return redirect()->route("admin.category.index");
    }
    public function destroy($id){
        $item = Category::find($id);
        if($item)
            $item->delete();
        return redirect()->route("admin.category.index");
    }
}
