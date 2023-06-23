<!-- Stored in resources/views/layouts/master.blade.php -->
 
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Laravel - Tickets</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    </head>
    <body>

    @auth
    <h6 class="float-right text-success">Welcome, {{auth()->user()->name}}</h6>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="/tickets">Tickets <span class="sr-only">(current)</span></a>
      @if (auth()->user()->type!=3)
      <a class="nav-item nav-link" href="/users">Users</a>
      @endif
      <a class="nav-item nav-link" href="/logout">Logout</a>
    
   
    </div>
  </div>
</nav>
</br>
</br/>
        <!-- <nav>
            <li><a href="/tickets">Tickets</a></li>
            @if (auth()->user()->type!=3)
            <li><a href="/users">Users</a></li>
            @endif
            <li><a href="/logout">Logout</a></li>
    </nav>-->
    @endauth  






        @yield('content')
    </body>
</html>