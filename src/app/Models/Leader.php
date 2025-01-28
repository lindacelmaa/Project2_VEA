<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;


class Leader extends Model
{
    public function visits(): HasMany
	{
		return $this->hasMany(Visit::class);
	}
}
