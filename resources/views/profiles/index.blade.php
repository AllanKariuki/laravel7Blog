@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-radius: 15px 50px; width: 400px;" id="profile">
                <h3>Your Profile</h3>

                        <img src="{{asset('profile_images/'.$profiles->profile_image ) }}" class="img-circle" width="205px" height="205px" alt="">
                        <p>{{$profiles->description }}</p>

                        <a href="{{route('profiles.edit', $profiles->id)}}" class="btn btn-md btn-default" style="border-radius: 20px; ">Edit Profile</a>

            </div>
        </div>
    </div>


</div>

@endsection
