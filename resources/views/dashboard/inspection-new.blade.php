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
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Penyakit Keluarga :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="(Uraikan penyakit yang ada pada keluarga termasuk Riwayat pengobatan. Diagram Riwayat keluarga disusun dalam bentuk genogram digambarkan terpisah)"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Penyakit Sekarang :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="(Uraikan sejak timbul hingga berkembangnya penyakit, obat-obatan yang telah diminum, pelayanan kesehatan yang telah didapatkan termasuk sikap dan perilaku klien, keluarga dan lingkungan terhadap masalah yang ada)"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Personal Sosial :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="(Uraikan pula factor risiko yang ada pada klien dan keluarganya dengan menggali berbagai permasalahan dalam aspek-aspek pendidikan, pekerjaan, keluarga asal dan rumah tangga sekarang, serta minat dan gaya hidup)"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Riwayat Penyakit Dahulu (beserta pengobatan) :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="(Uraikan penyakit yang ada pada klien, pengobatan, pembedahan dan Riwayat alergi. Uraikan pula pelayanan kesehatan yang telah diterima termasuk imunisasi dan skrining)"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Review Sistem :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="(Anamnesis berdasarkan tinjauan pada semua sistem tubuh untuk mengantisipasi hal-hal yang terlewatkan sebelumnya) "></textarea>
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
            <td colspan="7" class="font-bold" style="background: #D9D9D9">
              KEIMANAN PASIEN
            </td>
          </tr>
        @endif
        @if ($key == 14)
          <tr>
            <td colspan="7" class="font-bold" style="background: #D9D9D9">
              RUTINITAS IBADAH PASIEN
            </td>
          </tr>
        @endif
        @if ($key == 18)
          <tr>
            <td colspan="7" class="font-bold" style="background: #D9D9D9">
              MAKAN, MINUM, YANG HALAL DADN THAYYIB
            </td>
          </tr>
        @endif
        @if ($key == 23)
          <tr>
            <td colspan="7" class="font-bold" style="background: #D9D9D9">
              BERSEDEKAH DAN BERBUAT BAIK
            </td>
          </tr>
        @endif
        <tr>
          <td class="text-center font-semibold">{{ $key + 1 }}</td>
          <td class="font-semibold">{{ $item }}</td>
          <td>
            <label for="check-{{ $key + 1 }}-5" class="select-answer">
              <input type="radio" id="check-{{ $key + 1 }}-5" name="answer-{{ $key + 1 }}" value="5" class="form-control">
            </label>
          </td>
          <td>
            <label for="check-{{ $key + 1 }}-4" class="select-answer">
              <input type="radio" id="check-{{ $key + 1 }}-4" name="answer-{{ $key + 1 }}" value="4" class="form-control">
            </label>
          </td>
          <td>
            <label for="check-{{ $key + 1 }}-3" class="select-answer">
              <input type="radio" id="check-{{ $key + 1 }}-3" name="answer-{{ $key + 1 }}" value="3" class="form-control">
            </label>
          </td>
          <td>
            <label for="check-{{ $key + 1 }}-2" class="select-answer">
              <input type="radio" id="check-{{ $key + 1 }}-2" name="answer-{{ $key + 1 }}" value="2" class="form-control">
            </label>
          </td>
          <td>
            <label for="check-{{ $key + 1 }}-1" class="select-answer">
              <input type="radio" id="check-{{ $key + 1 }}-1" name="answer-{{ $key + 1 }}" value="1" class="form-control">
            </label>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="2" class="font-bold">TOTAL</td>
        <td colspan="5" class="font-bold text-center">0 (Tidak di ketahui)</td>
      </tr>
    </table>
    <div class="mb-4 font-bold">INSTRUMEN PENILAIAN KELUARGA (FAMILY ASSESMENT TOOLS)</div>
    <div class="grid grid-cols-2 gap-5 mb-6">
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Genogram Keluarga (Family Genogram) :</span>
        <textarea name="" id="" rows="6" class="border-0 shadow-none outline-none" placeholder="(Buatlah genogram keluarga sesuai kaidah umum pembuatan genogram dan dilengkapi dengan keterangan/ legenda di bawahnya). Legenda (tambahkan sesuai kebutuhan):
        *B= Breadwinner
        *C= Caregiver
        *D= Decision Maker"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Peta Keluarga (Family Map) :</span>
        <textarea name="" id="" rows="6" class="border-0 shadow-none outline-none" placeholder="Mencakup keluarga inti/ tidak inti, baik yang tinggal di rumah dan tidak (Buatlah peta keluarga yang menggambarkan psikodinamika keluarga sesuai kaidah umum pembuatan peta keluarga dilengkapi dengan keterangan/legenda di bawahnya). Menggambarkan psikososial , dinamika keluarga, Jika garis tebal menunjukan kekuatan hubungan, semakin kuat makin tebal garisnya"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Bentuk Keluarga (Family Structure) :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Tahapan Siklus Kehidupan Keluarga (Family Life Cycle) :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
      <div class="col-span-2 flex flex-col gap-1">
        <span class="text-sm font-semibold">APGAR Keluarga (Family APGAR) :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="[Adaptability-Partnership-Growth-Affection-Resolve]
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
        <tr>
          <td class="text-center font-semibold">{{ $key + 1 }}</td>
          <td class="font-semibold">{{ $item }}</td>
          <td>
            <label for="apgar-{{ $key + 1 }}-5" class="select-answer">
              <input type="radio" id="apgar-{{ $key + 1 }}-5" name="apgar-{{ $key + 1 }}" value="5" class="form-control">
            </label>
          </td>
          <td>
            <label for="apgar-{{ $key + 1 }}-4" class="select-answer">
              <input type="radio" id="apgar-{{ $key + 1 }}-4" name="apgar-{{ $key + 1 }}" value="4" class="form-control">
            </label>
          </td>
          <td>
            <label for="apgar-{{ $key + 1 }}-3" class="select-answer">
              <input type="radio" id="apgar-{{ $key + 1 }}-3" name="apgar-{{ $key + 1 }}" value="3" class="form-control">
            </label>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="2" class="font-bold">SKOR TOTAL</td>
        <td colspan="5" class="font-bold text-center">0 (Tidak di ketahui)</td>
      </tr>
    </table>
    <div class="flex flex-col gap-1 mb-6">
      <span class="text-sm font-semibold">SCREEM Keluarga (Family SCREEM) :</span>
      <textarea name="" id="" rows="4" class="border-0 shadow-none outline-none" placeholder="(Social-Cultural-Religious-Educational-Economic-Medical)"></textarea>
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
      @foreach ($religious_perception as $key => $item)
        @if ($key == 0)
          <tr>
            <td colspan="7" class="font-bold" style="background: #D9D9D9">
              KEIMANAN PASIEN
            </td>
          </tr>
        @endif
        <tr>
          <td class="text-center font-semibold">{{ $key + 1 }}</td>
          <td class="font-semibold">{{ $item }}</td>
          <td>
            <label for="check-{{ $key + 1 }}-5" class="select-answer">
              <input type="radio" id="check-{{ $key + 1 }}-5" name="answer-{{ $key + 1 }}" value="5" class="form-control">
            </label>
          </td>
          <td>
            <label for="check-{{ $key + 1 }}-4" class="select-answer">
              <input type="radio" id="check-{{ $key + 1 }}-4" name="answer-{{ $key + 1 }}" value="4" class="form-control">
            </label>
          </td>
          <td>
            <label for="check-{{ $key + 1 }}-3" class="select-answer">
              <input type="radio" id="check-{{ $key + 1 }}-3" name="answer-{{ $key + 1 }}" value="3" class="form-control">
            </label>
          </td>
          <td>
            <label for="check-{{ $key + 1 }}-2" class="select-answer">
              <input type="radio" id="check-{{ $key + 1 }}-2" name="answer-{{ $key + 1 }}" value="2" class="form-control">
            </label>
          </td>
          <td>
            <label for="check-{{ $key + 1 }}-1" class="select-answer">
              <input type="radio" id="check-{{ $key + 1 }}-1" name="answer-{{ $key + 1 }}" value="1" class="form-control">
            </label>
          </td>
        </tr>
      @endforeach
      <tr>
        <td colspan="2" class="font-bold">TOTAL</td>
        <td colspan="5" class="font-bold text-center">0 (Tidak di ketahui)</td>
      </tr>
    </table>
    <div class="flex flex-col gap-1 mb-6">
      <span class="text-sm font-semibold">Perjalanan Hidup Keluarga (Family Life Line) :</span>
      <textarea name="" id="" rows="4" class="border-0 shadow-none outline-none" placeholder="Uraikan tentang kejadian penting/ krisis dalam kehidupan keluarga pasien yang mungkin mempengaruhi keparahan sakit pasien (misal: kecelakaan lalu lintas, penyakit/ kematian anggota keluarga, PHK, pindah rumah/ pekerjaan, bencana alam, dll.)"></textarea>
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
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Kesadaran :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
    </div>
    <span>Anntropometri:</span>
    <div class="grid grid-cols-2 mt-2 mb-6">
      <div>
        <table class="w-full">
          <tr>
            <td class="w-[180px] font-semibold">Tinggi Badan</td>
            <td class="pr-5">:</td>
            <td>
              <div class="flex items-center gap-2">
                <input type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
                <span class="font-semibold w-[10px]">cm</span>
              </div>
            </td>
          </tr>
          <tr>
            <td class="w-[180px] font-semibold">Berat Badan</td>
            <td class="pr-5">:</td>
            <td>
              <div class="flex items-center gap-2">
                <input type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
                <span class="font-semibold w-[10px]">kg</span>
              </div>
            </td>
          </tr>
          <tr>
            <td class="w-[180px] font-semibold">Lingkar Pinggang</td>
            <td class="pr-5">:</td>
            <td>
              <div class="flex items-center gap-2">
                <input type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
                <span class="font-semibold w-[10px]">cm</span>
              </div>
            </td>
          </tr>
          <tr>
            <td class="w-[180px] font-semibold">Lingkar Panggul</td>
            <td class="pr-5">:</td>
            <td>
              <div class="flex items-center gap-2">
                <input type="text" class="form-control border-0 text-sm w-[80%]" autocomplete="off">
                <span class="font-semibold w-[10px]">cm</span>
              </div>
            </td>
          </tr>
          <tr>
            <td class="w-[180px] font-semibold">Lingkar Lengan Atas</td>
            <td class="pr-5">:</td>
            <td>
              <div class="flex items-center gap-2">
                <input type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
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
              <input type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
            </td>
          </tr>
          <tr>
            <td class="w-[220px] font-semibold">Waist - Hip Ratio</td>
            <td class="pr-5">:</td>
            <td>
              <input type="text" class="form-control border-0 w-[80%] text-sm" autocomplete="off">
            </td>
          </tr>
          <tr style="vertical-align: top">
            <td class="w-[220px] font-semibold pt-2">Status Gizi</td>
            <td class="pr-5 pt-2">:</td>
            <td>
              <textarea name="" id="" rows="4" class="border-0 w-[80%] text-sm"></textarea>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="mb-4 font-bold">Pemeriksaan Umum</div>
    <div class="grid grid-cols-2 gap-5 mb-6">
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Kepala:</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Abdomen:</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Leher:</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Anogenital:</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Thoraks:</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
      <div class="flex flex-col gap-1">
        <span class="text-sm font-semibold">Ekstremitas:</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="Isikan keluhan utama"></textarea>
      </div>
    </div>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">PEMERIKSAAN KHUSUS :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="Lansia, pemeriksaan neurologis, tumbuh kembang, ANC dll"></textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">STATUS NUTRISI DAN PENILAIAN AKTIFITAS FISIK :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
    </div>
    <span class="text-lg font-semibold">PEMERIKSAAN PENUNJANG</span>
    <table class="mt-3 w-full mb-6">
      <tr>
        <td class="w-[150px]">Laboratorium</td>
        <td class="w-[30px]">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td class="w-[150px]">Radiologi</td>
        <td class="w-[30px]">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td class="w-[150px]">Lainnnya</td>
        <td class="w-[30px]">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">DIAGNOSIS BANDING :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="Diagnosis pasti/ d/kerja hanya ada di aspek klinis"></textarea>
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
          <td class="text-center font-semibold">{{ $key + 1 }}</td>
          <td class="font-semibold">{{ $item }}</td>
          <td>
            <label for="phbs-{{ $key + 1 }}-5" class="select-answer">
              <input type="radio" id="phbs-{{ $key + 1 }}-5" name="answer-{{ $key + 1 }}" value="5" class="form-control">
            </label>
          </td>
          <td>
            <label for="phbs-{{ $key + 1 }}-4" class="select-answer">
              <input type="radio" id="phbs-{{ $key + 1 }}-4" name="answer-{{ $key + 1 }}" value="4" class="form-control">
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
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Asesmen Rumah Sehat :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
    </div>
    <div class="font-bold mb-4">DIAGNOSIS HOLISTIK</div>
    <table class="w-full mb-6">
      <tr>
        <td style="width: 250px">Aspek Klinis</td>
        <td style="width: 50px">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Aspek Personal</td>
        <td style="width: 50px">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Aspek Risiko Internal</td>
        <td style="width: 50px">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Aspek Risiko Eksternal</td>
        <td style="width: 50px">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Aspek Derajat Fungsional</td>
        <td style="width: 50px">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Uraian Diagnosis Holistik</td>
        <td style="width: 50px">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
    </table>
    <div class="font-bold mb-4">DIAGNOSIS HOLISTIK</div>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Patient-Centered :</span>
        <textarea name="" id="" rows="12" class="border-0 shadow-none outline-none" placeholder="Bagaimana level of preventionnya
a. edukasi terkait penyakit ( bisa disertai motivasi), perilaku (pola makan, aktifitas fisik, dll)
b. perhatikan langkah pendidikan pasien Asesmen, Perencanaan, Implementasi, Evaluasi (APIE)
c. kuratif - terapi farmakologi
d. rehabilitative - program fisioterapi (bila ada)

Perhatikan 8 dimensi patient centered approach: menghormati pilihan dan penilaian pasien, pelayanan terkoordinasi, informasi dan edukasi, kenyamanan fisik, dukungan emosi, keterlibatan pasien, kontinu, kemudahan akses layanan)

Perhatikan kolaborasi interprofesi dan apakah perlu digolongkan dalam manajemen kasus di layanan primer? (diagnosis > 2 penyakit, sangat perlu dukungan keluarga, status fungsional turun)"></textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm font-semibold">Family-Focused (Family Wellness Plan) :</span>
        <textarea name="" id="" rows="3" class="border-0 shadow-none outline-none" placeholder="edukasi dll yg mengacu ke level of prevention sesuai siklus kehidupan. Penekanan terhadap intervensi gizi, aktifitas fisik, dll. Perhatikan: keterlibatan keluarga dalam penatalaksanaan pasien, hasil analisis family assestment tool, apa risiko dan kebutuhan keluarga, potensi dan kekurangan. Rencana family meeting?"></textarea>
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
        <textarea name="" id="" rows="10" class="border-0 shadow-none outline-none" placeholder="(Tujuan: untuk kesinambungan pelayanan pasien dan memenuhi kebutuhan di komunitas)
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
        <textarea name="" id="" rows="4" class="border-0 shadow-none outline-none" placeholder="Penilaian rumah sehat
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
        @foreach ($item["kriteria"] as $key2 => $item2)
          <tr>
            <td>{{ $item2 }}</td>
            <td class="text-center">{{ $item["point"][$key2] }}</td>
            <td>
              <label for="komponent_point-{{ $key }}-{{ $key2 }}" class="select-answer">
                <input type="radio" id="komponent_point-{{ $key }}-{{ $key2 }}" name="komponent_point-{{ $key }}" value="{{ $item["point"][$key2] * 25 }}" class="form-control">
              </label>
            </td>
            @if ($key2 / 3 == 0)
              <td rowspan="3" class="text-center font-semibold" id="komponent_point_result-{{ $key }}"></td>
            @endif
          </tr>
        @endforeach
      @endforeach
      <tr>
        <td colspan="3" class="font-bold text-right">HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold">0</td>
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
        @foreach ($item["kriteria"] as $key2 => $item2)
          <tr>
            <td>{{ $item2 }}</td>
            <td class="text-center">{{ $item["point"][$key2] }}</td>
            <td>
              <label for="sarana_sanitasi-{{ $key }}-{{ $key2 }}" class="select-answer">
                <input type="radio" id="sarana_sanitasi-{{ $key }}-{{ $key2 }}" name="sarana_sanitasi-{{ $key }}" value="{{ $item["point"][$key2] * 25 }}" class="form-control">
              </label>
            </td>
            @if ($key2 / 3 == 0)
              <td rowspan="{{ $key == 3 ? 4 : 5 }}" class="text-center font-semibold" id="sarana_sanitasi_result-{{ $key }}"></td>
            @endif
          </tr>
        @endforeach
      @endforeach
      <tr>
        <td colspan="3" class="font-bold text-right">HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold">0</td>
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
        @foreach ($item["kriteria"] as $key2 => $item2)
          <tr>
            <td>{{ $item2 }}</td>
            <td class="text-center">{{ $item["point"][$key2] }}</td>
            <td>
              <label for="komponent_point-{{ $key }}-{{ $key2 }}" class="select-answer">
                <input type="radio" id="komponent_point-{{ $key }}-{{ $key2 }}" name="komponent_point-{{ $key }}" value="{{ $item["point"][$key2] * 25 }}" class="form-control">
              </label>
            </td>
            @if ($key2 / 3 == 0)
              <td rowspan="3" class="text-center font-semibold" id="komponent_point_result-{{ $key }}"></td>
            @endif
          </tr>
        @endforeach
      @endforeach
      <tr>
        <td colspan="3" class="font-bold text-right">HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold">0</td>
      </tr>
      <tr>
        <td colspan="3" class="font-bold text-right">TOTAL HASIL PENILAIAN</td>
        <td colspan="3" class="text-left font-bold">0</td>
      </tr>
    </table>
    <div class="grid grid-cols-1 gap-5 mb-6">
      <div class="flex flex-col gap-2">
        <span class="text-sm">Kesan :</span>
        <textarea name="" id="" rows="5" class="border-0 shadow-none outline-none" placeholder=""></textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm">Lingkungan Sekitar Rumah :</span>
        <textarea name="" id="" rows="5" class="border-0 shadow-none outline-none" placeholder="(Jelaskan tentang sumber dan penampungan air, pengaturan limbah, pembuangan sampah, situasi halaman, selokan, serta gambaran kedekatan dengan rumah tetangga sekitar)"></textarea>
      </div>
      <div class="flex flex-col gap-2">
        <span class="text-sm">Lingkungan Pekerjaan :</span>
        <textarea name="" id="" rows="5" class="border-0 shadow-none outline-none" placeholder="Lingkungan Pekerjaan > jika pasien bekerja deskripsikan apakah ada paparan dari lingkungan kerja , contoh pabrik rokok, ventilasi nya, sirkulasinya baik atau tidak"></textarea>
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
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Ad functionam</td>
        <td style="width: 50px">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
      <tr>
        <td style="width: 250px">Ad sanationam</td>
        <td style="width: 50px">:</td>
        <td>
          <input type="text" class="border-0 w-full" autocomplete="off">
        </td>
      </tr>
    </table>
    <div class="mt-24">
      <button type="button" class="bg-white font-bold shadow-lg w-full py-3">Simpan</button>
    </div>
  </div>
</div>
@endsection

@push("js")
<script>
  let nodeIter = 1;
  let nodeIter2 = 1;
  let nodeIter3 = 1;

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
</script>
@endpush