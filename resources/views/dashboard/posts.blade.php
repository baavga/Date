@extends('layouts.backend')
<!-- Website Overview -->
@section('backend') 
    @if(count($posts)>0)
    <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
          <h3 class="panel-title">Posts</h3>
        </div>
        <div class="panel-body">
          <div class="row">
                <div class="col-md-12">
                    <input class="form-control" type="text" placeholder="Filter Posts...">
                </div>
          </div>
          <br>
          <table class="table table-striped table-hover">
               <tr>
            <th>Title</th>
            <th>Published</th>
            <th>Created</th>
            <th></th>
          </tr>
        @foreach($posts as $post)
        {{Form::open(['id' => 'delete-form','action'=>['PostsController@destroy', $post->id],'method'=>'POST' ])}}
        {{Form::hidden('_method', 'DELETE')}} 
       
          <tr>
            <td>{{$post->title}}</td>
            <td><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
            <td>{{$post->created_at}}</td>
          <td><a class="btn btn-default" href="/posts/{{$post->id}}/edit">Edit</a> 
            {{Form::submit('Delete' ,['class' => 'btn btn-danger'])}} </td>
          </tr>
          {{Form::close()}}
        @endforeach
    </table>
</div>
</div>

</div>
</div>
</div>
    @endif
@endsection 