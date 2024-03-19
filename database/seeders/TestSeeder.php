<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Career;
use App\Models\Period;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Career::create([
			'name' => 'Ing. Informática'
		]);

		Activity::create([
			'name' => 'Guitarra',
			'capacity' => 50,
			'user_id' => 1,
		]);

		Period::create([
			'lapse' => 'Enero - Junio 2024',
		]);
	}
}
