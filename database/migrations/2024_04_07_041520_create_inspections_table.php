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
		Schema::create('inspections', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger("patient_id");
			$table->string("inspections_code")->unique();
			$table->text("main_complaint")->nullable();
			$table->text("family_history_disease")->nullable();
			$table->text("history_current_illness")->nullable();
			$table->text("personal_social_history")->nullable();
			$table->text("past_medical_history")->nullable();
			$table->text("system_review")->nullable();
			$table->text("family_genogram")->nullable();
			$table->text("family_map")->nullable();
			$table->text("family_structure")->nullable();
			$table->text("family_life_cycle")->nullable();
			$table->text("family_apgar")->nullable();
			$table->text("family_screem")->nullable();
			$table->text("family_life_line")->nullable();
			$table->text("general_condition")->nullable();
			$table->text("awareness")->nullable();
			$table->string("body_height")->nullable();
			$table->string("body_weight")->nullable();
			$table->string("body_waist_size")->nullable();
			$table->string("body_hip_circumference")->nullable();
			$table->string("body_upper_arm_circumference")->nullable();
			$table->string("body_mass_index")->nullable();
			$table->string("body_hip_ratio")->nullable();
			$table->string("body_status_nutrition")->nullable();
			$table->text("general_examination_head")->nullable();
			$table->text("general_examination_abdomen")->nullable();
			$table->text("general_examination_neck")->nullable();
			$table->text("general_examination_anogenital")->nullable();
			$table->text("general_examination_thoraks")->nullable();
			$table->text("general_examination_ekstremitas")->nullable();
			$table->text("special_inspection")->nullable();
			$table->text("nutritional_status_and_physical_activity")->nullable();
			$table->string("laboratory_examination")->nullable();
			$table->string("radiological_examination")->nullable();
			$table->string("other_examination")->nullable();
			$table->text("differential_diagnosis")->nullable();
			$table->string("conclusion_examination")->nullable();
			$table->text("healthy_home_assessment")->nullable();
			$table->string("holistic_diagnosis_clinical")->nullable();
			$table->string("holistic_diagnosis_personal")->nullable();
			$table->string("holistic_diagnosis_internal_risk")->nullable();
			$table->string("holistic_diagnosis_external_risk")->nullable();
			$table->string("holistic_diagnosis_functional_degree")->nullable();
			$table->string("holistic_diagnosis_description")->nullable();
			$table->text("patient_centered")->nullable();
			$table->text("family_focused")->nullable();
			$table->text("community_oriented")->nullable();
			$table->text("house_condition")->nullable();
			$table->text("impression")->nullable();
			$table->text("environment_around_house")->nullable();
			$table->text("work_environment")->nullable();
			$table->string("ad_vitam")->nullable();
			$table->string("ad_functionam")->nullable();
			$table->string("ad_sanationam")->nullable();
			$table->timestamps();

			$table->foreign("patient_id")->references("id")->on("patients")->onUpdate("cascade")->onDelete("cascade");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('inspections');
	}
};
