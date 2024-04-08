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
		Schema::create('main_families', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger("inspection_id");
			$table->string("name");
			$table->string("gender");
			$table->date("birth_date");
			$table->string("job")->nullable();
			$table->string("health_status")->nullable();
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
		Schema::dropIfExists('main_families');
	}
};
