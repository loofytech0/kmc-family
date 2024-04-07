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
}
