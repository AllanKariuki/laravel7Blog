@extends('layouts.app')

@section('content')

    <div class="container">
        <h4>Create Post</h4>
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data" style="max-width:750px;">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="text">
            </div>
            <div class="form-group">
                <label>Body</label>
                <textarea type="text"  name="body" placeholder="Body" class="form-control"></textarea>
            </div>

                <input type="file" name="cover_image" class="form-control" placeholder="Choose file">

            <button class="btn btn-md btn-primary" style="border-radius: 20px;" type="submit" name="submit" href="{{route('posts.store')}}">Submit</button>
            <button class="btn btn-md btn-danger" style="border-radius: 20px;" type="reset">Reset</button>
        </form>
    </div>

@endsection
