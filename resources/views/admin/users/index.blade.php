@extends('layouts.admin')

@section('content')
    @if (Session::has('session_delete'))
        <div class="alert alert-danger">
            {{session('session_delete')}}
        </div>
    @endif
    @if (Session::has('session_created'))
        <div class="alert alert-success">
            {{session('session_created')}}
        </div>
    @endif
    @if (Session::has('session_updated'))
        <div class="alert alert-warning">
            {{session('session_updated')}}
        </div>
    @endif
<h1 class="text-center">users</h1>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">id</th>
        <th scope="col">photo</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">Active</th>
        <th scope="col">Role</th>
        <th scope="col">created</th>
        <th scope="col">updated</th>
    </tr>
    </thead>
    <tbody>
    @if ($users)
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>

            <td><img height="50" width="50" src="{{$user->photo?$user->photo->path:'http://placehold.it/400x400'}}" class="img-circle" alt=""></td>
            <td><a href="{{route('admin.users.edit' , $user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active '}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
        </tr>
        @endforeach
    @endif
    </tbody>
</table>

@stop


