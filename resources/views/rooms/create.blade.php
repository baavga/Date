@extends('layouts.app')
@section('content')
    <h1>Create</h1>    
    {!! Form::open(['action' => 'RoomsController@store', 'method'=>'POST', 'enctype' =>'multipart/form-data']) !!}
        <div class = 'form-group'>
            {{Form::label('place', 'Place')}}
            {{Form::text('place', '', ['class' => 'form-control', 'placeholder' => 'Place name'] )}}
        </div>
        <div class = 'form-group'>
                {{Form::label('price', 'Price')}} 
                {{ Form::input('number', 'fee', '', ['class' => 'form-control' ]) }}
        </div>
    
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
     
    {!! Form::close() !!}
    
@endsection