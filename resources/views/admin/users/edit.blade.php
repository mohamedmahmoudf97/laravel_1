@extends('layouts.admin')

@section('content')
    <h1 class="text-center">
        Edit users page
    </h1>
    <div class="row">    <div class="col-sm-3">
        <img src="{{$user->photo?$user->photo->path:'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
    </div>
    <div class="col-sm-9">
    <form method="POST" action="/admin/users/{{$user->id}}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Enter name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="Password" class="form-control" id="Password" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <label for="Role">Role</label>
            <select class="custom-select form-control" id="Role" name="role_id">
                @foreach($roles as $role)
                    <option @if ($user->role_id == $role->id)
                        selected
                    @endif value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Active">Active</label>
            <select class="custom-select form-control" id="Active" name="is_active">
                <option @if ($user->is_active == 1)
                        selected
                        @endif  value="1">Active</option>
                <option @if ($user->is_active == 0)
                        selected
                        @endif value="0">Not Active</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control" id="exampleFormControlFile1" name="photo_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div><form method="POST" action="/admin/users/{{$user->id}}" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <div class="form-group">
                <input type="submit" value="delete" class="btn btn-danger">
            </div>
        </form>
    </div>

        <div class="row mt-2">
    @include('includes.form_error')
</div>

@stop