<?php

namespace App\Http\Controllers;

use App\Models\AnalysisIllnessExperiences;
use App\Models\FamilyApgar;
use App\Models\FamilyFocused;
use App\Models\FamilyLifeLine;
use App\Models\FamilyScreem;
use App\Models\HealthyHomeAssessment;
use App\Models\HomeVisitResults;
use App\Models\Inspection;
use App\Models\MainFamily;
use App\Models\Patient;
use App\Models\PhbsIndicator;
use App\Models\ScreemAspect;
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
		$patient = Patient::with("inspection")->whereDay("created_at", "=", date("d"))->orderBy("created_at", "desc")->take($request->length)->get();

		return DataTables::of($patient)->toJson();
	}

	public function inspection() {
		return redirect()->route("patient");
		return view("dashboard.inspection");
	}

	public function inspectionNew(Request $request, $uuid) {
		$patient = Patient::where("uuid", $uuid)->first();
		if (!$patient) abort(404);

		$inspection = null;
		if ($request->segment(4) && $request->segment(4) == "edit") {
			$inspection = Inspection::where("patient_id", $patient->id)->first();
			// dd($inspection->illness);
		}

		$anamnesis = [
			[
				"question" => "Penyakit yang saya alami datangnya karena kehendak Allah",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya menerima dengan ikhlas penyakit yang Allah berikan kepada saya",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya sabar dalam menjalani masa pengobatan",
				"group" => "patient_faith"
			],
			[
				"question" => "Penyakit yang Allah berikan bisa membersihkan dosa-dosa saya",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya yakin Allah akan memberikan kesembuhan kepada saya",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya yakin Allah selalu mendengar doa saya",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya yakin Allah akan mengabulkan doa-doa saya",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya yakin setiap penyakit Allah berikan obat untuk menyembuhkannya",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya akan sembuh hanya dengan izin Allah",
				"group" => "patient_faith"
			],
			[
				"question" => "Dokter hanya orang yang membantu menyembuhkan saya, yang menyembuhkan saya adalah Allah",
				"group" => "patient_faith"
			],
			[
				"question" => "Meminum obat adalah ikhtiar saya agar sembuh, yang menyembuhkan saya adalah Allah",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya yakin Allah selalu memberikan yang terbaik untuk saya",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya yakin setelah kehidupan di dunia, akan ada kehidupan di akhirat",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya harus mempersiapkan amalan untuk bekal hidup di akhirat",
				"group" => "patient_faith"
			],
			[
				"question" => "Saya melaksanakan shalat setiap hari 5 waktu sekalipun saat sakit",
				"group" => "patient_worship_routine"
			],
			[
				"question" => "Saya melaksanakan shalat sunnah dhuha setiap hari sekalipun saat sakit",
				"group" => "patient_worship_routine"
			],
			[
				"question" => "Saya selalu membaca Al Qur'an setiap hari",
				"group" => "patient_worship_routine"
			],
			[
				"question" => "Saya selalu berdzikir kepada Allah setiap hari",
				"group" => "patient_worship_routine"
			],
			[
				"question" => "Makanan yang saya makan selalu makanan yang halal",
				"group" => "eat_drink_halal"
			],
			[
				"question" => "Minuman yang saya makan selalu minuman yang halal",
				"group" => "eat_drink_halal"
			],
			[
				"question" => "Makanan yang saya makan selalu makanan yang baik untuk kesehatan (thayyib)",
				"group" => "eat_drink_halal"
			],
			[
				"question" => "Minuman yang saya makan selalu minuman yang baik untuk kesehatan (thayyib)",
				"group" => "eat_drink_halal"
			],
			[
				"question" => "Saya selalu berhenti makan sebelum kenyang",
				"group" => "eat_drink_halal"
			],
			[
				"question" => "Saya suka bersedekah (uang. makanan, dill)",
				"group" => "give_charity_do_good"
			],
			[
				"question" => "Saya yakin dengan bersedekah bisa membantu menyembuhkan penyakit saya",
				"group" => "give_charity_do_good"
			],
			[
				"question" => "Saya merasa bahagia jika bisa berbagi dengan orang lain",
				"group" => "give_charity_do_good"
			],
			[
				"question" => "Saya merasa bahagia jika bisa membantu orang lain",
				"group" => "give_charity_do_good"
			]
		];
		$apgars = [
			"Saya merasa sangat puas karena saya dapat meminta pertolongan kepada keluarga saya ketika saya menghadapi permasalahan.",
			"Saya merasa puas dengan cara keluarga saya membahas berbagai hal dengan saya dan berbagi masalah dengan saya.",
			"Saya merasa puas karena keluarga saya menerima dan mendukung keinginan-keinginan saya untuk memulai kegiatan atau tujuan baru dalam hidup saya.",
			"Saya merasa puas dengan cara keluarga saya mengungkapkan kasih sayang dan menanggapi perasaan-perasaan saya, seperti kemarahan, kesedihan dan cinta.",
			"Saya merasa puas dengan cara keluarga saya dan saya berbagi waktu bersama."
		];
		$screems = [
			"Social",
			"Cultural",
			"Religious",
			"Educational",
			"Economic",
			"Medical"
		];
		$screems_religious_perception = [
			[
				"question" => "Penyakit yang saya alami datangnya karena kehendak Allah",
				"group" => "screems_patient_faith"
			],
			[
				"question" => "Saya menerima dengan ikhlas penyakit yang Allah berikan kepada saya",
				"group" => "screems_patient_faith"
			],
			[
				"question" => "Saya sabar dalam menjalani masa pengobatan",
				"group" => "screems_patient_faith"
			],
			[
				"question" => "Penyakit yang Allah berikan bisa membersihkan dosa-dosa saya",
				"group" => "screems_patient_faith"
			],
			[
				"question" => "Saya yakin Allah akan memberikan kesembuhan kepada saya",
				"group" => "screems_patient_faith"
			]
		];
		$phbs = [
			"Persalinan ditolong oleh tenaga kesehatan",
			"Pemberian ASI eksklusif pada bayi usia 0 - 6 bulan",
			"Menimbang berat badan balita setiap bulan",
			"Menggunakan air bersih yang memenuhi syarat kesehatan",
			"Mencuci tangan dengan air bersih dan sabun",
			"Menggunakan jamban sehat",
			"Melakukan pemberantasan sarang nyamuk di rumah dan Lingkungannya sekali seminggu",
			"Mengkonsumsi sayuran dan atau buah setiap hari",
			"Melakukan aktivitas fisik atau olahraga",
			"Tidak merokok di dalam rumah"
		];
		$komponen_rumah = [
			[
				"komponen" => "Langit - langit",
				"kriteria" => [
					"Tidak Ada",
					"Ada, kotor, sulit dibersihkan, dan rawan kecelakaan",
					"Ada, bersih dan tidak rawan kecelakaan"
				],
				"point" => [0, 1, 2],
				"group" => "home_components"
			],
			[
				"komponen" => "Dinding",
				"kriteria" => [
					"Bukan tembok (terbuat dari anyaman bambu/ilalang)",
					"Semi permanen/setengah tembok/pasangan bata atau batu yang tidak diplester/papan yang tidak kedap air",
					"Permanen (Tembok/pasangan batu bata yang diplester/papan kedap air)"
				],
				"point" => [1, 2, 3],
				"group" => "home_components"
			],
			[
				"komponen" => "Lantai",
				"kriteria" => [
					"Tanah",
					"Papan/anyaman bambu dekat dengan tanah/plesteran yang retak dan berdebu",
					"Diplester/ubin/keramik/papan (rumah panggung)"
				],
				"point" => [1, 2, 3],
				"group" => "home_components"
			],
			[
				"komponen" => "Ruang untuk istirahat / tidur",
				"kriteria" => [
					"Ukuran kamar tidur < 8m2 untuk 2 orang, tidak dipisah antara kamar tidur orang tua dan anak, dan tidak dipisah antara kamar tidur anak laki dan perempuan",
					"Ukuran kamar tidur ≥ 8m2 untuk 2 orang, dipisah antara kamar tidur orang tua dan anak, tidak dipisah antara kamar tidur anak laki dan perempuan",
					"Ukuran kamar tidur ≥ 8m2 untuk 2 orang, dipisah antara kamar tidur orang tua dan anak, dipisah antara kamar tidur anak laki dan perempuan"
				],
				"point" => [1, 2, 3],
				"group" => "home_components"
			],
			[
				"komponen" => "Jendela Kamar Tidur",
				"kriteria" => [
					"Tidak Ada",
					"Ada dan tidak memenuhi syarat (< 5% luas lantai ruangan kamar tidur)",
					"Ada dan memenuhi syarat (≥ 5% luas lantai ruang keluarga)"
				],
				"point" => [0, 1, 2],
				"group" => "home_components"
			],
			[
				"komponen" => "Jendela Ruang Keluarga",
				"kriteria" => [
					"Tidak Ada",
					"Ada dan tidak memenuhi syarat (< 5% luas lantai ruang keluarga)",
					"Ada dan memenuhi syarat (≥ 5% luas lantai ruang keluarga)"
				],
				"point" => [0, 1, 2],
				"group" => "home_components"
			],
			[
				"komponen" => "Ventilasi",
				"kriteria" => [
					"Tidak Ada",
					"Ada, lubang ventilasi dapur < 10% dari luas lantai",
					"Ada, lubang ventilasi > 10% dari luas lantai"
				],
				"point" => [0, 1, 2],
				"group" => "home_components"
			],
			[
				"komponen" => "Lubang Asap Dapur",
				"kriteria" => [
					"Tidak Ada",
					"Ada, lubang ventilasi dapur < 10% dari luas lantai dapur",
					"Ada, lubang ventilasi dapur > 10% dari luas lantai dapur (asap keluar dengan sempurna) atau ada exhaust fan atau ada peralatan lain yang sejenis."
				],
				"point" => [0, 1, 2],
				"group" => "home_components"
			],
			[
				"komponen" => "Pencahayaan",
				"kriteria" => [
					"Tidak terang, tidak dapat dipergunakan untuk membaca",
					"Kurang terang, sehingga kurang jelas untuk membaca dengan normal",
					"Terang dan tidak silau sehingga dapat dipergunakan untuk membaca dengan normal."
				],
				"point" => [0, 1, 2],
				"group" => "home_components"
			],
		];
		$sarana_sanitasi = [
			[
				"komponen" => "<span>Sarana Air Bersih Keterangan:<br/><br/> Syarat kesehatan fisik air bersih: Air tidak berwarna, tidak berbau, jernih dengan suhu di bawah suhu udara sehingga menimbulkan rasa nyaman</span>",
				"kriteria" => [
					"Tidak Ada",
					"Ada, bukan milik sendiri dan tidak memenuhi syarat kesehatan fisik air bersih",
					"Ada, milik sendiri dan tidak memenuhi syarat kesehatan fisik air bersih",
					"Ada, milik sendiri dan memenuhi syarat kesehatan fisik air bersih",
					"Ada, bukan milik sendiri dan memenuhi syarat kesehatan fisik air bersih"
				],
				"point" => [0, 1, 2, 3, 4],
				"group" => "sanitation_facilities"
			],
			[
				"komponen" => "<span>Jamban (sarana pembuangan kotoran)</span>",
				"kriteria" => [
					"Tidak Ada",
					"Ada, bukan leher angsa, tidak ada tutup, disalurkan ke sungai / kolam",
					"Ada, bukan leher angsa, ada tutup, disalurkan ke sungai atau kolam",
					"Ada, bukan leher angsa, ada tutup, septic tank",
					"Ada, leher angsa, septic tank, memenuhi pembuangan kotoran BAB yang baik"
				],
				"point" => [0, 1, 2, 3, 4],
				"group" => "sanitation_facilities"
			],
			[
				"komponen" => "<span>Sarana Pembuangan Air Limbah (SPAL) Keterangan:
				<br />
				Pembuangan kotoran BAB yang baik:
				<br /><br />
				1.  Kotoran manusia tidak mencemari permukaan tanah.
				<br />
				2. Kotoran manusia tidak mencemari air permukaan/ air tanah.
				<br />
				3. Kotoran manusia tidak dijamah lalat.
				<br />
				4. Jamban tidak menimbulkan bau yang mengganggu Konstruksi jamban tidak menimbulkan kecelakaan</span>",
				"kriteria" => [
					"Tidak ada, sehingga tergenang tidak teratur di halaman",
					"Ada, diresapkan tetapi mencemari sumber air (jarak sumber air : (jarak dengan sumber air < 10m)",
					"Ada, dialirkan ke selokan terbuka",
					"Ada, diresapkan dan tidak mencemari sumber air (jarak dengan sumber air ≥ 10m)",
					"Ada, dialirkan ke selokan tertutup (saluran kota) untuk diolah lebih lanjut"
				],
				"point" => [0, 1, 2, 3, 4],
				"group" => "sanitation_facilities"
			],
			[
				"komponen" => "<span>Saran Pembuangan Sampah/Tempat Sampah</span>",
				"kriteria" => [
					"Tidak Ada",
					"Ada, tetapi tidak kedap air dan tidak ada tutup",
					"Ada, kedap air dan tidak bertutup",
					"Ada, kedap air dan bertutup",
				],
				"point" => [0, 1, 2, 3],
				"group" => "sanitation_facilities"
			],
		];
		$perilaku_penghuni = [
			[
				"komponen" => "Membuka Jendela Kamar Tidur",
				"kriteria" => [
					"Tidak pernah dibuka",
					"Kadang-kadang",
					"Setiap hari dibuka"
				],
				"point" => [0, 1, 2],
				"group" => "occupant_behavior"
			],
			[
				"komponen" => "Membuka Jendela Ruang Keluarga",
				"kriteria" => [
					"Tidak pernah dibuka",
					"Kadang-kadang",
					"Setiap hari dibuka"
				],
				"point" => [0, 1, 2],
				"group" => "occupant_behavior"
			],
			[
				"komponen" => "Membersihkan rumah dan halaman",
				"kriteria" => [
					"Tidak pernah dibuka",
					"Kadang-kadang",
					"Setiap hari"
				],
				"point" => [0, 1, 2],
				"group" => "occupant_behavior"
			],
			[
				"komponen" => "Membuang tinja bayi dan balita ke jamban",
				"kriteria" => [
					"Dibuang ke sungai/kebun/kolam sembarangan",
					"Kadang-kadang ke jamban",
					"Setiap hari dibuang ke jamban"
				],
				"point" => [0, 1, 2],
				"group" => "occupant_behavior"
			],
			[
				"komponen" => "Membuang sampah pada tempat sampah",
				"kriteria" => [
					"Dibuang ke sungai/kebun/kolam sembarangan",
					"Kadang-kadang dibuang ke tempat sampah",
					"Setiap hari dibuang ke tempat sampah"
				],
				"point" => [0, 1, 2],
				"group" => "occupant_behavior"
			],
		];
		return view("dashboard.inspection-new", compact("uuid", "anamnesis", "apgars", "screems", "screems_religious_perception", "phbs", "komponen_rumah", "sarana_sanitasi", "perilaku_penghuni", "inspection"));
	}

	public function inspectionStore(Request $request) {
		// dd($request->home_visit_results);
		try {
			DB::beginTransaction();

			$patient = Patient::where("uuid", $request->uuid)->first();
			if (!$patient) throw new \Exception("Error, patient not found!");

			$inspection = new Inspection();
			$inspection->patient_id = $patient->id;
			$inspection->inspections_code = Str::uuid();
			$inspection->main_complaint = $request->main_complaint;
			$inspection->family_history_disease = $request->family_history_disease;
			$inspection->history_current_illness = $request->history_current_illness;
			$inspection->personal_social_history = $request->personal_social_history;
			$inspection->past_medical_history = $request->past_medical_history;
			$inspection->system_review = $request->system_review;
			$inspection->family_genogram = $request->family_genogram;
			$inspection->family_map = $request->family_map;
			$inspection->family_structure = $request->family_structure;
			$inspection->family_life_cycle = $request->family_life_cycle;
			$inspection->family_apgar = $request->family_apgar;
			$inspection->family_screem = $request->family_screem;
			$inspection->family_life_line = $request->family_life_line;
			$inspection->general_condition = $request->general_condition;
			$inspection->awareness = $request->awareness;
			$inspection->body_height = $request->body_height;
			$inspection->body_weight = $request->body_weight;
			$inspection->body_waist_size = $request->body_waist_size;
			$inspection->body_hip_circumference = $request->body_hip_circumference;
			$inspection->body_upper_arm_circumference = $request->body_upper_arm_circumference;
			$inspection->body_mass_index = $request->body_mass_index;
			$inspection->body_hip_ratio = $request->body_hip_ratio;
			$inspection->body_status_nutrition = $request->body_status_nutrition;
			$inspection->general_examination_head = $request->general_examination_head;
			$inspection->general_examination_abdomen = $request->general_examination_abdomen;
			$inspection->general_examination_neck = $request->general_examination_neck;
			$inspection->general_examination_anogenital = $request->general_examination_anogenital;
			$inspection->general_examination_thoraks = $request->general_examination_thoraks;
			$inspection->general_examination_ekstremitas = $request->general_examination_ekstremitas;
			$inspection->special_inspection = $request->special_inspection;
			$inspection->nutritional_status_and_physical_activity = $request->nutritional_status_and_physical_activity;
			$inspection->laboratory_examination = $request->laboratory_examination;
			$inspection->radiological_examination = $request->radiological_examination;
			$inspection->other_examination = $request->other_examination;
			$inspection->differential_diagnosis = $request->differential_diagnosis;
			$inspection->conclusion_examination = $request->conclusion_examination;
			$inspection->healthy_home_assessment = $request->healthy_home_assessment;
			$inspection->holistic_diagnosis_clinical = $request->holistic_diagnosis_clinical;
			$inspection->holistic_diagnosis_personal = $request->holistic_diagnosis_personal;
			$inspection->holistic_diagnosis_internal_risk = $request->holistic_diagnosis_internal_risk;
			$inspection->holistic_diagnosis_external_risk = $request->holistic_diagnosis_external_risk;
			$inspection->holistic_diagnosis_functional_degree = $request->holistic_diagnosis_functional_degree;
			$inspection->holistic_diagnosis_description = $request->holistic_diagnosis_description;
			$inspection->patient_centered = $request->patient_centered;
			$inspection->family_focused = $request->family_focused;
			$inspection->community_oriented = $request->community_oriented;
			$inspection->house_condition = $request->house_condition;
			$inspection->impression = $request->impression;
			$inspection->environment_around_house = $request->environment_around_house;
			$inspection->work_environment = $request->work_environment;
			$inspection->ad_vitam = $request->ad_vitam;
			$inspection->ad_functionam = $request->ad_functionam;
			$inspection->ad_sanationam = $request->ad_sanationam;
			$inspection->save();

			if ($request->analysis_illness_experiences) {
				foreach ($request->analysis_illness_experiences["group"] as $key => $value) {
					$illness = new AnalysisIllnessExperiences();
					$illness->inspection_id = $inspection->id;
					$illness->group = $value;
					$illness->question = $request->analysis_illness_experiences["question"][$key];
					$illness->point = $request->analysis_illness_experiences["point"][$key];
					$illness->save();
				}
			}

			if ($request->family_apgars) {
				foreach ($request->family_apgars["question"] as $key => $value) {
					$apgars = new FamilyApgar();
					$apgars->inspection_id = $inspection->id;
					$apgars->question = $value;
					$apgars->point = $request->family_apgars["point"][$key];
					$apgars->save();
				}
			}

			if ($request->family_screems) {
				foreach ($request->family_screems["group"] as $key => $value) {
					$screems = new FamilyScreem();
					$screems->inspection_id = $inspection->id;
					$screems->group = $value;
					$screems->question = $request->family_screems["question"][$key];
					$screems->point = $request->family_screems["point"][$key];
					$screems->save();
				}
			}

			if ($request->phbs_indicators) {
				foreach ($request->phbs_indicators["question"] as $key => $value) {
					$phbs = new PhbsIndicator();
					$phbs->inspection_id = $inspection->id;
					$phbs->question = $request->phbs_indicators["question"][$key];
					$phbs->answer = $request->phbs_indicators["answer"][$key] == "true" ? 1 : 0;
					$phbs->save();
				}
			}

			if ($request->healthy_home_assessments) {
				foreach ($request->healthy_home_assessments["group"] as $key => $value) {
					$home_assessments = new HealthyHomeAssessment();
					$home_assessments->inspection_id = $inspection->id;
					$home_assessments->group = $value;
					$home_assessments->question = $request->healthy_home_assessments["question"][$key];
					$home_assessments->point = $request->healthy_home_assessments["point"][$key];
					$home_assessments->save();
				}
			}

			if ($request->screem_aspects) {
				foreach ($request->screem_aspects["question"] as $key => $value) {
					$screem_aspects = new ScreemAspect();
					$screem_aspects->inspection_id = $inspection->id;
					$screem_aspects->question = $value;
					$screem_aspects->strength = $request->screem_aspects["strength"][$key];
					$screem_aspects->weakness = $request->screem_aspects["weakness"][$key];
					$screem_aspects->save();
				}
			}

			if ($request->main_families) {
				foreach ($request->main_families["name"] as $key => $value) {
					$gender = $request->main_families["gender"][$key];
					$birth_date = $request->main_families["birth_date"][$key];
					if ($value && $gender && $birth_date) {
						$main_families = new MainFamily();
						$main_families->inspection_id = $inspection->id;
						$main_families->name = $value;
						$main_families->gender = $gender;
						$main_families->birth_date = date("Y-m-d", strtotime($birth_date));
						$main_families->job = $request->main_families["job"][$key];
						$main_families->health_status = $request->main_families["health_status"][$key];
						$main_families->save();
					}
				}
			}

			if ($request->family_life_lines) {
				foreach ($request->family_life_lines["year"] as $key => $value) {
					$age = $request->family_life_lines["age"][$key];
					$life_events = $request->family_life_lines["life_events"][$key];
					$family_illness = $request->family_life_lines["illness"][$key];
					if ($value && $age && $life_events && $family_illness) {
						$family_life_lines = new FamilyLifeLine();
						$family_life_lines->inspection_id = $inspection->id;
						$family_life_lines->year = $value;
						$family_life_lines->age = $age;
						$family_life_lines->life_events = $life_events;
						$family_life_lines->illness = $family_illness;
						$family_life_lines->save();
					}
				}
			}

			if ($request->family_focuseds) {
				foreach ($request->family_focuseds["name"] as $key => $value) {
					$family_focuseds_age = $request->family_focuseds["age"][$key];
					$health_status = $request->family_focuseds["health_status"][$key];
					$risk_disease = $request->family_focuseds["risk_disease"][$key];
					$preventive_intervention = $request->family_focuseds["preventive_intervention"][$key];
					if ($value && $family_focuseds_age && $health_status && $risk_disease && $preventive_intervention) {
						$family_focuseds = new FamilyFocused();
						$family_focuseds->inspection_id = $inspection->id;
						$family_focuseds->name = $value;
						$family_focuseds->age = $family_focuseds_age;
						$family_focuseds->health_status = $health_status;
						$family_focuseds->risk_disease = $risk_disease;
						$family_focuseds->preventive_intervention = $preventive_intervention;
						$family_focuseds->save();
					}
				}
			}

			if ($request->home_visit_results) {
				foreach ($request->home_visit_results["visit_number"] as $key => $value) {
					$visit_date = $request->home_visit_results["visit_date"][$key];
					$note = $request->home_visit_results["note"][$key];
					if ($value && $visit_date) {
						$home_visit_results = new HomeVisitResults();
						$home_visit_results->inspection_id = $inspection->id;
						$home_visit_results->visit_number = $value;
						$home_visit_results->visit_date = $visit_date;
						$home_visit_results->note = $note;
						$home_visit_results->save();
					}
				}
			}

			DB::commit();
			return response()->json(["message" => "Oke"]);
		} catch (\Exception $e) {
			DB::rollBack();
			return response()->json(["message" => $e->getMessage(), "status" => false], 400);
		}
	}

	public function inspectionUpdate(Request $request) {
		// dd($request->analysis_illness_experiences);
		try {
			DB::beginTransaction();
			
			$patient = Patient::where("uuid", $request->uuid)->first();
			if (!$patient) throw new \Exception("Error, patient not found!");
			if(!$patient->inspection) throw new \Exception("Error, inspection not found 1");

			$inspection = Inspection::where("id", $patient->inspection->id)->first();
			if (!$inspection) throw new \Exception("Error, inspection not found 2");

			$inspection->patient_id = $patient->id;
			$inspection->inspections_code = Str::uuid();
			$inspection->main_complaint = $request->main_complaint;
			$inspection->family_history_disease = $request->family_history_disease;
			$inspection->history_current_illness = $request->history_current_illness;
			$inspection->personal_social_history = $request->personal_social_history;
			$inspection->past_medical_history = $request->past_medical_history;
			$inspection->system_review = $request->system_review;
			$inspection->family_genogram = $request->family_genogram;
			$inspection->family_map = $request->family_map;
			$inspection->family_structure = $request->family_structure;
			$inspection->family_life_cycle = $request->family_life_cycle;
			$inspection->family_apgar = $request->family_apgar;
			$inspection->family_screem = $request->family_screem;
			$inspection->family_life_line = $request->family_life_line;
			$inspection->general_condition = $request->general_condition;
			$inspection->awareness = $request->awareness;
			$inspection->body_height = $request->body_height;
			$inspection->body_weight = $request->body_weight;
			$inspection->body_waist_size = $request->body_waist_size;
			$inspection->body_hip_circumference = $request->body_hip_circumference;
			$inspection->body_upper_arm_circumference = $request->body_upper_arm_circumference;
			$inspection->body_mass_index = $request->body_mass_index;
			$inspection->body_hip_ratio = $request->body_hip_ratio;
			$inspection->body_status_nutrition = $request->body_status_nutrition;
			$inspection->general_examination_head = $request->general_examination_head;
			$inspection->general_examination_abdomen = $request->general_examination_abdomen;
			$inspection->general_examination_neck = $request->general_examination_neck;
			$inspection->general_examination_anogenital = $request->general_examination_anogenital;
			$inspection->general_examination_thoraks = $request->general_examination_thoraks;
			$inspection->general_examination_ekstremitas = $request->general_examination_ekstremitas;
			$inspection->special_inspection = $request->special_inspection;
			$inspection->nutritional_status_and_physical_activity = $request->nutritional_status_and_physical_activity;
			$inspection->laboratory_examination = $request->laboratory_examination;
			$inspection->radiological_examination = $request->radiological_examination;
			$inspection->other_examination = $request->other_examination;
			$inspection->differential_diagnosis = $request->differential_diagnosis;
			$inspection->conclusion_examination = $request->conclusion_examination;
			$inspection->healthy_home_assessment = $request->healthy_home_assessment;
			$inspection->holistic_diagnosis_clinical = $request->holistic_diagnosis_clinical;
			$inspection->holistic_diagnosis_personal = $request->holistic_diagnosis_personal;
			$inspection->holistic_diagnosis_internal_risk = $request->holistic_diagnosis_internal_risk;
			$inspection->holistic_diagnosis_external_risk = $request->holistic_diagnosis_external_risk;
			$inspection->holistic_diagnosis_functional_degree = $request->holistic_diagnosis_functional_degree;
			$inspection->holistic_diagnosis_description = $request->holistic_diagnosis_description;
			$inspection->patient_centered = $request->patient_centered;
			$inspection->family_focused = $request->family_focused;
			$inspection->community_oriented = $request->community_oriented;
			$inspection->house_condition = $request->house_condition;
			$inspection->impression = $request->impression;
			$inspection->environment_around_house = $request->environment_around_house;
			$inspection->work_environment = $request->work_environment;
			$inspection->ad_vitam = $request->ad_vitam;
			$inspection->ad_functionam = $request->ad_functionam;
			$inspection->ad_sanationam = $request->ad_sanationam;
			$inspection->save();

			$inspection->illness()->delete();
			if ($request->analysis_illness_experiences) {
				foreach ($request->analysis_illness_experiences["group"] as $key => $value) {
					$illness = new AnalysisIllnessExperiences();
					$illness->inspection_id = $inspection->id;
					$illness->group = $value;
					$illness->question = $request->analysis_illness_experiences["question"][$key];
					$illness->point = $request->analysis_illness_experiences["point"][$key];
					$illness->save();
				}
			}

			$inspection->family_apgrs()->delete();
			if ($request->family_apgars) {
				foreach ($request->family_apgars["question"] as $key => $value) {
					$apgars = new FamilyApgar();
					$apgars->inspection_id = $inspection->id;
					$apgars->question = $value;
					$apgars->point = $request->family_apgars["point"][$key];
					$apgars->save();
				}
			}

			$inspection->family_screems()->delete();
			if ($request->family_screems) {
				foreach ($request->family_screems["group"] as $key => $value) {
					$screems = new FamilyScreem();
					$screems->inspection_id = $inspection->id;
					$screems->group = $value;
					$screems->question = $request->family_screems["question"][$key];
					$screems->point = $request->family_screems["point"][$key];
					$screems->save();
				}
			}

			$inspection->phbs_indicators()->delete();
			if ($request->phbs_indicators) {
				foreach ($request->phbs_indicators["question"] as $key => $value) {
					$phbs = new PhbsIndicator();
					$phbs->inspection_id = $inspection->id;
					$phbs->question = $request->phbs_indicators["question"][$key];
					$phbs->answer = $request->phbs_indicators["answer"][$key] == "true" ? 1 : 0;
					$phbs->save();
				}
			}

			$inspection->healthy_home_assessments()->delete();
			if ($request->healthy_home_assessments) {
				foreach ($request->healthy_home_assessments["group"] as $key => $value) {
					$home_assessments = new HealthyHomeAssessment();
					$home_assessments->inspection_id = $inspection->id;
					$home_assessments->group = $value;
					$home_assessments->question = $request->healthy_home_assessments["question"][$key];
					$home_assessments->point = $request->healthy_home_assessments["point"][$key];
					$home_assessments->save();
				}
			}

			$inspection->screem_aspects()->delete();
			if ($request->screem_aspects) {
				foreach ($request->screem_aspects["question"] as $key => $value) {
					$screem_aspects = new ScreemAspect();
					$screem_aspects->inspection_id = $inspection->id;
					$screem_aspects->question = $value;
					$screem_aspects->strength = $request->screem_aspects["strength"][$key];
					$screem_aspects->weakness = $request->screem_aspects["weakness"][$key];
					$screem_aspects->save();
				}
			}

			$inspection->main_families()->delete();
			if ($request->main_families) {
				foreach ($request->main_families["name"] as $key => $value) {
					$gender = $request->main_families["gender"][$key];
					$birth_date = $request->main_families["birth_date"][$key];
					if ($value && $gender && $birth_date) {
						$main_families = new MainFamily();
						$main_families->inspection_id = $inspection->id;
						$main_families->name = $value;
						$main_families->gender = $gender;
						$main_families->birth_date = date("Y-m-d", strtotime($birth_date));
						$main_families->job = $request->main_families["job"][$key];
						$main_families->health_status = $request->main_families["health_status"][$key];
						$main_families->save();
					}
				}
			}

			$inspection->family_life_lines()->delete();
			if ($request->family_life_lines) {
				foreach ($request->family_life_lines["year"] as $key => $value) {
					$age = $request->family_life_lines["age"][$key];
					$life_events = $request->family_life_lines["life_events"][$key];
					$family_illness = $request->family_life_lines["illness"][$key];
					if ($value && $age && $life_events && $family_illness) {
						$family_life_lines = new FamilyLifeLine();
						$family_life_lines->inspection_id = $inspection->id;
						$family_life_lines->year = $value;
						$family_life_lines->age = $age;
						$family_life_lines->life_events = $life_events;
						$family_life_lines->illness = $family_illness;
						$family_life_lines->save();
					}
				}
			}

			$inspection->family_focuseds()->delete();
			if ($request->family_focuseds) {
				foreach ($request->family_focuseds["name"] as $key => $value) {
					$family_focuseds_age = $request->family_focuseds["age"][$key];
					$health_status = $request->family_focuseds["health_status"][$key];
					$risk_disease = $request->family_focuseds["risk_disease"][$key];
					$preventive_intervention = $request->family_focuseds["preventive_intervention"][$key];
					if ($value && $family_focuseds_age && $health_status && $risk_disease && $preventive_intervention) {
						$family_focuseds = new FamilyFocused();
						$family_focuseds->inspection_id = $inspection->id;
						$family_focuseds->name = $value;
						$family_focuseds->age = $family_focuseds_age;
						$family_focuseds->health_status = $health_status;
						$family_focuseds->risk_disease = $risk_disease;
						$family_focuseds->preventive_intervention = $preventive_intervention;
						$family_focuseds->save();
					}
				}
			}

			$inspection->home_visit_results()->delete();
			if ($request->home_visit_results) {
				foreach ($request->home_visit_results["visit_number"] as $key => $value) {
					$visit_date = $request->home_visit_results["visit_date"][$key];
					$note = $request->home_visit_results["note"][$key];
					if ($value && $visit_date) {
						$home_visit_results = new HomeVisitResults();
						$home_visit_results->inspection_id = $inspection->id;
						$home_visit_results->visit_number = $value;
						$home_visit_results->visit_date = $visit_date;
						$home_visit_results->note = $note;
						$home_visit_results->save();
					}
				}
			}

			DB::commit();
			return response()->json(["message" => "Oke"]);
		} catch (\Exception $e) {
			DB::rollBack();
			return response()->json(["message" => $e->getMessage(), "status" => false], 400);
		}
	}

	public function report() {
		return view("dashboard.report");
	}
}
