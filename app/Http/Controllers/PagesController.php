<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use App\Profiles;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        // $user = $posts->user;
        return view('pages.main', compact('posts', 'user'));
    }
    public function about(){
        $title = "About us";
        return view('pages.about')->with('title', $title);
    }
    public function services(){

        $data = array(
            'title' => 'Our Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
