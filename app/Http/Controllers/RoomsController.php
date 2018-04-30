<?php

namespace App\Http\Controllers;
use App\Room; 
use App\User; 
use Auth; 
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function join($userid, $room_id)
    { 
        
        $room = Room::find($room_id);
        $user1 = $room->user1_id;
        $user2 = $room->user2_id; 
       if($userid==$room->user1_id || $userid== $room->user2_id){
                return redirect('rooms/'.$room_id)->with('error', 'User is already exist');
       }
       else{
            if($user1>0 && $user2==0){
                $room->user2_id = $userid; 
                $room->save();  
                return redirect('rooms/'.$room_id)->with('success','User Added');
            }
            else if($user1==0){
                $room->user1_id=$userid;
                $room->save();  
                return redirect('rooms/'.$room_id);
            }
            else if($room->user1_id>0 && $room->user2_id>0) {return redirect('rooms/'.$room_id)->with('error', 'Room is full');}
        }  
       
    }
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index')->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rooms =  new Room();
       $rooms->place = $request->place;
       $rooms->fee = $request->fee;
       $rooms->user1_id = 0; 
       $rooms->user2_id = 0; 
       $rooms->save();  
       return redirect('rooms')->with('rooms', $rooms);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        return view('rooms.show')->with('room', $room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //checking if it is admin
        if(!Auth::guest()){ 
            if(auth()->user()->admin_role!='admin'){
               return redirect('rooms/')->with( 'error', 'Unauthorized Page');   
            } 
        }
        else { 
            return redirect('rooms/')->with( 'error', 'Unauthorized Page');
        } 
        $room = Room::find($id);
        return view('rooms.edit')->with('room', $room);
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
        //checking if it is admin
        if(!Auth::guest()){ 
            if(auth()->user()->admin_role!='admin'){
               return redirect('rooms/')->with( 'error', 'Unauthorized Page');   
            } 
        }
        else { 
            return redirect('rooms/')->with( 'error', 'Unauthorized Page');
        } 
        $room = Room::find($id);
        $room->place = $request->place;
        $room->fee = $request->fee;
        $room->save(); 
        return redirect('/rooms')->with('success','Room edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //checking if it is admin
        if(!Auth::guest()){ 
            if(auth()->user()->admin_role!='admin'){
               return redirect('rooms/')->with( 'error', 'Unauthorized Page');   
            } 
        }
        else { 
            return redirect('rooms/')->with( 'error', 'Unauthorized Page');
        }
        $room = Room::find($id);
        $room->delete();
        return redirect('/rooms')->with('success','Room deleted');
    }
    
    
}
