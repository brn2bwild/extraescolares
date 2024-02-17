<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
	use HasFactory;

	protected $fillable = [
		'key',
		'name',
		'activity_id',
		'career_id',
		'period_id',
	];

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
