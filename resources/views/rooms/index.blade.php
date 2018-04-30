@extends('layouts.app')
@section('content') 
    <h1>Rooms</h1>    
    <a href = 'rooms/create' class = 'btn btn-primary'>Create Room</a><br><br>
    @if(count($rooms)>0)
             <table class = "table1">
            <tr id = 'trid'>
            <th class = 'thclass'>Place Name</th>
            <th class = 'thclass'>Fee</th>
            <th class = 'thclass'>Points</th>
            </tr>
            @foreach($rooms as $room)

                <tr onclick="location.href='rooms/{{$room->id}}'"> 
                <td class='tdclass' >{{$room->place}}</td>
                <td class='tdclass'>{{$room->fee}}₮</td>
                <td class='tdclass'>$100</td>
                </tr>
            @endforeach
            @else <p> there is no post here.</p>      
    @endif
</table>


@endsection