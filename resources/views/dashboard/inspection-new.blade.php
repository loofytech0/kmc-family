@extends("layouts.app-layout")
@section("inspection", "active shadow-lg")

@section("content")
<div class="uppercase font-semibold text-center text-lg md:text-2xl">pemeriksaan pasien</div>
<div style="margin-top: 80px">
  <div class="mb-6">
    <div class="mb-4 font-bold">ANAMNESIS PENYAKIT</div>
    <div class="grid grid-cols-2 gap-5 mb-6">
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Keluhan Utama :</span>
        <textarea id="main_complaint" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Penyakit Keluarga :</span>
        <textarea id="family_history_disease" rows="3" class="border-0 shadow-none outline-none" placeholder="(Uraikan penyakit yang ada pada keluarga termasuk Riwayat pengobatan. Diagram Riwayat keluarga disusun dalam bentuk genogram digambarkan terpisah)"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Penyakit Sekarang :</span>
        <textarea id="history_current_illness" rows="3" class="border-0 shadow-none outline-none" placeholder="(Uraikan sejak timbul hingga berkembangnya penyakit, obat-obatan yang telah diminum, pelayanan kesehatan yang telah didapatkan termasuk sikap dan perilaku klien, keluarga dan lingkungan terhadap masalah yang ada)"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Personal Sosial :</span>
        <textarea id="personal_social_history" rows="3" class="border-0 shadow-none outline-none" placeholder="(Uraikan pula factor risiko yang ada pada klien dan keluarganya dengan menggali berbagai permasalahan dalam aspek-aspek pendidikan, pekerjaan, keluarga asal dan rumah tangga sekarang, serta minat dan gaya hidup)"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Penyakit Dahulu (beserta pengobatan) :</span>
        <textarea id="past_medical_history" rows="3" class="border-0 shadow-none outline-none" placeholder="(Uraikan penyakit yang ada pada klien, pengobatan, pembedahan dan Riwayat alergi. Uraikan pula pelayanan kesehatan yang telah diterima termasuk imunisasi dan skrining)"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Review Sistem :</span>
        <textarea id="system_review" rows="3" class="border-0 shadow-none outline-none" placeholder="(Anamnesis berdasarkan tinjauan pada semua sistem tubuh untuk mengantisipasi hal-hal yang terlewatkan sebelumnya) "></textarea>
      </div>
    </div>
    <div class="mb-2 font-bold">ANAMNESIS PENGALAMAN SAKIT (ILLNESS)</div>
    <table class="anamnesis-table mb-6">
      <tr>
        <th style="width: 60px">NO</th>
        <th>PERNYATAAN</th>
        <th style="width: 130px">Sangat Setuju</th>
        <th style="width: 130px">Setuju</th>
        <th style="width: 130px">Ragu-ragu</th>
        <th style="width: 130px">Tidak Setuju</th>
        <th style="width: 130px">Sangat Tidak Setuju</th>
      </tr>
      @foreach ($anamnesis as $key => $item)
        @if ($key == 0)
          <tr>
            <td colspan="7" class="font-bold" style="background: #D9D9D9" id="patient_faith">
              KEIMANAN PASIEN
            </td>
          </tr>
        @endif
        @if ($key == 14)
          <tr>
            <td colspan="7" class="font-bold" style="background: #D9D9D9" id="patient_worship_routine">
              RUTINITAS IBADAH PASIEN
            </td>
          </tr>
        @endif
        @if ($key == 18)
          <tr>
            <td colspan="7" class="font-bold" style="background: #D9D9D9" id="eat_drink_halal">
              MAKAN, MINUM, YANG HALAL DAN THAYYIB
            </td>
          </tr>
        @endif
        @if ($key == 23)
          <tr>
            <td colspan="7" class="font-bold" style="background: #D9D9D9" id="give_charity_do_good">
              BERSEDEKAH DAN BERBUAT BAIK
            </td>
          </tr>
        @endif
        <input type="hidden" name="analysis_illness_experiences_question" value="{{ $item["question"] }}">
        <input type="hidden" name="analysis_illness_experiences_group" value="{{ $item["group"] }}">
        <tr>
          <td class="text-center font-semibold">{{ $key + 1 }}</td>
          <td class="font-semibold">{{ $item["question"] }}</td>
          <td>
            <label for="analysis_illness_experiences-{{ $key + 1 }}-5" class="select-answer">
              <input
                type="radio"
                id="analysis_illness_experiences-{{ $key + 1 }}-5"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="5"
                class="form-control"
                data-group="analysis_illness_experiences"
              />
            </label>
          </td>
          <td>
            <label for="analysis_illness_experiences-{{ $key + 1 }}-4" class="select-answer">
              <input
                type="radio"
                id="analysis_illness_experiences-{{ $key + 1 }}-4"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="4"
                class="form-control"
                data-group="analysis_illness_experiences"
              />
            </label>
          </td>
          <td>
            <label for="analysis_illness_experiences-{{ $key + 1 }}-3" class="select-answer">
              <input
                type="radio"
                id="analysis_illness_experiences-{{ $key + 1 }}-3"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="3"
                class="form-control"
                data-group="analysis_illness_experiences"
              />
            </label>
          </td>
          <td>
            <label for="analysis_illness_experiences-{{ $key + 1 }}-2" class="select-answer">
              <input
                type="radio"
                id="analysis_illness_experiences-{{ $key + 1 }}-2"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="2"
                class="form-control"
                data-group="analysis_illness_experiences"
              />
            </label>
          </td>
          <td>
            <label for="analysis_illness_experiences-{{ $key + 1 }}-1" class="select-answer">
              <input
                type="radio"
                id="analysis_illness_experiences-{{ $key + 1 }}-1"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="1"
                class="form-control"
                data-group="analysis_illness_experiences"
              />
            </label>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="2" class="font-bold">TOTAL</td>
        <td colspan="5" class="font-bold text-center">
          <span id="analysis_illness_experiences-count">0</span>
          (<span id="analysis_illness_experiences-information">Tidak di ketahui</span>)
        </td>
      </tr>
    </table>
    <div class="mb-4 font-bold">INSTRUMEN PENILAIAN KELUARGA (FAMILY ASSESMENT TOOLS)</div>
    <div class="grid grid-cols-2 gap-5 mb-6">
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Genogram Keluarga (Family Genogram) :</span>
        <textarea id="family_genogram" rows="6" class="border-0 shadow-none outline-none" placeholder="(Buatlah genogram keluarga sesuai kaidah umum pembuatan genogram dan dilengkapi dengan keterangan/ legenda di bawahnya). Legenda (tambahkan sesuai kebutuhan):
        *B= Breadwinner
        *C= Caregiver
        *D= Decision Maker"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Peta Keluarga (Family Map) :</span>
        <textarea id="family_map" rows="6" class="border-0 shadow-none outline-none" placeholder="Mencakup keluarga inti/ tidak inti, baik yang tinggal di rumah dan tidak (Buatlah peta keluarga yang menggambarkan psikodinamika keluarga sesuai kaidah umum pembuatan peta keluarga dilengkapi dengan keterangan/legenda di bawahnya). Menggambarkan psikososial , dinamika keluarga, Jika garis tebal menunjukan kekuatan hubungan, semakin kuat makin tebal garisnya"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Bentuk Keluarga (Family Structure) :</span>
        <textarea id="family_structure" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Tahapan Siklus Kehidupan Keluarga (Family Life Cycle) :</span>
        <textarea id="family_life_cycle" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
      <div class="col-span-2 flex flex-col gap-1">
        <span class="text-sm font-semibold">APGAR Keluarga (Family APGAR) :</span>
        <textarea id="family_apgar" rows="3" class="border-0 shadow-none outline-none" placeholder="[Adaptability-Partnership-Growth-Affection-Resolve]
(Isilah instrumen APGAR berikut sebagai skrining awal untuk melihat adanya disfungsi keluarga)"></textarea>
      </div>
    </div>
    <table class="anamnesis-table mb-6">
      <tr>
        <th style="width: 60px">NO</th>
        <th>APGAR Keluarga</th>
        <th style="width: 130px">Hampir Selalu</th>
        <th style="width: 130px">Kadang - Kadang</th>
        <th style="width: 130px">Hampir Tidak Pernah</th>
      </tr>
      @foreach ($apgars as $key => $item)
        <input type="hidden" value="{{ $item }}" name="family_apgar_question">
        <tr>
          <td class="text-center font-semibold">{{ $key + 1 }}</td>
          <td class="font-semibold">{{ $item }}</td>
          <td>
            <label for="apgar-{{ $key + 1 }}2" class="select-answer">
              <input
                type="radio"
                id="apgar-{{ $key + 1 }}2"
                name="apgar-{{ $key + 1 }}"
                value="2"
                class="family_apgar_point form-control"
              />
            </label>
          </td>
          <td>
            <label for="apgar-{{ $key + 1 }}1" class="select-answer">
              <input
                type="radio"
                id="apgar-{{ $key + 1 }}1"
                name="apgar-{{ $key + 1 }}"
                value="1"
                class="family_apgar_point form-control"
              />
            </label>
          </td>
          <td>
            <label for="apgar-{{ $key + 1 }}0" class="select-answer">
              <input
                type="radio"
                id="apgar-{{ $key + 1 }}0"
                name="apgar-{{ $key + 1 }}"
                value="0"
                class="family_apgar_point form-control"
              />
            </label>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="2" class="font-bold">SKOR TOTAL</td>
        <td colspan="5" class="font-bold text-center">
          <span id="family_apgar_point">0</span>
          (<span id="family_apgar_information">Tidak di ketahui</span>)
        </td>
      </tr>
    </table>
    <div class="flex flex-col gap-1 mb-6">
      <span class="text-sm font-semibold">SCREEM Keluarga (Family SCREEM) :</span>
      <textarea id="family_screem" rows="4" class="border-0 shadow-none outline-none" placeholder="(Social-Cultural-Religious-Educational-Economic-Medical)"></textarea>
    </div>
    <table class="anamnesis-table mb-6">
      <tr>
        <th style="width: 60px">NO</th>
        <th style="width: 200px">Aspek SCREEM</th>
        <th>Kekuatan</th>
        <th>Kelemahan</th>
      </tr>
      @foreach ($screems as $key => $item)
        <tr>
          <td class="text-center font-semibold">{{ $key + 1 }}</td>
          <td class="font-semibold">{{ $item }}</td>
          <td>
            <input type="text" class="w-full" autocomplete="off">
          </td>
          <td>
            <input type="text" class="w-full" autocomplete="off">
          </td>
        </tr>
      @endforeach
    </table>
    <table class="anamnesis-table mb-6">
      <tr>
        <th style="width: 60px">NO</th>
        <th>PERNYATAAN</th>
        <th style="width: 130px">Sangat Setuju</th>
        <th style="width: 130px">Setuju</th>
        <th style="width: 130px">Ragu-ragu</th>
        <th style="width: 130px">Tidak Setuju</th>
        <th style="width: 130px">Sangat Tidak Setuju</th>
      </tr>
      @foreach ($screems_religious_perception as $key => $item)
        @if ($key == 0)
          <tr>
            <td colspan="7" class="font-bold" style="background: #D9D9D9">
              KEIMANAN PASIEN
            </td>
          </tr>
        @endif
        <input type="hidden" name="family_screems_question" value="{{ $item["question"] }}">
        <input type="hidden" name="family_screems_group" value="{{ $item["group"] }}">
        <tr>
          <td class="text-center font-semibold">{{ $key + 1 }}</td>
          <td class="font-semibold">{{ $item["question"] }}</td>
          <td>
            <label for="family_screems-{{ $key + 1 }}-5" class="select-answer">
              <input
                type="radio"
                id="family_screems-{{ $key + 1 }}-5"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="5"
                class="form-control"
                data-group="family_screems"
              />
            </label>
          </td>
          <td>
            <label for="family_screems-{{ $key + 1 }}-4" class="select-answer">
              <input
                type="radio"
                id="family_screems-{{ $key + 1 }}-4"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="4"
                class="form-control"
                data-group="family_screems"
              />
            </label>
          </td>
          <td>
            <label for="family_screems-{{ $key + 1 }}-3" class="select-answer">
              <input
                type="radio"
                id="family_screems-{{ $key + 1 }}-3"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="3"
                class="form-control"
                data-group="family_screems"
              />
            </label>
          </td>
          <td>
            <label for="family_screems-{{ $key + 1 }}-2" class="select-answer">
              <input
                type="radio"
                id="family_screems-{{ $key + 1 }}-2"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="2"
                class="form-control"
                data-group="family_screems"
              />
            </label>
          </td>
          <td>
            <label for="family_screems-{{ $key + 1 }}-1" class="select-answer">
              <input
                type="radio"
                id="family_screems-{{ $key + 1 }}-1"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="1"
                class="form-control"
                data-group="family_screems"
              />
            </label>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="2" class="font-bold">TOTAL</td>
        <td colspan="5" class="font-bold text-center">
          <span id="family_screems-count">0</span>
          (<span id="family_screems-information">Tidak di ketahui</span>)
        </td>
      </tr>
    </table>
    <div class="flex flex-col gap-1 mb-6">
      <span class="text-sm font-semibold">Perjalanan Hidup Keluarga (Family Life Line) :</span>
      <textarea id="family_life_line" rows="4" class="border-0 shadow-none outline-none" placeholder="Uraikan tentang kejadian penting/ krisis dalam kehidupan keluarga pasien yang mungkin mempengaruhi keparahan sakit pasien (misal: kecelakaan lalu lintas, penyakit/ kematian anggota keluarga, PHK, pindah rumah/ pekerjaan, bencana alam, dll.)"></textarea>
    </div>
    <table class="anamnesis-table mb-6 severity-table">
      <tr>
        <th style="width: 60px">NO</th>
        <th>Tahun</th>
        <th>Usia (Tahun)</th>
        <th>Life Events/ Crisis</th>
        <th>Severity of Illness</th>
      </tr>
      <tr class="severity-add">
        <td colspan="5" class="font-bold text-center">
          <button class="w-full" onclick="addSeverity()">+ Tambah Field</button>
        </td>
      </tr>
    </table>
    <div class="mb-4 font-bold">PEMERIKSAAN FISIK</div>
    <div class="grid grid-cols-1 mb-4 gap-3">
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Keadaan Umum :</span>
        <textarea id="general_condition" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Kesadaran :</span>
        <textarea id="awareness" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
    </div>
    <span>Antropometri:</span>
    <div class="grid grid-cols-2 mt-2 mb-6">
      <div>
        <table class="w-full">
          <tr>
            <td class="w-[180px] font-semibold">Tinggi Badan</td>
            <td class="pr-5">:</td>
            <td>
              <div class="flex items-center gap-2">
                <input id="body_height" type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
                <span class="font-semibold w-[10px]">cm</span>
              </div>
            </td>
          </tr>
          <tr>
            <td class="w-[180px] font-semibold">Berat Badan</td>
            <td class="pr-5">:</td>
            <td>
              <div class="flex items-center gap-2">
                <input id="body_weight" type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
                <span class="font-semibold w-[10px]">kg</span>
              </div>
            </td>
          </tr>
          <tr>
            <td class="w-[180px] font-semibold">Lingkar Pinggang</td>
            <td class="pr-5">:</td>
            <td>
              <div class="flex items-center gap-2">
                <input id="body_waist_size" type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
                <span class="font-semibold w-[10px]">cm</span>
              </div>
            </td>
          </tr>
          <tr>
            <td class="w-[180px] font-semibold">Lingkar Panggul</td>
            <td class="pr-5">:</td>
            <td>
              <div class="flex items-center gap-2">
                <input id="body_hip_circumference" type="text" class="form-control border-0 text-sm w-[80%]" autocomplete="off">
                <span class="font-semibold w-[10px]">cm</span>
              </div>
            </td>
          </tr>
          <tr>
            <td class="w-[180px] font-semibold">Lingkar Lengan Atas</td>
            <td class="pr-5">:</td>
            <td>
              <div class="flex items-center gap-2">
                <input id="body_upper_arm_circumference" type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
                <span class="font-semibold w-[10px]">cm</span>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <div>
        <table class="w-full">
          <tr>
            <td class="w-[220px] font-semibold">Indeks Massa Tubuh (IMT)</td>
            <td class="pr-5">:</td>
            <td>
              <input id="body_mass_index" type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
            </td>
          </tr>
          <tr>
            <td class="w-[220px] font-semibold">Waist - Hip Ratio</td>
            <td class="pr-5">:</td>
            <td>
              <input id="body_hip_ratio" type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
            </td>
          </tr>
          <tr style="vertical-align: top">
            <td class="w-[220px] font-semibold pt-2">Status Gizi</td>
            <td class="pr-5 pt-2">:</td>
            <td>
              <textarea id="body_status_nutrition" rows="4" class="border-0 w-[80%] text-sm"></textarea>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="mb-4 font-bold">Pemeriksaan Umum</div>
    <div class="grid grid-cols-2 gap-5 mb-6">
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Kepala:</span>
        <textarea id="general_examination_head" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Abdomen:</span>
        <textarea id="general_examination_abdomen" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Leher:</span>
        <textarea id="general_examination_neck" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Anogenital:</span>
        <textarea id="general_examination_anogenital" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Thoraks:</span>
        <textarea id="general_examination_thoraks" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Ekstremitas:</span>
        <textarea id="general_examination_ekstremitas" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">PEMERIKSAAN KHUSUS :</span>
        <textarea id="special_inspection" rows="3" class="border-0 shadow-none outline-none" placeholder="Lansia, pemeriksaan neurologis, tumbuh kembang, ANC dll"></textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">STATUS NUTRISI DAN PENILAIAN AKTIFITAS FISIK :</span>
        <textarea id="nutritional_status_and_physical_activity" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
    </div>
    <span class="text-lg font-semibold">PEMERIKSAAN PENUNJANG</span>
    <table class="mt-3 w-full mb-6">
      <tr>
        <td class="w-[150px]">Laboratorium</td>
        <td class="w-[30px]">:</td>
        <td>
          <input id="laboratory_examination" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td class="w-[150px]">Radiologi</td>
        <td class="w-[30px]">:</td>
        <td>
          <input id="radiological_examination" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td class="w-[150px]">Lainnnya</td>
        <td class="w-[30px]">:</td>
        <td>
          <input id="other_examination" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">DIAGNOSIS BANDING :</span>
        <textarea id="differential_diagnosis" rows="3" class="border-0 shadow-none outline-none" placeholder="Diagnosis pasti/ d/kerja hanya ada di aspek klinis"></textarea>
      </div>
    </div>
    <h4 class="font-semibold">LAIN-LAIN (TERMASUK DATA DARI OBSERVASI RUMAH PASIEN)</h4>
    <table class="anamnesis-table mt-3 mb-6">
      <tr>
        <th style="width: 60px" rowspan="2">NO</th>
        <th rowspan="2">Indikator PHBS</th>
        <th colspan="2">Jawaban</th>
      </tr>
      <tr>
        <th style="width: 100px">Ya</th>
        <th style="width: 100px">Tidak</th>
      </tr>
      @foreach ($phbs as $key => $item)
        <tr>
          <input type="hidden" name="phbs_indicators_question" value="{{ $item }}">
          <td class="text-center font-semibold">{{ $key + 1 }}</td>
          <td class="font-semibold">{{ $item }}</td>
          <td>
            <label for="phbs_indicators-{{ $key + 1 }}-true" class="select-answer">
              <input
                type="radio"
                id="phbs_indicators-{{ $key + 1 }}-true"
                name="phbs_indicators-{{ $key + 1 }}"
                value="true"
                class="form-control"
                data-group="phbs_indicators"
              />
            </label>
          </td>
          <td>
            <label for="phbs_indicators-{{ $key + 1 }}-false" class="select-answer">
              <input
                type="radio"
                id="phbs_indicators-{{ $key + 1 }}-false"
                name="phbs_indicators-{{ $key + 1 }}"
                value="false"
                class="form-control"
                data-group="phbs_indicators"
              />
            </label>
          </td>
        </tr>
      @endforeach
    </table>
    <table class="w-full mb-6">
      <tr>
        <td style="width: 160px">Kesimpulan</td>
        <td style="width: 50px">:</td>
        <td>
          <input id="conclusion_examination" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Asesmen Rumah Sehat :</span>
        <textarea id="healthy_home_assessment" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
    </div>
    <div class="font-bold mb-4">DIAGNOSIS HOLISTIK</div>
    <table class="w-full mb-6">
      <tr>
        <td style="width: 250px">Aspek Klinis</td>
        <td style="width: 50px">:</td>
        <td>
          <input id="holistic_diagnosis_clinical" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Aspek Personal</td>
        <td style="width: 50px">:</td>
        <td>
          <input id="holistic_diagnosis_personal" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Aspek Risiko Internal</td>
        <td style="width: 50px">:</td>
        <td>
          <input id="holistic_diagnosis_internal_risk" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Aspek Risiko Eksternal</td>
        <td style="width: 50px">:</td>
        <td>
          <input id="holistic_diagnosis_external_risk" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Aspek Derajat Fungsional</td>
        <td style="width: 50px">:</td>
        <td>
          <input id="holistic_diagnosis_functional_degree" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Uraian Diagnosis Holistik</td>
        <td style="width: 50px">:</td>
        <td>
          <input id="holistic_diagnosis_description" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
    </table>
    <div class="font-bold mb-4">PENGELOLAAN KOMPREHENSIF</div>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Patient-Centered :</span>
        <textarea id="patient_centered" rows="12" class="border-0 shadow-none outline-none" placeholder="Bagaimana level of preventionnya
a. edukasi terkait penyakit ( bisa disertai motivasi), perilaku (pola makan, aktifitas fisik, dll)
b. perhatikan langkah pendidikan pasien Asesmen, Perencanaan, Implementasi, Evaluasi (APIE)
c. kuratif - terapi farmakologi
d. rehabilitative - program fisioterapi (bila ada)

Perhatikan 8 dimensi patient centered approach: menghormati pilihan dan penilaian pasien, pelayanan terkoordinasi, informasi dan edukasi, kenyamanan fisik, dukungan emosi, keterlibatan pasien, kontinu, kemudahan akses layanan)

Perhatikan kolaborasi interprofesi dan apakah perlu digolongkan dalam manajemen kasus di layanan primer? (diagnosis > 2 penyakit, sangat perlu dukungan keluarga, status fungsional turun)"></textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Family-Focused (Family Wellness Plan) :</span>
        <textarea id="family_focused" rows="3" class="border-0 shadow-none outline-none" placeholder="edukasi dll yg mengacu ke level of prevention sesuai siklus kehidupan. Penekanan terhadap intervensi gizi, aktifitas fisik, dll. Perhatikan: keterlibatan keluarga dalam penatalaksanaan pasien, hasil analisis family assestment tool, apa risiko dan kebutuhan keluarga, potensi dan kekurangan. Rencana family meeting?"></textarea>
      </div>
    </div>
    <table class="anamnesis-table mb-6 famfocus-table">
      <tr>
        <th style="width: 60px">NO</th>
        <th>Nama</th>
        <th>Usia (level kehidupan)</th>
        <th>Status Kesehatan</th>
        <th>Risiko penyakit</th>
        <th>Intervensi pencegahan</th>
      </tr>
      <tr class="famfocus-add">
        <td colspan="6" class="font-bold text-center">
          <button class="w-full" onclick="addFamfocus()">+ Tambah Field</button>
        </td>
      </tr>
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Community-Oriented :</span>
        <textarea id="community_oriented" rows="10" class="border-0 shadow-none outline-none" placeholder="(Tujuan: untuk kesinambungan pelayanan pasien dan memenuhi kebutuhan di komunitas)
    a. Untuk kesinambungan pelayanan: apa dukungan dan hambatan di komunitas yang dapat berpengaruh pada pasien dan keluarga? Bagaimana rencana penatalaksanaan?
    b. Untuk memenuhi kebutuhan komunitas
Perhatikan:
    1) Bagaimana status kesehatan di komunitas?
    2) Faktor apa yang menyebabkan kondisi kesehatan tersebut? (Apa potensi dan hambatan di komunitas)
    3) Apa yang sudah dilakukan oleh sistem kesehatan dan komunitas?
    4) Apa yang bisa diusulkan, dilakukan, dan hasil apa yang diharapkan?
    5) Ukuran apa yang diperlukan untuk melanjutkan surveilans kesehatan di komunitas dan bagaimana mengukur efek hasil intervensi yang sudah dilakukan?"></textarea>
      </div>
    </div>
    <div class="font-semibold mb-4">Data Anggota Keluarga Inti (Keluarga Asal)</div>
    <table class="anamnesis-table mb-6 anggota-table">
      <tr>
        <th style="width: 60px">NO</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tgl Lahir / Umur</th>
        <th>Pekerjaan</th>
        <th>Status Kesehatan</th>
      </tr>
      @for ($i = 0; $i < 3; $i++)
        <tr>
          <td class="font-bold text-center">{{ $i + 1 }}</td>
          <td>
            <input type="text" class="w-full" autocomplete="off">
          </td>
          <td>
            <input type="text" class="w-full" autocomplete="off">
          </td>
          <td>
            <input type="text" class="w-full" autocomplete="off">
          </td>
          <td>
            <input type="text" class="w-full" autocomplete="off">
          </td>
          <td>
            <input type="text" class="w-full" autocomplete="off">
          </td>
        </tr>
      @endfor
    </table>
    <div class="font-bold mb-4">RUMAH DAN LINGKUNGAN SEKITAR</div>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Kondisi Rumah :</span>
        <textarea id="house_condition" rows="4" class="border-0 shadow-none outline-none" placeholder="Penilaian rumah sehat
(Jelaskan tentang kepemilikan rumah, situasi lokasi rumah, ukuran rumah, jenis dinding, lantai dan atap, kepadatan, kebersihan, pencahayaan, ventilasi, sumber dan penampungan air serta sanitasi., denah jika diperlukan)"></textarea>
      </div>
    </div>
    <div class="font-semibold mb-4">Penilaian Rumah Sehat</div>
    <table class="anamnesis-table mb-6">
      <tr>
        <th style="width: 60px">NO</th>
        <th class="text-nowrap">KOMPONEN NILAI YANG DINILAI</th>
        <th>KRITERIA</th>
        <th>NILAI (N)</th>
        <th>BOBOT (B)</th>
        <th>NILAI HASIL</th>
      </tr>
      <tr style="background: #D9D9D9">
        <td colspan="4" class="font-bold">
          KOMPONEN RUMAH
        </td>
        <td class="font-bold text-center">25</td>
        <td></td>
      </tr>
      @foreach ($komponen_rumah as $key => $item)
        <tr>
          <td class="text-center font-semibold" style="vertical-align: top" rowspan="4">{{ $key + 1 }}</td>
          <td class="font-semibold" style="vertical-align: top" rowspan="4">{{ $item["komponen"] }}</td>
        </tr>
        <input type="hidden" name="healthy_home_assessments-question" value="{{ $item["komponen"] }}">
        <input type="hidden" name="healthy_home_assessments-group" value="{{ $item["group"] }}">
        @foreach ($item["kriteria"] as $key2 => $item2)
          <tr>
            <td>{{ $item2 }}</td>
            <td class="text-center">{{ $item["point"][$key2] }}</td>
            <td>
              <label for="{{ $item["group"] }}-{{ $key }}-{{ $key2 }}" class="select-answer">
                <input
                  type="radio"
                  id="{{ $item["group"] }}-{{ $key }}-{{ $key2 }}"
                  name="{{ $item["group"] }}-{{ $key + 1 }}"
                  value="{{ $item["point"][$key2] }}"
                  class="form-control healthy_home_assessments-point"
                  data-group="{{ $item["group"] }}"
                  data-target="{{ $item["group"] }}-{{ $key }}"
                  data-weight="25"
                />
              </label>
            </td>
            @if ($key2 / 3 == 0)
              <td rowspan="3" class="text-center font-semibold {{ $item["group"] }}" id="{{ $item["group"] }}-{{ $key }}"></td>
            @endif
          </tr>
        @endforeach
      @endforeach
      <tr>
        <td colspan="3" class="font-bold text-right">HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold" id="home_components">0</td>
      </tr>
      <tr style="background: #D9D9D9">
        <td colspan="4" class="font-bold">
          SARANA SANITASI
        </td>
        <td class="font-bold text-center">45</td>
        <td></td>
      </tr>
      @foreach ($sarana_sanitasi as $key => $item)
        <tr>
          <td class="text-center font-semibold" style="vertical-align: top" rowspan="{{ $key == 3 ? 5 : 6 }}">{{ $key + 1 }}</td>
          <td class="font-semibold" style="vertical-align: top" rowspan="{{ $key == 3 ? 5 : 6 }}">{!! $item["komponen"] !!}</td>
        </tr>
        <input type="hidden" name="healthy_home_assessments-question" value="{{ $item["komponen"] }}">
        <input type="hidden" name="healthy_home_assessments-group" value="{{ $item["group"] }}">
        @foreach ($item["kriteria"] as $key2 => $item2)
          <tr>
            <td>{{ $item2 }}</td>
            <td class="text-center">{{ $item["point"][$key2] }}</td>
            <td>
              <label for="{{ $item["group"] }}-{{ $key }}-{{ $key2 }}" class="select-answer">
                <input
                  type="radio"
                  id="{{ $item["group"] }}-{{ $key }}-{{ $key2 }}"
                  name="{{ $item["group"] }}-{{ $key + 1 }}"
                  value="{{ $item["point"][$key2] }}"
                  class="form-control healthy_home_assessments-point"
                  data-group="{{ $item["group"] }}"
                  data-target="{{ $item["group"] }}-{{ $key }}"
                  data-weight="45"
                />
              </label>
            </td>
            @if ($key2 / 3 == 0)
              <td rowspan="{{ $key == 3 ? 4 : 5 }}" class="text-center font-semibold {{ $item["group"] }}" id="{{ $item["group"] }}-{{ $key }}"></td>
            @endif
          </tr>
        @endforeach
      @endforeach
      <tr>
        <td colspan="3" class="font-bold text-right">HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold" id="sanitation_facilities">0</td>
      </tr>
      <tr style="background: #D9D9D9">
        <td colspan="4" class="font-bold">
          PERILAKU PENGHUNI
        </td>
        <td class="font-bold text-center">30</td>
        <td></td>
      </tr>
      @foreach ($perilaku_penghuni as $key => $item)
        <tr>
          <td class="text-center font-semibold" style="vertical-align: top" rowspan="4">{{ $key + 1 }}</td>
          <td class="font-semibold" style="vertical-align: top" rowspan="4">{{ $item["komponen"] }}</td>
        </tr>
        <input type="hidden" name="healthy_home_assessments-question" value="{{ $item["komponen"] }}">
        <input type="hidden" name="healthy_home_assessments-group" value="{{ $item["group"] }}">
        @foreach ($item["kriteria"] as $key2 => $item2)
          <tr>
            <td>{{ $item2 }}</td>
            <td class="text-center">{{ $item["point"][$key2] }}</td>
            <td>
              <label for="{{ $item["group"] }}-{{ $key }}-{{ $key2 }}" class="select-answer">
                <input
                  type="radio"
                  id="{{ $item["group"] }}-{{ $key }}-{{ $key2 }}"
                  name="{{ $item["group"] }}-{{ $key + 1 }}"
                  value="{{ $item["point"][$key2] }}"
                  class="form-control healthy_home_assessments-point"
                  data-group="{{ $item["group"] }}"
                  data-target="{{ $item["group"] }}-{{ $key }}"
                  data-weight="30"
                />
              </label>
            </td>
            @if ($key2 / 3 == 0)
              <td rowspan="3" class="text-center font-semibold {{ $item["group"] }}" id="{{ $item["group"] }}-{{ $key }}"></td>
            @endif
          </tr>
        @endforeach
      @endforeach
      <tr>
        <td colspan="3" class="font-bold text-right">HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold" id="occupant_behavior">0</td>
      </tr>
      <tr>
        <td colspan="3" class="font-bold text-right">TOTAL HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold">
          <span id="healthy_home_assessments-totalpoint">0</span>
          (<span id="healthy_home_assessments-information">Tidak di ketahui</span>)
        </td>
      </tr>
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm">Kesan :</span>
        <textarea id="impression" rows="5" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm">Lingkungan Sekitar Rumah :</span>
        <textarea id="environment_around_house" rows="5" class="border-0 shadow-none outline-none" placeholder="(Jelaskan tentang sumber dan penampungan air, pengaturan limbah, pembuangan sampah, situasi halaman, selokan, serta gambaran kedekatan dengan rumah tetangga sekitar)"></textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm">Lingkungan Pekerjaan :</span>
        <textarea id="work_environment" rows="5" class="border-0 shadow-none outline-none" placeholder="Lingkungan Pekerjaan > jika pasien bekerja deskripsikan apakah ada paparan dari lingkungan kerja , contoh pabrik rokok, ventilasi nya, sirkulasinya baik atau tidak"></textarea>
      </div>
    </div>
    <div class="font-bold mb-4">CATATAN TAMBAHAN HASIL KUNJUNGAN RUMAH</div>
    <table class="anamnesis-table mb-6 catatan-table">
      <tr>
        <th style="width: 60px">NO</th>
        <th>Nomor Kunjungan</th>
        <th>Tanggal</th>
        <th>Catatan, Kesimpulan dan Rencana Tindak Lanjut</th>
      </tr>
      <tr class="catatan-add">
        <td colspan="6" class="font-bold text-center">
          <button class="w-full" onclick="addCatatan()">+ Tambah Field</button>
        </td>
      </tr>
    </table>
    <table class="w-full mb-6">
      <tr>
        <td style="width: 250px">Ad vitam</td>
        <td style="width: 50px">:</td>
        <td>
          <input id="ad_vitam" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Ad functionam</td>
        <td style="width: 50px">:</td>
        <td>
          <input id="ad_functionam" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Ad sanationam</td>
        <td style="width: 50px">:</td>
        <td>
          <input id="ad_sanationam" type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
    </table>
    <input type="hidden" id="uuid" value="{{ $uuid }}">
    <div class="mt-24">
      <button type="button" class="bg-white font-bold shadow-lg w-full py-3" onclick="storeInspection()">Simpan</button>
    </div>
  </div>
</div>
@endsection

@push("js")
<script src="{{ asset("js/jquery-3.7.1.min.js") }}"></script>
<script>
  let nodeIter = 1;
  let nodeIter2 = 1;
  let nodeIter3 = 1;

  $("input[data-group='analysis_illness_experiences']").change(function() {
    let illnes_point = 0;
    let illnes_info = "Tidak di ketahui";
    $("input[data-group='analysis_illness_experiences']").each(function() {
      if ($(this).is(":checked")) {
        illnes_point += parseInt($(this).val());
      }
    });
    if (illnes_point <= 68) illnes_info = "Kurang";
    if (illnes_point >= 69 && illnes_point <= 107) illnes_info = "Cukup";
    if (illnes_point >= 108) illnes_info = "Baik";

    $("#analysis_illness_experiences-count").text(illnes_point);
    $("#analysis_illness_experiences-information").text(illnes_info);
  });

  $(".family_apgar_point").change(function() {
    let apgar_point = 0;
    let apgar_info = "Tidak di ketahui";
    $(".family_apgar_point").each(function() {
      if ($(this).is(":checked")) {
        apgar_point += parseInt($(this).val());
      }
    });
    if (apgar_point >= 0 && apgar_point <= 3) apgar_info = "Disfungsional Berat";
    if (apgar_point >= 4 && apgar_point <= 7) apgar_info = "Disfungsional Sedang";
    if (apgar_point >= 8) apgar_info = "Sangat Fungsional";

    $("#family_apgar_point").text(apgar_point);
    $("#family_apgar_information").text(apgar_info);
  });

  $("input[data-group='family_screems']").change(function() {
    let screems_point = 0;
    let screems_info = "Tidak di ketahui";
    $("input[data-group='family_screems']").each(function() {
      if ($(this).is(":checked")) {
        screems_point += parseInt($(this).val());
      }
    });
    if (screems_point <= 10) screems_info = "Kurang";
    if (screems_point >= 11 && screems_point <= 19) screems_info = "Cukup";
    if (screems_point >= 20) screems_info = "Baik";

    $("#family_screems-count").text(screems_point);
    $("#family_screems-information").text(screems_info);
  });

  $(".healthy_home_assessments-point").change(function() {
    let assessments_point = $(this).val() * $(this).data("weight");
    let assessments_group = $(this).data("group");
    let assessments_target = $(this).data("target");
    $("#" + assessments_target).text(assessments_point);

    let assessments_point_group = 0;
    $("." + assessments_group).each(function() {
      if ($(this).text()) {
        assessments_point_group += parseInt($(this).text());
      }
    });
    $("#" + assessments_group).text(assessments_point_group);

    const assessments_group1 = $("#home_components").text();
    const assessments_group2 = $("#sanitation_facilities").text();
    const assessments_group3 = $("#occupant_behavior").text();
    let assessments_total = 0;
    let assessments_info = "Tidak di ketahui";

    assessments_total = parseInt(assessments_group1) + parseInt(assessments_group2) + parseInt(assessments_group3);
    if (assessments_total < 1410) assessments_info = "Kurang Memenuhi Syarat";
    if (assessments_total > 1410) assessments_info = "Memenuhi Syarat";

    $("#healthy_home_assessments-totalpoint").text(assessments_total);
    $("#healthy_home_assessments-information").text(assessments_info);
  });


  function addSeverity() {
    const table = document.querySelector(".severity-table").querySelector("tbody");
    const lastChild = document.querySelector(".severity-add");
    const tableRow = document.createElement("tr");
    const td1 = document.createElement("td");
    const td2 = document.createElement("td");
    const td3 = document.createElement("td");
    const td4 = document.createElement("td");
    const td5 = document.createElement("td");
    const textField1 = document.createElement("input");
    const textField2 = document.createElement("input");
    const textField3 = document.createElement("input");
    const textField4 = document.createElement("input");

    textField1.setAttribute("type", "text");
    textField1.setAttribute("autocomplete", "off");
    textField1.setAttribute("class", "w-full");
    textField1.setAttribute("id", nodeIter);

    textField2.setAttribute("type", "text");
    textField2.setAttribute("autocomplete", "off");
    textField2.setAttribute("class", "w-full");
    textField2.setAttribute("id", nodeIter);

    textField3.setAttribute("type", "text");
    textField3.setAttribute("autocomplete", "off");
    textField3.setAttribute("class", "w-full");
    textField3.setAttribute("id", nodeIter);

    textField4.setAttribute("type", "text");
    textField4.setAttribute("autocomplete", "off");
    textField4.setAttribute("class", "w-full");
    textField4.setAttribute("id", nodeIter);

    td1.appendChild(document.createTextNode(nodeIter));
    td1.classList.add("text-center");
    td1.classList.add("font-semibold");

    td2.appendChild(textField1);
    td3.appendChild(textField2);
    td4.appendChild(textField3);
    td5.appendChild(textField4);

    tableRow.appendChild(td1);
    tableRow.appendChild(td2);
    tableRow.appendChild(td3);
    tableRow.appendChild(td4);
    tableRow.appendChild(td5);

    table.insertBefore(tableRow, lastChild);
    nodeIter = nodeIter + 1;
  }

  function addFamfocus() {
    const table = document.querySelector(".famfocus-table").querySelector("tbody");
    const lastChild = document.querySelector(".famfocus-add");
    const tableRow = document.createElement("tr");
    const td1 = document.createElement("td");
    const td2 = document.createElement("td");
    const td3 = document.createElement("td");
    const td4 = document.createElement("td");
    const td5 = document.createElement("td");
    const td6 = document.createElement("td");
    const textField1 = document.createElement("input");
    const textField2 = document.createElement("input");
    const textField3 = document.createElement("input");
    const textField4 = document.createElement("input");
    const textField5 = document.createElement("input");

    textField1.setAttribute("type", "text");
    textField1.setAttribute("autocomplete", "off");
    textField1.setAttribute("class", "w-full");
    textField1.setAttribute("id", nodeIter2);

    textField2.setAttribute("type", "text");
    textField2.setAttribute("autocomplete", "off");
    textField2.setAttribute("class", "w-full");
    textField2.setAttribute("id", nodeIter2);

    textField3.setAttribute("type", "text");
    textField3.setAttribute("autocomplete", "off");
    textField3.setAttribute("class", "w-full");
    textField3.setAttribute("id", nodeIter2);

    textField4.setAttribute("type", "text");
    textField4.setAttribute("autocomplete", "off");
    textField4.setAttribute("class", "w-full");
    textField4.setAttribute("id", nodeIter2);

    textField5.setAttribute("type", "text");
    textField5.setAttribute("autocomplete", "off");
    textField5.setAttribute("class", "w-full");
    textField5.setAttribute("id", nodeIter2);

    td1.appendChild(document.createTextNode(nodeIter2));
    td1.classList.add("text-center");
    td1.classList.add("font-semibold");

    td2.appendChild(textField1);
    td3.appendChild(textField2);
    td4.appendChild(textField3);
    td5.appendChild(textField4);
    td6.appendChild(textField5);

    tableRow.appendChild(td1);
    tableRow.appendChild(td2);
    tableRow.appendChild(td3);
    tableRow.appendChild(td4);
    tableRow.appendChild(td5);
    tableRow.appendChild(td6);

    table.insertBefore(tableRow, lastChild);
    nodeIter2 = nodeIter2 + 1;
  }

  function addCatatan() {
    const table = document.querySelector(".catatan-table").querySelector("tbody");
    const lastChild = document.querySelector(".catatan-add");
    const tableRow = document.createElement("tr");
    const td1 = document.createElement("td");
    const td2 = document.createElement("td");
    const td3 = document.createElement("td");
    const td4 = document.createElement("td");
    const textField1 = document.createElement("input");
    const textField2 = document.createElement("input");
    const textField3 = document.createElement("input");

    textField1.setAttribute("type", "text");
    textField1.setAttribute("autocomplete", "off");
    textField1.setAttribute("class", "w-full");
    textField1.setAttribute("id", nodeIter3);

    textField2.setAttribute("type", "date");
    textField2.setAttribute("autocomplete", "off");
    textField2.setAttribute("class", "w-full");
    textField2.setAttribute("id", nodeIter3);

    textField3.setAttribute("type", "text");
    textField3.setAttribute("autocomplete", "off");
    textField3.setAttribute("class", "w-full");
    textField3.setAttribute("id", nodeIter3);

    td1.appendChild(document.createTextNode(nodeIter3));
    td1.classList.add("text-center");
    td1.classList.add("font-semibold");

    td2.appendChild(textField1);
    td3.appendChild(textField2);
    td4.appendChild(textField3);

    tableRow.appendChild(td1);
    tableRow.appendChild(td2);
    tableRow.appendChild(td3);
    tableRow.appendChild(td4);

    table.insertBefore(tableRow, lastChild);
    nodeIter3 = nodeIter3 + 1;
  }

  function storeInspection() {
    const analysis_illness_experiences_question = [];
    $("input[name='analysis_illness_experiences_question']").each(function() {
      analysis_illness_experiences_question.push($(this).val());
    });

    const analysis_illness_experiences_group = [];
    $("input[name='analysis_illness_experiences_group']").each(function() {
      analysis_illness_experiences_group.push($(this).val());
    });

    const analysis_illness_experiences_point = [];
    $("input[data-group='analysis_illness_experiences']").each(function() {
      if ($(this).is(":checked")) {
        analysis_illness_experiences_point.push($(this).val());
      }
    });

    if (analysis_illness_experiences_point.length < 27) return alert("ANAMNESIS PENGALAMAN SAKIT (ILLNESS) Belum lengkap");

    const family_apgar_question = [];
    $("input[name='family_apgar_question']").each(function() {
      family_apgar_question.push($(this).val());
    });

    const family_apgar_point = [];
    $(".family_apgar_point").each(function() {
      if ($(this).is(":checked")) {
        family_apgar_point.push($(this).val());
      }
    });

    if (family_apgar_point.length < 5) return alert("APGAR KELUARGA Belum lengkap");

    const family_screems_question = [];
    $("input[name='family_screems_question']").each(function() {
      family_screems_question.push($(this).val());
    });

    const family_screems_group = [];
    $("input[name='family_screems_group']").each(function() {
      family_screems_group.push($(this).val());
    });

    const family_screems_point = [];
    $("input[data-group='family_screems']").each(function() {
      if ($(this).is(":checked")) {
        family_screems_point.push($(this).val());
      }
    });

    if (family_screems_point.length < 5) return alert("SCREEM Keluarga Belum lengkap");

    const phbs_indicators_question = [];
    $("input[name='phbs_indicators_question']").each(function() {
      phbs_indicators_question.push($(this).val());
    });

    const phbs_indicators_answer = [];
    $("input[data-group='phbs_indicators']").each(function() {
      if ($(this).is(":checked")) {
        phbs_indicators_answer.push($(this).val());
      }
    });

    if (phbs_indicators_answer.length < 10) return alert("Indikator PHBS Belum lengkap");

    const healthy_home_assessments_question = [];
    $("input[name='healthy_home_assessments-question']").each(function() {
      healthy_home_assessments_question.push($(this).val());
    });

    const healthy_home_assessments_group = [];
    $("input[name='healthy_home_assessments-group']").each(function() {
      healthy_home_assessments_group.push($(this).val());
    });

    const healthy_home_assessments_point = [];
    $(".healthy_home_assessments-point").each(function() {
      if ($(this).is(":checked")) {
        healthy_home_assessments_point.push($(this).val());
      }
    });

    if (healthy_home_assessments_point.length < 17) return alert("Penilaian Rumah Sehat Belum lengkap");

    $.ajax({
      url: "{{ route('inspection.store') }}",
      type: "POST",
      data: {
        _token: "{{ csrf_token() }}",
        uuid: $("#uuid").val(),
        main_complaint: $("#main_complaint").val(),
        family_history_disease: $("#family_history_disease").val(),
        history_current_illness: $("#history_current_illness").val(),
        personal_social_history: $("#personal_social_history").val(),
        past_medical_history: $("#past_medical_history").val(),
        system_review: $("#system_review").val(),
        family_genogram: $("#family_genogram").val(),
        family_map: $("#family_map").val(),
        family_structure: $("#family_structure").val(),
        family_life_cycle: $("#family_life_cycle").val(),
        family_apgar: $("#family_apgar").val(),
        family_screem: $("#family_screem").val(),
        family_life_line: $("#family_life_line").val(),
        general_condition: $("#general_condition").val(),
        awareness: $("#awareness").val(),
        body_height: $("#body_height").val(),
        body_weight: $("#body_weight").val(),
        body_waist_size: $("#body_waist_size").val(),
        body_hip_circumference: $("#body_hip_circumference").val(),
        body_upper_arm_circumference: $("#body_upper_arm_circumference").val(),
        body_mass_index: $("#body_mass_index").val(),
        body_hip_ratio: $("#body_hip_ratio").val(),
        body_status_nutrition: $("#body_status_nutrition").val(),
        general_examination_ekstremitas: $("#general_examination_ekstremitas").val(),
        general_examination_thoraks: $("#general_examination_thoraks").val(),
        general_examination_anogenital: $("#general_examination_anogenital").val(),
        general_examination_neck: $("#general_examination_neck").val(),
        general_examination_abdomen: $("#general_examination_abdomen").val(),
        general_examination_head: $("#general_examination_head").val(),
        special_inspection: $("#special_inspection").val(),
        nutritional_status_and_physical_activity: $("#nutritional_status_and_physical_activity").val(),
        laboratory_examination: $("#laboratory_examination").val(),
        radiological_examination: $("#radiological_examination").val(),
        other_examination: $("#other_examination").val(),
        differential_diagnosis: $("#differential_diagnosis").val(),
        conclusion_examination: $("#conclusion_examination").val(),
        healthy_home_assessment: $("#healthy_home_assessment").val(),
        holistic_diagnosis_clinical: $("#holistic_diagnosis_clinical").val(),
        holistic_diagnosis_personal: $("#holistic_diagnosis_personal").val(),
        holistic_diagnosis_internal_risk: $("#holistic_diagnosis_internal_risk").val(),
        holistic_diagnosis_external_risk: $("#holistic_diagnosis_external_risk").val(),
        holistic_diagnosis_functional_degree: $("#holistic_diagnosis_functional_degree").val(),
        holistic_diagnosis_description: $("#holistic_diagnosis_description").val(),
        patient_centered: $("#patient_centered").val(),
        family_focused: $("#family_focused").val(),
        community_oriented: $("#community_oriented").val(),
        impression: $("#impression").val(),
        house_condition: $("#house_condition").val(),
        environment_around_house: $("#environment_around_house").val(),
        work_environment: $("#work_environment").val(),
        ad_vitam: $("#ad_vitam").val(),
        ad_functionam: $("#ad_functionam").val(),
        ad_sanationam: $("#ad_sanationam").val(),
        analysis_illness_experiences: {
          question: analysis_illness_experiences_question,
          group: analysis_illness_experiences_group,
          point: analysis_illness_experiences_point
        },
        family_apgars: {
          question: family_apgar_question,
          point: family_apgar_point
        },
        family_screems: {
          question: family_screems_question,
          group: family_screems_group,
          point: family_screems_point
        },
        phbs_indicators: {
          question: phbs_indicators_question,
          answer: phbs_indicators_answer
        },
        healthy_home_assessments: {
          question: healthy_home_assessments_question,
          group: healthy_home_assessments_group,
          point: healthy_home_assessments_point
        },
      },
      beforeSend: function() {},
      success: function() {
        return location.href = "/dashboard/patient";
      },
      error: function(err) {
        console.log(err);
      }
    });
  }
</script>
@endpush