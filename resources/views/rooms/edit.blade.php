@extends('layouts.app')
@section('content')
    <h1>Edit</h1>      
    {!! Form::open(['action' => ['RoomsController@update', $room->id], 'method'=>'POST', 'enctype' =>'multipart/form-data']) !!}
        <div class = 'form-group'>
            {{Form::label('place', 'Place')}}
            {{Form::text('place', $room->place, ['class' => 'form-control', 'placeholder' => 'Place name'] )}}
        </div>
        <div class = 'form-group'>
                {{Form::label('price', 'Price')}} 
                {{ Form::input('number', 'fee', $room->fee, ['class' => 'form-control' ]) }}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
     
    {!! Form::close() !!}
@endsection