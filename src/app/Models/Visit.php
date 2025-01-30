<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{
	
	use HasFactory;
	
	protected $fillable = [
		'leader_id',
		'destination_country',
		'event_name',
		'start_date',
		'end_date',
		'description',
		'cost',
		'transport_id'
	];

    public function leader(): BelongsTo
	{
		return $this->belongsTo(Leader::class);
	}
	public function transportOption(): BelongsTo
	{
		return $this->belongsTo(TransportOption::class, 'transport_id');
	}
	
	public function jsonSerialize(): mixed
	{
		return [
			'id' => intval($this->id),
			'leader' => $this->leader->name,
			'destination_country' => $this->destination_country,
			'event_name' => $this->event_name,
			'start_date' => $this->start_date,
			'end_date' => $this->end_date,
			'description' => $this->description,
			'cost' => number_format($this->cost, 2),
			'transport' => ($this->transportOption ? $this->transportOption->name : ''),
			'image' => asset('images/' . $this->image),
		];
	}
}
