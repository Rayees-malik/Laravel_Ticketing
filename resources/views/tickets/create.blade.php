@extends('layouts.master')


@section('content')

<form method="post" action="/tickets/create">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
        <h1>Create Ticket</h1>

        <div>
        <label>Problem (Description)</label>
            <textarea type="description" name="description" value="{{ old('name') }}" placeholder="Problem"></textarea>
            @if ($errors->has('description'))
                <span>{{ $errors->first('description') }}</span>
            @endif
        </div>


        @if($users)
        <div>
        <label>User Affected</label>
        <select name="affected_user_id" id="affected_user_id">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
            
            @if ($errors->has('role'))
                <span>{{ $errors->first('role') }}</span>
            @endif
        </div>

        @endif

        <div>
        <label>Additional Notes</label>
            <textarea type="notes" name="notes" value="{{ old('notes') }}" placeholder="notes"></textarea>
            
            @if ($errors->has('notes'))
                <span>{{ $errors->first('notes') }}</span>
            @endif
        </div>
        
        
        <button  type="submit">Submit</button>

</form>


@stop