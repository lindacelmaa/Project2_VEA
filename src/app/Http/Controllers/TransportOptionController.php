<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportOption;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TransportOptionController extends Controller
{
    public function list(): View
	{
		$items = TransportOption::orderBy('name', 'asc')->get();
		return view('transportOption.list',[
			'title' => 'Transport Options',
			'items' => $items,
		]);
	} 
	// display new option form
	public function create(): View
	{
		return view(
			'transportOption.form',
			[
				'title' => 'Add new transport option',
				'transportOption' => new TransportOption()
			]
		);
	}
	// create new transport option
	public function put(Request $request): RedirectResponse
	{
		$validatedData = $request->validate([
			'name' => 'required|string|max:255',
		]);
		$transportOption = new TransportOption();
		$transportOption->name = $validatedData['name'];
		$transportOption->save();
		return redirect('/transportOptions');
	}
	// display editing form
	public function update(TransportOption $transportOption): View
	{
		return view(
			'transportOption.form',
			[
				'title' => 'Edit transport option',
				'transportOption' => $transportOption
			]
		);
	}
	// update existing  data
	public function patch(TransportOption $transportOption, Request $request): RedirectResponse
	{
		$validatedData = $request->validate([
			'name' => 'required|string|max:255',
		]);
		$transportOption->name = $validatedData['name'];
		$transportOption->save();
		return redirect('/transportOptions');
	}
	public function delete(TransportOption $transportOption): RedirectResponse
	{
		// this is a good place to check if author has related Book items and prevent deletion if so
		$transportOption->delete();
		return redirect('/transportOptions');
	}


}
