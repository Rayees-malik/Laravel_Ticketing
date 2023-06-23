@extends('layouts.master')


@section('content')

<h3 class="text-center text-light p-3 mb-2 bg-success" >Ticketing System Zeus </h3></br>

<form method="post" action="login">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <h1 class="text-center text-primary">Login</h1>
<br/>
<br/>
        <div>
            <input type="text" class="form-control" name="email" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
      
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>
        <br/>
        <div>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
       
            @if ($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>

</form>

@stop

