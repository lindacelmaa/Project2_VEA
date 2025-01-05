<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leader;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

// display all Authors


class LeaderController extends Controller
{
	public function list(): View
	{
		$items = Leader::orderBy('name', 'asc')->get();
		return view('leader.list',[
			'title' => 'Leaders',
			'items' => $items,
		]);
	} 
	// display new Leader form
	public function create(): View
	{
		return view(
			'leader.form',
			[
				'title' => 'Add new leader',
				'leader' => new Leader()
			]
		);
	}
	// create new Leader
	public function put(Request $request): RedirectResponse
	{
		$validatedData = $request->validate([
			'name' => 'required|string|max:255',
		]);
		$leader = new Leader();
		$leader->name = $validatedData['name'];
		$leader->save();
		return redirect('/leaders');
	}
	// display Leader editing form
	public function update(Leader $leader): View
	{
		return view(
			'leader.form',
			[
				'title' => 'Edit leader',
				'leader' => $leader
			]
		);
	}
	// update existing Leader data
	public function patch(Leader $leader, Request $request): RedirectResponse
	{
		$validatedData = $request->validate([
			'name' => 'required|string|max:255',
		]);
		$leader->name = $validatedData['name'];
		$leader->save();
		return redirect('/leaders');
	}
	public function delete(Leader $leader): RedirectResponse
	{
		// this is a good place to check if author has related Book items and prevent deletion if so
		$leader->delete();
		return redirect('/leaders');
	}



}
