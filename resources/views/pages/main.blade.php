@include('layouts.head')

@include('inc.navbar')
<div class="conteiner">

{{-- Jumbotron section --}}
    <div class="jumbotron" id="landing_page">
        <div class="row">
            <div class="col-lg-4">
                <h1>All About Tech</h1>
                <p>Keeping you updated technologically</p>
            </div>
        </div>

    </div>
{{-- Jumbotron section --}}

<div class="container justify-content-centers">
{{-- Our latest feeds --}}
    <h3 class="text-center">Latest Feeds</h3>
        <div class="row ">
            @foreach ($posts as $post)
                <div class="col-lg-4">

                        <div style="padding-bottom: 5px;">
                                <img src="{{asset('/storage/cover_images/'.$post->cover_image)}}" width="330px" height="200px" alt="">
                                <div style="margin-top: 5px; border-width: solid 10px;">
                                    <img src="{{asset('/profile_images/'.$post->profile->profile_image)}}" class="img-circle" width="50px" height="50px" alt="">
                                    &nbsp;<p>{{$post->user->name}}</p>
                                    <p>{{$post->title}}</p>

                                </div>
                        </div>


                </div>
            @endforeach
        </div>
        <center>
            <a class="btn btn-lg text-center" href="/posts" style="background-color: rgb(108, 69, 180); color: white;">View More Posts</a>
        </center>

{{-- Our latest feeds --}}

{{-- contact form --}}
        <div>
            <h3>Contact Us</h3>
            <form action="{{route('contact.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row" style="margin-bottom: 10px;" class="form-group">
                    <div class="col-lg-6" >
                        <input type="text" class="form-control" name="first_name" placeholder="First name">
                    </div>
                    <div class="col-lg-6" >

                        <input type="text" class="form-control" name="second_name" placeholder="Second name">
                    </div>
                </div>
                <div class="form-group">

                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="form-group">

                    <textarea name="message" class="form-control" placeholder="Message" id="message" name="message" cols="30" rows="10"></textarea>
                </div>
                <center>
                    <button href="{{route('contact.store')}}" class="btn btn-primary" type="submit">Send Message</button>
                </center>

            </form>
        </div>
{{-- contact form --}}





</div>

@include('inc.footer')
