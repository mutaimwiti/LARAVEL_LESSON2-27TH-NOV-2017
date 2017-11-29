<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
        return view('create');
    }

    public function store()
    {
        $input = Input::all();
        $input['user_id'] = Auth::id();
        Blog::create($input);
        return redirect()->back();
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
