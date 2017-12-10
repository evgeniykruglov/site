<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Storage;

class CommentController extends Controller
{
     public function show (Comments $comment)
	{
		return view('feed.index', [
			'comments' => Comments::orderBy('created_at', 'desc')->get()
		]);
	}
   public function store(Request $request)
	{		
		$comment = new Comment();
		$comment -> author_id = auth() -> id();
		$comment -> text = $request->post('text');
		$comment -> post_id = $request->post('post_id');
		
		$comment -> saveOrFail();
		
		$request -> session()->flash('success', 'Комментарий успешно создан');
		return redirect('/');	

	}
}
