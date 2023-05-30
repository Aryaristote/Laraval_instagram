<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller{
    //Make post page accessible only for logged users
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('posts/create');
    }

    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'] //Make the fiels required and must containe only image
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        //Use auth to give laravel access to the user 'id', since it's require in DB modele
        //Saving data into the DB
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('profile/'.auth()->user()->id);
    }

    public function show(\App\Models\Post $post){
        return view('posts/show', compact('post'));
    }
}
