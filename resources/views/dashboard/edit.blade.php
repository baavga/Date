@extends('layouts.backend')
<!-- Website Overview -->
@section('backend') 
{{Form::open(['action'=>['PostsController@update', $post->id],'method'=>'POST'])}}
{{Form::hidden(['_method'=>'PUT'])}}



<!-- Website Overview -->
 <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
          <h3 class="panel-title">Edit Page</h3>
        </div>
        <div class="panel-body">
          <form>
            <div class="form-group">
              <label>Page Title</label>
              <input type="text" class="form-control" placeholder="Page Title" value="{{$post->title}}">
            </div>
            <div class="form-group">
              <label>Page Body</label>
              <textarea name="editor1" class="form-control" placeholder="Page Body">
                {{$post->body}}
              </textarea>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" checked> Published
              </label>
            </div>
            <div class="form-group">
              <label>Meta Tags</label>
              <input type="text" class="form-control" placeholder="Add Some Tags..." value="tag1, tag2">
            </div>
            <div class="form-group">
              <label>Meta Description</label>
              <input type="text" class="form-control" placeholder="Add Meta Description..." value="  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et ">
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-default'])}} 
          </form>
        </div>
        </div>

    </div>
  </div>
</div>
{{Form::close()}}
@endsection