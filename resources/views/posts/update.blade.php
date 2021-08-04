@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Edit Post</h4>
    <form method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data" style="max-width:750px;">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="text">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea type="text" id="editor" name="body"  placeholder="Body" class="form-control">{{$post->body}}</textarea>
        </div>
        <input type="file" name="cover_image" value="{{$post->cover_image}}" class="form-control" placeholder="Choose file">
        <button class="btn btn-md btn-primary" style="border-radius: 20px; padding-right: 5px;" type="submit" name="submit" href="{{route('posts.update', $post->id)}}">Submit</button>
        <button class="btn btn-md btn-danger" style="border-radius: 20px;" type="reset">Reset</button>
    </form>
</div>

@endsection
