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
		Schema::create('periods', function (Blueprint $table) {
			$table->id();
			$table->string('lapse');
			$table->timestamps();
		});

		Schema::create('activity_period', function (Blueprint $table) {
			$table->foreignId('activity_id')
				->constrained('activities')
				->cascadeOnDelete();
			$table->foreignId('period_id')
				->constrained('periods')
				->cascadeOnDelete();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('periods');
		Schema::dropIfExists('activity_period');
	}
};
