@extends('layouts.master')


@section('content')


<table >
<thead >
    <tr >
        <th>Ticket Id</th>
        <th>Problem</th>
        <th>Afftected User</th>
        <th>Additional Notes</th>
        <th>Received Date</th>
        <th>Comments</th>
        <th>Status</th>
        <th>Action</th>
</tr>
</thead>

<tbody>


@foreach ($tickets as $ticket)
    <tr>
        
        <td>{{ $ticket->id }}</td>
        <td>{{ $ticket->description }}</td>
        <td>{{ $ticket->user ? $ticket->user->name : 'Deleted User' }}</td>
        <td>{{ $ticket->notes }}</td>
        <td>{{ $ticket->created_at}}</td>
        <td>{{ $ticket->comments->count() }}</td>
        <td>{{ $ticket->deleted_at ? "Deleted" : "Active" }}</td>
        <td><a href="/ticket/{{$ticket->id}}">View </a>
        
        @if (auth()->user()->type!=3)
        <a href="/ticket/{{$ticket->id}}/edit">Edit </a></td>
        @endif
    </tr>
@endforeach

</tbody>

</table>



<a href="/tickets/create">Create New Ticket</a>

@stop