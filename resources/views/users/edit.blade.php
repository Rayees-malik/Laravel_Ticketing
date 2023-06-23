@extends('layouts.master')


@section('content')

<form method="post" action="/user/{{$user->id}}/edit">
        @method('PUT')
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <h1>Modify User</h1>

        <div>
        <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Name">
            
            @if ($errors->has('name'))
                <span>{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div>
        <label>Email</label>
            <input type="text" name="email" value="{{ old('email', $user->email) }}" placeholder="Email">
            
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>
        
        <div>
        <label>Password</label>
            <input type="password" name="password" placeholder="Password">
            
            @if ($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div>
        <label>Role</label>
        <select name="role" id="role">
            <option value="3" {{old('role',$user->type)==3 ? "selected" : ""}}>User</option>
            <option value="2" {{old('role',$user->type)==2 ? "selected" : ""}}>Technician</option>
            <option value="1" {{old('role',$user->type)==1 ? "selected" : ""}}>Admin</option>
        </select>
            
            @if ($errors->has('role'))
                <span>{{ $errors->first('role') }}</span>
            @endif
        </div>

        <button  type="submit">Modify</button>
</form>


<form method="post" action="/user/{{$user->id}}">

@csrf

@method('DELETE')

<button type="submit" style="background:red; color:white;">Delete</button>

</form>


@stop