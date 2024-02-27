<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display the homepage.
     */
    public function home()
    {
        return view('index');
    }

    /**
     * Display a listing of posts.
     */
    public function index()
    {
        $posts = Post::all();

        return response()->json($posts, 200);
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $post = Post::create($validatedData);

        return response()->json($post, 201);
    }
}
