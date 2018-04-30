<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Room;
class PagesController extends Controller
{

    public function index(){
        $title = 'Welcome to findme';
        $rooms = Room::all();
        return view('pages.index')->with('rooms',$rooms);;
    }
    public function about(){
        $title = "About title";
        return view('pages.about')->with('title',$title);

    }
    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['web design', 'Programming', 'Tetra radio']
        );
        return view('pages.services')->with($data);
    }
    public function register(){ 
        return view('pages.register');
    } 
    public function posts(){ 
        return view('posts.index');
    }
}

