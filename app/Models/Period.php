<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Period extends Model
{
	use HasFactory;

	protected $fillable = [
		'lapse'
	];

	public function activities(): BelongsToMany
	{
		return $this->belongsToMany(Activity::class);
	}
}
