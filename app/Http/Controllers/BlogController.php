<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $blogs = Blog::where('user_id', Auth::id())->paginate(10);
        return view('blogs', compact('blogs'));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show($blog)
    {
        $blog = Blog::where(['user_id'=> Auth::id(), 'id' => $blog])->first();
        return view('blog', compact('blog'));
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy($blog)
    {
        $blog = Blog::where(['user_id'=> Auth::id(), 'id' => $blog])->first();
        $blog->delete();
        return redirect()->back();
    }
}
