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
		Schema::create('family_life_lines', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger("inspection_id");
			$table->string("year");
			$table->string("age");
			$table->string("life_events");
			$table->string("illness");
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
		Schema::dropIfExists('family_life_lines');
	}
};
