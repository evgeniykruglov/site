<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
	{
		return view ('post.create');
	}

    public function store( Request $request)
	{
		//$file = $request->file('photo');
		//if 
		$post = new Post();
		$post -> user_id = auth()->id();
		$post -> place = $place;
		$post->saveOrFail();
		$request -> session()->flash('success', 'success');
		return redirect('/');	
	}
    public function show (Post $post)
	{
		return view('post.show');
	}
}
