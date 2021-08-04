@include('layouts.head')

@include('inc.navbar')
 <div class="container">
     <a href="/posts" class="btn btn-md btn-primary">Back to posts</a>
     <br>
     <img src="{{asset('profile_images/'.$post->profile->profile_image)}}" class="img-circle" width="50px" height="50px" alt="">
     <small>by {{$post->user->name}}</small>
     <h2>{{$post->title}}</h2>
     <img src="/storage/cover_images/{{$post->cover_image}}" style="width: 75%; height:500px;" class="w3-card-2">
     <div style="padding-top: 50px;">
         {{$post->body}}

     </div>
     <hr>
     <small>Written on {{$post->created_at}}</small>
     <small>Updated at {{$post->updated_at}}</small>

        @if (Auth::user()->id == $post->user_id)

        <form method="POST" enctype="multipart/form-data" action="{{route('posts.destroy',$post->id)}}">
            @csrf
            @method("DELETE")
                <button href="{{route('posts.destroy',$post->id)}}" class="btn btn-md btn-danger"
                    style="border-radius: 20px; ,margin-top:15px; float:right;">Delete</button>
         </form>

         <a href="/posts/{{$post->id}}/edit" class="btn btn-md btn-primary" style="border-radius: 20px; ">Edit</a>
         @else

        @endif
 </div>
