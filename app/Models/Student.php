<?php

namespace App\Models;

use App\Enums\Genders;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use SebastianBergmann\Type\NullType;

class Student extends Model
{
	use HasFactory;

	protected $fillable = [
		'inscription_code',
		'university_enrollment',
		'name',
		'gender',
		'activity_id',
		'career_id',
		'period_id',
		'illnes',
		'grades',
		'first_validation',
		'second_validation',
		'validated_by',
		'validated_at',
		'validation_token',
		'certificate_downloaded',
	];

	protected $casts = [
		'gender' => Genders::class,
		'first_validation' => 'boolean',
		'second_validation' => 'boolean',
		'certificate_downloaded' => 'boolean',
	];

	public function user(): HasOneThrough
	{
		return $this->hasOneThrough(User::class, Activity::class);
	}

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

	public function setFirstValidation(bool $value): bool | null
	{
		if ($this->university_enrollment === null) return null;

		return $this->update([
			'first_validation' => $value,
			'validated_by' => ($value) ? Auth::user()->name : null,
			'validated_at' => ($value) ? Carbon::now() : null,
			'validation_token' => ($value) ? Str::random(32) : null,
		]);
	}

	public function setSecondValidation(bool $value): bool | null
	{
		if ($this->university_enrollment === null) return null;

		return $this->update([
			'second_validation' => $value,
			'validated_by' => ($value) ? Auth::user()->name : null,
			'validated_at' => ($value) ? Carbon::now() : null,
			'validation_token' => ($value) ? Str::random(32) : null,
		]);
	}

	public function setCertificateDownloaded(bool  $value): bool | null
	{
		if ($this->university_enrollment === null || $this->first_validation === false && $this->second_validation) return null;
		
		return $this->update([
			'certificate_downloaded' => $value,
		]);
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

	public function getEvaluationPerformance(): String
	{
		$points = floatval($this->getEvaluationPoints());

		$performance = match (true) {
			$points >= 0 && $points < 1 => 'Insuficiente',
			$points >=  1 && $points < 1.5 => 'Suficiente',
			$points >=  1.5 && $points < 2.5 => 'Bueno',
			$points >= 2.5 && $points < 3.5 => 'Notable',
			$points >= 3.4 && $points  <= 4 => 'Excelente'
		};

		return $performance;
	}
}
