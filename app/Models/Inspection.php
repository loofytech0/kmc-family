<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
	use HasFactory;

	protected $guarded = [];

	public function patient() {
		return $this->belongsTo(Patient::class, "patient_id");
	}

	public function illness() {
		return $this->hasMany(AnalysisIllnessExperiences::class, "inspection_id");
	}

	public function family_apgrs() {
		return $this->hasMany(FamilyApgar::class, "inspection_id");
	}

	public function family_screems() {
		return $this->hasMany(FamilyScreem::class, "inspection_id");
	}

	public function phbs_indicators() {
		return $this->hasMany(PhbsIndicator::class, "inspection_id");
	}

	public function healthy_home_assessments() {
		return $this->hasMany(HealthyHomeAssessment::class, "inspection_id");
	}
}
