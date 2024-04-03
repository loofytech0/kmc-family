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
		Schema::create("patients", function (Blueprint $table) {
			$table->id();
			$table->string("uuid")->unique();
			$table->string("name");
			$table->date("birth_date");
			$table->string("gender");
			$table->text("address")->nullable();
			$table->string("education")->nullable();
			$table->string("religion")->nullable();
			$table->string("ethnic")->nullable();
			$table->string("job")->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("patients");
	}
};
