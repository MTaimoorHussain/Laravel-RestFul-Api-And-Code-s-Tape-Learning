<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Channel;
use App\Post;

class PostController extends Controller
{
	public function index()
	{
		// *.*.* Basic level *.*.* //
		// if(request()->has('active'))
		// {
		// 	$posts->where('active',request('active'));
		// }
		
		// if(request()->has('sort'))
		// {
		// 	$posts->orderBy('title',request('sort'));
		// }
		
		// *.*.* Advance level i.e. Pipeline *.*.* //
		$posts = Post::allPosts();

		return view('post.index',compact('posts'));
	}

	public function create()
	{
		return view('post.create');
	}
}
