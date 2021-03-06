<?php

namespace App\Http\Controllers;  
use App\Post;
use App\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Storage;
class PostsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => [ 'show', 'index',]]);
    }

    public function index()
    {   
         
        $posts = Post::orderBy('created_at', 'desc' )->paginate(10);
 
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
            $this->validate($request, [
                'title'=>'required',
                'body'=>'required',
                'cover_image'=>'image|nullable|max:1999'
            ]);
            //hande file upload
            if($request->hasFile('cover_image')){
                //get filename with extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just extension
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                //file name to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //upload image
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'noimage.jpg';
            }
            //Create Post
            $post = new Post();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->cover_image = $fileNameToStore;
            //Post used_id equeals to Logged in user ID
            $post->user_id = auth()->user()->id;
            $post->save();
            return redirect('/dashboard/posts')->with('success', 'Post created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id); 
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id!=$post->user_id){
            return redirect('dashboard/posts/')->with( 'error', 'Unauthorized Page');
        }
        return view('dashboard.show')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
        ]);
        
            //hande file upload
            if($request->hasFile('cover_image')){
                //get filename with extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just extension
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                //file name to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //upload image
                $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            } 
        $post = Post::find($id);
        //check for correct user
            if(auth()->user()->id!=$post->user_id){
                return redirect('posts/')->with( 'error', 'Unauthorized Page');
            } 

        $post->title = $request->title;
        $post->body = $request->body;
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/dashboard/posts')->with('success', 'Post edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        //check for correct user 
            if(auth()->user()->id!=$post->user_id){
                return redirect('dashboard/posts')->with( 'error', 'Unauthorized Page');
            }
            if($post->cover_image!= 'noimage.jpg'){
                //Delete image
                Storage::delete('public/cover_images/'.$post->cover_image);
            }
        $post->delete();
        return redirect('/dashboard/posts')->with('success', 'Post deleted');
    }
}
