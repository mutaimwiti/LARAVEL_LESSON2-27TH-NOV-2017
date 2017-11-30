<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Mail\BlogMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['all', 'show']);
    }

    public function all()
    {
        $blogs = Blog::where('user_id', '<>', Auth::id())->paginate(10);
        return view('blogs.all', compact('blogs'));
    }

    public function index()
    {
        $blogs = Blog::where('user_id', Auth::id())->paginate(10);
        return view('blogs.blogs', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store()
    {
        $blog = new Blog([
            'title' => Input::get('title'),
            'body' => Input::get('body'),
            'user_id' => Auth::id()
        ]);
        $blog->save();
        Mail::send(new BlogMail($blog));
        return redirect()->back();
    }

    public function show($blog)
    {
        $blog = Blog::where('id', $blog)->first();
        return view('blogs.blog', compact('blog'));
    }

    public function edit($blog)
    {
        $blog = Blog::find($blog);
        return view('blogs.edit', compact('blog'));
    }

    public function update($blog)
    {
        $blog = Blog::find($blog);
        $blog->title = Input::get('title');
        $blog->body = Input::get('body');
        $blog->save();
        return redirect()->route('blogs.index');
    }

    public function destroy($blog)
    {
        $blog = Blog::where(['user_id'=> Auth::id(), 'id' => $blog])->first();
        $blog->delete();
        return redirect()->back();
    }
}
