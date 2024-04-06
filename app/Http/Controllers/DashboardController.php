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
		$religious_perception = [
			"Penyakit yang saya alami datangnya karena kehendak Allah",
			"Saya menerima dengan ikhlas penyakit yang Allah berikan kepada saya",
			"Saya sabar dalam menjalani masa pengobatan",
			"Penyakit yang Allah berikan bisa membersihkan dosa-dosa saya",
			"Saya yakin Allah akan memberikan kesembuhan kepada saya"
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
				"point" => [0, 1, 2]
			],
			[
				"komponen" => "Dinding",
				"kriteria" => [
					"Bukan tembok (terbuat dari anyaman bambu/ilalang)",
					"Semi permanen/setengah tembok/pasangan bata atau batu yang tidak diplester/papan yang tidak kedap air",
					"Permanen (Tembok/pasangan batu bata yang diplester/papan kedap air)"
				],
				"point" => [1, 2, 3]
			],
			[
				"komponen" => "Lantai",
				"kriteria" => [
					"Tanah",
					"Papan/anyaman bambu dekat dengan tanah/plesteran yang retak dan berdebu",
					"Diplester/ubin/keramik/papan (rumah panggung)"
				],
				"point" => [1, 2, 3]
			],
			[
				"komponen" => "Ruang untuk istirahat / tidur",
				"kriteria" => [
					"Ukuran kamar tidur < 8m2 untuk 2 orang, tidak dipisah antara kamar tidur orang tua dan anak, dan tidak dipisah antara kamar tidur anak laki dan perempuan",
					"Ukuran kamar tidur ≥ 8m2 untuk 2 orang, dipisah antara kamar tidur orang tua dan anak, tidak dipisah antara kamar tidur anak laki dan perempuan",
					"Ukuran kamar tidur ≥ 8m2 untuk 2 orang, dipisah antara kamar tidur orang tua dan anak, dipisah antara kamar tidur anak laki dan perempuan"
				],
				"point" => [1, 2, 3]
			],
			[
				"komponen" => "Jendela Kamar Tidur",
				"kriteria" => [
					"Tidak Ada",
					"Ada dan tidak memenuhi syarat (< 5% luas lantai ruangan kamar tidur)",
					"Ada dan memenuhi syarat (≥ 5% luas lantai ruang keluarga)"
				],
				"point" => [0, 1, 2]
			],
			[
				"komponen" => "Jendela Ruang Keluarga",
				"kriteria" => [
					"Tidak Ada",
					"Ada dan tidak memenuhi syarat (< 5% luas lantai ruang keluarga)",
					"Ada dan memenuhi syarat (≥ 5% luas lantai ruang keluarga)"
				],
				"point" => [0, 1, 2]
			],
			[
				"komponen" => "Ventilasi",
				"kriteria" => [
					"Tidak Ada",
					"Ada, lubang ventilasi dapur < 10% dari luas lantai",
					"Ada, lubang ventilasi > 10% dari luas lantai"
				],
				"point" => [0, 1, 2]
			],
			[
				"komponen" => "Lubang Asap Dapur",
				"kriteria" => [
					"Tidak Ada",
					"Ada, lubang ventilasi dapur < 10% dari luas lantai dapur",
					"Ada, lubang ventilasi dapur > 10% dari luas lantai dapur (asap keluar dengan sempurna) atau ada exhaust fan atau ada peralatan lain yang sejenis."
				],
				"point" => [0, 1, 2]
			],
			[
				"komponen" => "Pencahayaan",
				"kriteria" => [
					"Tidak terang, tidak dapat dipergunakan untuk membaca",
					"Kurang terang, sehingga kurang jelas untuk membaca dengan normal",
					"Terang dan tidak silau sehingga dapat dipergunakan untuk membaca dengan normal."
				],
				"point" => [0, 1, 2]
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
				"point" => [0, 1, 2, 3, 4]
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
				"point" => [0, 1, 2, 3, 4]
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
				"point" => [0, 1, 2, 3, 4]
			],
			[
				"komponen" => "<span>Saran Pembuangan Sampah/Tempat Sampah</span>",
				"kriteria" => [
					"Tidak Ada",
					"Ada, tetapi tidak kedap air dan tidak ada tutup",
					"Ada, kedap air dan tidak bertutup",
					"Ada, kedap air dan bertutup",
				],
				"point" => [0, 1, 2, 3]
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
				"point" => [0, 1, 2]
			],
			[
				"komponen" => "Membuka Jendela Ruang Keluarga",
				"kriteria" => [
					"Tidak pernah dibuka",
					"Kadang-kadang",
					"Setiap hari dibuka"
				],
				"point" => [0, 1, 2]
			],
			[
				"komponen" => "Membersihkan rumah dan halaman",
				"kriteria" => [
					"Tidak pernah dibuka",
					"Kadang-kadang",
					"Setiap hari"
				],
				"point" => [0, 1, 2]
			],
			[
				"komponen" => "Membuang tinja bayi dan balita ke jamban",
				"kriteria" => [
					"Dibuang ke sungai/kebun/kolam sembarangan",
					"Kadang-kadang ke jamban",
					"Setiap hari dibuang ke jamban"
				],
				"point" => [0, 1, 2]
			],
			[
				"komponen" => "Membuang sampah pada tempat sampah",
				"kriteria" => [
					"Dibuang ke sungai/kebun/kolam sembarangan",
					"Kadang-kadang dibuang ke tempat sampah",
					"Setiap hari dibuang ke tempat sampah"
				],
				"point" => [0, 1, 2]
			],
		];
		return view("dashboard.inspection-new", compact("anamnesis", "apgars", "screems", "religious_perception", "phbs", "komponen_rumah", "sarana_sanitasi", "perilaku_penghuni"));
	}

	public function report() {
		return view("dashboard.report");
	}
}
