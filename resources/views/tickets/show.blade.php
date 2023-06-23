@extends('layouts.master')


@section('content')

<p>Problem: {{$ticket->description}}</p>
<p>Affected User: {{$ticket->user ? $ticket->user->name : 'Deleted User'}} {{$ticket->user ? ($ticket->user->id) : ""}}</p>
<p>Additional Notes: {{$ticket->notes}}</p>



@if (auth()->user()->type!=3)

<form method="post" action="/comment/{{$ticket->id}}">

<input type="hidden" name="_token" value="{{ csrf_token() }}" />

@if ($errors->has('comment'))
     <span>{{ $errors->first('comment') }}</span>
@endif

<textarea name="comment" placeholder="Leave a comment..."></textarea>


<button type="submit">Submit</button>

</form>

@endif


<h3>Comments</h3>

@foreach($ticket->comments as $comment)
    <li>{{$comment->comment}}  - <i>{{$comment->user ? $comment->user->name : 'Deleted User'}}</i></li> 
@endforeach


@stop