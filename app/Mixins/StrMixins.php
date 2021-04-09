<?php

namespace App\Mixins;

class StrMixins
{
	
	public function partNum()
	{
		return function ($pNum) 
		{
			return 'Other-' . substr($pNum, 0, 3) . '-' . substr($pNum, 3);
		};
	}

	public function prefix()
	{
		return function ($string, $prefix = 'XYZ-')
		{
			return $prefix . $string;
		};
	}
}