<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
