<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;


class TransportOption extends Model
{
	protected $table = 'transport_options';
	
    public function visits(): HasMany
	{
		return $this->hasMany(Visit::class);
	}
}
