<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visit extends Model
{
    public function leader(): BelongsTo
	{
		return $this->belongsTo(Leader::class);
	}
}
