@extends('layouts.app')
@section('content')
 <a href = '/posts/' class = 'btn btn-default'>Go back</a>
    <h1>Posts</h1>  
    <div class = "well">
        <h3>{{$post->title}}</h3> 
         
        <div>
        <img style = 'width:50%'src = "/storage/cover_images/{{$post->cover_image}}">             
        {!!$post->body!!}
        </div>
        Written on: {{$post->created_at}} 
        Written by: {{$post->user->name}}     
    </div>
        <br>   
     @if(!Auth::guest())   
        @if(auth()->user()->id == $post->user_id)
            <a href = "/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>  
            {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=> 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
            {!!Form::close()!!} 
        @endif
    @endif 

@endsection