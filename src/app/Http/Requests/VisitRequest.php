<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'leader_id' => 'required',
			'destination_country' => 'required|min:3|max:256',
			'event_name' => 'required|min:3|max:256',
			'start_date' => 'required|date',
			'end_date' => 'required|date|after_or_equal:start_date',
			'description' => 'nullable|string',
			'cost' => 'nullable|numeric',
			'image' => 'nullable|image',
			'display' => 'nullable|boolean'
        ];
    }
	public function messages(): array
	{
		return [
			'required' => 'Lauks ":attribute" ir obligāts',
			'min' => 'Laukam ":attribute" jābūt vismaz :min simbolus garam',
			'max' => 'Lauks ":attribute" nedrīkst būt garāks par :max simboliem',
			'boolean' => 'Lauka ":attribute" vērtībai jābūt "true" vai "false"',
			'unique' => 'Šāda lauka ":attribute" vērtība jau ir reģistrēta',
			'numeric' => 'Lauka ":attribute" vērtībai jābūt skaitlim',
			'image' => 'Laukā ":attribute" jāpievieno korekts attēla fails',
		];
	}
	
	public function attributes(): array
	{
		return [
			'leader_id' => 'vadītājs',
			'destination_country' => 'Galamērķis',
			'event_name' => 'pasākuma nosaukums',
			'start_date' => 'sākuma datums',
			'end_date' => 'beigu datums',
			'description' => 'apraksts',
			'cost' => 'maksa',
			'image' => 'attēls',
			'display' => 'publicēt',
		];
	}


}
