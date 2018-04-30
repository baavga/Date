<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->with('posts', $user->posts);
    }
    public function pages()
    {   
        return view('dashboard.pages');
    }
    public function posts()
    {   
        $posts = Post::all();
        return view('dashboard.posts')->with('posts',$posts);
    }
    public function users()
    {   
        $users = User::all();
        return view('dashboard.users')->with('users', $users);
    }
}
