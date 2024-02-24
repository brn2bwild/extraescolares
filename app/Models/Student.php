<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Json;
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
		'grades',
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

	public function getEvaluationPoints(): String
	{
		$data = json_decode($this->grades);

		return number_format(($data->first_criteria + $data->second_criteria + $data->third_criteria + $data->fourth_criteria + $data->fifth_criteria + $data->sixth_criteria + $data->seventh_criteria) / 7, 2);
	}
}
