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

    public function store(Request $request)
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
		
		$request -> session()->flash('success', 'Запись успешно создана');
		return redirect('/');	
		}
		else {
			$request -> session()->flash('error', 'Ошибка создания записи');
		}
	}
    public function show (Post $post)
	{
		//return redirect('/');
		return view('feed.index', [
			'posts' => Post::orderBy('created_at', 'desc')->get()
		]);
	}
	
	    public function edit (Post $post)
	{
		return view('post.edit', ['post' => $post]);
		
	}
	
	 public function update (Request $request, Post $post)
	{
		$file = $request->file('photo');
		if ($file && $file->isValid()){ 
		$filename = 'storage'.DIRECTORY_SEPARATOR.uniqid().'.'.$file->extension();
		Storage::putFileAs('public', $file, $filename);
		$post -> path = 'storage'.DIRECTORY_SEPARATOR.$filename;
		$post -> place = $request->post('place');
		$post -> saveOrFail();
		
		$request -> session()->flash('success', 'Запись успешно обновлена');
		return redirect('/');
		}
		else {
			$request -> session()->flash('error', 'Ошибка обновления записи');
		}
	}
	public function destroy (Request $request, Post $post)
	{
		$post->delete();
		$request -> session()->flash('success', 'Запись успешно удалена');
		return redirect('/');
	}
}
