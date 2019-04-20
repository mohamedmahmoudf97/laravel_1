@extends('layouts.admin')
@section('content')
    <h1 class="text-center">create post</h1>
    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('POST') }}

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="title" name="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="body">body</label>
            <textarea class="form-control" id="body" rows="6" name="body"></textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="custom-select form-control" id="category" name="category_id">
{{--                @foreach($roles as $role)--}}
                    <option value="1">php</option>
{{--                @endforeach--}}
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