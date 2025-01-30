<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Visit;
use Illuminate\Http\JsonResponse;

class DataController extends Controller
{
    // Return 3 published Books in random order
	public function getTopVisits(): JsonResponse
	{
		$visits = Visit::where('display', true)
			->inRandomOrder()
			->take(3)
			->get();
		return response()->json($visits);
	}
	// Return selected Book if it's published
	public function getVisit(Visit $visit): JsonResponse
	{
		$selectedVisit = Visit::where([
			'id' => $visit->id,
			'display' => true,
		])
		->firstOrFail();
		return response()->json($selectedVisit);
	}
	// Return 3 published Books in random order- except the selected Book
	public function getRelatedVisits(Visit $visit): JsonResponse
	{
		$visits = Visit::where('display', true)
			->where('id', '<>', $visit->id)
			->inRandomOrder()
			->take(3)
			->get();
		return response()->json($visits);
	}

}
