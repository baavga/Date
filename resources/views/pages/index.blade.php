 @extends('layouts.app')
 @section('hero')
 <div class = 'tophero'>
        <h1>#FindLove</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src = 'img/1.jpg' class=' img-responsive'>
                </div>
                <div class="col-md-4">
                    <img src = 'img/2.jpg' class=' img-responsive'>
                </div>
                <div class="col-md-4">
                    <img src = 'img/3.jpg' class=' img-responsive'>
                </div>
            </div>
        </div>
    </div>

 @endsection
 @section('content') 
 

 {{-- menu title --}}
<h1>Dynamic Tabs</h1>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">5000₮</a></li>
    <li><a data-toggle="tab" href="#menu1">30,000₮</a></li>
    <li><a data-toggle="tab" href="#menu2">50,000₮</a></li>
    <li><a data-toggle="tab" href="#menu3">500,000₮</a></li>
  </ul>
  {{-- end menu title --}}
{{-- menu home --}}
  <div class="tab-content ">
    <div id="home" class="tab-pane fade in active" >
        @if(count($rooms)>0)
            <div class = 'table1 '>
                  <table class = "table " >
                 <tr id = 'trid'>
                 <th class = 'thclass'>Place Name</th>
                 <th class = 'thclass'>Fee</th>
                 <th class = 'thclass'>Points</th>
                 <th class = 'thclass'> </th>
                 </tr>
                {{-- looping rooms which are loss than 5000 --}}
                @foreach($rooms as $room)
                @if($room->fee<5000)
                     <tr > 
                 <td class='tdclass' >{{$room->place}}</td>
                 <td class='tdclass'>{{$room->fee}}₮</td>
                 <td class='tdclass'>$100</td>
                 <td class=''><a href = " rooms/{{$room->id}}" class = 'button pull-right '>ENTER</td>
                 </tr>  

                @endif
             @endforeach
             {{-- endloop --}}
                </table>
              </div>     
                  @endif 
    </div>
    {{-- end menu home --}}
    {{-- menu1 --}}
    <div id="menu1" class="tab-pane fade">
            @if(count($rooms)>0)
            <div class = 'table1 '>
                  <table class = "table " >
                 <tr id = 'trid'>
                 <th class = 'thclass'>Place Name</th>
                 <th class = 'thclass'>Fee</th>
                 <th class = 'thclass'>Points</th>
                 <th class = 'thclass'> </th>
                 </tr> 
                 {{-- looping rooms which are loss than 30000 --}}
                 @foreach($rooms as $room)
                    @if($room->fee<30000 &&$room->fee>=5000)
                         <tr > 
                     <td class='tdclass' >{{$room->place}}</td>
                     <td class='tdclass'>{{$room->fee}}₮</td>
                     <td class='tdclass'>$100</td>
                     <td class=''><a href = " rooms/{{$room->id}}" class = 'button pull-right '>ENTER</td>
                     </tr>  

                    @endif
                 @endforeach
                 {{-- endloop --}}
                </table>
              </div>     
                  @endif 
    </div>
    {{-- endmenu1 --}}
    {{-- menu2 --}}
    <div id="menu2" class="tab-pane fade">
            @if(count($rooms)>0)
            <div class = 'table1 '>
                  <table class = "table " >
                 <tr id = 'trid'>
                 <th class = 'thclass'>Place Name</th>
                 <th class = 'thclass'>Fee</th>
                 <th class = 'thclass'>Points</th>
                 <th class = 'thclass'> </th>
                 </tr> 
                 {{-- looping rooms which are less than 50000 --}}
                 @foreach($rooms as $room)
                    @if($room->fee<50000&&$room->fee>=30000)
                         <tr > 
                     <td class='tdclass' >{{$room->place}}</td>
                     <td class='tdclass'>{{$room->fee}}₮</td>
                     <td class='tdclass'>$100</td>
                     <td class=''><a href = " rooms/{{$room->id}}" class = 'button pull-right '>ENTER</td>
                     </tr>  

                    @endif
                 @endforeach
                 {{-- endloop --}}
                
                </table>
              </div>     
                  @endif 
    </div>
    {{-- endmenu3 --}}
    {{-- menu 3 --}}
    <div id="menu3" class="tab-pane fade"> 
            @if(count($rooms)>0)
            <div class = 'table1 '>
                  <table class = "table " >
                 <tr id = 'trid'>
                 <th class = 'thclass'>Place Name</th>
                 <th class = 'thclass'>Fee</th>
                 <th class = 'thclass'>Points</th>
                 <th class = 'thclass'> </th>
                 </tr> 
                 {{-- looping rooms which are less than 500000 --}}
                 @foreach($rooms as $room)
                    @if($room->fee<=500000&&$room->fee>=50000)
                         <tr > 
                     <td class='tdclass' >{{$room->place}}</td>
                     <td class='tdclass'>{{$room->fee}}₮</td>
                     <td class='tdclass'>$100</td>
                     <td class=''><a href = " rooms/{{$room->id}}" class = 'button pull-right '>ENTER</td>
                     </tr>  

                    @endif
                 @endforeach
                 {{-- endloop --}}
                
                </table>
              </div>     
                  @endif 

    </div>  
    {{-- end menu 3 --}}

 @endsection
 