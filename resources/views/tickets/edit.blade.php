@extends('layouts.master')


@section('content')


<form method="post" action="/ticket/{{$ticket->id}}/edit">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        @method("PUT")
        
        <h1>Modify Ticket</h1>

        

        <div>
        <label>Problem (Description)</label>
            <textarea type="description" name="description" placeholder="Problem">{{ old('description',$ticket->description) }}</textarea>
            @if ($errors->has('description'))
                <span>{{ $errors->first('description') }}</span>
            @endif
        </div>


        @if($users)
        <div>
        <label>User Affected</label>
        <select name="affected_user_id" id="affected_user_id">
            @foreach($users as $user)
            <option value="{{$user->id}}" {{old('user_id',$ticket->user_id)==$user->id ? "selected" : ""}}>{{$user->name}}</option>
            @endforeach
        </select>
            
            @if ($errors->has('role'))
                <span>{{ $errors->first('role') }}</span>
            @endif
        </div>

        @endif

        <div>
        <label>Additional Notes</label>
            <textarea type="notes" name="notes" placeholder="notes">{{ old('notes', $ticket->notes) }}</textarea>
            
            @if ($errors->has('notes'))
                <span>{{ $errors->first('notes') }}</span>
            @endif
        </div>
        
        
        <button  type="submit">Submit</button>

        

</form>

@if ($ticket->deleted_at)

<form method="post" action="/ticket/{{$ticket->id}}/edit">

@csrf

@method('put')

<input type="hidden" name="restore" value="true"/>

<button type="submit" style="background:green; color:white;">Restore</button>

</form>


@else 

<form method="post" action="/ticket/{{$ticket->id}}">

@csrf

@method('DELETE')

<button type="submit" style="background:red; color:white;">Delete</button>

</form>

@endif


@stop