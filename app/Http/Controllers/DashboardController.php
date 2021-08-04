<?php

namespace App\Http\Controllers;
use App\User;
use App\Profiles;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts= $user->posts;
        $profile = $user->profile;
        return view('dashboard', compact('posts','user', $user->posts, 'profile', $user->profile));
    }


}
