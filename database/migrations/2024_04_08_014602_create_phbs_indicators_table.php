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
		Schema::create('phbs_indicators', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger("inspection_id");
			$table->string("question");
			$table->boolean("answer");
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
		Schema::dropIfExists('phbs_indicators');
	}
};
