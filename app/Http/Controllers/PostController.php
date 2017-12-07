<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
	{
		return view ('post.create');
	}

    public function store( Request $request)
	{
		$file = $request->file('photo');
		if ($file && $file->isValid()){ 
		$place =  $request->post('place');
		$filename = 'storage'.DIRECTORY_SEPARATOR.uniqid().'.'.$file->extension();
		Storage::putFileAs('public', $file, $filename);
		
		$post = new Post();
		$post -> path = 'storage'.DIRECTORY_SEPARATOR.$filename;
		$post -> user_id = auth() -> id();
		$post -> place = $place;
		
		$post -> saveOrFail();
		
		$request -> session()->flash('success', 'success');
		return redirect('/');	
		}
		else {
			$request -> session()->flash('error', 'error');
		}
	}
    public function show (Post $post)
	{
		return view('post.show');
	}
}
