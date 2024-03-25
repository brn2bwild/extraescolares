<?php

namespace App\Enums;

enum Genders: string
{
	case MALE = 'm';
	case FEMALE = 'f';
	case OTHER = 'o';

	public static function forSelect(): array
	{
		$values = array_column(self::cases(), 'value');
		$labels = array();

		foreach ($values as $value) $labels[$value] = self::getLabel($value);

		return $labels;
	}

	// public static function setGender(string $value): string
	// {
	// 	return match (strtolower($value)) {
	// 		'm' => self::MALE->value,
	// 		'f' => self::FEMALE->value,
	// 		'o'  => self::OTHER->value,
	// 	};
	// }

	public static function getLabel(string|null $gender): string
	{
		return match ($gender) {
			self::MALE->value => 'Hombre',
			self::FEMALE->value => 'Mujer',
			self::OTHER->value => 'Otro',
			default  => ''
		};
	}

	public function label(): string
	{
		return match ($this) {
			self::MALE => 'Hombre',
			self::FEMALE => 'Mujer',
			self::OTHER => 'Otro'
		};
	}
}
