<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Storage;

class CommentsController extends Controller
{
     public function show (Comments $comments)
	{
		return view('feed.index', [
			'comments' => Comments::orderBy('created_at', 'desc')->get()
		]);
	}
}
