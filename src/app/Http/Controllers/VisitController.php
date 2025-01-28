<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leader;
use App\Models\Visit;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;

class VisitController extends Controller implements HasMiddleware
{
	// call auth middleware
	public static function middleware(): array
	{
		return [
			'auth',
	];
	
	}
	// display all Visits
	public function list(): View
	{
		$items = Visit::orderBy('event_name', 'asc')->get();
		return view(
			'visit.list',
			[
			'title' => 'Visits',
			'items' => $items
			]
		);
	}
	public function create(): View
	{
		$leaders = Leader::orderBy('name', 'asc')->get();
		return view(
			'visit.form',
			[
				'title' => 'Add new visit',
				'visit' => new Visit(),
				'leaders' => $leaders,
			]
		);
	}
	// create new Visit entry
	public function put(Request $request): RedirectResponse
	{
		$validatedData = $request->validate([
			'leader_id' => 'required',
			'destination_country' => 'required|min:3|max:256',
			'event_name' => 'required|min:3|max:256',
			'start_date' => 'required|date',
			'end_date' => 'required|date|after_or_equal:start_date',
			'description' => 'nullable|string',
			'cost' => 'nullable|numeric',
			'display' => 'nullable|boolean',
		]);
		$visit = new Visit();
		$visit->leader_id = $validatedData['leader_id'];
		$visit->destination_country = $validatedData['destination_country'];
		$visit->event_name = $validatedData['event_name'];
		$visit->start_date = $validatedData['start_date'];
		$visit->end_date = $validatedData['end_date'];
		$visit->description = $validatedData['description'];
		$visit->cost = $validatedData['cost'];
		$visit->display = (bool) ($validatedData['display'] ?? false);
		$visit->save();
		return redirect('/visits');
	}
	public function update(Visit $visit): View
	{
		$leaders = Leader::orderBy('name', 'asc')->get();
		return view(
			'visit.form',
			[
				'title' => 'Edit visit',
				'visit' => $visit,
				'leaders' => $leaders,
			]
		);
	}
	
	public function patch(Visit $visit, Request $request): RedirectResponse
	{
		$validatedData = $request->validate([
			'leader_id' => 'required',
			'destination_country' => 'required|min:3|max:256',
			'event_name' => 'required|min:3|max:256',
			'start_date' => 'required|date',
			'end_date' => 'required|date|after_or_equal:start_date',
			'description' => 'nullable|string',
			'cost' => 'nullable|numeric',
			'display' => 'nullable|boolean',
		]);
		
		$visit->leader_id = $validatedData['leader_id'];
		$visit->destination_country = $validatedData['destination_country'];
		$visit->event_name = $validatedData['event_name'];
		$visit->start_date = $validatedData['start_date'];
		$visit->end_date = $validatedData['end_date'];
		$visit->description = $validatedData['description'];
		$visit->cost = $validatedData['cost'];
		$visit->display = (bool) ($validatedData['display'] ?? false);
		$visit->save();
		return redirect('/visits/update/' . $visit->id);

	}
	// delete Visit
	public function delete(Visit $visit): RedirectResponse
	{
		// delete the image file too
		$visit->delete();
		return redirect('/visits');
	}

}