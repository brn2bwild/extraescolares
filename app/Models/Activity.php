<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'capacity',
		'user_id',
	];

	public function periods(): BelongsToMany
	{
		return $this->belongsToMany(Period::class);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
