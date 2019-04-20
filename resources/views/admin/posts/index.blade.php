@extends('layouts.admin')

@section('content')
    <h1 class="text-center">posts</h1>
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
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">photo</th>
            <th scope="col">title</th>
            <th scope="col">body</th>
            <th scope="col">user</th>
            <th scope="col">category</th>
            <th scope="col">created</th>
            <th scope="col">updated</th>
        </tr>
        </thead>
        <tbody>
        @if ($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>

                    <td><img height="50" width="50" src="{{$post->photo?$post->photo->path:'http://placehold.it/400x400'}}" class="img-circle" alt=""></td>
                    <td><a href="{{route('admin.posts.edit' , $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category_id}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop