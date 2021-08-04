<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Profiles;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $profiles = $user->profile;
        return view('profiles.index', compact( 'profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $image = time().'.'.$request->file('profile_image')->getClientOriginalExtension();

        $request ->profile_image->move(public_path('profile_images/'), $image);


        $profile = new Profiles;
        $profile->description = $request->input('description');
        $profile->user_id=auth()->user()->id;
        $profile->profile_image =$image;
        $profile->save();

        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id =auth()->user()->id;
        $profiles = Profiles::find($id);
        return view('profiles.edit', compact('profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Profiles $profiles)
    {

        $image = time().'.'.$request->file('profile_image')->getClientOriginalExtension();

        $request ->profile_image->move(public_path('profile_images/'), $image);

        $profiles->update([
            'description'=> $request->decription,
            'profile_image'=>$image,
        ]);


        // $profile = new Profiles;
        // $profile->description = $request->input('description');
        // $profile->user_id=auth()->user()->id;
        // $profile->profile_image =$image;
        // $profile->save();

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}



//
