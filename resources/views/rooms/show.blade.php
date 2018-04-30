@extends('layouts.app')
@section('content') 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <h1>Room {{$room->id}}</h1>    
     <!--only for admin-->
     <div class="container" style="border:8px solid #363636;">
        <div class="row">
                    <div class="col-md-2" style='background-color:white;height:500px;'>
                        <div style= 'height:50%; '>
                                <h5><i class="fas fa-female"></i></h5> 
                         </div>
                         <div style= 'height:50%;'>
                                <h5><i class="fas fa-male"></i></h5> 
                        </div>
                    </div> 
                     
            <div class="col-md-2" style='background-color:#f7d66c;height:500px;border-right:8px solid #363636;border-left:8px solid #363636;'>
                    <div style= 'height:50%; '>
                        @if($room->user1_id>0)
                        <p class = 'proom'>Username: {{$room->user1->name}}</p>
                        <p class = 'proom'>User Id: {{$room->user1->id}}</p> 
                        @endif
                    </div>
                    <div style= 'height:50%;' style='background-color:white;height:500px;'>
                        @if($room->user2_id>0)
                        <p class = 'proom'>Username: {{$room->user2->name}}</p>
                        <p class = 'proom'>User Id: {{$room->user2->id}}</p> 
                        @endif
                    </div>
            </div> 
            <div class="col-md-4 " style='background-color:white;height:500px;'>
                <img src = {{asset('img/4.jpg')}} class = 'img-responsive img-thumbnail' style= 'margin-left:0px !important; width:100%; !important;padding:0px !important;margin-top:10px;'>
                <p class = 'proom'>Description:</p> 
                <p class = 'proom'>Монголд хоолоороо дээгүүрт бичигддэг:</p> 
            </div>
            <div class="col-md-4 " style='background-color:white;height:500px;'>
                <p class = 'proom'>ID: {{$room->id}}</p>
                <p class = 'proom'>Placename: {{$room->place}}</p>
                <p class = 'proom'>Fee: {{$room->fee}}₮</p>
            </div>
        </div> 
     </div> 
         
     @if(!Auth::guest())
        @if(auth()->user()->admin_role == 'admin')
            <a href = "/rooms/{{$room->id}}/edit" class = 'btn btn-primary'> Edit</a>   
            {{Form::open(['action'=> ['RoomsController@destroy', $room->id], 'method' => 'POST', 'class'=>' pull-right'])}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['id' => 'submitButton'])}}
            {{Form::close()}}
        @endif
     @endif
    <!----> 
    @If(!Auth::guest())
        <br><br>
        {!! Form::open(['action' => ['RoomsController@join', auth()->user()->id, $room->id], 'method'=>'POST', 'enctype' =>'multipart/form-data']) !!}
        {{Form::submit('Join Room', ['id' => 'submitButton'])}}  
        {!!Form::close()!!}
   @endif
   <div class="w3-row"> 
   </div>
@endsection