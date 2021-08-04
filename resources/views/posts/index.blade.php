@include('layouts.head')

@include('inc.navbar')

    <div class="container">
        <h3 style="margin-top: 10px;">Posts</h3>


        @if (count($posts)>0)
                @foreach ($posts as $post)

                        <div class="well w3-card-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 ">
                                    <img src="/storage/cover_images/{{$post->cover_image}}" style="width: 100%;" class="w3-card-2">
                                </div>
                                <div class="col-lg-8">
                                    <img src="{{asset('profile_images/'.$post->profile->profile_image)}}" class="img-circle" width="30px" height="30px" alt="">
                                    &nbsp;<small>Written by {{$post->user->name}} on {{$post->created_at}} </small>
                                    <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>

                                </div>
                            </div>
                        </div>

                @endforeach
                {{-- {{$posts->links()}} --}}
        @else
            <p>No posts Found</p>
        @endif
        {{$posts->links()}}
    </div>


