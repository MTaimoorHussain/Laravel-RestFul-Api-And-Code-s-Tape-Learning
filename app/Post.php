<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Post extends Model
{
	protected $guarded = [];

	public function image()
	{
		return $this->morphOne(\App\Image::class, 'imageable');
	}

	public function comments()
	{
		return $this->morphMany(\App\Comment::class, 'commentable');
	}

	public function tags()
	{
		return $this->morphToMany(\App\Tag::class, 'taggable');
	}

	public static function allPosts()
	{
		return $posts = app(Pipeline::class)
		->send(Post::query())
		->through([
			\App\QueryFilters\Active::class,
			\App\QueryFilters\Sort::class,
			\App\QueryFilters\MaxCount::class,
		])
		->thenReturn()
		// ->get();
		->paginate(7);
	}
}
