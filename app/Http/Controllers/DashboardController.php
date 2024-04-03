<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
  public function index() {
		return view("dashboard.index");
	}

	public function patient() {
		return view("dashboard.patient");
	}

	public function patientNew() {
		return view("dashboard.patient-new");
	}

	public function storePatient(Request $request) {
		try {
			DB::beginTransaction();

			$patient = new Patient();
			$patient->uuid = Str::uuid();
			$patient->name = $request->name;
			$patient->birth_date = date("Y-m-d", strtotime($request->birth_date));
			$patient->gender = $request->gender;
			$patient->address = $request->address;
			$patient->education = $request->education;
			$patient->religion = $request->religion;
			$patient->ethnic = $request->ethnic;
			$patient->job = $request->job;
			$patient->save();

			DB::commit();
			return response()->json(["status" => true]);
		} catch (\Exception $e) {
			DB::rollBack();
			return response()->json(["status" => false, "message" => $e->getMessage()], 400);
		}
	}

	public function dataPatient(Request $request) {
		// dd($request->all());
		$patient = Patient::whereDay("created_at", "=", date("d"))->orderBy("created_at", "desc")->take($request->length)->get();

		return DataTables::of($patient)->toJson();
	}

	public function inspection() {
		return view("dashboard.inspection");
	}

	public function inspectionNew(Request $request, $id) {
		$anamnesis = [
			"Penyakit yang saya alami datangnya karena kehendak Allah",
			"Saya menerima dengan ikhlas penyakit yang Allah berikan kepada saya",
			"Saya sabar dalam menjalani masa pengobatan",
			"Penyakit yang Allah berikan bisa membersihkan dosa-dosa saya",
			"Saya yakin Allah akan memberikan kesembuhan kepada saya",
			"Saya yakin Allah selalu mendengar doa saya",
			"Saya yakin Allah akan mengabulkan doa-doa saya",
			"Saya yakin setiap penyakit Allah berikan obat untuk menyembuhkannya",
			"Saya akan sembuh hanya dengan izin Allah",
			"Dokter hanya orang yang membantu menyembuhkan saya, yang menyembuhkan saya adalah Allah",
			"Meminum obat adalah ikhtiar saya agar sembuh, yang menyembuhkan saya adalah Allah",
			"Saya yakin Allah selalu memberikan yang terbaik untuk saya",
			"Saya yakin setelah kehidupan di dunia, akan ada kehidupan di akhirat",
			"Saya harus mempersiapkan amalan untuk bekal hidup di akhirat",
			"Saya melaksanakan shalat setiap hari 5 waktu sekalipun saat sakit",
			"Saya melaksanakan shalat sunnah dhuha setiap hari sekalipun saat sakit",
			"Saya selalu membaca Al Qur'an setiap hari",
			"Saya selalu berdzikir kepada Allah setiap hari",
			"Makanan yang saya makan selalu makanan yang halal",
			"Minuman yang saya makan selalu minuman yang halal",
			"Makanan yang saya makan selalu makanan yang baik untuk kesehatan (thayyib)",
			"Minuman yang saya makan selalu minuman yang baik untuk kesehatan (thayyib)",
			"Saya selalu berhenti makan sebelum kenyang",
			"Saya suka bersedekah (uang. makanan, dill)",
			"Saya yakin dengan bersedekah bisa membantu menyembuhkan penyakit saya",
			"Saya merasa bahagia jika bisa berbagi dengan orang lain",
			"Saya merasa bahagia jika bisa membantu orang lain"
		];
		return view("dashboard.inspection-new", compact("anamnesis"));
	}

	public function report() {
		return view("dashboard.report");
	}
}
