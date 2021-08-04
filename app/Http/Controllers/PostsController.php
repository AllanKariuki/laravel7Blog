<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Profiles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth', ['except', ['index', 'show']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        // SQL query=>$posts = DB::select('SELECT * FROM posts');
        // return Post::where('title', 'first Post')->get();
        //prdering by the recently addded
        //$posts = Post::orderBy('title', 'desc')->take(1)->get();
        // $posts = Post::orderBy('title', 'asc')->paginate(1);
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('cover_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('cover_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('cover_image')->storeAs('public/cover_images', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }


        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id=auth()->user()->id;
        $post->cover_image =$filenametostore;
        $post->save();
        return redirect('/dashboard')->with('success', 'Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);

        //check if the viewer is authorized
        if(auth()->user()->id !== $post->user_id)
        {
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.callFunction('$msg')</script>";
            return redirect()->view('/posts', compact('re'));
        }

        return view('posts.update')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->hasFile('cover_image')) {
            //get filename with extension
            $filenamewithextension = $request->file('cover_image')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('cover_image')->storeAs('public/cover_images', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }


        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $filenametostore;
        $post->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        //check if the viewer is authorized
        if(auth()->user()->id !== $post->user_id)
        {
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.callFunction('$msg')</script>";
            return redirect()->view('/posts', compact('re'));
        }
        if($post->cover_image != null)
        {
            Storage::delete('/public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }
}
