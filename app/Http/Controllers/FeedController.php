<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FeedController extends Controller
{
    public function index()
	{
		return view('feed.index', [
			'posts' => Post::orderBy('created_at', 'desc')->get()
		]);
	}
}
