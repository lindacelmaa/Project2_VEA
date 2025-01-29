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
	];

    public function leader(): BelongsTo
	{
		return $this->belongsTo(Leader::class);
	}
	public function transportOption(): BelongsTo
	{
		return $this->belongsTo(TransportOption::class, 'transport_id');
	}
}
