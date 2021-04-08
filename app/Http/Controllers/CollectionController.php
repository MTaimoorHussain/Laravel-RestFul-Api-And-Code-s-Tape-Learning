<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
	public function average()
	{
		// *** SIMPLE CODE *** //
		(10 + 20 + 30) / 3;

		// *** LARAVEL (COLLECT & AVERAGE) *** //
		$data = [
			1000,
			2000,
			3000
		];
		collect($data)->average();

		// *** LARAVEL (COLLECT & AVERAGE) LITTLE ADVANCE *** //
		$data = [
			['price' => 1000],
			['price' => 2000],
			['price' => 3000]
		];
		collect($data)->average('price');

		// *** LARAVEL (COLLECT & AVERAGE) ADVANCE PRICE & TAX *** //
		$data = [
			[
				'price' => 1000,
				'tax' => 500
			],
			[
				'price' => 2000,
				'tax' => 700
			],
			[
				'price' => 3000,
				'tax' => 900
			]
		];
		collect($data)->average(function ($value)
		{
			return $value['price'] + $value['tax'];
		});

		// *** LARAVEL (COLLECT & AVERAGE) ADVANCE PRICE & TAX *** //
		$data = [
			[
				'price' => 1000,
				'tax' => 500,
				'active' => true
			],
			[
				'price' => 2000,
				'tax' => 700,
				'active' => true
			],
			[
				'price' => 3000,
				'tax' => 900,
				'active' => true
			]
		];
		return collect($data)->average(function ($value)
		{
			if(! $value['active'])
			{
				return null;
			}

			return $value['price'] + $value['tax'];
		});
	}

	public function max()
	{
		// *** LARAVEL (COLLECT & MAX) *** //
		$data = [
			1000,
			2000,
			3000
		];
		collect($data)->max();

		// *** LARAVEL (COLLECT & MAX) LITTLE ADVANCE *** //
		$data = [
			['price' => 1000],
			['price' => 2000],
			['price' => 3000]
		];
		collect($data)->max('price');

		// *** LARAVEL (COLLECT & MAX) ADVANCE PRICE & TAX *** //
		$data = [
			[
				'price' => 1000,
				'tax' => 500
			],
			[
				'price' => 2000,
				'tax' => 700
			],
			[
				'price' => 3000,
				'tax' => 900
			]
		];
		collect($data)->max(function ($value)
		{
			return $value['price'] + $value['tax'];
		});

		// *** LARAVEL (COLLECT & MAX) ADVANCE PRICE & TAX *** //
		$data = [
			[
				'price' => 1000,
				'tax' => 500,
				'active' => true
			],
			[
				'price' => 2000,
				'tax' => 700,
				'active' => true
			],
			[
				'price' => 3000,
				'tax' => 900,
				'active' => true
			]
		];
		return collect($data)->max(function ($value)
		{
			if(! $value['active'])
			{
				return null;
			}

			return $value['price'] + $value['tax'];
		});
	}

	public function median()
	{
		// *** LARAVEL (COLLECT & MEDIAN) *** //
		$data = [
			1000,
			2000,
			3000
		];
		collect($data)->median();

		// *** LARAVEL (COLLECT & MEDIAN) LITTLE ADVANCE *** //
		$data = [
			['price' => 1000],
			['price' => 2000],
			['price' => 3000]
		];
		return collect($data)->median('price');
	}
}