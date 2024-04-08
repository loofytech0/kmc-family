<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('family_focuseds', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger("inspection_id");
			$table->string("name");
			$table->string("age");
			$table->text("health_status");
			$table->text("risk_disease");
			$table->text("preventive_intervention");
			$table->timestamps();

			$table->foreign("inspection_id")->references("id")->on("inspections")->onUpdate("cascade")->onDelete("cascade");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('family_focuseds');
	}
};
