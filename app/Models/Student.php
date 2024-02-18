<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Student extends Model
{
	use HasFactory;

	protected $fillable = [
		'key',
		'name',
		'activity_id',
		'career_id',
		'period_id',
		'validated',
		'validated_by',
		'validated_at',
		'validation_token',
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

	public function genereateValidationToken(): String
	{
		$token = Str::random(32);

		$this->update([
			'validation_token' => $token,
		]);

		return $token;
	}
}
