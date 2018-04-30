@extends('layouts.backend')
<!-- Website Overview --> 
@section('backend') 
@if(count($users)>0)
<div class="panel panel-default">
    <div class="panel-heading main-color-bg">
      <h3 class="panel-title">Users</h3>
    </div>
    <div class="panel-body">
      <div class="row">
            <div class="col-md-12">
                <input class="form-control" type="text" placeholder="Filter Users...">
            </div>
      </div>
      <br>
    <table class="table table-striped table-hover"> 
            <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined</th>
                    <th></th>
                  </tr>
    @foreach($users as $user)
    <tr>
     <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at}}</td>
        <td><a class="btn btn-default" href="edit.html">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
      </tr>
    @endforeach
    
</table>
</div>
</div>

</div>
</div>
</div>
@endif 
@endsection
 