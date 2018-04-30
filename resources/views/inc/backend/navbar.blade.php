<nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Home</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/dashboard">Dashboard</a></li>
          <li><a href="/dashboard/pages">Pages</a></li>
          <li><a href="/dashboard/posts">Posts</a></li>
          <li><a href="/dashboard/users">Users</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Тавтай морилно уу, @if(Auth::guest()!=true){{auth()->user()->name}}@endif</a></li>
          <li> 
           <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  гарах
                              </a>
        </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>