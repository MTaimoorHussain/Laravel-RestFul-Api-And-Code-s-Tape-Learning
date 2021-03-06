<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
	protected $guarded = [];
	
	public function comments()
	{
		return $this->morphMany(\App\Comment::class, 'commentable');
	}

	public function tags()
	{
		return $this->morphToMany(\App\Tag::class, 'taggable');
	}
}
