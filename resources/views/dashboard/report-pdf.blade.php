<style>
  table,
  tr,
  th,
  td {
    width: 100%;
    border: 1px solid #000;
    border-collapse: collapse;
    font-size: 12px;
    padding: 5px
  }
</style>
<div>
  <div class="mb-6">
    <div class="mb-4 font-bold">ANAMNESIS PENYAKIT</div>
    <div class="grid grid-cols-2 gap-5 mb-6">
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Keluhan Utama :</span>
        <textarea
          id="main_complaint"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="Isikan keluhan utama"
        >{{ $inspection ? $inspection->main_complaint : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Penyakit Keluarga :</span>
        <textarea
          id="family_history_disease"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="(Uraikan penyakit yang ada pada keluarga termasuk Riwayat pengobatan. Diagram Riwayat keluarga disusun dalam bentuk genogram digambarkan terpisah)"
        >{{ $inspection ? $inspection->family_history_disease : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Penyakit Sekarang :</span>
        <textarea
          id="history_current_illness"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="(Uraikan sejak timbul hingga berkembangnya penyakit, obat-obatan yang telah diminum, pelayanan kesehatan yang telah didapatkan termasuk sikap dan perilaku klien, keluarga dan lingkungan terhadap masalah yang ada)"
        >{{ $inspection ? $inspection->history_current_illness : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Personal Sosial :</span>
        <textarea
          id="personal_social_history"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="(Uraikan pula factor risiko yang ada pada klien dan keluarganya dengan menggali berbagai permasalahan dalam aspek-aspek pendidikan, pekerjaan, keluarga asal dan rumah tangga sekarang, serta minat dan gaya hidup)"
        >{{ $inspection ? $inspection->personal_social_history : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Penyakit Dahulu (beserta pengobatan) :</span>
        <textarea
          id="past_medical_history"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="(Uraikan penyakit yang ada pada klien, pengobatan, pembedahan dan Riwayat alergi. Uraikan pula pelayanan kesehatan yang telah diterima termasuk imunisasi dan skrining)"
        >{{ $inspection ? $inspection->past_medical_history : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Review Sistem :</span>
        <textarea
          id="system_review"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="(Anamnesis berdasarkan tinjauan pada semua sistem tubuh untuk mengantisipasi hal-hal yang terlewatkan sebelumnya)"
        >{{ $inspection ? $inspection->system_review : "" }}</textarea>
      </div>
    </div>
    <div class="mb-2 font-bold">ANAMNESIS PENGALAMAN SAKIT (ILLNESS)</div>
    <table class="anamnesis-table mb-6">
      <tr>
        <th style="width: 50px">NO</th>
        <th>PERNYATAAN</th>
        <th style="width: 80px">Sangat Setuju</th>
        <th style="width: 80px">Setuju</th>
        <th style="width: 80px">Ragu-ragu</th>
        <th style="width: 80px">Tidak Setuju</th>
        <th style="width: 80px">Sangat Tidak Setuju</th>
      </tr>
      @foreach ($inspection->illness as $key => $item)
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
        <tr>
          <th>{{ $key + 1 }}</th>
          <td class="font-semibold">{{ $item["question"] }}</td>
          <td style="text-align: center">
            <label for="analysis_illness_experiences-{{ $key + 1 }}-5" class="select-answer">
              <input
                type="radio"
                id="analysis_illness_experiences-{{ $key + 1 }}-5"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="5"
                class="form-control"
                data-group="analysis_illness_experiences"
                {{ $inspection ? $inspection->illness[$key]["point"] == 5 ? "checked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="analysis_illness_experiences-{{ $key + 1 }}-4" class="select-answer">
              <input
                type="radio"
                id="analysis_illness_experiences-{{ $key + 1 }}-4"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="4"
                class="form-control"
                data-group="analysis_illness_experiences"
                {{ $inspection ? $inspection->illness[$key]["point"] == 4 ? "checked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="analysis_illness_experiences-{{ $key + 1 }}-3" class="select-answer">
              <input
                type="radio"
                id="analysis_illness_experiences-{{ $key + 1 }}-3"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="3"
                class="form-control"
                data-group="analysis_illness_experiences"
                {{ $inspection ? $inspection->illness[$key]["point"] == 3 ? "checked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="analysis_illness_experiences-{{ $key + 1 }}-2" class="select-answer">
              <input
                type="radio"
                id="analysis_illness_experiences-{{ $key + 1 }}-2"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="2"
                class="form-control"
                data-group="analysis_illness_experiences"
                {{ $inspection ? $inspection->illness[$key]["point"] == 2 ? "chcked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="analysis_illness_experiences-{{ $key + 1 }}-1" class="select-answer">
              <input
                type="radio"
                id="analysis_illness_experiences-{{ $key + 1 }}-1"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="1"
                class="form-control"
                data-group="analysis_illness_experiences"
                {{ $inspection ? $inspection->illness[$key]["point"] == 1 ? "checked" : "" : "" }}
              />
            </label>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="2" class="font-bold">TOTAL</td>
        <td colspan="5" class="font-bold text-center">
          <span id="analysis_illness_experiences-count">{{ $inspection ? $inspection->illness->sum("point") : "0" }}</span>
          @if ($inspection)
            @if ($inspection->illness->sum("point") <= 68)
              (<span id="analysis_illness_experiences-information">Kurang</span>)
            @endif
            @if ($inspection->illness->sum("point") > 69 && $inspection->illness->sum("point") < 107)
              (<span id="analysis_illness_experiences-information">Cukup</span>)
            @endif
            @if ($inspection->illness->sum("point") >= 108)
              (<span id="analysis_illness_experiences-information">Baik</span>)
            @endif
          @else
            (<span id="analysis_illness_experiences-information">Tidak di ketahui</span>)
          @endif
        </td>
      </tr>
    </table>
    <div class="mb-4 font-bold">INSTRUMEN PENILAIAN KELUARGA (FAMILY ASSESMENT TOOLS)</div>
    <div class="grid grid-cols-2 gap-5 mb-6">
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Genogram Keluarga (Family Genogram) :</span>
        <textarea
          id="family_genogram"
          rows="6"
          class="border-0 shadow-none outline-none"
          placeholder="(Buatlah genogram keluarga sesuai kaidah umum pembuatan genogram dan dilengkapi dengan keterangan/ legenda di bawahnya). Legenda (tambahkan sesuai kebutuhan):
          *B= Breadwinner
          *C= Caregiver
          *D= Decision Maker"
        >{{ $inspection ? $inspection->family_genogram : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Peta Keluarga (Family Map) :</span>
        <textarea
          id="family_map"
          rows="6"
          class="border-0 shadow-none outline-none"
          placeholder="Mencakup keluarga inti/ tidak inti, baik yang tinggal di rumah dan tidak (Buatlah peta keluarga yang menggambarkan psikodinamika keluarga sesuai kaidah umum pembuatan peta keluarga dilengkapi dengan keterangan/legenda di bawahnya). Menggambarkan psikososial , dinamika keluarga, Jika garis tebal menunjukan kekuatan hubungan, semakin kuat makin tebal garisnya"
        >{{ $inspection ? $inspection->family_map : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Bentuk Keluarga (Family Structure) :</span>
        <textarea
          id="family_structure"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder=""
        >{{ $inspection ? $inspection->family_structure : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Tahapan Siklus Kehidupan Keluarga (Family Life Cycle) :</span>
        <textarea
          id="family_life_cycle"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder=""
        >{{ $inspection ? $inspection->family_life_cycle : "" }}</textarea>
      </div>
      <div class="col-span-2 flex flex-col gap-1">
        <span class="text-sm font-semibold">APGAR Keluarga (Family APGAR) :</span>
        <textarea
          id="family_apgar"
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->family_apgar : "" }}</textarea>
      </div>
    </div>
    <table class="mb-6">
      <tr>
        <th style="width: 50px">NO</th>
        <th>APGAR Keluarga</th>
        <th style="width: 90px">Hampir Selalu</th>
        <th style="width: 90px">Kadang - Kadang</th>
        <th style="width: 90px">Hampir Tidak Pernah</th>
      </tr>
      @foreach ($inspection->family_apgrs as $key => $item)
        <tr>
          <th>{{ $key + 1 }}</th>
          <td class="font-semibold">{{ $item->question }}</td>
          <td style="text-align: center">
            <label for="apgar-{{ $key + 1 }}2" class="select-answer">
              <input
                type="radio"
                id="apgar-{{ $key + 1 }}2"
                name="apgar-{{ $key + 1 }}"
                value="2"
                class="family_apgar_point form-control"
                {{ $inspection ? $inspection->family_apgrs[$key]["point"] == 2 ? "checked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="apgar-{{ $key + 1 }}1" class="select-answer">
              <input
                type="radio"
                id="apgar-{{ $key + 1 }}1"
                name="apgar-{{ $key + 1 }}"
                value="1"
                class="family_apgar_point form-control"
                {{ $inspection ? $inspection->family_apgrs[$key]["point"] == 1 ? "checked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="apgar-{{ $key + 1 }}0" class="select-answer">
              <input
                type="radio"
                id="apgar-{{ $key + 1 }}0"
                name="apgar-{{ $key + 1 }}"
                value="0"
                class="family_apgar_point form-control"
                {{ $inspection ? $inspection->family_apgrs[$key]["point"] == 0 ? "checked" : "" : "" }}
              />
            </label>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="2" class="font-bold">SKOR TOTAL</td>
        <td colspan="3" class="font-bold text-center">
          <span id="family_apgar_point">{{ $inspection ? $inspection->family_apgrs->sum("point") : "0" }}</span>
          @if ($inspection)
            @if ($inspection->family_apgrs->sum("point") >= 0 && $inspection->family_apgrs->sum("point") <= 3)
              (<span id="family_apgar_information">Disfungsional Berat</span>)
            @endif
            @if ($inspection->family_apgrs->sum("point") >= 4 && $inspection->family_apgrs->sum("point") <= 7)
              (<span id="family_apgar_information">Disfungsional Sedang</span>)
            @endif
            @if ($inspection->family_apgrs->sum("point") >= 8 && $inspection->family_apgrs->sum("point") <= 10)
              (<span id="family_apgar_information">Disfungsional Sedang</span>)
            @endif
          @else
            (<span id="family_apgar_information">Tidak di ketahui</span>)
          @endif
        </td>
      </tr>
    </table>
    <div class="flex flex-col gap-1 mb-6">
      <span class="text-sm font-semibold">SCREEM Keluarga (Family SCREEM) :</span>
      <textarea
        id="family_screem"
        rows="4"
        class="border-0 shadow-none outline-none"
        placeholder="(Social-Cultural-Religious-Educational-Economic-Medical)"
      >{{ $inspection ? $inspection->family_screem : "" }}</textarea>
    </div>
    <table>
      <tr>
        <th style="width: 50px">NO</th>
        <th>Aspek SCREEM</th>
        <th>Kekuatan</th>
        <th>Kelemahan</th>
      </tr>
      @foreach ($inspection->screem_aspects as $key => $item)
        <tr>
          <th>{{ $key + 1 }}</th>
          <td class="font-semibold">
            {{ $item->question }}
          </td>
          <td>
            {{ $item->strength }}
          </td>
          <td>
            {{ $item->weakness }}
          </td>
        </tr>
      @endforeach
    </table>
    <table style="margin-top: 60px">
      <tr>
        <th style="width: 50px">NO</th>
        <th>PERNYATAAN</th>
        <th style="width: 90px">Sangat Setuju</th>
        <th style="width: 90px">Setuju</th>
        <th style="width: 90px">Ragu-ragu</th>
        <th style="width: 90px">Tidak Setuju</th>
        <th style="width: 90px">Sangat Tidak Setuju</th>
      </tr>
      @foreach ($inspection->family_screems as $key => $item)
        @if ($key == 0)
          <tr>
            <td colspan="7" class="font-bold" style="background: #D9D9D9">
              KEIMANAN PASIEN
            </td>
          </tr>
        @endif
        <tr>
          <td class="text-center font-semibold">{{ $key + 1 }}</td>
          <td class="font-semibold">{{ $item["question"] }}</td>
          <td style="text-align: center">
            <label for="family_screems-{{ $key + 1 }}-5" class="select-answer">
              <input
                type="radio"
                id="family_screems-{{ $key + 1 }}-5"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="5"
                class="form-control"
                data-group="family_screems"
                {{ $inspection ? $inspection->family_screems[$key]["point"] == 5 ? "checked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="family_screems-{{ $key + 1 }}-4" class="select-answer">
              <input
                type="radio"
                id="family_screems-{{ $key + 1 }}-4"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="4"
                class="form-control"
                data-group="family_screems"
                {{ $inspection ? $inspection->family_screems[$key]["point"] == 4 ? "checked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="family_screems-{{ $key + 1 }}-3" class="select-answer">
              <input
                type="radio"
                id="family_screems-{{ $key + 1 }}-3"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="3"
                class="form-control"
                data-group="family_screems"
                {{ $inspection ? $inspection->family_screems[$key]["point"] == 3 ? "checked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="family_screems-{{ $key + 1 }}-2" class="select-answer">
              <input
                type="radio"
                id="family_screems-{{ $key + 1 }}-2"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="2"
                class="form-control"
                data-group="family_screems"
                {{ $inspection ? $inspection->family_screems[$key]["point"] == 2 ? "checked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="family_screems-{{ $key + 1 }}-1" class="select-answer">
              <input
                type="radio"
                id="family_screems-{{ $key + 1 }}-1"
                name="{{ $item["group"] }}-{{ $key + 1 }}"
                value="1"
                class="form-control"
                data-group="family_screems"
                {{ $inspection ? $inspection->family_screems[$key]["point"] == 1 ? "checked" : "" : "" }}
              />
            </label>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="2" class="font-bold">TOTAL</td>
        <td colspan="5" class="font-bold text-center">
          <span id="family_screems-count">{{ $inspection ? $inspection->family_screems->sum("point") : "0" }}</span>
          @if ($inspection)
            @if ($inspection->family_screems->sum("point") <= 10)
              (<span id="family_screems-information">Kurang</span>)
            @endif
            @if ($inspection->family_screems->sum("point") >= 11 && $inspection->family_screems->sum("point") <= 19)
              (<span id="family_screems-information">Cukup</span>)
            @endif
            @if ($inspection->family_screems->sum("point") >= 20)
              (<span id="family_screems-information">Baik</span>)
            @endif
          @else
            (<span id="family_screems-information">Tidak di ketahui</span>)
          @endif
        </td>
      </tr>
    </table>
    <div class="flex flex-col gap-1 mb-6">
      <span class="text-sm font-semibold">Perjalanan Hidup Keluarga (Family Life Line) :</span>
      <textarea
        id="family_life_line"
        rows="4"
        class="border-0 shadow-none outline-none"
        placeholder="Uraikan tentang kejadian penting/ krisis dalam kehidupan keluarga pasien yang mungkin mempengaruhi keparahan sakit pasien (misal: kecelakaan lalu lintas, penyakit/ kematian anggota keluarga, PHK, pindah rumah/ pekerjaan, bencana alam, dll)"
      >{{ $inspection ? $inspection->family_life_line : "" }}</textarea>
    </div>
    <table class="anamnesis-table mb-6 severity-table">
      <tr>
        <th style="width: 50px">NO</th>
        <th>Tahun</th>
        <th>Usia (Tahun)</th>
        <th>Life Events/ Crisis</th>
        <th>Severity of Illness</th>
      </tr>
      @if ($inspection && isset($inspection->family_life_lines))
        @foreach ($inspection->family_life_lines as $key => $item)
          <tr>
            <th>{{ $key + 1 }}</th>
            <td>
              {{ $item->year }}
            </td>
            <td>
              {{ $item->age }}
            </td>
            <td>
              {{ $item->life_events }}
            </td>
            <td>
              {{ $item->illness }}
            </td>
          </tr>
        @endforeach
      @endif
    </table>
    <div class="mb-4 font-bold">PEMERIKSAAN FISIK</div>
    <div class="grid grid-cols-1 mb-4 gap-3">
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Keadaan Umum :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->general_condition : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Kesadaran :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->awareness : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Tinggi Badan :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->body_height : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Berat Badan :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->body_weight : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Lingkar Pinggang :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->body_waist_size : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Lingkar Panggul :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->body_hip_circumference : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Lingkar Lengan Atas :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->body_upper_arm_circumference : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Indeks Massa Tubuh (IMT) :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->body_mass_index : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Waist - Hip Ratio :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->body_hip_ratio : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Status Gizi :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->body_status_nutrition : "" }}</textarea>
      </div>
    </div>
    <div class="mb-4 font-bold">Pemeriksaan Umum</div>
    <div class="grid grid-cols-2 gap-5 mb-6">
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Kepala:</span>
        <textarea
          id="general_examination_head"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="Isikan keluhan utama"
        >{{ $inspection ? $inspection->general_examination_head : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Abdomen:</span>
        <textarea
          id="general_examination_abdomen"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="Isikan keluhan utama"
        >{{ $inspection ? $inspection->general_examination_abdomen : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Leher:</span>
        <textarea
          id="general_examination_neck"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="Isikan keluhan utama"
        >{{ $inspection ? $inspection->general_examination_neck : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Anogenital:</span>
        <textarea
          id="general_examination_anogenital"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="Isikan keluhan utama"
        >{{ $inspection ? $inspection->general_examination_anogenital : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Thoraks:</span>
        <textarea
          id="general_examination_thoraks"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="Isikan keluhan utama"
        >{{ $inspection ? $inspection->general_examination_thoraks : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Ekstremitas:</span>
        <textarea
          id="general_examination_ekstremitas"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="Isikan keluhan utama"
        >{{ $inspection ? $inspection->general_examination_ekstremitas : "" }}</textarea>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">PEMERIKSAAN KHUSUS :</span>
        <textarea
          id="special_inspection"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="Lansia, pemeriksaan neurologis, tumbuh kembang, ANC dll"
        >{{ $inspection ? $inspection->special_inspection : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">STATUS NUTRISI DAN PENILAIAN AKTIFITAS FISIK :</span>
        <textarea
          id="nutritional_status_and_physical_activity"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder=""
        >{{ $inspection ? $inspection->nutritional_status_and_physical_activity : "" }}</textarea>
      </div>
    </div>
    <span class="text-lg font-semibold">PEMERIKSAAN PENUNJANG</span>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Laboratorium :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->laboratory_examination : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Radiologi :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->radiological_examination : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Lainnnya :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->other_examination : "" }}</textarea>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">DIAGNOSIS BANDING :</span>
        <textarea
          id="differential_diagnosis"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="Diagnosis pasti/ d/kerja hanya ada di aspek klinis"
        >{{ $inspection ? $inspection->differential_diagnosis : "" }}</textarea>
      </div>
    </div>
    <h4 class="font-semibold">LAIN-LAIN (TERMASUK DATA DARI OBSERVASI RUMAH PASIEN)</h4>
    <table>
      <tr>
        <th style="width: 50px" rowspan="2">NO</th>
        <th rowspan="2">Indikator PHBS</th>
        <th colspan="2">Jawaban</th>
      </tr>
      <tr>
        <th style="width: 100px">Ya</th>
        <th style="width: 100px">Tidak</th>
      </tr>
      @foreach ($inspection->phbs_indicators as $key => $item)
        <tr>
          <th>{{ $key + 1 }}</th>
          <td class="font-semibold">{{ $item->question }}</td>
          <td style="text-align: center">
            <label for="phbs_indicators-{{ $key + 1 }}-true" class="select-answer">
              <input
                type="radio"
                id="phbs_indicators-{{ $key + 1 }}-true"
                name="phbs_indicators-{{ $key + 1 }}"
                value="true"
                class="form-control"
                data-group="phbs_indicators"
                {{ $inspection ? $inspection->phbs_indicators[$key]["answer"] == 1 ? "checked" : "" : "" }}
              />
            </label>
          </td>
          <td style="text-align: center">
            <label for="phbs_indicators-{{ $key + 1 }}-false" class="select-answer">
              <input
                type="radio"
                id="phbs_indicators-{{ $key + 1 }}-false"
                name="phbs_indicators-{{ $key + 1 }}"
                value="false"
                class="form-control"
                data-group="phbs_indicators"
                {{ $inspection ? $inspection->phbs_indicators[$key]["answer"] == 0 ? "checked" : "" : "" }}
              />
            </label>
          </td>
        </tr>
      @endforeach
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Kesimpulan :</span>
        <textarea
          id="healthy_home_assessment"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder=""
        >{{ $inspection ? $inspection->conclusion_examination : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Asesmen Rumah Sehat :</span>
        <textarea
          id="healthy_home_assessment"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder=""
        >{{ $inspection ? $inspection->healthy_home_assessment : "" }}</textarea>
      </div>
    </div>
    <div class="font-bold mb-4">DIAGNOSIS HOLISTIK</div>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Aspek Klinis :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->holistic_diagnosis_clinical : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Aspek Personal :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->holistic_diagnosis_personal : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Aspek Risiko Internal :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->holistic_diagnosis_internal_risk : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Aspek Risiko Eksternal :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->holistic_diagnosis_external_risk : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Aspek Derajat Fungsional :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->holistic_diagnosis_functional_degree : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Uraian Diagnosis Holistik :</span>
        <textarea
          rows="3"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->holistic_diagnosis_description : "" }}</textarea>
      </div>
    </div>
    <div class="font-bold mb-4">PENGELOLAAN KOMPREHENSIF</div>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Patient-Centered :</span>
        <textarea
          id="patient_centered"
          rows="12"
          class="border-0 shadow-none outline-none"
          placeholder="Bagaimana level of preventionnya
a. edukasi terkait penyakit ( bisa disertai motivasi), perilaku (pola makan, aktifitas fisik, dll)
b. perhatikan langkah pendidikan pasien Asesmen, Perencanaan, Implementasi, Evaluasi (APIE)
c. kuratif - terapi farmakologi
d. rehabilitative - program fisioterapi (bila ada)

Perhatikan 8 dimensi patient centered approach: menghormati pilihan dan penilaian pasien, pelayanan terkoordinasi, informasi dan edukasi, kenyamanan fisik, dukungan emosi, keterlibatan pasien, kontinu, kemudahan akses layanan)

Perhatikan kolaborasi interprofesi dan apakah perlu digolongkan dalam manajemen kasus di layanan primer? (diagnosis > 2 penyakit, sangat perlu dukungan keluarga, status fungsional turun)"
        >{{ $inspection ? $inspection->patient_centered : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Family-Focused (Family Wellness Plan) :</span>
        <textarea
          id="family_focused"
          rows="3"
          class="border-0 shadow-none outline-none"
          placeholder="edukasi dll yg mengacu ke level of prevention sesuai siklus kehidupan. Penekanan terhadap intervensi gizi, aktifitas fisik, dll. Perhatikan: keterlibatan keluarga dalam penatalaksanaan pasien, hasil analisis family assestment tool, apa risiko dan kebutuhan keluarga, potensi dan kekurangan. Rencana family meeting?"
        >{{ $inspection ? $inspection->family_focused : "" }}</textarea>
      </div>
    </div>
    <table class="anamnesis-table mb-6 famfocus-table">
      <tr>
        <th style="width: 50px">NO</th>
        <th>Nama</th>
        <th>Usia (level kehidupan)</th>
        <th>Status Kesehatan</th>
        <th>Risiko Penyakit</th>
        <th>Intervensi Pencegahan</th>
      </tr>
      @if ($inspection && isset($inspection->family_focuseds))
        @foreach ($inspection->family_focuseds as $key => $item)
          <tr>
            <th>{{ $key + 1 }}</th>
            <td>
              {{ $item->name }}
            </td>
            <td>
              {{ $item->age }}
            </td>
            <td>
              {{ $item->health_status }}
            </td>
            <td>
              {{ $item->risk_disease }}
            </td>
            <td>
              {{ $item->preventive_intervention }}
            </td>
          </tr>
        @endforeach
      @endif
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Community-Oriented :</span>
        <textarea
          id="community_oriented"
          rows="10"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->community_oriented : "" }}</textarea>
      </div>
    </div>
    <div class="font-semibold mb-4">Data Anggota Keluarga Inti (Keluarga Asal)</div>
    <table class="anamnesis-table mb-6 anggota-table">
      <tr>
        <th style="width: 50px">NO</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tgl Lahir / Umur</th>
        <th>Pekerjaan</th>
        <th>Status Kesehatan</th>
      </tr>
      @foreach ($inspection->main_families as $key => $item)
        <tr>
          <th>{{ $key + 1 }}</th>
          <td>
            {{ $item->name }}
          </td>
          <td>
            {{ $item->gender }}
          </td>
          <td>
            {{ $item->birth_date }}
          </td>
          <td>
            {{ $item->job }}
          </td>
          <td>
            {{ $item->health_status }}
          </td>
        </tr>
      @endforeach
    </table>
    <div class="font-bold mb-4">RUMAH DAN LINGKUNGAN SEKITAR</div>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Kondisi Rumah :</span>
        <textarea
          id="house_condition"
          rows="4"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->house_condition : "" }}</textarea>
      </div>
    </div>
    <div style="margin-top: 40px">Penilaian Rumah Sehat</div>
    <table>
      <tr>
        <th style="width: 50px">NO</th>
        <th style="width: 150px">KOMPONEN NILAI YANG DINILAI</th>
        <th>KRITERIA</th>
        <th style="width: 50px">NILAI (N)</th>
        <th style="width: 50px">BOBOT (B)</th>
        <th>NILAI HASIL</th>
      </tr>
      <tr style="background: #D9D9D9">
        <td colspan="4" class="font-bold">
          KOMPONEN RUMAH
        </td>
        <td style="text-align: center">25</td>
        <td></td>
      </tr>
      @foreach ($komponen_rumah as $key => $item)
        @php
          $group1 = null;
          if ($inspection) $group1 = $inspection->healthy_home_assessments->groupBy("group")[$item["group"]];
        @endphp
        <tr>
          <th style="vertical-align: top" rowspan="{{ count($item["kriteria"]) + 1 }}">{{ $key + 1 }}</th>
          <td class="font-semibold" style="vertical-align: top" rowspan="{{ count($item["kriteria"]) + 1 }}">{{ $item["komponen"] }}</td>
        </tr>
        @foreach ($item["kriteria"] as $key2 => $item2)
          <tr>
            <td>{{ $item2 }}</td>
            <td style="text-align: center">{{ $item["point"][$key2] }}</td>
            <td style="text-align: center">
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
                  {{ $inspection ? $group1[$key]["point"] == $item["point"][$key2] ? "checked" : "" : "" }}
                />
              </label>
            </td>
            @if ($key2 / 3 == 0)
              <td rowspan="{{ count($item["kriteria"]) + 1 }}" style="text-align: center">
                {{ $inspection ? $group1[$key]["point"] * 25 : "" }}
              </td>
            @endif
          </tr>
        @endforeach
      @endforeach
      <tr>
        <td colspan="3" class="font-bold text-right">HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold" id="home_components">
          {{ $inspection ? $group1->sum("point") * 25 : 0 }}
        </td>
      </tr>
      <tr style="background: #D9D9D9">
        <td colspan="4" class="font-bold">
          SARANA SANITASI
        </td>
        <td class="font-bold text-center">45</td>
        <td></td>
      </tr>
      @foreach ($sarana_sanitasi as $key => $item)
        @php
          $group2 = null;
          if ($inspection) $group2 = $inspection->healthy_home_assessments->groupBy("group")[$item["group"]];
        @endphp
        <tr>
          <th style="vertical-align: top" rowspan="{{ count($item["kriteria"]) + 1 == 3 ? 5 : 6 }}">{{ $key + 1 }}</th>
          <td class="font-semibold" style="vertical-align: top" rowspan="{{ count($item["kriteria"]) + 1 == 3 ? 5 : 6 }}">{!! $item["komponen"] !!}</td>
        </tr>
        @foreach ($item["kriteria"] as $key2 => $item2)
          <tr>
            <td>{{ $item2 }}</td>
            <td style="text-align: center">{{ $item["point"][$key2] }}</td>
            <td style="text-align: center">
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
                  {{ $inspection ? $group2[$key]["point"] == $item["point"][$key2] ? "checked" : "" : "" }}
                />
              </label>
            </td>
            @if ($key2 / 3 == 0)
              <td rowspan="{{ count($item["kriteria"]) + 1 == 3 ? 4 : 5 }}">
                {{ $inspection ? $group2[$key]["point"] * 45 : "" }}
              </td>
            @endif
          </tr>
        @endforeach
      @endforeach
      <tr>
        <td colspan="3" class="font-bold text-right">HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold" id="sanitation_facilities">
          {{ $inspection ? $group2->sum("point") * 45 : 0 }}
        </td>
      </tr>
      <tr style="background: #D9D9D9">
        <td colspan="4" class="font-bold">
          PERILAKU PENGHUNI
        </td>
        <td class="font-bold text-center">30</td>
        <td></td>
      </tr>
      @foreach ($perilaku_penghuni as $key => $item)
        @php
          $group3 = null;
          if ($inspection) $group3 = $inspection->healthy_home_assessments->groupBy("group")[$item["group"]];
        @endphp
        <tr>
          <td style="vertical-align: top" rowspan="{{ count($item["kriteria"]) + 1 }}">{{ $key + 1 }}</td>
          <td style="vertical-align: top" rowspan="{{ count($item["kriteria"]) + 1 }}">{{ $item["komponen"] }}</td>
        </tr>
        @foreach ($item["kriteria"] as $key2 => $item2)
          <tr>
            <td>{{ $item2 }}</td>
            <td style="text-align: center">{{ $item["point"][$key2] }}</td>
            <td style="text-align: center">
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
                  {{ $inspection ? $group3[$key]["point"] == $item["point"][$key2] ? "checked" : "" : "" }}
                />
              </label>
            </td>
            @if ($key2 / 3 == 0)
              <td rowspan="{{ count($item["kriteria"]) + 1 }}">
                {{ $inspection ? $group3[$key]["point"] * 30 : "" }}
              </td>
            @endif
          </tr>
        @endforeach
      @endforeach
      <tr>
        <td colspan="3" class="font-bold text-right">HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold" id="occupant_behavior">
          {{ $inspection ? $group3->sum("point") * 30 : 0 }}
        </td>
      </tr>
      <tr>
        <td colspan="3" class="font-bold text-right">TOTAL HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold">
          @php
            $totalPoint = 0;
            $totalPointInfo = "";
            if ($inspection) {
              $totalPoint = ($group1->sum("point") * 25) + ($group2->sum("point") * 45) + ($group3->sum("point") * 30);
              $totalPointInfo = $totalPoint < 1410 ? "Kurang Memenuhi Syarat" : "Memenuhi Syarat";
            }
          @endphp
          <span id="healthy_home_assessments-totalpoint">
            {{ $inspection ? $totalPoint : 0 }}
          </span>
          (<span id="healthy_home_assessments-information">
            {{ $inspection ? $totalPointInfo : "Tidak di ketahui" }}
          </span>)
        </td>
      </tr>
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm">Kesan :</span>
        <textarea
          id="impression"
          rows="5"
          class="border-0 shadow-none outline-none"
          placeholder=""
        >{{ $inspection ? $inspection->impression : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm">Lingkungan Sekitar Rumah :</span>
        <textarea
          id="environment_around_house"
          rows="5"
          class="border-0 shadow-none outline-none"
          placeholder="(Jelaskan tentang sumber dan penampungan air, pengaturan limbah, pembuangan sampah, situasi halaman, selokan, serta gambaran kedekatan dengan rumah tetangga sekitar)"
        >{{ $inspection ? $inspection->environment_around_house : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm">Lingkungan Pekerjaan :</span>
        <textarea
          id="work_environment"
          rows="5"
          class="border-0 shadow-none outline-none"
          placeholder="Lingkungan Pekerjaan > jika pasien bekerja deskripsikan apakah ada paparan dari lingkungan kerja , contoh pabrik rokok, ventilasi nya, sirkulasinya baik atau tidak"
        >{{ $inspection ? $inspection->work_environment : "" }}</textarea>
      </div>
    </div>
    <div class="font-bold mb-4">CATATAN TAMBAHAN HASIL KUNJUNGAN RUMAH</div>
    <table>
      <tr>
        <th style="width: 50px">NO</th>
        <th>Nomor Kunjungan</th>
        <th>Tanggal</th>
        <th>Catatan, Kesimpulan dan Rencana Tindak Lanjut</th>
      </tr>
      @foreach ($inspection->home_visit_results as $key => $item)
        <tr>
          <th class="text-center font-semibold">{{ $key + 1 }}</th>
          <td>
            {{ $item->visit_number }}
          </td>
          <td>
            {{ $item->visit_date }}
          </td>
          <td>
            {{ $item->note }}
          </td>
        </tr>
      @endforeach
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm">Ad vitam :</span>
        <textarea
          id="impression"
          rows="5"
          class="border-0 shadow-none outline-none"
          placeholder=""
        >{{ $inspection ? $inspection->ad_vitam : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm">Ad functionam :</span>
        <textarea
          id="environment_around_house"
          rows="5"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->ad_functionam : "" }}</textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm">Ad sanationam :</span>
        <textarea
          id="work_environment"
          rows="5"
          class="border-0 shadow-none outline-none"
        >{{ $inspection ? $inspection->ad_sanationam : "" }}</textarea>
      </div>
    </div>
  </div>
</div>
