<?php

namespace App;

class PostCard
{
	// public static function any()
	// {
	// 	dump('inside');
	// }
	protected static function resolveFacade($name)
	{
		return app()[$name];
	}

	public static function __callStatic($method, $arguments)
	{
		// dump($arguments);
		// dump(app()['postCard']);
		// dump(app()->make('postCard'));
		return (self::resolveFacade('postCard'))
		->$method(...$arguments);
	}
}