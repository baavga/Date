@extends('layouts.app')
@section('content') 
   <div class = "jumbotron text-center">
       <h1>Welcome to Laravel</h1> 
        {{Form::open(array('url' => 'logout'))}}
        {{Form::label('username', 'Username')}}
        {{Form::text('email', 'example@email.com')}}<br>
        {{Form::submit()}}
        {{Form::close()}}

 
   </div>
   
@endsection