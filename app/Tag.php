<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $guarded = [];

	public function posts()
	{
		return $this->morphByMany(\App\Post::class, 'taggable');
	}

	public function videos()
	{
		return $this->morphByMany(\App\Video::class, 'taggable');
	}
}
