@extends('layouts.app')

@section('content')

<style>

</style>

<div class="container">
    <h4>Welcome {{$user->name}} to your dashboard</h4>

    <div class="row ">

        <div class="col-lg-4 col-md-4 col-sm-4" style="text-color: blue; padding-top: 10px;">

                <p>For new bloggers create you profile first then proceed to creating a blog. Happy Blogging!!!</p>
            <br>

        </div>
        <br><br><br>

        <div class="col-md-8" style="padding-left: 50px; ">

                <h2>Your Posts</h2>
                <hr>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     @if (count($posts)>0)
                        @foreach ($posts as $post)

                            <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
                            <hr>
                                    {{$post->body}}
                                    <br>
                                    <small>Written at: {{$post->created_at}}</small>

                        @endforeach
                         @else
                        <p>Oops! You have no posts yet.</p>
                    @endif


            </div>
        </div>
    </div>
</div>
@endsection
