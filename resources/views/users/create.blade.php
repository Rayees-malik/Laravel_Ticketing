@extends('layouts.master')


@section('content')

<form method="post" action="/users/create">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <h1>Create User</h1>

        <div>
        <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Name">
            
            @if ($errors->has('name'))
                <span>{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div>
        <label>Email</label>
            <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
            
            @if ($errors->has('email'))
                <span>{{ $errors->first('email') }}</span>
            @endif
        </div>
        
        <div>
        <label>Password</label>
            <input type="password" name="password"  placeholder="Password">
            
            @if ($errors->has('password'))
                <span>{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div>
        <label>Role</label>
        <select name="role" id="role">
            <option value="3" {{old('role')==3 ? "selected" : ""}}>User</option>
            <option value="2" {{old('role')==2 ? "selected" : ""}}>Technician</option>
            <option value="1" {{old('role')==1 ? "selected" : ""}}>Admin</option>
        </select>
            
            @if ($errors->has('role'))
                <span>{{ $errors->first('role') }}</span>
            @endif
        </div>

        <button  type="submit">Submit</button>
</form>

@stop