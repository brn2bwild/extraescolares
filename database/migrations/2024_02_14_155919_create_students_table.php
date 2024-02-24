<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('students', function (Blueprint $table) {
			$table->id();
			$table->string('key');
			$table->string('name');
			$table->foreignId('career_id')
				->constrained('careers')
				->cascadeOnDelete();
			$table->foreignId('activity_id')
				->constrained('activities')
				->cascadeOnDelete();
			$table->foreignId('period_id')
				->constrained('periods')
				->cascadeOnDelete();
			$table->longText('observations')->nullable();
			$table->json('grades')->default(
				json_encode([
					'first_criteria' => "0",
					'second_criteria' => "0",
					'third_criteria' => "0",
					'fourth_criteria' => "0",
					'fifth_criteria' => "0",
					'sixth_criteria' => "0",
					'seventh_criteria' => "0",
				])
			);
			$table->boolean('validated')->default(false);
			$table->string('validated_by')->nullable();
			$table->timestamp('validated_at')->nullable();
			$table->string('validation_token', 32)->nullable()->unique();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('students');
	}
};
