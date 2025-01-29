<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leader;
use App\Models\Visit;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Requests\VisitRequest;
use App\Models\TransportOption;


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
		$transportOptions = TransportOption::orderBy('name', 'asc')->get();
		return view(
			'visit.form',
			[
				'title' => 'Add new visit',
				'visit' => new Visit(),
				'leaders' => $leaders,
				'transportOptions' => $transportOptions
			]
		);
		
	}
	
	private function saveVisitData(Visit $visit, VisitRequest $request): void
	{
		$validatedData = $request->validated();
		
		$visit->fill($validatedData);
		$visit->display = (bool) ($validatedData['display'] ?? false);
		
		if ($request->hasFile('image')) {
			// here you can add code that deletes old image file when new one is uploaded
			$uploadedFile = $request->file('image');
			$extension = $uploadedFile->clientExtension();
			$name = uniqid();
			$visit->image = $uploadedFile->storePubliclyAs(
				'images',
				$name . '.' . $extension,
				'uploads'
			);
		}

		$visit->save();
	}
	// create new Visit entry
	public function put(VisitRequest $request): RedirectResponse
	{
		$visit = new Visit();
		$this->saveVisitData($visit, $request);
		return redirect('/visits');
	}
	public function update(Visit $visit): View
	{
		$leaders = Leader::orderBy('name', 'asc')->get();
		$transportOptions = TransportOption::orderBy('name', 'asc')->get();
		return view(
			'visit.form',
			[
				'title' => 'Edit visit',
				'visit' => $visit,
				'leaders' => $leaders,
				'transportOptions' => $transportOptions
			]
		);
	}
	
	public function patch(Visit $visit, VisitRequest $request): RedirectResponse
	{
		$this->saveVisitData($visit, $request);
		return redirect('/visits/update/' . $visit->id);

	}
	// delete Visit
	public function delete(Visit $visit): RedirectResponse
	{
		if ($visit->image) {
			unlink(getcwd() . '/images/' . $visit->image);
		}
		// delete the image file too
		$visit->delete();
		return redirect('/visits');
	}

}