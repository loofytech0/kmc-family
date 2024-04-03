<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route("dashboard"));

Route::group(["prefix" => "dashboard", "middleware" => []], function() {
	Route::get("/", [DashboardController::class, "index"])->name("dashboard");
	Route::get("/patient", [DashboardController::class, "patient"])->name("patient");
	Route::get("/patient/data", [DashboardController::class, "dataPatient"])->name("patient.data");
	Route::get("/patient/new", [DashboardController::class, "patientNew"])->name("patient.new");
	Route::post("/patient/new", [DashboardController::class, "storePatient"])->name("patient.store");
	Route::get("/inspection", [DashboardController::class, "inspection"])->name("inspection");
	Route::get("/inspection/{id}", [DashboardController::class, "inspectionNew"])->name("inspection.new");
	Route::get("/report", [DashboardController::class, "report"])->name("report");
});
