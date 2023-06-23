@extends('layouts.master')


@section('content')

<table>
<thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Action</th>
</tr>
</thead>

<tbody>


@foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->type }}</td>
        <td><a href="/user/{{$user->id}}/edit">Edit </a></td>
    </tr>
@endforeach

</tbody>

</table>



<a href="/users/create">Create New User</a>

@stop