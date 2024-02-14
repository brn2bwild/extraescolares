<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

		public function career(): BelongsTo
		{
			return $this->belongsTo(Career::class);
		}

		public function period(): BelongsTo
		{
			return $this->belongsTo(Period::class);
		}

		public function activity(): BelongsTo
		{
			return $this->belongsTo(Activity::class);
		}
}
