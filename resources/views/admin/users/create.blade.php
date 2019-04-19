@extends('layouts.admin')

@section('content')
    <h1 class="text-center">
        create users page
    </h1>
    <form method="POST" action="/admin/user" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('POST') }}

        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
        </div>
        <div class="form-group">
            <label for="Password">؛Password</label>
            <input type="Password" class="form-control" id="Password" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <label for="Role">Role</label>
            <select class="custom-select form-control" id="Role" name="role_id">
               @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
               @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Active">Active</label>
            <select class="custom-select form-control" id="Active" name="is_active">
                <option  vlaue="1">Active</option>
                <option selected value="0">Not Active</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control" id="exampleFormControlFile1" name="photo_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@include('includes.form_error')
@stop