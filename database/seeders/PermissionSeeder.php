<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		app()[PermissionRegistrar::class]->forgetCachedPermissions();

		// create students permissions
		Permission::create(['name' => 'create student']);
		Permission::create(['name' => 'edit student']);
		Permission::create(['name' => 'delete student']);
		Permission::create(['name' => 'validate student']);

		// create roles permissions
		Permission::create(['name' => 'create role']);
		Permission::create(['name' => 'edit role']);
		Permission::create(['name' => 'delete role']);

		// create careers permissions
		Permission::create(['name' => 'create resource']);
		Permission::create(['name' => 'edit resource']);
		Permission::create(['name' => 'delete resource']);

		// create teachers permissions
		Permission::create(['name' => 'create teacher']);
		Permission::create(['name' => 'edit teacher']);
		Permission::create(['name' => 'delete teacher']);

		// create roles and assign existing permissions
		$teacher_role = Role::create(['name' => 'teacher']);
		$teacher_role->givePermissionTo('edit teacher');
		$teacher_role->givePermissionTo('delete teacher');
		$teacher_role->givePermissionTo('edit student');
		$teacher_role->givePermissionTo('delete student');

		$admin_role = Role::create(['name' => 'admin']);

		// $role3 = Role::create(['name' => 'Super-Admin']);
		// gets all permissions via Gate::before rule; see AuthServiceProvider

		// create demo users
		$user = \App\Models\User::factory()->create([
			'name' => 'Teacher User',
			'email' => 'teacher@example.com',
		]);
		$user->assignRole($teacher_role);

		$user = \App\Models\User::factory()->create([
			'name' => 'Example Admin User',
			'email' => 'admin@example.com',
		]);
		$user->assignRole($admin_role);

		// $user = \App\Models\User::factory()->create([
		// 	'name' => 'Example Super-Admin User',
		// 	'email' => 'superadmin@example.com',
		// ]);
		// $user->assignRole($role3);
	}
}
