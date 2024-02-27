<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Post;

class PostController extends Controller
{
    public function home(){
        return view('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return response($posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $validatedData = $validator->validate();
        $result = Post::create([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
        ]);

        return response($validatedData, 200);
    }
}
