<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity;
use App\Models\Career;
use App\Models\Period;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

				User::create([
					'name' => 'Example User', 
					'email' => 'user@example.com',
					'password' => 'password',
					'is_admin' => true,
				]);

				Teacher::create([
					'name' => 'Rafael May',
				]);

				Career::create([
					'name' => 'Ing. Informática'
				]);

				Activity::create([
					'name' => 'Guitarra',
					'capacity' => 50,
					'teacher_id' => 1,
				]);

				Period::create([
					'lapse' => 'Enero - Junio 2024',
				]);
    }
}
