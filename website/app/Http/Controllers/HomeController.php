<?php

namespace App\Http\Controllers;


use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function media(){
        return view("file-manager");
    }
    public function userInfo($id){
        $user = User::find($id);
        echo "<pre>";
        print_r($user->avatar);
        echo "</pre>";
    }
    public function avatarInfo($id){
        $avatar = Avatar::find($id);
        echo "<pre>";
        print_r($avatar->user);
        echo "</pre>";
    }
}
