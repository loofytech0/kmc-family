<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route("dashboard"));
Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login.post");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");

Route::group(["prefix" => "dashboard", "middleware" => ["auth"]], function() {
	Route::get("/", [DashboardController::class, "index"])->name("dashboard");
	Route::get("/patient", [DashboardController::class, "patient"])->name("patient");
	Route::get("/patient/data", [DashboardController::class, "dataPatient"])->name("patient.data");
	Route::get("/patient/new", [DashboardController::class, "patientNew"])->name("patient.new");
	Route::post("/patient/new", [DashboardController::class, "storePatient"])->name("patient.store");
	Route::get("/inspection", [DashboardController::class, "inspection"])->name("inspection");
	Route::post("/inspection/store", [DashboardController::class, "inspectionStore"])->name("inspection.store");
	Route::put("/inspection/update", [DashboardController::class, "inspectionUpdate"])->name("inspection.update");
	Route::get("/inspection/{uuid}", [DashboardController::class, "inspectionNew"])->name("inspection.new");
	Route::get("/inspection/{uuid}/edit", [DashboardController::class, "inspectionNew"])->name("inspection.edit");
	Route::get("/report", [DashboardController::class, "report"])->name("report");
	Route::get("/report/data", [DashboardController::class, "dataReport"])->name("report.data");
	Route::get("/report/{uuid}", [DashboardController::class, "showReport"])->name("report.show");
});
